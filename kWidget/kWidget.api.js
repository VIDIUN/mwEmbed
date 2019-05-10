/*********************************************
* A minimal wrapper for vidiun server api
* 
* Supports static requests,
* Auto includes vWidget for userVS queries ( where admin vs is not provided )
* Makes use of defined: 
* 	'Vidiun.ServiceUrl', 'http://cdnapi.vidiun.com' );
* 		&&
*	'Vidiun.ServiceBase'
**********************************************/
(function( vWidget ){ "use strict"
if( !vWidget ){
	vWidget = window.vWidget = {};
}
vWidget.api = function( options ){
	return this.init( options );
};
vWidget.api.prototype = {
	vs: null,
	// the default api request method
	// will dictate if the CDN can cache on a per url basis
	type: 'auto',
	baseParam: {
		'apiVersion' : '3.1',
		'expiry' : '86400',
		'clientTag': 'vwidget:v' + window[ 'MWEMBED_VERSION' ],
		'format' : 9, // 9 = JSONP format
		'ignoreNull' : 1
	},
	/**
	 * Init the api object:
	 * options {Object} Set of init options
	 */
	init: function( options  ){
		for( var i in options ){
			this[i] = options[i];
		}
		// check for globals if not set, use mw.getConfig
		if( ! this.serviceUrl ){
			this.serviceUrl = mw.getConfig( 'Vidiun.ServiceUrl' );
		}
		if( ! this.serviceBase ){
			this.serviceBase = mw.getConfig( 'Vidiun.ServiceBase' ); 
		}
		if( ! this.statsServiceUrl ){
			this.statsServiceUrl = mw.getConfig( 'Vidiun.StatsServiceUrl' );
		}
		if( typeof this.disableCache == 'undefined' ){
			this.disableCache = mw.getConfig('Vidiun.NoApiCache');
		}
	},
	setVs: function( vs ){
		this.vs = vs;
	},
	getVs: function(){
		return this.vs;
	},
	/**
	 * Do an api request and get data in callback
	 */
	doRequest: function ( requestObject, callback ){
		var _this = this;
		var param = {};
		// If we have Vidiun.NoApiCache flag, pass 'nocache' param to the client
		if( this.disableCache === true ) {
			param['nocache'] = 'true';
		}
		
		// Add in the base parameters:
		for( var i in this.baseParam ){
			if( typeof param[i] == 'undefined' ){
				param[i] = this.baseParam[i];
			}
		};
		// Check for "user" service queries ( no vs or wid is provided  )
		if( requestObject['service'] != 'user' ){
			vWidget.extend( param, this.handleVsServiceRequest( requestObject ) );
		} else {
			vWidget.extend( param, requestObject );
		}
		// Add vidsig to query:
		param[ 'vidsig' ] = this.hashCode( vWidget.param( param ) );
		
		// Remove service tag ( hard coded into the api url )
		var serviceType = param['service'];
		delete param['service'];

		var handleDataResult = function( data ){
			// check if the base param was a session ( then directly return the data object ) 
            data = data || [];
            if( data.length == 2 && param[ '1:service' ] == 'session' ){
				data = data[1];
			}
			// issue the local scope callback:
			if( callback ){
				callback( data );
				callback = null;
			}
		}
		// Run the request
		// NOTE vidiun api server should return: 
		// Access-Control-Allow-Origin:* most browsers support this. 
		// ( old browsers with large api payloads are not supported )
		try {
			// set format to JSON ( Access-Control-Allow-Origin:* )
			param['format'] = 1;
			this.xhrRequest( _this.getApiUrl( serviceType ), param, function( data ){
				handleDataResult( data );
			});
		} catch(e){
			param['format'] = 9; // jsonp
			// build the request url: 
			var requestURL = _this.getApiUrl( serviceType ) + '&' + vWidget.param( param );
			// try with callback:
			var globalCBName = 'vapi_' + Math.abs( _this.hashCode( vWidget.param( param ) ) );
			if( window[ globalCBName ] ){
				// Update the globalCB name inx.
				this.callbackIndex++;
				globalCBName = globalCBName + this.callbackIndex;
			}
			window[ globalCBName ] = function(data){
				handleDataResult( data );
				// null out the global callback for fresh loads
				 window[globalCBName] = undefined;
				try{
					delete window[globalCBName];
				}catch( e ){}
			}
			requestURL+= '&callback=' + globalCBName;
			vWidget.appendScriptUrl( requestURL );
		}
	},
	xhrRequest: function( url, param, callback ){
		// get the request method:
		var requestMethod = this.type == "auto" ? 
				( ( vWidget.param( param ).length > 2000 ) ? 'xhrPost' : 'xhrGet' ) :
				( (  this.type == "GET" )? 'xhrGet': 'xhrPost' );
		// do the respective request
		this[ requestMethod ](  url, param, callback );
	},
	xhrGet: function( url, param, callback ){
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){
			if ( xmlhttp.readyState==4 && xmlhttp.status==200 ){
				callback( JSON.parse( xmlhttp.responseText) );
			}
		}
		xmlhttp.open("GET", url + '&' + vWidget.param( param ), true);
		xmlhttp.send();
	},
	/**
	 * Do an xhr request
	 */
	xhrPost: function( url, param, callback ){
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){
			if ( xmlhttp.readyState==4 && xmlhttp.status==200 ){
				callback( JSON.parse( xmlhttp.responseText) );
			}
		}
		xmlhttp.open("POST", url, true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send( vWidget.param( param ) );
	},
	handleVsServiceRequest: function( requestObject ){
		var param = {};
		// put the vs into the params request if set
		if( requestObject[ 'vs' ] ){
			this.vs = requestObject['vs'];
		}
		// Convert into a multi-request if no session is set ( vs will be added below )
		if( !requestObject.length && !this.getVs() ){
			requestObject = [ requestObject ];
		}
		// Check that we have a session established if not make it part of our multi-part request
		if( requestObject.length ){
			param['service'] = 'multirequest';
			param['action'] = 'null';

			// Vidiun api starts with index 1 for some strange reason.
			var mulitRequestIndex = 1;
			// check if we should add a user vs
			if( !this.getVs() ){
				param[ mulitRequestIndex + ':service' ] = 'session';
				param[ mulitRequestIndex + ':action' ] = 'startWidgetSession';
				param[ mulitRequestIndex + ':widgetId'] = this.wid;
				// update the request index:
				mulitRequestIndex = 2;
			}

			for( var i = 0 ; i < requestObject.length; i++ ){
				var requestInx = mulitRequestIndex + i;
				// If vs was null always add back ref to vs:
				param[ requestInx + ':vs'] = ( this.getVs() ) ? this.getVs() : '{1:result:vs}';
				
				// MultiRequest pre-process each param with inx:param
				for( var paramKey in requestObject[i] ){
					// support multi dimension array request:
					if( typeof requestObject[i][paramKey] == 'object' ){
						for( var subParamKey in requestObject[i][paramKey] ){
							param[ requestInx + ':' + paramKey + ':' +  subParamKey ] =
								requestObject[i][paramKey][subParamKey];
						}
					} else {
						param[ requestInx + ':' + paramKey ] = requestObject[i][paramKey];
					}
				}
			}
		} else {
			param = requestObject;
			param['vs'] = this.getVs();
		}
		return param;
	},
	getApiUrl : function( serviceType ){
		var serviceUrl = this.serviceUrl;
		if( serviceType && serviceType == 'stats' && this.statsServiceUrl ) {
			serviceUrl = this.statsServiceUrl
		}
		return serviceUrl + this.serviceBase + serviceType;
	},
	hashCode: function( str ){
		var hash = 0;
		if (str.length == 0) return hash;
		for (var i = 0; i < str.length; i++) {
			var currentChar = str.charCodeAt(i);
			hash = ((hash<<5)-hash)+currentChar;
			hash = hash & hash; // Convert to 32bit integer
		}
		return hash;
	}
}

})( window.vWidget );
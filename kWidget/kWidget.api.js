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
	// initialize callback index to zero
	callbackIndex: 0,
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
	forceVs:function(wid,callback,errorCallback){
		if( this.getVs() ){
			callback( this.getVs() );
			return true;
		}
		var _this = this;
		// Add the Vidiun session ( if not already set )
		var vsParam = {
			'action' : 'startwidgetsession',
			'widgetId': wid
		};
		// add in the base parameters:
		var param = vWidget.extend( { 'service' : 'session' }, this.baseParam, vsParam );
		this.doRequest( param, function( data ){
			_this.vs = data.vs;
			callback( _this.vs );
		},null,errorCallback);
	},
	/**
	 * Do an api request and get data in callback
	 */
	doRequest: function ( requestObject, callback,skipKS, errorCallback, withProxyData){
		var _this = this;
		var param = {};
		var globalCBName = null;
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
		if( requestObject['service'] != 'user' && !skipVS ){
			vWidget.extend( param, this.handleVsServiceRequest( requestObject ) );
		} else {
			vWidget.extend( param, requestObject );
		}

		// set format to JSON ( Access-Control-Allow-Origin:* )
		param['format'] = 1;

		// Add vidsig to query:
		param[ 'vidsig' ] = this.hashCode( vWidget.param( param ) );
		
		// Remove service tag ( hard coded into the api url )
		var serviceType = param['service'];
		delete param['service'];

		var timeoutError = setTimeout(function(){
			if ( globalCBName ) {
				window[globalCBName] = undefined;
			}
			if (errorCallback){
				errorCallback();
			}
			//mw.log("Timeout occur in doApiRequest");
		},mw.getConfig("Vidiun.APITimeout"));

		var handleDataResult = function( data ){
			clearTimeout(timeoutError);
			// check if the base param was a session
            data = data || [];
            if( data.length > 1 && param[ '1:service' ] == 'session' && !withProxyData){ // in case of proxyData (OTT) we request a session but KS doesn't exist
																						 // so the response doesn't contain it so don't handle
				//Set the returned ks
	            _this.setKs(data[0].ks);
	            // if original request was not a multirequest then directly return the data object
	            // if original request was a multirequest then remove the session from the returned data objects
	            if (data.length == 2){
		            data = data[1];
	            } else {
		            data.shift();
	            }
			}
			// issue the local scope callback:
			if( callback ){
				callback( data );
				callback = null;
			}
		};

		// Run the request
		// NOTE vidiun api server should return: 
		// Access-Control-Allow-Origin:* most browsers support this. 
		// ( old browsers with large api payloads are not supported )
		var userAgent = navigator.userAgent.toLowerCase();
		var forceJSONP = document.documentMode && document.documentMode <= 10;
		try {
			if ( forceJSONP ){
				throw "forceJSONP";
			}
			this.xhrRequest( _this.getApiUrl( serviceType ), param, function( data ){
				handleDataResult( data );
			});
		} catch(e){
			param['format'] = 9; // jsonp
			//Delete previous vidSig
			delete param[ 'vidsig' ];
			//Regenerate vidSig with amended format
			var vidSig = this.hashCode( vWidget.param( param ) );
			// Add vidsig to query:
			param[ 'vidsig' ] = vidSig;
			// build the request url: 
			var requestURL = _this.getApiUrl( serviceType ) + '&' + vWidget.param( param );
			// try with callback:
			globalCBName = 'vapi_' + vidSig;
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
	parseResponse: function (data ){
		var response = data;
		try {
			response = JSON.parse( data );
		}catch(e){}
		return response;
	},
	xhrGet: function( url, param, callback ){
		var _this = this;
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){
			if ( xmlhttp.readyState==4 && xmlhttp.status==200 ){
				callback( _this.parseResponse( xmlhttp.responseText ) );
			}
		}
		xmlhttp.open("GET", url + '&' + vWidget.param( param ), true);
		xmlhttp.send();
	},
	/**
	 * Do an xhr request
	 */
	xhrPost: function( url, param, callback ){
		var _this = this;
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){
			if ( xmlhttp.readyState==4 && xmlhttp.status==200 ){
				callback( _this.parseResponse( xmlhttp.responseText ) );
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
								this.parseParam(requestObject[i][paramKey][subParamKey]);
						}
					} else {
						param[ requestInx + ':' + paramKey ] = this.parseParam(requestObject[i][paramKey]);
					}
				}
			}
		} else {
			param = requestObject;
			param['vs'] = this.getVs();
		}
		return param;
	},
	parseParam: function(data){
		var param = data;
		//Check if we need to request session
		if (!this.getVs() && (param !== undefined)) {
			//check if request contains dependent params and if so then update reference object num -
			// because reference index changed due to addition of multirequest startWidgetSession service
			var paramParts = param.toString().match( /\{(\d+)(:result:.*)\}/ );
			if ( paramParts ) {
				var refObj = parseInt(paramParts[1]) + 1;
				param = "{"+ refObj + paramParts[2] + "}"
			}
		}
		return param;
	},
	getApiUrl : function( serviceType ){
		var serviceUrl = mw.getConfig( 'Vidiun.ServiceUrl' );
		if( serviceType && serviceType == 'stats' &&  mw.getConfig( 'Vidiun.StatsServiceUrl' ) ) {
			serviceUrl = mw.getConfig( 'Vidiun.StatsServiceUrl' );
		}
		if( serviceType && serviceType == 'liveStats' &&  mw.getConfig( 'Vidiun.LiveStatsServiceUrl' ) ) {
			serviceUrl = mw.getConfig( 'Vidiun.LiveStatsServiceUrl' );
		}
		if( serviceType && serviceType == 'analytics' &&  mw.getConfig( 'Kaltura.AnalyticsUrl' ) ) {
			serviceUrl = mw.getConfig( 'Kaltura.AnalyticsUrl' );
		}
		return serviceUrl + mw.getConfig( 'Kaltura.ServiceBase' ) + serviceType;
	},
	hashCode: function( str ){
		return md5(str);
	}
}

})( window.vWidget );
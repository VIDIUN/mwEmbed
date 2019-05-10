/**
 * Simple vidiun javascript api
 *
 * uses configuration Vidiun.ServiceUrl and Vidiun.ServiceBase for api entry point
 * 
 * Should extend new vWidget.api() api.request() base
 */

/**
 * vApi takes supports a few mixed argument types
 *
 * @param {String}
 *		widgetId used to establish a request key for the given session
 *		( this enables multiple sessions per widget id on a single page )
 * @param {Mixed}
 *		Array An Array of request params for multi-request
 *		Object Named request params
 */
( function( mw, $ ) { "use strict";

mw.VApi = function( widgetId ){
	return this.init( widgetId );
};

mw.VApi.prototype = {
	baseParam: {
		'apiVersion' : '3.1',
		'clientTag' : 'html5:v' + window[ 'MWEMBED_VERSION' ],
		'expiry' : '86400',
		'format' : 9, // 9 = JSONP format
		'ignoreNull' : 1
	},
	playerLoaderCache: [],
	// The local vidiun session key ( so it does not have to be re-grabbed with every request
	vs : null,
	init: function( widgetId ){
		this.widgetId = widgetId;
	},
	/**
	 * Clears the local cache for the vs and player data:
	 */
	clearCache:function(){
		this.playerLoaderCache = [];
		this.vs = null;
	},
	// Stores a callback index for duplicate api requests
	callbackIndex:0,

	getWidgetId: function( ){
		return this.widgetId;
	},
	doRequest : function( requestObject, callback ,skipKS, errorCallback ){
		var _this = this;
		var param = {};
		// Convert into a multi-request if no session is set ( vs will be added below )
		if( !requestObject.length && !this.vs ){
			requestObject = [ requestObject ];
		}

		// If we have Vidiun.NoApiCache flag, pass 'nocache' param to the client
		if( mw.getConfig('Vidiun.NoApiCache') === true ) {
			param['nocache'] = 'true';
		}

		// Check that we have a session established if not make it part of our multi-part request
		if( requestObject.length ){
			param['service'] = 'multirequest';
			param['action'] = 'null';

			// Vidiun api starts with index 1 for some strange reason.
			var mulitRequestIndex = 1;

			for( var i = 0 ; i < requestObject.length; i++ ){
				var requestInx = mulitRequestIndex + i;
				// MultiRequest pre-process each param with inx:param
				for( var paramKey in requestObject[i] ){
					// support multi dimension array request:
					// NOTE vidiun api only has sub arrays ( would be more feature complete to
					// recursively define key appends )
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
		}

		// add in the base parameters:
		for( var i in this.baseParam ){
			if( typeof param[i] == 'undefined' ){
				param[i] = this.baseParam[i];
			}
		};

		// Make sure we have the vidiun session
		// ideally this could be part of the multi-request but could not get it to work
		// see commented out code above.
        if (skipKS) {
            _this.doApiRequest( param, callback, errorCallback);
        }else {
            this.getVS( function( vs ){
                param['vs'] = vs;
                // Do the getJSON jQuery call with special callback=? parameter:
                _this.doApiRequest( param, callback, errorCallback);
            });
        }

	},
	setVS: function( vs ){
		this.vs = vs;
	},
	getVS: function( callback ){
		if( this.vs ){
			callback( this.vs );
			return true;
		}
		var _this = this;
		// Add the Vidiun session ( if not already set )
		var vsParam = {
				'action' : 'startwidgetsession',
				'widgetId': this.widgetId
		};
		// add in the base parameters:
		var param = $.extend( { 'service' : 'session' }, this.baseParam, vsParam );
		this.doApiRequest( param, function( data ){
			_this.vs = data.vs;
			callback( _this.vs );
		});
	},
	doApiRequest: function( param, callback, errorCallback ){
		var _this = this;

		// Remove service tag ( hard coded into the api url )
		var serviceType = param['service'];
		delete param['service'];

		// Add the signature ( if not a session init )
		if( serviceType != 'session' ){
			param['vidsig'] = _this.getSignature( param );
		}

		// Build the request url with sorted params:
		var requestURL = _this.getApiUrl( serviceType ) + '&' + $.param( param );



		var globalCBName = 'kapi_' + _this.getSignature( param );
		while( window[ globalCBName ] ){
			mw.log("Error global callback name already exists: " + globalCBName );
			// Update the globalCB name inx.
			this.callbackIndex++;
			globalCBName = globalCBName + this.callbackIndex;
		}
		window[ globalCBName ] = function( data ){
			clearTimeout(timeoutError);
			// issue the local scope callback:
			if( callback ){
				callback( data );
				callback = null;
			}
			// null this global function name
			window[ globalCBName ] = null;
		};
		var timeoutError = setTimeout(function(){
			window[ globalCBName ] = null;
			if (errorCallback){
				errorCallback();
			}
			mw.log("Timeout occur in doApiRequest:" + requestURL);
		},mw.getConfig("Kaltura.APITimeout"));
		requestURL+= '&callback=' + globalCBName;
		mw.log("kAPI:: doApiRequest: " + requestURL);
		$.ajax( {
			url: requestURL,
			cache: mw.getConfig("Kaltura.CacheApiCalls") || true,
			dataType: "script"
		});
	},
	getApiUrl : function( serviceType ){
		var serviceUrl = mw.getConfig( 'Vidiun.ServiceUrl' );
		if( serviceType && serviceType == 'stats' &&  mw.getConfig( 'Vidiun.StatsServiceUrl' ) ) {
			serviceUrl = mw.getConfig( 'Vidiun.StatsServiceUrl' );
		}
		if( serviceType && serviceType == 'liveStats' &&  mw.getConfig( 'Kaltura.LiveStatsServiceUrl' ) ) {
			serviceUrl = mw.getConfig( 'Kaltura.LiveStatsServiceUrl' );
		}
		return serviceUrl + mw.getConfig( 'Kaltura.ServiceBase' ) + serviceType;
	},
	getSignature: function( params ){
		params = this.vsort(params);
		var str = "";
		for(var v in params) {
			var k = params[v];
			str += k + v;
		}
		return MD5(str);
	},
	/**
	 * Sorts an array by key, maintaining key to data correlations. This is useful mainly for associative arrays.
	 * @param arr	The array to sort.
	 * @return		The sorted array.
	 */
	vsort: function ( arr ) {
		var sArr = [];
		var tArr = [];
		var n = 0, i, x;
		for ( i in arr ){
			tArr[n++] = i+"|"+arr[i];
		}
		tArr = tArr.sort();
		for (i=0; i<tArr.length; i++) {
			x = tArr[i].split("|");
			sArr[x[0]] = x[1];
		}
		return sArr;
	},
	/**
	 * PlayerLoader
	 *
	 * Does a single request to the api to
	 * a) Get context data
	 * c) Get flavorasset
	 * b) Get baseEntry
	 */
	playerLoader: function( vProperties, callback ){
		var _this = this,
			requestObject = [];

		// Normelize flashVars
		vProperties.flashvars = vProperties.flashvars || {};

		if( this.getCacheKey( vProperties ) && this.playerLoaderCache[ this.getCacheKey( vProperties ) ] ){
			mw.log( "VApi:: playerLoader load from cache: " + !!( this.playerLoaderCache[ this.getCacheKey( vProperties ) ] ) );
			callback( this.playerLoaderCache[ this.getCacheKey( vProperties ) ] );
			return ;
		}
		// Local method to fill the cache key and run the assoicated callback
		var fillCacheAndRunCallback = function( namedData ){
			_this.playerLoaderCache[ _this.getCacheKey( vProperties ) ] = namedData;
			callback( namedData );
		}

		// If we don't have entryId and referenceId return an error
		if( !vProperties.flashvars.referenceId && !vProperties.entry_id ) {
			mw.log( "VApi:: entryId and referenceId not found, exit.");
			callback( { error: "Empty player" } );
			return ;
		}

		// Check if we have vs flashvar and use it for our request
		if( vProperties.flashvars && vProperties.flashvars.vs ) {
			this.setVS( vProperties.flashvars.vs );
		}

		// Always get the entry id from the first request result
		var entryIdValue = '{1:result:objects:0:id}';
		// Base entry request
		var baseEntryRequestObj = {
			'service' : 'baseentry',
			'action' : 'list',
			'filter:objectType' : 'VidiunBaseEntryFilter'
		};
		// Filter by reference Id
		if( !vProperties.entry_id && vProperties.flashvars.referenceId ){
			baseEntryRequestObj['filter:referenceIdEqual'] = vProperties.flashvars.referenceId;
		} else if ( vProperties.entry_id ){
			if( vProperties.features['entryRedirect'] && vProperties.flashvars.disableEntryRedirect !== true ) {
				// Filter by redirectEntryId
				baseEntryRequestObj['filter:redirectFromEntryId'] = vProperties.entry_id;				
			} else {
				// Filter by entryId
				baseEntryRequestObj['filter:idEqual'] = vProperties.entry_id;
			}
		}
		requestObject.push(baseEntryRequestObj);
		var streamerType = vProperties.flashvars.streamerType || 'http';
		var flavorTags = vProperties.flashvars.flavorTags || 'all';

		// Add Context Data request
		requestObject.push({
			'contextDataParams' : {
				'referrer' : window.vWidgetSupport.getHostPageUrl(),
				'objectType' : 'VidiunEntryContextDataParams',
				'flavorTags': flavorTags,
				'streamerType': streamerType
			},
			'service' : 'baseentry',
			'entryId' : entryIdValue,
			'action' : 'getContextData'
		});

		// Get custom Metadata
		requestObject.push({
			'service' : 'metadata_metadata',
			'action' : 'list',
			'version' : '-1',
			// metaDataFilter
			'filter:metadataObjectTypeEqual' :1, /* VidiunMetadataObjectType::ENTRY */
			'filter:orderBy' : '+createdAt',
			'filter:objectIdEqual' : entryIdValue,
			'pager:pageSize' : 1
		});

		if( vProperties.flashvars.getCuePointsData !== false ){
			requestObject.push({
				'service' : 'cuepoint_cuepoint',
				'action' : 'list',
				'filter:objectType' : 'VidiunCuePointFilter',
				'filter:orderBy' : '+startTime',
				'filter:statusEqual' : 1,
				'filter:entryIdEqual' : entryIdValue
			});
		}
		_this.getNamedDataFromRequest( requestObject, fillCacheAndRunCallback );
	},

	/**
	 * Do the player data Request and populate named dat
	 * @pram {object} requestObject Request object
	 * @parm {function} callback Function called with named data
	 */
	getNamedDataFromRequest: function( requestObject, callback ){
		var _this = this;
		// Do the request and pass along the callback
		this.doRequest( requestObject, function( data ){
			var namedData = {};
			// Name each result data type for easy access

			// Check if we have an error
			if( data[0].code ) {
				mw.log('Error in vidiun api response: ' + data[0].message);
				callback( { 'error' :  data[0].message } );
				return ;
			}

			var dataIndex = 0;
			// The first data index should be meta ( it shows up in either objects[0] or as a raw property
			if( ! data[ dataIndex ].objects || ( data[ dataIndex ].objects && data[ dataIndex ].objects.length == 0 )) {
				namedData['meta'] = {
					code: 'ENTRY_ID_NOT_FOUND',
					message: 'Entry not found'
				};
			} else {
				namedData['meta'] = data[ dataIndex ].objects[0];
			}
			dataIndex++;
			namedData['contextData'] = data[ dataIndex ];
			dataIndex++;
			namedData['entryMeta'] = _this.convertCustomDataXML( data[ dataIndex ] );
			dataIndex++;
			if( data[ dataIndex ] && data[ dataIndex].totalCount > 0 ) {
				namedData['entryCuePoints'] = data[ dataIndex ].objects;
			}
			callback( namedData );
		});
	},

	convertCustomDataXML: function( data ){
		var result = {};
		if( data && data.objects && data.objects[0] ){
			var xml = $.parseXML( data.objects[0].xml );
			var $xml = $( xml ).find('metadata').children();
			$.each( $xml, function(inx, node){
				result[ node.nodeName ] = node.textContent;
			});
		}
		return result;
	},
	/**
	 * Get a string representation of the query string
	 * @param vProperties
	 * @return
	 */
	getCacheKey: function( vProperties ){
		var rKey = '';
		if( vProperties ){
			$.each(vProperties, function( inx, value ){
				if( inx == 'flashvars' ){
					// add in the flashvars that can vary the api response
					if( typeof vProperties.flashvars == 'object'){
						rKey += vProperties.flashvars.getCuePointsData;
						rKey += vProperties.flashvars.vs
					}
				} else {
					rKey+=inx + '_' + value;
				}
			});
		}
		return rKey;
	}
};

/**
 * VApi public entry points:
 *
 * TODO maybe move these over to "static" members of the vApi object ( ie not part of the .prototype methods )
 */
// Cache api object per partner
// ( so that multiple partner types don't conflict if used on a single page )
mw.VApiPartnerCache = [];

mw.vApiGetPartnerClient = function( widgetId ){
	if( !mw.VApiPartnerCache[ widgetId ] ){
		mw.VApiPartnerCache[ widgetId ] = new mw.VApi( widgetId );
	}
	return mw.VApiPartnerCache[ widgetId ];
};
mw.VApiPlayerLoader = function( vProperties, callback ){
	if( !vProperties.widget_id ) {
		mw.log( "Error:: mw.VApiPlayerLoader:: cant run player loader with widget_id "  + vProperties.widget_id );
	}
	// Make sure we have features
	if( !vProperties.features ) {
		vProperties.features = {};
	}
	// Convert widget_id to partner id
	var vClient = mw.vApiGetPartnerClient( vProperties.widget_id );
	vClient.playerLoader( vProperties, function( data ){
		// Add a timeout so that we are sure to return vClient before issuing the callback
		setTimeout(function(){
			callback( data );
		},0);
	});
	// Return the vClient api object for future requests
	return vClient;
};
mw.VApiRequest = function( widgetId, requestObject, callback ){
	var vClient = mw.vApiGetPartnerClient( widgetId );
	vClient.doRequest( requestObject, callback );
};

})( window.mw, jQuery );

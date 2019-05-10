/**
 * VEntryLoader enables easy loading of entries with respective metadata. 
 */
( function( mw, $ ) { "use strict";

mw.VEntryLoader = function( client, vProperties ){
	return this.init( client, vProperties );
};

mw.VEntryLoader.prototype = {
	baseDataInx:0,
	playerLoaderCache: [],
	init: function( client, vProperties ){
		this.clinet = client;
		this.vProperties = vProperties;
	},
	/**
	 * PlayerLoader
	 *
	 * Does a single request to the api to
	 * a) Get context data
	 * c) Get flavorasset
	 * b) Get baseEntry
	 */
	get: function( callback ){
		var _this = this,
			requestObject = [];
		var vProperties = this.vProperties;
		// Normalize flashVars
		vProperties.flashvars = vProperties.flashvars || {};


		if( this.getCacheKey( kProperties ) && this.playerLoaderCache[ this.getCacheKey( kProperties ) ] ){
		mw.log( "KApi:: playerLoader load from cache: " + !!( this.playerLoaderCache[ this.getCacheKey( kProperties ) ] ) );
			callback( this.playerLoaderCache[ this.getCacheKey( kProperties ) ] );
			return ;
		}
		// Local method to fill the cache key and run the associated callback
		var fillCacheAndRunCallback = function( namedData ){
			if ( !mw.getConfig("EmbedPlayer.DisableEntryCache") ) {
				_this.playerLoaderCache[_this.getCacheKey( vProperties )] = namedData;
			}
			callback( namedData );
		};

		// If we don't have entryId and referenceId return an error
		if( !vProperties.flashvars.referenceId && !vProperties.entry_id ) {
			mw.log( "VApi:: entryId and referenceId not found, exit.");
			callback( { error: "Empty player" } );
			return ;
		}

		// Check if we have vs flashvar and use it for our request
		if( vProperties.flashvars && vProperties.flashvars.vs ) {
			this.clinet.setVs( vProperties.flashvars.vs );
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

		var withProxyData = false;
		// Filter by proxy data
		if(kProperties.proxyData){
			baseEntryRequestObj['filter:freeText'] = JSON.stringify(kProperties.proxyData);
			withProxyData = true;
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
		// Check for metadataProfileId flashvar
		if( typeof vProperties.flashvars['metadataProfileId'] != 'undefined' ){
			requestObject[requestObject.length-1][ 'filter:metadataProfileIdEqual'] = vProperties.flashvars['metadataProfileId'];
		}

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
		_this.getNamedDataFromRequest( requestObject, fillCacheAndRunCallback, withProxyData);
	},
	/**
	 * Do the player data Request and populate named data
	 * @pram {object} requestObject Request object
	 * @parm {function} callback Function called with named data
	 */
	getNamedDataFromRequest: function( requestObject, callback , withProxyData){
		var _this = this;
		// Do the request and pass along the callback
		this.clinet.doRequest( requestObject, function( data ){
			var namedData = {};
			// Name each result data type for easy access

			// Check if we have an error
			if( data[0].code ) {
				mw.log('Error in vidiun api response: ' + data[0].message);
				callback( { 'error' :  data[0].message } );
				return ;
			}
			var dataIndex = _this.baseDataInx;
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
		}, undefined, undefined, withProxyData);
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
						rKey += vProperties.flashvars.vs;
						rKey += vProperties.flashvars.referenceId;
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
 * VApi entry loader public entry points:
 *
 */
mw.vApiEntryLoader = function( vProperties, callback ){
	if( !vProperties.widget_id ) {
		mw.log( "Error:: mw.VApiPlayerLoader:: cant run player loader with widget_id "  + vProperties.widget_id );
	}
	// Make sure we have features
	if( !vProperties.features ) {
		vProperties.features = {};
	}
	// Convert widget_id to partner id
	var client = mw.vApiGetPartnerClient( vProperties.widget_id );
	var entryLoader = new mw.VEntryLoader( client, vProperties );
	
	entryLoader.get(callback);
	
	// Return the vClient api object for future requests
	return client;
};

})( window.mw, jQuery );

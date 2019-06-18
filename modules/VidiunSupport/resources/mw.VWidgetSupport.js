( function( mw, $ ) {"use strict";

/* Base API helper */
mw.VApiPartnerCache = [];
mw.vApiGetPartnerClient = function( widgetId ){
	if( !mw.VApiPartnerCache[ widgetId ] ){
		mw.VApiPartnerCache[ widgetId ] = new vWidget.api( {'wid':widgetId} );
	}
	return mw.VApiPartnerCache[ widgetId ];
};

/* Base Widget support*/
mw.VWidgetSupport = function( options ) {
	// Create VWidgetSupport instance
	return this.init( options );
};
mw.VWidgetSupport.prototype = {

	// The Vidiun client local reference
	vClient : null,
	vSessionId: null, // Used for Analytics events
	originalStreamerType: null,

	// Constructor check settings etc
	init: function( options ){
		if( options ){
			$.extend( this, options);
		}
		this.addStringsSupport();
		this.addPlayerHooks();
	},

	addStringsSupport: function(){
		window.getStringByKey = function(key){


			var playerConfig = window.vidiunIframePackageData.playerConfig;
			var localizationCode = window.vidiunIframePackageData.enviornmentConfig["localizationCode"] || false;
			if (playerConfig && playerConfig.plugins && playerConfig.plugins.strings ){
				if (localizationCode && playerConfig.plugins.strings[localizationCode + "." + key]){ // handle flat localized keys
					return playerConfig.plugins.strings[localizationCode + "." + key];
				}else if (localizationCode && playerConfig.plugins.strings[localizationCode] && playerConfig.plugins.strings[localizationCode][key]){ // handle nested localized keys
					return playerConfig.plugins.strings[localizationCode][key];
				}else if (playerConfig.plugins.strings[key]){ // handle non-localized keys
					return playerConfig.plugins.strings[key];
				}else{
					return false;
				}
			}else{
				return false;
			}
		}
	},

	isIframeApiServer: function(){
		return ( mw.getConfig( 'EmbedPlayer.IsIframeServer' )
					&&
				mw.getConfig( 'EmbedPlayer.IframeParentUrl' ) );
	},
	/**
	* Add Player hooks for supporting Vidiun api
	*/
	addPlayerHooks: function( ){
		var _this = this;
		// Add the hooks to the player manager ( added to VidiunSupportNewPlayer to
		// avoid out of order execution before uiConf is ready )
		$( mw ).bind( 'VidiunSupportNewPlayer', function( event, embedPlayer ) {

			// Check if we should add binding: ( we need a widget id )
			if( ! embedPlayer.vwidgetid ){
				mw.log("Error:: VidiunSupportNewPlayer without vwidgetid");
				return ;
			}

			_this.bindPlayer( embedPlayer );
			// Add VDP API mapping ( will trigger playerReady for adding jsListeners )
			new mw.VDPMapping( embedPlayer );

			if ( vWidget.isIE8() && !vWidget.supportsFlash() ) {
				embedPlayer.setError( embedPlayer.getVidiunMsg( 'vs-FLASH-REQUIRED' ) );
			}
		});
	},

	/**
	 * Add player bindings
	 * @param {Object} embedPlayer
	 */
	bindPlayer: function( embedPlayer ){
		var _this = this;
		// Add player methods:
		this.addPlayerMethods( embedPlayer );

		// Check for playerConfig
		if( !embedPlayer.playerConfig ) {
			mw.log('Error: VWidgetSupport::bindPlayer error playerConfig not found');
			return ;
		}
		mw.setConfig("nativeVersion", embedPlayer.getFlashvars("nativeVersion"));
		// Overrides the direct download link to vidiun specific download.php tool for
		// selecting a download / playback flavor based on user agent.
		embedPlayer.bindHelper( 'directDownloadLink', function( event, downloadUrlCallback ) {
			var baseUrl = mw.getConfig('wgLoadScript').replace( 'load.php', '' );
			var downloadUrl = baseUrl + 'modules/VidiunSupport/download.php/wid/' + embedPlayer.vwidgetid;

			// Also add the uiconf id to the url:
			if( embedPlayer.vuiconfid ){
				downloadUrl += '/uiconf_id/' + embedPlayer.vuiconfid;
			}

			if( embedPlayer.ventryid ) {
				downloadUrl += '/entry_id/'+ embedPlayer.ventryid;
			}

			// Get VS and append to download url ( should be sync call )
			var client = mw.vApiGetPartnerClient( embedPlayer.vwidgetid );
			// Append vs & referrer for access control
			downloadUrl += '/referrer/' +  base64_encode( vWidgetSupport.getHostPageUrl() );
			var vs = client.getVs();
			if( vs ){
				downloadUrl += '/vs/' + vs;
			}
			downloadUrl += '/?playSessionId=' + _this.getGUID();

			downloadUrlCallback( downloadUrl );
		});
		
		// Add hook for check player sources to use local vEntry ID source check:
		embedPlayer.bindHelper( 'checkPlayerSourcesEvent', function( event, callback ) {
			_this.originalStreamerType = embedPlayer.getVidiunConfig( null, 'streamerType' ) ? embedPlayer.getVidiunConfig( null, 'streamerType' ) : 'http';
			_this.loadAndUpdatePlayerData( embedPlayer, callback );
		});

		// Update poster when we get entry meta data
		embedPlayer.bindHelper( 'VidiunSupport_EntryDataReady', function() {
			// Set duration
			embedPlayer.setDuration( embedPlayer.vidiunPlayerMetaData.duration );
			
			// Update thumbnail
			var thumbUrl = _this.getVidiunThumbnailUrl({
				url: embedPlayer.evaluate('{mediaProxy.entry.thumbnailUrl}'),
				width: embedPlayer.getWidth(),
				height: embedPlayer.getHeight()
			});
			if (mw.getConfig('thumbnailUrl')) {
				thumbUrl = embedPlayer.evaluate(mw.getConfig('thumbnailUrl'));
			}
			var alt = gM('mwe-embedplayer-video-thumbnail-for', vWidget.sanitize(embedPlayer.evaluate('{mediaProxy.entry.name}')));
			embedPlayer.updatePoster( thumbUrl, alt );
			embedPlayer.isAudioPlayer = ( embedPlayer.vidiunPlayerMetaData.mediaType === 5 );
		});

		// Add black sources:
		embedPlayer.bindHelper( 'AddEmptyBlackSources', function( event, vid ){
			$(vid).empty();
			$.each( mw.getConfig( 'Vidiun.BlackVideoSources' ), function(inx, sourceAttr ){
				if (location.protocol === "https:") {
                    sourceAttr.src = sourceAttr.src.replace('http', 'https');
				}
				$(vid).append(
					$( '<source />' ).attr( sourceAttr )
				);
			});
		});
		// Add Vidiun iframe share support:
		embedPlayer.bindHelper( 'getShareIframeSrc', function( event, callback ){
			var uiconf_id = (embedPlayer.vuiconfid) ? '/uiconf_id/' + embedPlayer.vuiconfid : '';
			var iframeUrl = mw.getMwEmbedPath() + 'mwEmbedFrame.php';
			iframeUrl +='/wid/' + embedPlayer.vwidgetid + uiconf_id + 
				'/entry_id/' + embedPlayer.ventryid + '/' +
				'?' + vWidget.flashVarsToUrl( embedPlayer.getFlashvars() );
			// return the iframeUrl via the callback:
			callback( iframeUrl );
		});

		// Example how to override embedPlayerError handler
		if (!this.isEmbedServicesEnabled(vidiunIframePackageData.entryResult)){
			embedPlayer.shouldHandlePlayerError = false;
			embedPlayer.bindHelper( 'embedPlayerError' , function ( event , data , doneCallback ) {
				var displayedAcError = false;
				// check for AC error:
				if ( mw.getConfig( "manualProvider" ) ) {
					embedPlayer.shouldHandlePlayerError = true;
					embedPlayer.handlePlayerError( data );
					return;
				}
				_this.getEntryIdSourcesFromApi( embedPlayer , embedPlayer.ventryid , function ( sources ) {
					// no sources, or access control error.
					if ( !sources || sources.message ) {
						embedPlayer.showErrorMsg( sources );
						displayedAcError = true;
						doneCallback();
					}
				} );
				// give the above access control message 3 seconds to resolve; else show default network error
				setTimeout( function () {
					if ( displayedAcError ) {
						return;
					}
					embedPlayer.handlePlayerError( data , true );
				} , 3000 );
			} );
		}

		// Support mediaPlayFrom, mediaPlayTo properties
		embedPlayer.bindHelper( 'Vidiun_SetVDPAttribute', function(e, componentName, property, value){
			if (!value && value !== 0) {
				return;
			}
			var segmentChange = false;
			switch( property ){
				case 'mediaPlayFrom':
					embedPlayer.startTime = parseFloat(value);
					segmentChange = true;
					clearTimeout(window.timeoutID);
					break;
				case 'mediaPlayTo':
					embedPlayer.pauseTime = parseFloat(value);
					segmentChange = true;
					embedPlayer.stopMonitor();
					clearTimeout(window.timeoutID);
					break;
			}
			if (segmentChange) {
				window.timeoutID = setTimeout(function () {
					$(embedPlayer).trigger("playSegmentEvent", [embedPlayer.startTime, embedPlayer.pauseTime]);
					embedPlayer.playSegment(embedPlayer.startTime, embedPlayer.pauseTime);
				}, 100);
			}
		});
	},
	/**
	 * Load and bind embedPlayer from vidiun api entry request
	 * @param embedPlayer
	 * @param callback
	 */
	loadAndUpdatePlayerData: function( embedPlayer, callback ){
		var _this = this;
		mw.log( "VWidgetSupport::loadAndUpdatePlayerData" );
		// Load all the player configuration from vidiun:
		_this.loadPlayerData( embedPlayer, function( playerData ){
			if( !playerData ){
				mw.log("VWidgetSupport::loadAndUpdatePlayerData> error no player data!");
				callback();
				return ;
			}
			_this.updatePlayerData( embedPlayer, playerData, callback );
		});
	},

	updatePlayerData: function( embedPlayer,  playerData, callback ){
		// Handle entry data
		this.updatePlayerEntryData(embedPlayer, playerData);
		this.updatePlayerMetaData(embedPlayer, playerData);
		// Check for playerData error
		this.handlePlayerError(embedPlayer, playerData);
		this.updatePlayerContextData(embedPlayer, playerData);
		// Check for live stream
		if( this.isLive(playerData)){
			this.updateLivePlayerData(embedPlayer, playerData);
		} else { //Else handle VOD
			if (this.isEmbedServicesEnabled(playerData)){
				this.updateEmbedServicesData(embedPlayer, playerData);
			} else {
				this.updateVodPlayerData(embedPlayer, playerData);
				//Flag DRM required if sources have DRM data attached with them
				this.updateDrmPlayerData(embedPlayer);
			}
		}
		// Check for 360 tag
		this.update360PlayerData(embedPlayer, playerData);
		// Check for "image" mediaType ( 2 )
		this.updateImagePlayerData(embedPlayer, playerData);
		// Check for external media:
		this.updateExternalPlayerData(embedPlayer, playerData);
		// check for entry id not found:
		if( this.isNoEntryId(playerData) ){
			this.handleNoEntryId();
		}
		// Check access controls ( must come after addPlayerMethods for custom messages )
		this.initCuePointsService(embedPlayer, playerData);
		this.handleUiConf( embedPlayer, callback );
	},
	updatePlayerContextData: function(embedPlayer, playerData){

		if( playerData.contextData ){
			if ( playerData.contextData.msDuration) {
				embedPlayer.vidiunPlayerMetaData.duration = Math.floor(playerData.contextData.msDuration / 1000);
			}
			embedPlayer.vidiunContextData = playerData.contextData;
			if (playerData.contextData &&
				$.isArray(playerData.contextData.accessControlActions)) {

				var vidiunAccessControlModifyRequestHostRegexActions= $.grep(playerData.contextData.accessControlActions,function(action) {
					return action.type===7;////VidiunAccessControlModifyRequestHostRegexAction
				});

				if (vidiunAccessControlModifyRequestHostRegexActions.length>0) {
					var action=vidiunAccessControlModifyRequestHostRegexActions[0];

					if (action.pattern && action.replacement) {
						var regExp=new RegExp(action.pattern, "i");
						var flashvars = embedPlayer.getFlashvars();
						var serviceUrl = mw.config.get('Vidiun.playManifestServiceUrl');
						var match = serviceUrl.match( regExp );
						if (match) {
							serviceUrl = serviceUrl.replace(regExp, action.replacement);
							//override urls according to the regex
                            ['Vidiun.playManifestServiceUrl','Vidiun.thumbAssetServiceUrl'].forEach(function (key,index) {

                                if (index===1 && !flashvars.serveThumbAssetsViaECDN) {
                                    return;
                                }

                                mw.config.set(key, serviceUrl)
                                // Pass the override URLs configurations to the parent mw object so that it's client
                                // URLs would be updated too.
                                if (mw.config.get('EmbedPlayer.IsFriendlyIframe')) {
                                    try {
                                        window.parent.mw.setConfig(key, serviceUrl);
                                    } catch (e) {
                                        mw.log("Failed to access window.parent from updatePlayerContextData replace URLs ");
                                    }
                                }
                            });
						}
					}
				}
			}
		}
	},
	isLive: function(playerData){
		return playerData.meta && ( playerData.meta.type == 7 || playerData.meta.type == 8 );
	},
	updateLivePlayerData: function(embedPlayer, playerData){
		var isStreamSupported = false;

		if ( this.isOnlyHlsSources(playerData) ) {
			mw.setConfig("LeadWithHLSOnFlash", true);
		}

		if ( playerData &&  playerData.meta &&
			(playerData.meta.sourceType === "32" ||
			playerData.meta.sourceType === "33") &&
            !mw.getConfig('forceHDS') ){

			mw.setConfig("LeadWithHLSOnFlash",true);
            mw.setConfig("isLiveVidiunHLS",true);

		}

		var legacyMulticastSource = this.getLegacyLiveMulticastSource(playerData);
		if (legacyMulticastSource){
			this.addLiveEntrySource( embedPlayer, playerData.meta, "silverlightMulticast", 'multicast_silverlight');
			isStreamSupported = true;
			embedPlayer.setLive( true );
		}

		if (embedPlayer.getFlashvars("LeadWithUnicastToMulticast")===true) {
			this.addLiveEntrySource( embedPlayer, playerData.meta, "silverlightMulticast", 'applehttp_to_mc');
			isStreamSupported = true;
			embedPlayer.setLive( true );
			if (embedPlayer.getFlashvars("disableMulticastFallback")) {

				//don't keep collecting
				return;
			}

		}

		var drmPlugin = embedPlayer.playerConfig.plugins["multiDrm"];
		var drmRequired =  drmPlugin && (drmPlugin.plugin === true);
		var liveSource;
		var _this = this;
		var attachLiveDrmData = function(playerData, liveSource){
			if (drmRequired) {
				var drmData = _this.getFlavorAssetsDrmData(playerData);
				var ids = $.map(drmData, function (data, id) {
					return id;
				});
				_this.attachFlavorAssetDrmData(liveSource, ids[0], drmData);
				liveSource.fpsCertificate = _this.getFairplayCert(playerData);
			}
		};

		//Order of live playback
		// 1. Dash (if DRM required only)
		// 2. HLS
		// 3. SmoothStream (if DRM required only)
		// 4. Auto detect via flash
		if (drmRequired && this.hasLivestreamConfig(playerData, "mpegdash") &&
			mw.EmbedTypes.getMediaPlayers().getMIMETypePlayers( 'application/dash+xml' ).length){
			liveSource = this.addLiveEntrySource( embedPlayer, playerData.meta, "dash", 'mpegdash' );
			attachLiveDrmData(playerData, liveSource);
			// Set live property to true
			embedPlayer.setLive( true );
		} else if( this.hasHlsSourcse(playerData) &&
			mw.EmbedTypes.getMediaPlayers().getMIMETypePlayers( 'application/vnd.apple.mpegurl' ).length ) {
			// Add live stream source
			//if we're gettting the source from manual provider(mediaProxy) - add them directly
			if (this.isManualProvider(playerData)){
				liveSource = this.addManualProviderSources(embedPlayer, playerData);
				embedPlayer.setLive( true );
			} else {
				liveSource = this.addLiveEntrySource( embedPlayer, playerData.meta, "hls", 'applehttp' );
				// Set live property to true
				embedPlayer.setLive( true );
			}
			attachLiveDrmData(playerData, liveSource);
		} else if (drmRequired && this.hasLivestreamConfig(playerData, "sl") &&
			mw.EmbedTypes.getMediaPlayers().getMIMETypePlayers( 'video/playreadySmooth' ).length){
			liveSource = this.addLiveEntrySource( embedPlayer, playerData.meta, "silverlight", 'sl' );
			attachLiveDrmData(playerData, liveSource);
			// Set live property to true
			embedPlayer.setLive( true );
		} else if ( mw.EmbedTypes.getMediaPlayers().isSupportedPlayer( 'vplayer' ) ) {
			var streamerType = this.resolveFlashStreamerType(embedPlayer, playerData);
			// Add live stream source
			this.addLiveEntrySource( embedPlayer, playerData.meta, "flash", streamerType );

			// Set live property to true
			embedPlayer.setLive( true );
		} else if ( !isStreamSupported ) {
			embedPlayer.setError( embedPlayer.getVidiunMsg('LIVE-STREAM-NOT-SUPPORTED') );
		}
	},
	hasLivestreamConfig: function ( playerData, protocol ) {
		var configurations = playerData.meta.liveStreamConfigurations;
		if ( configurations && configurations.length ) {
			for (var i = 0; i < configurations.length; i++ ) {
				if ( configurations[i].protocol == protocol ) {
					return true;
				}
			}
		}
		return false;
	},
	isOnlyHlsSources: function(playerData){
		//check if entry ONLY has hls configuration:
		var hasOnlyHLS = false;
		var configurations = playerData.meta.liveStreamConfigurations;
		if ( playerData.meta.hlsStreamUrl && ( !configurations || configurations.length == 0) ) {
			hasOnlyHLS = true;
		}  else if ( configurations ) {
			for ( var i = 0; i < configurations.length; i++ ) {
				if ( configurations[i].protocol != "hls" &&  configurations[i].protocol != "applehttp" ) {
					hasOnlyHLS = false;
					break;
				}
				hasOnlyHLS = true;
			}
		}
		return hasOnlyHLS;
	},
	getLegacyLiveMulticastSource: function(playerData){
		var source = null;
		if ( mw.EmbedTypes.getMediaPlayers().isSupportedPlayer( 'splayer' ) ) {
			if ( playerData.contextData && playerData.contextData.flavorAssets ) {
				var flavorData = playerData.contextData.flavorAssets;
				for( var i = 0 ; i < flavorData.length; i ++ ) {
					var tags = flavorData[i].tags.toLowerCase().split(',');
					if ( $.inArray( 'multicast_silverlight', tags ) != -1 ) {
						source = flavorData;
						break;
					}
				}
			}
		}
		return source;
	},
	hasHlsSourcse: function(playerData){
		return (playerData.meta.hlsStreamUrl ||
				this.hasLivestreamConfig( playerData, 'hls' ) ||
				this.hasLivestreamConfig( playerData, 'applehttp' )	);
	},
	isManualProvider: function(playerData){
		return (playerData.entry && playerData.entry.manualProvider);
	},
	addManualProviderSources: function(embedPlayer, playerData){
		if (playerData.meta.hdsStreamUrl){
			return embedPlayer.mediaElement.tryAddSource($('<source />')
				.attr({
					'src' : playerData.meta.hdsStreamUrl,
					'type' : 'application/vnd.apple.mpegurl'
				})[0] );
		}
		return embedPlayer.mediaElement.tryAddSource(
			$('<source />')
				.attr({
					'src' : playerData.meta.hlsStreamUrl,
					'type' : 'application/vnd.apple.mpegurl'
				})[0] );

	},
	resolveFlashStreamerType: function(embedPlayer, playerData){
		var streamerType;
		var streamerTypeFV = embedPlayer.getVidiunConfig( null, 'streamerType' );
		if ( streamerTypeFV && this.hasLivestreamConfig( playerData, streamerTypeFV ) ) {
			streamerType = streamerTypeFV;
		}
		else if ( this.hasLivestreamConfig( playerData, 'hdnetworkmanifest' )) {
			streamerType = 'hdnetworkmanifest';
		} else if ( this.hasLivestreamConfig( playerData, 'hds' ) ){
			streamerType = 'hds';
		} else {
			streamerType = 'rtmp';
		}
		return streamerType;
	},
	isEmbedServicesEnabled: function(playerData){
		if (playerData && playerData.meta &&
			playerData.meta.partnerData &&
			playerData.meta.partnerData["proxyEnabled"] &&
			playerData.meta.partnerData["proxyEnabled"] === "true") {
			return true;
		} else {
			return false;
		}
	},
	updateEmbedServicesData: function(embedPlayer, playerData){
		//Set flavors
		var _this = this;
		var flavorAssets = [];
		var flavorData = playerData.contextData.flavorAssets;
		var flavorDrmData = this.getFlavorAssetsDrmData(playerData);
		$.each( flavorData, function ( index, flavorAsset ) {
			var flavorPartnerData = flavorAsset.partnerData;
			if (flavorPartnerData.url != "") {
				var flavorAssetObj = {
					"data-assetid": flavorAsset.id,
					src: _this.addSessionIdToSrc(flavorPartnerData.url),
					type: flavorPartnerData.type,
					"data-width": flavorAsset.width,
					"data-height": flavorAsset.height,
					"data-bitrate": flavorAsset.bitrate,
					"data-bandwidth": (flavorAsset.bitrate ? (flavorAsset.bitrate * 1024) : 0),
					"data-frameRate": flavorAsset.frameRate,
					"data-flavorid": flavorPartnerData.flavorid
				};
				if (flavorPartnerData["default"] === "true"){
					flavorAssetObj["default"] = true;
				}

				_this.attachFlavorAssetDrmData(flavorAssetObj, flavorAsset.id, flavorDrmData);
				if (flavorAssetObj.type === "application/vnd.apple.mpegurl") {
					flavorAssetObj.fpsCertificate = _this.getFairplayCert(playerData);
				}
				flavorAssets.push( flavorAssetObj );
			}
		} );
		embedPlayer.replaceSources(flavorAssets);
        if ( playerData.meta.partnerData) {
        	var partnerData = playerData.meta.partnerData;
            //Set Live
            if (partnerData["isLive"] && partnerData["isLive"] == "true") {
                embedPlayer.setLive(true);
            }
            //Update meta tags field
            if (partnerData.Metas) {
                var tags = $.grep(partnerData.Metas, function (meta) {
                    return meta.Key === "tags";
                });
                if (tags && tags[0]) {
                    playerData.meta.tags = tags[0].Value;
                }
            }
        }
		embedPlayer.setVidiunConfig('originalProxyData', embedPlayer.getVidiunConfig('proxyData'));
		//Set proxyData response data
		embedPlayer.setVidiunConfig( 'proxyData', playerData.meta.partnerData);
	},

	addSessionIdToSrc: function(srcURL){
		if (srcURL && srcURL.toLowerCase().indexOf("playmanifest") === -1){
			return srcURL;
		}
        var nativeVersion = mw.getConfig("nativeVersion");
        nativeVersion = (nativeVersion != null && nativeVersion.length > 0) ? '_' + nativeVersion : '';
        var clientTag = 'html5:v' + window[ 'MWEMBED_VERSION' ] + nativeVersion;
		var qp = ( srcURL.indexOf('?') === -1) ? '?' : '&';
		return srcURL + qp + 'playSessionId=' + this.getGUID() + '&clientTag=' + clientTag;
	},
	updateVodPlayerData: function(embedPlayer, playerData){
		embedPlayer.setLive( false );
		//TODO in the future we will have flavors for livestream. revise this code.
		// Apply player Sources
		if ( playerData.contextData && playerData.contextData.flavorAssets ) {
			this.addFlavorSources( embedPlayer, playerData );
		}
		// try with direct source override:
		if ( playerData.sources ) {
			this.addSources( embedPlayer, playerData.sources  );
		}
	},
	updateDrmPlayerData: function(embedPlayer){
		var drmSources = embedPlayer.mediaElement.sources.filter(function(source){
			return (source.signature && source.custom_data);
		});
		var drmRequired = (drmSources.length > 0);
		embedPlayer.setDrmRequired( drmRequired );
	},
	update360PlayerData: function(embedPlayer, playerData){
		if ( playerData.meta && playerData.meta.tags ) {
			var pattern = new RegExp('(, |^)360(,|$)');
			embedPlayer.set360(pattern.test(playerData.meta.tags));
		} else {
			embedPlayer.set360(false);
		}
	},
	updateImagePlayerData: function(embedPlayer, playerData){
		// Check for "image" mediaType ( 2 )
		if( playerData.meta && playerData.meta.mediaType == 2 ){
			mw.log( 'VWidgetSupport::updatePlayerData: Add Entry Image' );
			embedPlayer.mediaElement.tryAddSource(
				$('<source />')
					.attr( {
						'src' : this.getVidiunThumbnailUrl({
							url: playerData.meta.thumbnailUrl,
							width: embedPlayer.getWidth(),
							height: embedPlayer.getHeight()
						}),
						'type' : 'image/jpeg'
					} )
					.get( 0 )
			);
		}
	},
	updateExternalPlayerData: function(embedPlayer, playerData){
		// Check for external media:
		if( playerData.meta && playerData.meta.type == "externalMedia.externalMedia" ){
			$( embedPlayer ).trigger( 'VidiunSupport_AddExternalMedia', playerData.meta );
		}
	},
	isNoEntryId: function(playerData){
		return playerData.meta && playerData.meta.code == 'ENTRY_ID_NOT_FOUND';
	},
	handleNoEntryId: function(embedPlayer){
		$( embedPlayer ).trigger( 'VidiunSupport_EntryFailed' );
	},
	updatePlayerEntryData: function(embedPlayer, playerData){
		// Look for custom metadata in playerData.entryMeta and entryMetadata ( mediaProxy override name )
		embedPlayer.vidiunEntryMetaData = ( playerData.entryMeta ) ? playerData.entryMeta : playerData.entryMetadata;
	},
	updatePlayerMetaData: function(embedPlayer, playerData){
		// Lock for "entry" in 'meta' and 'entry' ( mediaProxy override name )
		var meta =  ( playerData.meta ) ? playerData.meta: playerData.entry;
		// Apply player entry metadata
		if( meta ) {
			// We have to assign embedPlayer metadata as an attribute to bridge the iframe
			embedPlayer.vidiunPlayerMetaData = meta;

			if ( meta.moderationStatus && (!playerData.contextData || !playerData.contextData.isAdmin) ) {
				if ( meta.moderationStatus == 1 ) {
					embedPlayer.setError( embedPlayer.getVidiunMsgObject('vs-ENTRY_MODERATE') );
				} else if ( meta.moderationStatus == 3 ) {
					embedPlayer.setError( embedPlayer.getVidiunMsgObject('vs-ENTRY_REJECTED') );
				}
			}
		}
	},
	initCuePointsService: function(embedPlayer, playerData){
		// check for Cuepoint data and load cuePoints,
		// TODO optimize cuePoints as hard or soft dependency on vWidgetSupport
		if( (playerData.entryCuePoints && playerData.entryCuePoints.length > 0) ||
			( embedPlayer.isLive() && mw.getConfig("EmbedPlayer.LiveCuepoints") ) ) {
			embedPlayer.rawCuePoints = playerData.entryCuePoints || [];
			embedPlayer.vCuePoints = new mw.VCuePoints( embedPlayer );
		}
	},

	addPlayerMethods: function( embedPlayer ){
		var _this = this;

		embedPlayer.getRawVidiunConfig = function( confPrefix, attr ){
			var rawConfigArray = _this.getRawPluginConfig( embedPlayer, confPrefix, attr );
			if( $.isPlainObject(rawConfigArray) && attr ){
				return rawConfigArray[ attr ];
			}
			return rawConfigArray;
		};

		// Add getVidiunConfig to embed player:
		embedPlayer.getVidiunConfig = function( confPrefix, attr ){
			return _this.getPluginConfig( embedPlayer, confPrefix, attr );
		};

		// Extend plugin configuration
		embedPlayer.setVidiunConfig = function( pluginName, key, value, quiet ) {

			// no key - exit
			if ( ! key ) {
				return ;
			}

			// Always create obj with plugin properties
			var objectSet = {};
			if( typeof key === "string" ) {
				objectSet[ key ] = value;
			}
			// The key could be an object with all plugin properties
			if( typeof key === "object" ) {
				objectSet = key;
			}

			// No player config, create the object
			if( ! embedPlayer.playerConfig ) {
				embedPlayer.playerConfig = {
					'plugins' : {},
					'vars' : {}
				};
			}
			// check for var update ( no top level plugin ) 
			if( ! pluginName ){
				embedPlayer.playerConfig['vars'][key] = value;
			} else if( 
				! embedPlayer.playerConfig[ 'plugins' ][ pluginName ] 
			){
				// Plugin doesn't exists -> create it
				embedPlayer.playerConfig[ 'plugins' ][ pluginName ] = objectSet;
			} else {
				// If our key is an object, and the plugin already exists, merge the two objects together
				if( typeof key === 'object' ) {
					$.extend( embedPlayer.playerConfig[ 'plugins' ][ pluginName ], objectSet);
					mw.log( 'merged:: ', embedPlayer.playerConfig[ 'plugins' ][ pluginName ]);
				}
				// If old value & new value is array, don't merge
				else if( $.isArray(embedPlayer.playerConfig[ 'plugins' ][ pluginName ][ key ]) && $.isArray(value) ) {
					embedPlayer.playerConfig[ 'plugins' ][ pluginName ][ key ] = value;
				}
				// If the old value is an object and the new value is an object merge them
				else if( typeof embedPlayer.playerConfig[ 'plugins' ][ pluginName ][ key ] === 'object' && typeof value === 'object' ) {
					$.extend( embedPlayer.playerConfig[ 'plugins' ][ pluginName ][ key ], value );
				} else {
					embedPlayer.playerConfig[ 'plugins' ][ pluginName ][ key ] = value;
				}
			}
			if( !quiet ) {
				embedPlayer.triggerHelper( 'Vidiun_ConfigChanged', [ pluginName, key, value ]);
			}
		};

		// Add an exported plugin value:
		embedPlayer.addExportedObject = function( pluginName, objectSet ){
			// TODO we should support log levels in 1.7
			// https://github.com/vidiun/mwEmbed/issues/80
			mw.log( "VwidgetSupport:: addExportedObject is deprecated, please use standard setVidiunConfig" );
			for( var key in objectSet ){
				embedPlayer.setVidiunConfig( pluginName, key, objectSet[key] );
			}
		};

		// Add isPluginEnabled to embed player:
		embedPlayer.isPluginEnabled = function( pluginName ) {
			// Always check with lower case first letter of plugin name:
            var lcPluginName = (pluginName.substr(0,1)) ? pluginName.substr(0,1).toLowerCase() + pluginName.substr(1) : false;
			if( lcPluginName ){
				// Check if plugin exists
				if( _this.getRawPluginConfig( embedPlayer, lcPluginName ) === undefined ) {
					return false;
				}
				// Check if pluginName.plugin is false
				if( _this.getPluginConfig( embedPlayer, lcPluginName , 'plugin' ) === false ) {
					return false;
				}
				// check for the disableHTML5 attribute
				if( _this.getPluginConfig( embedPlayer, lcPluginName , 'disableHTML5' ) ){
					return false;
				}
				return true;
			}
			return false;
		};
		// Add getFlashvars to embed player:
		embedPlayer.getFlashvars = function( param ) {
			if( ! embedPlayer.playerConfig || ! embedPlayer.playerConfig.vars ) {
				return {};
			}
			var fv = embedPlayer.playerConfig['vars'] || {};
			if ( param ) {
				if ( param in fv ) {
					return fv[ param ];
				}
				else {
					return undefined;
				}
			}
			return fv;
		}

		embedPlayer.setFlashvars = function( key, value ) {
			if( key ) {
				embedPlayer.playerConfig['vars'][ key ] = value;
			}
		}

		// Adds support for custom message strings
		embedPlayer.getVidiunMsg = function ( msgKey ){
			// check for message locale:
			var localeMsgKey = msgKey;
			if ( embedPlayer.currentLocale ){
				localeMsgKey = embedPlayer.currentLocale + '_' + msgKey;
			}
			// Check for uiConf configured msgs:
			if( _this.getPluginConfig( embedPlayer, 'strings', localeMsgKey ) ) {
				return _this.getPluginConfig( embedPlayer, 'strings', localeMsgKey );
			}
			// NOTE msgKey is used instead of localeMsgKey ( since default mw messages uses resource loader localization ) 
			if ( mw.messages.exists( msgKey ) ) {
				return gM( msgKey );
			}
			msgKey = 'vs-' + msgKey;
			if ( mw.messages.exists( msgKey ) ) {
				return gM( msgKey );
			}
			if ( msgKey.indexOf( '_TITLE' ) == -1 ) {
				return gM( 'vs-GENERIC_ERROR' );
			}
			return gM( 'vs-GENERIC_ERROR_TITLE' );
		};

		embedPlayer.getVidiunMsgTitle = function ( msgKey ) {
			return embedPlayer.getVidiunMsg( msgKey + '_TITLE' );
		};

		embedPlayer.getVidiunMsgObject = function( msgKey ) {
			return {
			    'key': msgKey,
				'title': embedPlayer.getVidiunMsgTitle( msgKey ),
				'message': embedPlayer.getVidiunMsg( msgKey )
			}
		};

		embedPlayer.resolveSrcURL = function( srcURL ){
			var deferred = $.Deferred();
			var eventObj = {"src":srcURL,
				"promise":deferred,
				"handled":false};
			embedPlayer.triggerHelper( 'preResolveSrc' ,eventObj );
			if (eventObj.handled){
				return eventObj.promise;
			}

			if (mw.getConfig("EmbedPlayer.UseDirectManifestLinks")) {
				return deferred.resolve( srcURL );
			}

			if (srcURL && srcURL.toLowerCase().indexOf("playmanifest") === -1){
				return deferred.resolve( srcURL );
			}
			var srcToPlay = null;
			var qp = ( srcURL.indexOf('?') === -1) ? '?' : '&';

			$.ajax({
				url: srcURL + qp + "responseFormat=jsonp",
				timeout: 7000,
				dataType: 'jsonp',
				success: function( playmanifest ){
					var flavors = playmanifest.flavors;
					if ( flavors && flavors.length === 1 ) {
						srcToPlay = flavors[0].url;
						deferred.resolve( srcToPlay );
						//if we get more then 1 flavors we dont need the redirect so we'll use the same url
						// the playmanifest service will return the manifest directly.
					} else if (flavors && flavors.length > 1){
						if (srcURL.indexOf("applehttp_to_mc")===-1)
							deferred.resolve( srcURL );
						else
							deferred.resolve( playmanifest );
					} else {
						deferred.reject();
					}
				},
				error: function() {
					deferred.reject();
				}
			});
			return deferred.promise();
		};


	},
	/**
	 * Handle the ui conf
	 */
	handleUiConf: function( embedPlayer, callback ){
		var _this = this;
		// Local function to defer the trigger of loaded cuePoints so that plugins have time to load
		// and setup their binding to VidiunSupport_CuePointsReady
		var doneWithUiConf = function(){

			if( embedPlayer.rawCuePoints || ( embedPlayer.isLive() && mw.getConfig("EmbedPlayer.LiveCuepoints") ) ){
				mw.log("VWidgetSupport:: trigger VidiunSupport_CuePointsReady", embedPlayer.rawCuePoints);
				// Allow other plugins to subscribe to cuePoint ready event:
				$( embedPlayer ).trigger( 'VidiunSupport_CuePointsReady', [embedPlayer.rawCuePoints] );
			}

			// Trigger the early player events ( after uiConf handling has a chance to setup bindings
			if( embedPlayer.vidiunPlayerMetaData ){
				$( embedPlayer ).trigger( 'VidiunSupport_EntryDataReady', embedPlayer.vidiunPlayerMetaData );
			}
			if( embedPlayer.vidiunEntryMetaData ){
				$( embedPlayer ).trigger( 'VidiunSupport_MetadataReceived', embedPlayer.vidiunEntryMetaData );
			}

			// Run the DoneWithUiConf trigger
			// Allows modules that depend on other modules initialization to do what they need to do.
			mw.log("VWidgetSupport:: trigger VidiunSupport_DoneWithUiConf");
			// Don't stack
			setTimeout( function(){
				$( embedPlayer ).trigger( 'VidiunSupport_DoneWithUiConf' );
				callback();
			}, 0 );
		};
		if( embedPlayer.playerConfig ){
			_this.baseUiConfChecks( embedPlayer );
			// TODO: remove this completly once all plugins revised
			embedPlayer.$uiConf = $({});
			// Trigger the check vidiun uiConf event
			mw.log( "VWidgetSupport:: trigger Vidiun_CheckConfig" );
			$( embedPlayer ).triggerQueueCallback( 'Vidiun_CheckConfig', embedPlayer, function(){
				doneWithUiConf();
			});
		} else {
			doneWithUiConf();
		}
	},
	/**
	 * Run base ui conf / flashvars check
	 * @param embedPlayer
	 * @return
	 */
	baseUiConfChecks: function( embedPlayer ){
		var _this = this;
		var getAttr = function( attrName ){
			return _this.getPluginConfig( embedPlayer, '', attrName );
		}
		// Check for autoplay:
		var autoPlay = getAttr( 'autoPlay' );
		if( autoPlay ){
			embedPlayer.autoplay = true;
		}
		var inline = getAttr( 'EmbedPlayer.WebKitPlaysInline' );
		if (inline && mw.isIphone()) {
			embedPlayer.inline = true;
		}

		
		// Check for autoMute:
		var autoMute = getAttr( 'autoMute' );
		if( autoMute && !mw.isMobileDevice()){
			setTimeout(function(){
				embedPlayer.toggleMute( true );
			},300);
			// autoMute should only happen once per session:
			embedPlayer.setVidiunConfig( '', 'autoMute', null );
		}
		// Check for loop:
		var loop = getAttr( 'loop' );
		if( loop ){
			embedPlayer.loop = true;
		}

		// Check if errors / alerts should be displayed:
		if( getAttr( 'disableAlerts' ) ){
			mw.setConfig('EmbedPlayer.ShowPlayerAlerts', false );
		}

		var mediaProxy = embedPlayer.getVidiunConfig('mediaProxy');
		// handle mediaProxy properties
		if ( mediaProxy ){
			// check for preferedFlavorBR
			var preferedFlavorBR = mediaProxy.preferedFlavorBR;
			// Check for dissable bit rate cookie and overide default bandwidth
			if( getAttr( 'disableBitrateCookie' ) && preferedFlavorBR ){
				embedPlayer.setCookie( 'EmbedPlayer.UserBandwidth', preferedFlavorBR * 1000 );
			}
			// always set perfered bitrate if defined:
			if( preferedFlavorBR && embedPlayer.mediaElement ){
				embedPlayer.mediaElement.preferedFlavorBR = preferedFlavorBR * 1000;
			}

			// Check for mediaPlayFrom
			// first check in hash
			var mediaPlayFrom = vWidget.getHashParam("t");
			if ( mediaPlayFrom ){
				mediaPlayFrom = vWidget.npt2seconds(mediaPlayFrom);
			}
			// now cheeck in Flashvars - will override hash params
			if (mediaProxy.mediaPlayFrom){
				mediaPlayFrom = mediaProxy.mediaPlayFrom;
			}
			if (mediaPlayFrom && !embedPlayer.startTime) {
				embedPlayer.startTime = parseFloat( mediaPlayFrom );
				mw.setConfig( "Vidiun.UseAppleAdaptive" , true) ;
			}
			// Check for mediaPlayTo
			var mediaPlayTo = mediaProxy.mediaPlayTo;
			if (mediaPlayTo && !embedPlayer.pauseTime) {
				embedPlayer.pauseTime = parseFloat( mediaPlayTo );
			}
		}

		// Enable tooltips
		if( getAttr('enableTooltips') === false ){
			embedPlayer.enableTooltips = false;
		}

		// Check for imageDefaultDuration
		var imageDuration = getAttr( 'imageDefaultDuration' );
		if( imageDuration ){
			$( embedPlayer ).data('imageDuration', imageDuration);
		}



		// Should we show ads on replay?
		if( getAttr( 'adsOnReplay' ) ) {
			embedPlayer.adsOnReplay = true;
		}

		// Should we hide the spinner?
		if( getAttr( 'disablePlayerSpinner' ) ) {
			mw.setConfig('LoadingSpinner.Disabled', true );
		}
		var streamerType = embedPlayer.getVidiunConfig( null, 'streamerType' );
		if ( embedPlayer.vidiunContextData && streamerType == 'auto' ) {
			embedPlayer.streamerType = embedPlayer.vidiunContextData.streamerType;
		} else if ( streamerType ) {
			embedPlayer.streamerType = streamerType;
		}
		// restore the original streamerType Flashvar for future use if the user change media (for example - playlist)
		embedPlayer.setFlashvars( 'streamerType', _this.originalStreamerType);
	},
	/**
	 * Check for xml config, let flashvars override
	 * @param embedPlayer {Object} the embedPlayer for which configuration is being retrived
	 * @param confPrefix {String} the confPrefix, Can be empty if you want a non-prefixed attribute
	 * @param attr {Optional: Array|String} A list of attributes you want to get for the confPrefix
	 * 				if null, we retrive all settings with the provided confPrefix
	 */
	 getPluginConfig: function( embedPlayer, confPrefix, attr ){
		var singleAttrName = false;
		if( typeof attr == 'string' ){
			singleAttrName = attr;
		}

		var rawConfigArray = this.getRawPluginConfig( embedPlayer, confPrefix, singleAttrName );
		var configArray = this.postProcessConfig( embedPlayer, rawConfigArray );

		if( singleAttrName != false ){
			return configArray[ singleAttrName ];
		} else {
			return configArray;
		}
	},

	getRawPluginConfig: function( embedPlayer, confPrefix, attr ){
		// Setup local pointers:
		var _this = this;
		if( ! embedPlayer.playerConfig ){
			// Some IE out of order issue? has us re-checking player config here
			if( window.vidiunIframePackageData.playerConfig ){
				embedPlayer.playerConfig =  window.vidiunIframePackageData.playerConfig;
				delete( window.vidiunIframePackageData.playerConfig );
			}
		}

		var plugins =  embedPlayer.playerConfig['plugins'];
		var returnConfig = {};

		// ConfPrefix is the plugin Name and the first letter should always be lower case.
		if( confPrefix && confPrefix[0] ){
			confPrefix = confPrefix[0].toLowerCase() + confPrefix.substr(1);
		}

		// if confPrefix is not an empty string or null check for the conf prefix
		if( confPrefix && plugins[ confPrefix ] ){
			if( !attr ){
				return plugins[ confPrefix ];
			}
			if( attr && typeof plugins[ confPrefix ][ attr ] !== 'undefined' ){
				returnConfig[ attr ] = plugins[ confPrefix ][ attr ];
			}
			if ( attr && typeof attr == 'object' ) {
				for ( var currAttr in attr ) {
					if ( plugins[ confPrefix ][ attr[ currAttr ] ] ) {
						returnConfig[ attr[ currAttr ] ] = plugins[ confPrefix ][ attr[ currAttr ] ];
					}
				}
			}
		} else if( !confPrefix && attr ){
			returnConfig[ attr ] = embedPlayer.playerConfig['vars'][attr];
		} else {
			return undefined;
		}
		
		return returnConfig;
	},
	postProcessConfig: function( embedPlayer, config ){
		var _this = this;
		var returnSet = $.extend( {}, config );
		
		$.each( returnSet, function( attrName, value ) {
			// Unescape values that would come in from flashvars
			if( value && ( typeof value === 'string' ) ){
				returnSet[ attrName ] = unescape( value );
			}
			// Do any value handling  ... myPlugin.cat = {video.currentTime}
			// If JS Api disabled, evaluate is undefined
			if( embedPlayer.evaluate ){
				returnSet[ attrName ] = embedPlayer.evaluate( returnSet[ attrName ] );
			}
		});
		return returnSet;
	},
	/**
	 * Alternate source grabbing script ( for cases where we need to hot-swap the source )
	 * playlists on iPhone for example we can't re-load the player we have to just switch the src.
	 *
	 * accessible via static reference mw.getEntryIdSourcesFromApi
	 *
	 */
	getEntryIdSourcesFromApi:  function( embedPlayer, entryId, callback ){
		var _this = this;
		var sources;
		mw.log( "VWidgetSupport:: getEntryIdSourcesFromApi: w:" + embedPlayer.vwidgetid + ' entry:' + embedPlayer.ventryid );
		this.vClient = mw.vApiEntryLoader({
			'widget_id': embedPlayer.vwidgetid,
			'entry_id': entryId
		}, function( playerData ){
			// Check access control
			if( playerData.contextData ){
				var acStatus = _this.getAccessControlStatus( playerData.contextData, embedPlayer );
				if( acStatus !== true ){
					callback( acStatus );
					return ;
				}
			}
			// see if we are dealing with an image asset ( no flavor sources )
			if( playerData.meta && playerData.meta.mediaType == 2 ){
				sources = [{
						'src' : _this.getVidiunThumbnailUrl({
							url: playerData.meta.thumbnailUrl,
							width:  embedPlayer.getWidth(),
							height: embedPlayer.getHeight()
						}),
						'type' : 'image/jpeg'
					}];
			} else {
				// Get device sources
				sources = _this.getEntryIdSourcesFromPlayerData( embedPlayer.vpartnerid, playerData );
			}
			// Return the valid source set
			callback( sources );
		});
	},
	/**
	 * Sets up variables and issues the mw.vEntryLoader call
	 */
	loadPlayerData: function( embedPlayer, callback ){
		var _this = this;
		var playerRequest = {};
		// Check for widget id
		if( ! embedPlayer.vwidgetid ){
			mw.log( "Error: missing required widget paramater ( vwidgetid ) ");
			callback( false );
			return ;
		} else {
			playerRequest.widget_id = embedPlayer.vwidgetid;
		}

		// Check if the entryId is of type url:
		if( !this.checkForUrlEntryId( embedPlayer ) && embedPlayer.ventryid ){
			// Add entry_id playerLoader call
			playerRequest.entry_id =  embedPlayer.ventryid;
		}

		var proxyData = embedPlayer.getVidiunConfig('proxyData', 'data');
		if(proxyData){
			playerRequest.proxyData = proxyData;
		}

		// Add the flashvars
		playerRequest.flashvars = embedPlayer.getFlashvars();

		// Add features
		playerRequest.features = vidiunIframePackageData.apiFeatures;

		// Set VS from flashVar
		this.vClient = mw.vApiGetPartnerClient( playerRequest.widget_id );
		this.vClient.setVs( embedPlayer.getFlashvars( 'vs' ) );

			// Check for playlist cache based
			if( window.vidiunIframePackageData && window.vidiunIframePackageData.playlistResult ){
				var pl = window.vidiunIframePackageData.playlistResult;
				for( var plId in pl ) break;
				if( pl[plId].content.indexOf('<?xml') === 0 ){
					// convert to comma seperated entries
					var entryList = [];
					for( var i in pl[plId].items ){
						entryList.push( pl[plId].items[i].id );
					}
					pl[plId].content = entryList.join(',');
				}
				embedPlayer.vidiunPlaylistData = pl;
				delete( window.vidiunIframePackageData.playlistResult );
			}

			// Check for entry cache:
			if( window.vidiunIframePackageData && window.vidiunIframePackageData.entryResult ){
				var entryResult =  window.vidiunIframePackageData.entryResult;
				_this.handlePlayerData( embedPlayer, entryResult );
				//if we dont have special widgetID or the VS is defined continue as usual
				var vpartnerid = embedPlayer.vpartnerid ? embedPlayer.vpartnerid : "";
				if ( this.isEmbedServicesEnabled(entryResult) || "_" + vpartnerid == playerRequest.widget_id || _this.vClient.getVs() ) {
					callback( entryResult );
				}else{
					//if we have special widgetID and we dont have a VS - ask for VS before continue the process
					this.vClient.forceVs(playerRequest.widget_id,function(vs) {
						_this.vClient.setVs( vs );
						if ( embedPlayer.playerConfig && !embedPlayer.playerConfig.vars ) {
							embedPlayer.playerConfig.vars = {};
						}
						embedPlayer.playerConfig.vars.vs = vs;
						callback( entryResult );
					},function(){
						mw.log("Error occur while trying to create widget VS");
						callback( entryResult );
					});
				}
				// remove the entryResult from the payload
				delete( window.vidiunIframePackageData.entryResult );
				return ;
			}
			// Run the request:
			_this.vClient = mw.vApiEntryLoader( playerRequest, function( playerData ) {
				_this.handlePlayerData( embedPlayer , playerData );
				callback( playerData );
			});


	},
	handlePlayerError: function(embedPlayer, data){
		var errObj = null;
		if( data.meta &&  data.meta.code == "INVALID_VS" ){
			errObj = embedPlayer.getVidiunMsgObject( "NO_VS" );
		}
		if( data.meta && (data.meta.status == 1 || data.meta.status == 0) ){
			errObj = embedPlayer.getVidiunMsgObject( "vs-ENTRY_CONVERTING" );
		}
		if( data.error ) {
			errObj = embedPlayer.getVidiunMsgObject( 'GENERIC_ERROR' );
			errObj.message = data.error;
			if( data.contextData &&  data.contextData.isScheduledNow === false ){
				errObj = embedPlayer.getVidiunMsgObject( "OUT_OF_SCHEDULING" );
			}
		}

		if( errObj ) {
			embedPlayer.hideSpinner();
			embedPlayer.setError( errObj );
		}
	},
	/**
	 * handle player data mappings to embedPlayer
	 */
	handlePlayerData: function(embedPlayer, entryResult ){
		// Set entry id and partner id as soon as possible
		if( entryResult.meta && entryResult.meta.id ) {
			embedPlayer.ventryid = entryResult.meta.id;
			embedPlayer.vpartnerid = entryResult.meta.partnerId;
		}

		this.handlePlayerError(embedPlayer, entryResult); // Error handling

		if (entryResult.entry && entryResult.entry.manualProvider){
			mw.setConfig("manualProvider",true);
		}
	},

	/**
	 * Check if the access control is oky and set a given error message
	 *
	 * TODO should match the iframe messages keys
	 * TODO need to i8ln message with gM( 'msg-key' );
	 *
	 * @return
	 * @type boolean
	 * 		true if the media can be played
	 * 		false if the media should not be played.
	 */
	getAccessControlStatus: function( ac, embedPlayer ){
		if( ac.isCountryRestricted ){
			return embedPlayer.getVidiunMsgObject( 'UNAUTHORIZED_COUNTRY' );
		}
		if( ac.isScheduledNow === 0 ){
			return embedPlayer.getVidiunMsgObject( 'OUT_OF_SCHEDULING' );
		}
		if( ac.isIpAddressRestricted ) {
			return embedPlayer.getVidiunMsgObject( 'UNAUTHORIZED_IP_ADDRESS' );
		}
		if( ac.isSessionRestricted && ac.previewLength === -1 ){
			return embedPlayer.getVidiunMsgObject( 'NO_VS' );
		}
		if( ac.isSiteRestricted ){
			return embedPlayer.getVidiunMsgObject( 'UNAUTHORIZED_DOMAIN' );
		}
		// This is normally handled at the iframe level, but check is included here for completeness
		if( ac.isUserAgentRestricted ){
			return embedPlayer.getVidiunMsgObject( 'USER_AGENT_RESTRICTED' );
		}
		// New AC API
		if( ac.accessControlActions && ac.accessControlActions.length ) {
			var msgObj = embedPlayer.getVidiunMsgObject( 'GENERIC_ERROR' );
			var err = false;
			$.each( ac.accessControlActions, function() {
				if( this.type == 1 ) {
					msgObj.message = '';
					if( ac.accessControlMessages && ac.accessControlMessages.length ) {
						$.each( ac.accessControlMessages, function() {
							msgObj.message += this.value + '\n';
							err = true;
						});
					} else {
						msgObj = embedPlayer.getVidiunMsgObject( 'NO_VS' );
						err = true;
					}
				}
			});

			if( err ) {
				return msgObj;
			}
		}
		return true;
	},
	/**
	 * Get the uiconf id
	 */
	getUiConfId: function( embedPlayer ){
		return embedPlayer.vuiconfid;
	},
	/**
	 * Check if the entryId is a url ( add source and do not include in request )
	 */
	checkForUrlEntryId:function( embedPlayer ){
		if( embedPlayer.ventryid
				&&
			typeof embedPlayer.ventryid == 'string'
				&&
			embedPlayer.ventryid.indexOf('://') != -1 )
		{
			embedPlayer.mediaElement.tryAddSource(
					$('<source />')
					.attr( {
						'src' : embedPlayer.ventryid
					} )
					.get( 0 )
				);
			return true;
		}
		return false;
	},
	addSources: function( embedPlayer, sources ){
		$.each(sources, function( inx, source){
			embedPlayer.mediaElement.tryAddSource( 
				$('<source />')
				.attr( source )
				.get( 0 )
			);
		});
	},
	/**
	* Convert flavorData to embedPlayer sources
	*
	* @param {Object} embedPlayer Player object to apply sources to
	* @param {Object} flavorData Function to be called once sources are ready
	*/
	addFlavorSources: function( embedPlayer, playerData ) {
		var _this = this;
		//mw.log( 'VWidgetSupport::addEntryIdSources:');
		// Check if we already have sources with flavorid info
		var sources = embedPlayer.mediaElement.getSources();
		if( sources[0] && sources[0]['data-flavorid'] ){
			return ;
		}
		// Else get sources from flavor data :
		var flavorSources = _this.getEntryIdSourcesFromPlayerData( embedPlayer.vpartnerid, playerData );
		embedPlayer.vidiunFlavors = flavorSources;
		// Check for prefered bitrate info
		var preferedBitRate = embedPlayer.evaluate('{mediaProxy.preferedFlavorBR}' );

		var flashvarsPlayMainfestParams = this.getPlayMainfestParams( embedPlayer );
		// Add all the sources to the player element:
		var qp = '';
		for( var i=0; i < flavorSources.length; i++) {
			var source = flavorSources[i];
			// if we have a prefred bitrate and source type is adaptive append it to the requets url:
			if( preferedBitRate && source.type == 'application/vnd.apple.mpegurl' ){
				qp = ( source.src.indexOf('?') === -1) ? '?' : '&';
				source.src = source.src + qp +  'preferredBitrate=' + preferedBitRate;
			}

			if ( source['disableQueryString'] ) {
				var mParams =  this.getPlayMainfestParams( embedPlayer, true );
				if ( mParams != '' ) {
					var index = source.src.lastIndexOf( '/a.' );
					source.src = source.src.substring( 0, index ) + '/' + mParams  + source.src.substring( index ) ;
				}

			} else {
				// add any flashvar based playManifest params
				qp = ( source.src.indexOf('?') === -1) ? '?' : '&';
				source.src = source.src +  qp + flashvarsPlayMainfestParams;
			}

			mw.log( 'VWidgetSupport:: addSource::' + embedPlayer.id + ' : ' +  source.src + ' type: ' +  source.type);
			var sourceElm = $('<source />')
				.attr( source )
				.get( 0 );
			// Add it to the embedPlayer
			embedPlayer.mediaElement.tryAddSource( sourceElm );
		}
	},
	getPlayMainfestParams: function( embedPlayer, disableQueryString ){
		var p = '';
		var and = '';
		var equalDelimiter = '=';
		var andDelimiter = '&';
		if ( disableQueryString ) {
			andDelimiter = equalDelimiter = '/';
		}
		var urlParms = ["deliveryCode", "storageId", "maxBitrate", "playbackContext", "seekFrom", "clipTo" ];
		$.each( urlParms, function( inx, param ){
			if( embedPlayer.getFlashvars( param ) ){
				 p += and + param + equalDelimiter + embedPlayer.getFlashvars( param );
				 and = andDelimiter;
			}
		});

		p += and + 'uiConfId' + equalDelimiter + embedPlayer.vuiconfid;
		return p;
	},
	/**
	 * Get the host page url used passing referrer to vidiun api
	 */
	getHostPageUrl: function(){
		// The referring  url ( can be from the iframe if in iframe mode )
		var hostUrl = ( mw.getConfig( 'EmbedPlayer.IframeParentUrl') ) ?
						mw.getConfig( 'EmbedPlayer.IframeParentUrl') :
						( document.referrer || document.URL );

		// If we have hash, remove everything after that
		if( hostUrl.indexOf("#") !== -1 ) {
			hostUrl = hostUrl.substr(0, hostUrl.indexOf("#"));
		}

		// Only domain is needed, so removing everything (incl.) after the third slash, resulting in shorter referrer not breaking the 1024 chars limit (iOS)
		hostUrl = hostUrl.substr( 0, hostUrl.indexOf( "/", 8 ) );
		return hostUrl;
	},
    getBaseFlavorUrl: function(partnerId) {
        if( mw.getConfig( 'Vidiun.UseManifestUrls' ) ){
            return  mw.getConfig('Vidiun.playManifestServiceUrl')+ '/p/' + partnerId +
                '/sp/' +  partnerId + '00/playManifest';
        } else {
            return mw.getConfig('Vidiun.CdnUrl') + '/p/' + partnerId +
                '/sp/' +  partnerId + '00/flvclipper';
        }
    },
	/**
	 * Get client entry id sources:
	 * @param {string} partnerId Used to build asset urls
	 * @param {object} playerData The flavor data object
	 */
	getEntryIdSourcesFromPlayerData: function( partnerId, playerData ){
		var _this = this;

		if( !playerData.contextData || ( playerData.contextData && !playerData.contextData.flavorAssets )){
			mw.log("Error: VWidgetSupport: contextData.flavorAssets is not defined ");
			return ;
		}
		var flavorData = playerData.contextData.flavorAssets;
		var flavorDrmData = this.getFlavorAssetsDrmData(playerData);

		var protocol = mw.getConfig('Vidiun.Protocol');
		if( !protocol ){
			protocol = window.location.protocol.replace(':','');
		}
		// Setup the deviceSources array
		var deviceSources = [];

		// Setup the src defines
		var ipadAdaptiveFlavors = [];
		var iphoneAdaptiveFlavors = [];
		var androidNativeAdaptiveFlavors = [];
		var dashAdaptiveFlavors = [];

		// Setup flavorUrl
		var flavorUrl = _this.getBaseFlavorUrl(partnerId);

		// Flag that indecate if we have H264 flavor
		var hasH264Flavor = false;
		// Flag that indecate if we have ISM flavor
		var hasIsmFlavor = false;
		// Add all avaliable sources:
		for( var i = 0 ; i < flavorData.length; i ++ ) {

			var asset = flavorData[i];

			var sourceAspect = Math.round( ( asset.width / asset.height )  * 100 )  / 100
			// Setup a source object:
			var source = {
				'data-sizebytes' : asset.size * 1024,
				'data-bandwidth' : asset.bitrate * 1024,
				'data-width' : asset.width,
				'data-height' : asset.height,
				'data-aspect' : sourceAspect, // not all sources have valid aspect ratios
				'data-tags': asset.tags,
				'data-assetid': asset.id
			};
			// setup tags array:
			var tags = asset.tags.toLowerCase().split(',');

			// Continue if clip is not ready (2) and not in a transcoding state (4 )
			if( asset.status != 2  ) {
				// if an asset is transcoding and no other source is found bind an error callback:
				if( asset.status == 4 ){
					source.error = 'not-ready-transcoding';
					mw.log("VWidgetSupport:: Skip sources that are not ready: " +  asset.id + ' ' +  asset.tags );

					// don't add sources that are not ready ( for now )
					// deviceSources.push( source );
				}
				continue;
			}

			// Check playManifest conditional
			if( mw.getConfig( 'Vidiun.UseManifestUrls' ) ){
				var src  = flavorUrl + '/entryId/' + asset.entryId;
				// Check if Apple http streaming is enabled and the tags include applembr
				if( mw.getConfig('Vidiun.UseAppleAdaptive') && $.inArray( 'applembr', tags ) != -1 ) {
					src += '/format/applehttp/protocol/' + protocol + '/a.m3u8';

					deviceSources.push({
						'data-aspect' : sourceAspect,
						'data-flavorid' : 'AppleMBR',
						'type' : 'application/vnd.apple.mpegurl',
						'src' : src
					});

					continue;
				} else {
					src += '/flavorId/' + asset.id + '/format/url/protocol/' + protocol;
				}
			} else {
				mw.log( "Error: VWidgetSupport: non-manifest urls are deprecated" );
				var src  = flavorUrl + '/entry_id/' + asset.entryId + '/flavor/' + asset.id ;
			}

			// Check the tags to read what type of mp4 source
			if( $.inArray( 'ipad', tags ) != -1 ){
				source['src'] = src + '/a.mp4';
				source['data-flavorid'] = 'iPad';
				source['type'] = 'video/mp4; codecs="avc1.42E01E, mp4a.40.2';
				hasH264Flavor = true;
			}

			// Check for iPhone src
			if( $.inArray( 'iphone', tags ) != -1 ){
				source['src'] = src + '/a.mp4';
				source['data-flavorid'] = 'iPhone';
				source['type'] = 'video/mp4; codecs="avc1.42E01E, mp4a.40.2';
				hasH264Flavor = true;
			}

			//if we have mbr flavours and we're not in mobile device add it to the playable
			if (( $.inArray( 'mbr', tags ) != -1 || $.inArray( 'web' ,tags ) != -1 ) &&
				$.isEmptyObject(source['src']) &&
				!mw.isMobileDevice() &&
				asset.fileExt )
			{
				if ( asset.fileExt.toLowerCase() == 'mp4' ) {
					source['src'] = src + '/a.mp4';
					source['type'] = 'video/mp4; codecs="avc1.42E01E, mp4a.40.2';
					hasH264Flavor = true;
				} else if ( asset.fileExt.toLowerCase() == 'flv' ) {
					source['src'] = src + '/a.flv';
					source['type'] = 'video/x-flv';
				}

			}

			// Check for ogg source
			if( asset.fileExt &&
				(
				asset.fileExt.toLowerCase() == 'ogg'
				||
				asset.fileExt.toLowerCase() == 'ogv'
				||
				( asset.containerFormat && asset.containerFormat.toLowerCase() == 'ogg' )
				)
			){
				source['src'] = src + '/a.ogg';
				source['data-flavorid'] = 'ogg';
				source['type'] = 'video/ogg';
			}
	
			// Check for webm source
			if( asset.fileExt && asset.containerFormat && ( asset.fileExt == 'webm'
					||
					$.inArray( 'webm' , tags) != -1
					|| // some ingestion systems give "webm"
					( asset.containerFormat.toLowerCase() == 'webm' )
				)
			){
				source['src'] = src + '/a.webm';
				source['data-flavorid'] = 'webm';
				source['type'] = 'video/webm; codecs="vp8, vorbis';
			}

			// Check for mov source
			if( asset.fileExt && asset.fileExt == 'mov' ){
				source['src'] = src + '/a.mov';
				source['data-flavorid'] = 'mov';
				source['type'] = 'video/mp4';
			}

			// Check for 3gp source
			if( asset.fileExt && asset.fileExt == '3gp' ){
				source['src'] = src + '/a.3gp';
				source['data-flavorid'] = '3gp';
				source['type'] = 'video/3gp';
			}

			// Check for mp3 source
			if ( asset.fileExt && asset.fileExt == 'mp3' ){
				source['src'] = src + '/a.mp3';
				source['data-flavorid'] = 'mp3';
				source['type'] = 'audio/mp3';
			}

			if ( asset.fileExt && asset.fileExt == 'wvm'){
				source['src'] = src + '/a.wvm';
				source['data-flavorid'] = 'wvm';
				source['type'] = 'video/wvm';
				source['disableQueryString'] = true;
			} 

			if ( asset.tags && asset.tags == 'kontiki'){
				source['src'] = src + '/a.mp4';
				source['data-flavorid'] = 'kontiki';
				source['type'] = 'video/kontiki';
			}

			if ( asset.tags && asset.tags.indexOf( 'ism_manifest' ) !=-1 ) {
				src = src.replace( "/format/url/", "/format/sl/" );
				source['src'] = src + '/a.ism';
				source['data-flavorid'] = 'ism';
				if ( asset.tags.indexOf( 'playready' ) != -1 ) {
					source['type'] = 'video/playreadySmooth';
				} else {
					source['type'] = 'video/ism';
				}
				hasIsmFlavor = true;
			}

			var assetDrmData = this.getFlavorAssetDrmData(asset.id, flavorDrmData);
			$.extend(source, assetDrmData);

			// Add the source ( if a src was defined ):
			if( source['src'] ){
				deviceSources.push( source );
			}


			/**
			 * Add Adaptive flavors:
			 */
			// Android does not support audio flavors in the adaptive stream set:
			if(  navigator.userAgent.indexOf( 'Android' ) !== -1 &&
					asset.width == 0  && asset.height == 0  ){
				continue;
			}

			// Add iPad Akamai flavor to iPad flavor Ids list id list
			if( $.inArray( 'ipadnew', tags ) != -1 ){
				ipadAdaptiveFlavors.push( asset.id );
			}

			// Add iPhone Akamai flavor to iPad&iPhone flavor Ids list
			if( $.inArray( 'iphonenew', tags ) != -1 ){
				ipadAdaptiveFlavors.push( asset.id );
				iphoneAdaptiveFlavors.push( asset.id );
			}

			// Add android SDK h246 base profile flavor Ids list
			if( $.inArray( 'h264b', tags ) != -1 ){
				androidNativeAdaptiveFlavors.push( asset.id );
			}

			// Add DASH flavor to DASH flavor Ids list
			if( $.inArray( 'dash', tags ) != -1 ){
				dashAdaptiveFlavors.push( asset.id );
			}
		} // end source loop

		// Make sure all the sources have valid aspect ratios ( if not get from other sources )
		for( var i=0; i < deviceSources.length; i++ ){
			var source = deviceSources[i];

			if( ! this.isValidAspect( source['data-aspect'] ) ){
				source['data-aspect'] = this.getValidAspect( deviceSources );
			}
			//mw.log( "VWidgetSupport:: set aspect for: " + source['data-flavorid'] + ' = ' + source['data-aspect'] );
		}

		// Only add flavor sources if no appleMBR flavor exists and Vidiun.UseFlavorIdsUrls
		if( mw.getConfig('Vidiun.UseFlavorIdsUrls') && mw.getConfig('Vidiun.UseAppleAdaptive')
			&& $.grep(deviceSources, function( a ){
				if( a['data-flavorid'] == 'AppleMBR' ){
					return true;
				}
			}).length  == 0
		) {
			// We only need single HLS stream
			var addedHlsStream = false;
			// Check if mobile device media query
			if (iphoneAdaptiveFlavors.length || ipadAdaptiveFlavors.length || androidNativeAdaptiveFlavors.length) {
				var validClipAspect = this.getValidAspect(deviceSources);
				var lowResolutionDevice = (mw.isMobileDevice() && mw.isDeviceLessThan480P() && iphoneAdaptiveFlavors.length);
				var targetFlavors;
				if (mw.getConfig('Vidiun.ForceHighResFlavors')){
					mw.log( 'VWidgetSupport::Forcing High resolution flavours');
					if (ipadAdaptiveFlavors.length || dashAdaptiveFlavors.length) {
						mw.log( 'VWidgetSupport::High resolution flavours found');
						targetFlavors = ipadAdaptiveFlavors;
						if (dashAdaptiveFlavors.length) {
							//Concat the dash and ipadNew tags and filter duplicates
							targetFlavors = targetFlavors.concat(dashAdaptiveFlavors);
							for(var i=0; i<targetFlavors.length; ++i) {
								for(var j=i+1; j<targetFlavors.length; ++j) {
									if(targetFlavors[i] === targetFlavors[j])
										targetFlavors.splice(j--, 1);
								}
							}
						}
					} else {
						mw.log( 'VWidgetSupport::High resolution flavours not found - will use low resolution flavours');
						targetFlavors = iphoneAdaptiveFlavors;
					}
				} else {
					if (androidNativeAdaptiveFlavors.length && mw.isNativeApp() && mw.isAndroid()) {
						//Android h264b
						targetFlavors = androidNativeAdaptiveFlavors;
					} else if (lowResolutionDevice) {
						//iPhone
						targetFlavors = iphoneAdaptiveFlavors;
					} else if (mw.isMobileDevice() || dashAdaptiveFlavors.length == 0) {
						//iPad
						targetFlavors = ipadAdaptiveFlavors;
					} else {
						targetFlavors = dashAdaptiveFlavors;
					}
				}
				var assetId = targetFlavors[0];

				var hlsSource = this.generateAbrSource({
					entryId: asset.entryId,
					flavorUrl: flavorUrl,
					flavorId: (lowResolutionDevice ? 'iPhoneNew' : 'iPadNew'),
					type: 'application/vnd.apple.mpegurl',
					flavors: targetFlavors,
					format: "applehttp",
					ext: "m3u8",
					protocol: protocol,
					clipAspect: validClipAspect
				});
				this.attachFlavorAssetDrmData(hlsSource, targetFlavors[0], flavorDrmData);
				hlsSource.fpsCertificate = this.getFairplayCert(playerData);
				deviceSources.push(hlsSource);
				addedHlsStream = true;
			}


		}

		if( mw.getConfig('Vidiun.UseFlavorIdsUrls') ) {
			var validClipAspect = this.getValidAspect(deviceSources);
			//Only add mpeg dash CENC on the fly if dash sources exist
			if (dashAdaptiveFlavors.length) {
				var dashSource = this.generateAbrSource({
					entryId: asset.entryId,
					flavorUrl: flavorUrl,
					flavorId: 'mpd',
					type: 'application/dash+xml',
					flavors: dashAdaptiveFlavors,
					format: "mpegdash",
					ext: "mpd",
					protocol: protocol,
					clipAspect: validClipAspect
				});
				this.attachFlavorAssetDrmData(dashSource, dashAdaptiveFlavors[0], flavorDrmData);
				deviceSources.push(dashSource);
			}
			//Only add playready on the fly if pre-encrypted doesn't exist
			if ((iphoneAdaptiveFlavors.length || ipadAdaptiveFlavors.length) &&
				this.getSourcesByAttribute(deviceSources, "type", "video/playreadySmooth").length === 0  &&
				!$.isEmptyObject(flavorDrmData)) {
				var targetFlavors = ipadAdaptiveFlavors.length ? ipadAdaptiveFlavors : iphoneAdaptiveFlavors;
				var assetId = targetFlavors[0];
				var ismSource = this.generateAbrSource({
					entryId: asset.entryId,
					flavorUrl: flavorUrl,
					flavorId: "ism",
					type: 'video/playreadySmooth',
					flavors: targetFlavors,
					format: "sl",
					ext: "ism",
					protocol: protocol,
					clipAspect: validClipAspect
				});
				this.attachFlavorAssetDrmData(ismSource, assetId, flavorDrmData);
				deviceSources.push(ismSource);
			}
		}

		this.removedAdaptiveFlavors = false;
		// Apple adaptive streaming is broken for short videos
		// remove adaptive sources if duration is less then 10 seconds,
		if( playerData.meta.duration < 10 && mw.getConfig("Vidiun.force10secProgressive") ) {
			deviceSources = this.removeAdaptiveFlavors( deviceSources );
		}

		// Remove adaptive sources when in playlist and playing audio entry - Causes player to freeze
		if( !this.removedAdaptiveFlavors && mw.getConfig( 'playlistAPI.vpl0Url' ) && playerData.meta && playerData.meta.mediaType == 5 ) {
			deviceSources = this.removeAdaptiveFlavors( deviceSources );
		}

		// Prefer HLS on Android browser over H264 flavor,
		// on SDK prefer HLS with h264 baseline flavors
		if( !this.removedAdaptiveFlavors &&
				(mw.isAndroid() && !mw.isNativeApp()) &&
				hasH264Flavor &&
				mw.getConfig( 'Vidiun.LeadHLSOnAndroid' ) == false ) {
			deviceSources = this.removeHlsFlavor( deviceSources );
		}

		// PRemove adaptive sources on Windows Phone
		if( mw.isWindowsPhone() ) {
			deviceSources = this.removeAdaptiveFlavors( deviceSources );
		}

		// if we have streamertype that is not hls and we support hls on the native player - we'll use vplayer + hls - we want to eliminate  this option
		// for now the only usecase is microsoft edge browser
		if ( mw.supportsFlash()  &&
			this.originalStreamerType &&
			this.originalStreamerType !== "hls" &&
			 mw.getConfig("LeadWithHLSOnFlash") === null 	){
			    deviceSources = this.removeHlsFlavor( deviceSources );
		}

		//TODO: Remove duplicate webm and h264 flavors
		/*if (mw.EmbedTypes.getMediaPlayers().isSupportedPlayer( 'h264Native' ) && mw.EmbedTypes.getMediaPlayers().isSupportedPlayer( 'webmNative' )) {
			//remove someone if duplicate
		}*/

		// Append VS to all source if available
		// Get VS for playManifest URL ( this should run synchronously since vs should already be available )
		var vs = this.vClient.getVs();

		var vsStr = '';
		var vsQueryString = '';

		if (vs){
			var manifestVs = _this.fixPlaymanifestParam( vs );
			vsStr = '/vs/' + manifestVs;
			vsQueryString = '&vs=' + manifestVs;
		}

		var referrer =   _this.fixPlaymanifestParam( base64_encode( _this.getHostPageUrl() ) );
		var nativeVersion = mw.getConfig("nativeVersion");
		nativeVersion = (nativeVersion != null && nativeVersion.length > 0) ? '_' + nativeVersion : '';
		var clientTag = 'html5:v' + window[ 'MWEMBED_VERSION' ] + nativeVersion;
		$.each( deviceSources, function(inx, source){
			if ( deviceSources[inx]['disableQueryString'] == true ) {
				var index = deviceSources[inx]['src'].lastIndexOf('/a.');
				deviceSources[inx]['src'] = deviceSources[inx]['src'].substring(0, index) + vsStr +
					'/referrer/' + referrer +
					'/clientTag/' + clientTag +
					'/playSessionId/' + _this.getGUID() +
					deviceSources[inx]['src'].substring(index) ;
			} else {
				deviceSources[inx]['src'] = deviceSources[inx]['src'] +
					'?referrer=' + referrer + vsQueryString +
					'&playSessionId=' + _this.getGUID()+
					'&clientTag=' + clientTag;
			}
		});
		
		return deviceSources;
	},
	generateAbrSource: function(options){
		var flavorsString = options.flavors.join(',');
		var dashSource = {
			'data-aspect' : options.clipAspect,
			'data-flavorid' : options.flavorId,
			'type' : options.type,
			'src' : options.flavorUrl + '/entryId/' + options.entryId + '/flavorIds/' + flavorsString + '/format/' + options.format + '/protocol/' + options.protocol + '/a.' + options.ext,
			'flavors': flavorsString
		};
		return dashSource;
	},
	attachFlavorAssetDrmData: function(source, assetId, flavorDrmData){
		var assetDrmData = this.getFlavorAssetDrmData(assetId, flavorDrmData);
		$.extend(source, assetDrmData);
		return source;
	},
	getFairplayCert: function(playerData){
		var publicCertificate = null;
		if (playerData && playerData.contextData && playerData.contextData.pluginData &&
			playerData.contextData.pluginData.VidiunFairplayEntryContextPluginData &&
			playerData.contextData.pluginData.VidiunFairplayEntryContextPluginData.publicCertificate){
			publicCertificate = playerData.contextData.pluginData.VidiunFairplayEntryContextPluginData.publicCertificate;
		}
		return publicCertificate;
	},
	getFlavorAssetsDrmData: function(playerData){
		var flavorDrmData = {};
		if (playerData.contextData.pluginData &&
			playerData.contextData.pluginData.VidiunDrmEntryContextPluginData &&
			playerData.contextData.pluginData.VidiunDrmEntryContextPluginData.flavorData){
			flavorDrmData = playerData.contextData.pluginData.VidiunDrmEntryContextPluginData.flavorData;
		}
		return flavorDrmData;
	},
	getFlavorAssetDrmData: function(id, flavorDrmData){
		var assetDrmData = flavorDrmData && flavorDrmData[id];
		var drmData = {};
		if (assetDrmData) {
			drmData.custom_data = assetDrmData.custom_data;
			drmData.signature = assetDrmData.signature;
			drmData.contentId = assetDrmData.contentId;
		}
		return drmData;
	},
	getSourcesByAttribute: function(source, attribute, value){
		return $.grep(source, function( a ){
			if( a[attribute] == value ){
				return true;
			}
		});
	},
	/**
	 *  "/" and "+" are valid base64 chars. They might break playmanifest URL so we replace them to "_" and "-" accordingly.
	 *  There is a server side code that replaces the string back to the original value
	 * @param value
	 */
	fixPlaymanifestParam: function( value ) {
		return value.replace(/\+/g, "-").replace(/\//g, "_");
	},
	removeAdaptiveFlavors: function( sources ){
		this.removeHlsFlavor(sources);
		this.removeDashFlavor(sources);
		this.removedAdaptiveFlavors = true;
		return sources;
	},

	removeHlsFlavor: function( sources ){
		for( var i =0 ; i < sources.length; i++ ){
			if( sources[i].type == 'application/vnd.apple.mpegurl' ){
				// Remove the current source:
				sources.splice( i, 1 );
				i--;
			}
		}
		return sources;
	},

	removeDashFlavor: function( sources ){
		for( var i =0 ; i < sources.length; i++ ){
			if(	sources[i].type == "application/dash+xml" ){
				// Remove the current source:
				sources.splice( i, 1 );
				i--;
			}
		}
		return sources;
	},

	getValidAspect: function( sources ){
		var _this = this;
		for( var i=0; i < sources.length; i++ ){
			var source = sources[i];
			var aspect = source['data-aspect'];
			if( this.isValidAspect( aspect ) ){
				// return valid aspect and exit out of the loop:
				return aspect;
			}
		}
		// Always return a valid apsect ( assume default aspect if none is found )
		var aspectParts = mw.getConfig( 'EmbedPlayer.DefaultSize' ).split( 'x' );
		return  Math.round( ( aspectParts[0] / aspectParts[1]) * 100 ) / 100;
	},
	/**
	 * Add livestream source to the mediaElement
	 * @param embedPlayer
	 * @param entry
	 * @param isFlash should be played in Flash player
	 * @param isSilverlight should be played in Silverlight player
	 * @param streamerType
	 * @param callback
	 */
	addLiveEntrySource: function( embedPlayer, entry, streamType, streamerType ) {
		var _this = this;
		var extension;
		var mimeType;
		var format = streamerType;
		var protocol;
		switch(streamType){
			case "flash":
				extension = 'f4m';
				embedPlayer.setFlashvars( 'streamerType', streamerType );
				protocol = 'rtmp';
				if ( embedPlayer.vidiunContextData ) {
					protocol = embedPlayer.vidiunContextData.mediaProtocol;
				}
				mimeType = 'video/live';
				break;
			case "silverlightMulticast":
				extension = 'f4m';
				protocol = 'http';
				mimeType = 'video/multicast';
				break;
			case "silverlight":
				extension = 'manifest';
				protocol = 'http';
				mimeType = 'video/playreadySmooth';
				break;
			case "hls":
				embedPlayer.setFlashvars( 'streamerType', 'http' );
				extension = 'm3u8';
				protocol = mw.getConfig('Vidiun.Protocol');
				if( !protocol ){
					protocol = window.location.protocol.replace(':','');
				}
				mimeType = 'application/vnd.apple.mpegurl';
				break;
			case "dash":
				embedPlayer.setFlashvars( 'streamerType', 'http' );
				extension = 'mpd';
				protocol = mw.getConfig('Vidiun.Protocol');
				if( !protocol ){
					protocol = window.location.protocol.replace(':','');
				}
				mimeType = 'application/dash+xml';
				break;
		}

		var srcUrl = this.getBaseFlavorUrl(entry.partnerId) + '/entryId/' + entry.id + '/format/' + format + '/protocol/' + protocol + '/uiConfId/' + embedPlayer.vuiconfid +  '/a.' + extension;
		// Append VS & Referrer
		srcUrl += '?referrer=' + base64_encode( _this.getHostPageUrl() ) + '&playSessionId=' + _this.getGUID();
		var deferred = $.Deferred();
		var vs = _this.vClient.getVs();
		if( vs ){
			srcUrl += '&vs=' + vs;
		}

		var uiVarsAsUrlParams = ['minBitrate', 'maxBitrate'];
		$.each(uiVarsAsUrlParams, function (index, name) {
			var value = embedPlayer.getFlashvars(name);
			if (value) {
				srcUrl += '&' + name + '=' + encodeURIComponent(value);
			}
		});

		//add source
		mw.log( 'VWidgetSupport::addLiveEntrySource: Add Live Entry Source - ' + srcUrl );
		var liveSource = embedPlayer.mediaElement.tryAddSource(
			$('<source />')
				.attr({
					'src' : srcUrl,
					'type' : mimeType
				})[0]
		);
		return liveSource;
	},
	isValidAspect: function( aspect ){
		return  ! isNaN( aspect) && isFinite( aspect );
	},
	generateGUID: function() {
		var S4 = function() {
		   return (((1+Math.random())*0x10000)|0).toString(16).substring(1);
		};
		return (S4()+S4()+"-"+S4()+"-"+S4()+"-"+S4()+"-"+S4()+S4()+S4());
	},
	getGUID: function() {
		if( ! this.vSessionId ) {
			this.vSessionId = this.generateGUID();
		}
		return this.vSessionId;
	},
    resetGUID: function() {
        this.vSessionId = null
    },
	getVidiunThumbnailUrl: function( thumb ) {
		if( ! thumb.url ){
			return mw.getConfig( 'EmbedPlayer.BlackPixel' );
		}
		var thumbUrl = thumb.url;
		// Only append width/height params if thumbnail from vidiun service ( could be external thumbnail )
		if( thumbUrl.indexOf( "thumbnail/entry_id" ) != -1 ){

			if( mw.getConfig('EmbedPlayer.ShowOriginalPoster') ){
				thumbUrl += '/width/0/height/0';
			} else {
				thumbUrl += '/width/' + thumb.width + '/height/' + thumb.height;
			}
            if (thumb.vid_sec) {
                thumbUrl += '/vid_sec/' + thumb.vid_sec;
            }
            if (thumb.vid_slices) {
                thumbUrl += '/vid_slices/' + thumb.vid_slices;
            }
            if( mw.getConfig('loadThumbnailWithVs') === true ) {
		thumbUrl += '/vs/' + mw.getConfig('vs');
            }

		}
		return thumbUrl;
	},
	getFunctionByName: function( functionName, context /*, args */) {
		try {
			var args = Array.prototype.slice.call(arguments).splice(2);
			var namespaces = functionName.split(".");
			var func = namespaces.pop();
			for(var i = 0; i < namespaces.length; i++) {
				context = context[namespaces[i]];
			}
			return context[func];
		} catch( e ){
			mw.log("vWidgetSupport::executeFunctionByName: Error could not find function: " + functionName + ' error: ' + e);
			return false;
		}
	}
};

//Setup the vWidgetSupport global if not already set
if( !window.vWidgetSupport ){
	window.vWidgetSupport = new mw.VWidgetSupport();
}

/**
 * Register a global shortcuts for the Vidiun sources query
 */
mw.getEntryIdSourcesFromApi = function( embedPlayer, entryId, callback ){
	vWidgetSupport.getEntryIdSourcesFromApi( embedPlayer, entryId, callback);
};

})( window.mw, jQuery );
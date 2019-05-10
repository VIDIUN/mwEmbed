( function( mw, $ ) { "use strict";

	mw.DoubleClick = function( embedPlayer, callback, pluginName ){
		this.init( embedPlayer, callback, pluginName);
	};
	mw.DoubleClick.prototype = {
		// The bind postfix to keep track of doubleclick bindings.
		bindPostfix: '.DoubleClick',

		// The content video element.
		content: null,

		// Global volume holder.
		globalVolume : 1,

		// IMA SDK Ad Loader.
		adsLoader : null,
		// IMA SDK Ad Manager.
		adsManager: null,

		// Status variables for ad and content playback.
		adActive: false,
		// if the current ad is paused:
		adPaused: false,

		// The monitor interval index:
		adMonitor: null,

		shouldPausePlaylist: false,

		// store the ad start time
		adPreviousTimeLeft: null,
		contentPlaying: false,
		adDuration: null,
		demoStartTime: null,

		// flag for using a chromeless player - move control to VDP DoubleClick plugin
		isChromeless: false,
		 //flag for using native mobile IMA SDK
		isNativeSDK: false,
		// for Chromeless only: save entry duration during midrolls so we can update it when midroll is finished
		entryDuration: null,

		// Flags for a fallback check for all ads completed .
		contentDoneFlag: null,

		// Flag for starting ad playback sequence:
		startedAdPlayback: null,

		allAdsCompletedFlag: null,

		//Signal if error was triggered from adsLoader
		adLoaderErrorFlag: false,
		//Flag for indicating if load has been initiated on the player element
		playerElementLoaded: false,
		// The current ad Slot type by default "managed" i.e doubleClick manages the player sequence.
		currentAdSlotType : null,
		// Flag that indicates event name when ad is clicked
		adClickEvent: null,
		// Flag to enable/ disable timeout for iOS5/ iOS6 when ad is clicked
		isAdClickTimeoutEnabled: false,

		adsManagerLoadedTimeoutId: null,

		//indicates we should save the time for the media switch (mobile)
		saveTimeWhenSwitchMedia:false,

		//flag for the time to return when using the same video element {mobile}
		timeToReturn:null,

		cust_params: null,

		//flag that indicates we are now playing linear ad
		playingLinearAd:false,

		leadWithFlash: true,

		adManagerLoaded: false,

		localizationCode: null,

		trackCuePoints: false,

		//override cuepoint url with the preroll url
		overrideCuePointWithPreRoll: false,

		adCuePoints: [],
		skipTimeoutId: null,

		init: function( embedPlayer, callback, pluginName ){
			var _this = this;
			if (mw.getConfig( 'localizationCode' )){
				_this.localizationCode = mw.getConfig( 'localizationCode' );
			}
			// copy flashVars to VDP to support Chromeless player plugin
			this.copyFlashvarsToVDP(embedPlayer, pluginName);
			this.embedPlayer = embedPlayer;
			// Inherit BaseAdPlugin
			mw.inherit( this, new mw.BaseAdPlugin( embedPlayer, callback ) );

			// Set the plugin name
			this.pluginName = pluginName;

			// reset the contentDoneFlag flags:
			this.contentDoneFlag = null;
			this.allAdsCompletedFlag = null;

			this.trackCuePoints = this.getConfig("trackCuePoints") == true && !_this.getConfig( 'adTagUrl' );

			this.overrideCuePointWithPreRoll = this.getConfig("overrideCuePointWithPreRoll")  == true && !_this.getConfig( 'adTagUrl' );

			// remove any old bindings:
			embedPlayer.unbindHelper( this.bindPostfix );

			// make sure any old ad Manager is unloaded:
			var globalAdsManger = $(_this.embedPlayer).data( 'doubleClickAdsMangerRef' );
			if( globalAdsManger ){
				mw.log( "DoubleClick::unload old adManger" );
				if ( $.isFunction( globalAdsManger.destroy ) ) {
					var resotreFunction = $( _this.embedPlayer ).data( 'doubleClickRestore' );
					if (  $.isFunction(resotreFunction) ){
						resotreFunction();
					}
					globalAdsManger.destroy();

				}
				this.removeAdContainer();
			}

			if ( _this.getConfig( 'leadWithFlash' ) !== undefined ) {
				_this.leadWithFlash = _this.getConfig( 'leadWithFlash' );
			}
			if ( _this.getConfig( 'prerollUrl' ) !== undefined && !_this.getConfig( 'adTagUrl' )) {
				_this.adTagUrl = _this.getConfig( 'prerollUrl' );
			}

			if ( mw.getConfig( "EmbedPlayer.ForceNativeComponent") ) {
				_this.isNativeSDK = true;
				_this.embedPlayer.bindHelper('playerReady' + _this.bindPostfix, function() {
					_this.bindChromelessEvents();
				});
				_this.addManagedBinding();
				callback();
				return;
			}

			if ( this.embedPlayer.getRawVidiunConfig('noticeMessage')){
				embedPlayer.setVidiunConfig( 'doubleClick', 'enableCountDown',true );
				embedPlayer.setVidiunConfig( 'doubleClick', 'countdownText',this.embedPlayer.getRawVidiunConfig('noticeMessage','text') );
			}
			if ( this.getConfig( 'enableCountDown' ) === true){
				if ( !_this.getConfig( 'countdownText' ) ){
					embedPlayer.setVidiunConfig( 'doubleClick', 'countdownText','Advertisement: Video will resume in {sequenceProxy.timeRemaining} seconds');
				}
			}else{
				embedPlayer.setVidiunConfig( 'doubleClick', 'countdownText',null);
			}

			if ( this.trackCuePoints ){
				this.handleCuePoints();
			}
			if (( mw.isIE8() || mw.isIE9() || _this.leadWithFlash ) && (mw.supportsFlash())) {
				mw.setConfig( 'EmbedPlayer.ForceVPlayer' , true );
				_this.isChromeless = true;
				_this.prevSlotType = 'none';
				_this.embedPlayer.bindHelper('playerReady' + _this.bindPostfix, function() {
					_this.bindChromelessEvents();
				});
				_this.embedPlayer.bindHelper( 'volumeChanged' + this.bindPostfix, function(event, percent){
					mw.log("DoubleClick::chromeless volumeChanged: " + percent );
					_this.embedPlayer.setPlayerElementVolume( percent );
				});
				_this.embedPlayer.bindHelper( 'Vidiun_SendNotification' + this.bindPostfix, function(event, notificationName, notificationData){
					if (notificationName === "doPause"){
						_this.embedPlayer.getPlayerElement().pause();
					}
				});
				_this.addManagedBinding();
				callback();
				return;
			} else if ( mw.isIE8() || mw.isIE9() ) {   //no flash on IE8/9
				callback();
				return;
			}

			//if we got till here we're going to use the javascript - check if we have spacific javascript configuration
			if ( _this.getConfig( 'prerollUrlJS' ) !== undefined && !_this.getConfig( 'adTagUrl' )) {
				_this.adTagUrl = _this.getConfig( 'prerollUrlJS' );
			}

			// Load double click ima per doc:
			this.loadIma( function(){
				// Determine if we are in managed or vidiun point based mode.
				if ( _this.localizationCode ){
					google.ima.settings.setLocale(_this.localizationCode);
				}
				// set player type and version
				google.ima.settings.setPlayerType("vidiun/mwEmbed");
				google.ima.settings.setPlayerVersion(mw.getConfig("version"));
				google.ima.settings.setVpaidMode(google.ima.ImaSdkSettings.VpaidMode.INSECURE);

				// Set num of redirects for VAST wrapper ads, higher means bigger latency!
				var numRedirects = _this.getConfig("numRedirects");
				if(numRedirects) {
					google.ima.settings.setNumRedirects(numRedirects);
				}

				// Check for adPattern
				if ( _this.getConfig( 'adPattern' ) ) {
					var adIndex = _this.getAdPatternIndex();
					mw.log( "DoubleClick:: adPattern: " + _this.getConfig( 'adPattern' ) + " on index: " + adIndex );
					if ( adIndex === 'A' ) {
						// Managed bindings
						_this.addManagedBinding();
					}
				} else {
					// No defined ad pattern always use managed bindings
					_this.addManagedBinding();
				}
				// Issue the callback to continue player build out:
				callback();
			}, function( errorCode ){
				mw.log( "Error::DoubleClick Loading Error: " + errorCode );
				// Don't add any bindings directly issue callback:
				callback();
			});
			var restoreOnInit = function(){
				_this.destroy();
			}
			$( _this.embedPlayer ).data( 'doubleClickRestore',restoreOnInit );

		},
		handleCuePoints: function(){
			var _this = this;
			$( this.embedPlayer ).bind('VidiunSupport_AdOpportunity', function( event, cuePointWrapper ) {
				if( cuePointWrapper.cuePoint.protocolType == 1 && _this.adCuePoints.indexOf(cuePointWrapper.cuePoint.id) === -1 ){ // Check for  protocolType == 1 ( type = vast )
					if ( !_this.overrideCuePointWithPreRoll ) {
						_this.adTagUrl = cuePointWrapper.cuePoint.sourceUrl;
					}

					if (cuePointWrapper.cuePoint.adType == 1){ // linear video
						_this.currentAdSlotType = "midroll";
					}else{
						_this.currentAdSlotType = "overlay";
						if ( _this.getConfig("timeout") ){ // support timeout Flashvar for overlays
							setTimeout(function(){
								if ( _this.adsManager ){
									_this.adsManager.stop();
								}
							}, parseFloat( _this.getConfig("timeout") ) * 1000);
						}
					}
					_this.adCuePoints.push(cuePointWrapper.cuePoint.id);
					_this.requestAds();
				}
			});
		},
		removeAdContainer: function(){
			var $containerAd = $('#' + this.getAdContainerId() );
			if( $containerAd.length ){
				$containerAd.remove();
			}
		},
		parseAdTagUrlParts: function(embedPlayer, pluginName){
			//Handle adTagUrl separately - using postProcessConfig on the entire ad tag breaks doubleclick functionality
			var adTagUrl = embedPlayer.getRawVidiunConfig( pluginName, "adTagUrl" );
			if ( adTagUrl ) {
				try{
					//Break url to base and query string.
					var adTagUrlParts = adTagUrl.split( '?' );
					var adTagBaseUrl = adTagUrlParts[0];
					var queryStringParams = adTagUrlParts[1];
					var evaluatedQueryStringParams = "";
					if ( queryStringParams ) {
						//Break query string to key-value
						var queryStringParamsParts = queryStringParams.split( '&' );
						for ( var i = 0; i < queryStringParamsParts.length; i++ ) {
							//Break query string to key-value pair
							var equalIndex = queryStringParamsParts[i].indexOf( "=" );
							//Unescape and try to evaluate key and value
							var evaluatedKey = embedPlayer.evaluate( unescape( queryStringParamsParts[i].substr(0, equalIndex) ) );
							var evaluatedValue = embedPlayer.evaluate( unescape( queryStringParamsParts[i].substr( equalIndex + 1 ) ) );
							//Escape vvp and build evaluated query string param back. exclude cust_params.
							if (evaluatedKey != 'cust_params'){
								evaluatedQueryStringParams += escape( evaluatedKey );
								if (evaluatedValue) {
									evaluatedQueryStringParams += "=" + encodeURIComponent( evaluatedValue );
								}
								evaluatedQueryStringParams += "&";
							}else{
								this.cust_params = escape( evaluatedValue );
							}
						}
						//Build entire adTagUrl back
						evaluatedQueryStringParams = evaluatedQueryStringParams.substring(0, evaluatedQueryStringParams.length - 1);
						this.adTagUrl =  adTagBaseUrl + "?" + evaluatedQueryStringParams ;
					}else{
						this.adTagUrl = adTagUrl;
					}
				} catch (e) {
					// in case of error - fallback for fully escaped and evaluated adTagUrl string
					mw.log("failed to evaluate adTagUrl parts, using fully escaped/evaluated adTagUrl");
					var adTagUrl = embedPlayer.getVidiunConfig(pluginName);
					if ( adTagUrl ){
						this.adTagUrl = adTagUrl; // escape adTagUrl to prevent Flash string parsing error
						this.cust_params = "";
					}
				}
			}
		},
		copyFlashvarsToVDP: function(embedPlayer, pluginName){
			var flashVars = embedPlayer.getVidiunConfig(pluginName);

			this.parseAdTagUrlParts(embedPlayer, pluginName);
			//Escape adTagUrl to prevent flash string parsing error
			flashVars['adTagUrl'] = escape(this.adTagUrl);
			flashVars['cust_params'] = this.cust_params;

			//we shouldn't send these params, they are unnecessary and break the flash object
			var ignoredVars = ['path', 'customParams', 'preSequence', 'postSequence', 'postrollUrl','postrollUrlJS', 'countdownText', 'prerollUrl','prerollUrlJS' ];
			for ( var i=0; i< ignoredVars.length; i++ ) {
				delete flashVars[ignoredVars[i]];
			}
			// add player version as a Flashvar to be used in playerVersion property of ImaSdkSettings
			flashVars['playerVersion'] = mw.getConfig("version");
			embedPlayer.setVidiunConfig('vdpVars', 'doubleClick', flashVars);
			if ( this.localizationCode ){
				embedPlayer.setVidiunConfig('vdpVars', 'localizationCode', this.localizationCode);
			}
		},
		/**
		 * Get the global adPattern index:
		 */
		getAdPatternIndex:function(){
			var adPattern = this.getConfig( 'adPattern' );
			var currentAdIndex = $( this.embedPlayer ).data('DcAdPatternIndex');
			if( typeof currentAdIndex === 'undefined' ){
				currentAdIndex = 0;
			} else{
				// increment the index
				currentAdIndex++;
				// index is past adPattern length reset to 0
				if( currentAdIndex > adPattern.length -1 ){
					currentAdIndex = 0;
				}
			}
			// update add index:
			$( this.embedPlayer ).data('DcAdPatternIndex', currentAdIndex);
			// return the adPattern index:
			return adPattern[currentAdIndex];
		},
		/**
		 * Load the google IMA library:
		 */
		loadIma:function( successCB, failureCB ){
			var _this = this;
			var isLoaded = false;
			var timeoutVal = _this.getConfig("adsManagerLoadedTimeout") || 5000;
			mw.log( "DoubleClick::loadIma: start timer for adsManager loading check: " + timeoutVal + "ms");
			setTimeout(function(){
				if ( !isLoaded ){
					mw.log( "DoubleClick::loadIma: adsManager failed loading after " + timeoutVal + "ms");
					failureCB();
				}
			}, timeoutVal);

			var imaURL =  '//s0.2mdn.net/instream/html5/ima3.js';
			if ( this.getConfig( 'debugMode' ) === true ){
				imaURL =  '//s0.2mdn.net/instream/html5/ima3_debug.js';
			}
			$.getScript( imaURL , function() {
				isLoaded = true;
				successCB();
			} )
				.fail( function( jqxhr, settings, errorCode ) {
					isLoaded = true;
					failureCB( errorCode );
				} );
		},
		addManagedBinding: function(){
			var _this = this;
			mw.log( "DoubleClick::addManagedBinding" );
			_this.embedPlayer.bindHelper( 'AdSupport_preroll' + _this.bindPostfix, function( event, sequenceProxy ){
				// Add the slot to the given sequence proxy target target
				sequenceProxy[ _this.getSequenceIndex( 'preroll' ) ] = function(callback){
					_this.sequenceProxy = sequenceProxy;
					// if a preroll set it as such:
					_this.currentAdSlotType = 'preroll';
					// set flag that this ad has prerolls so playlists should pause before playback
					_this.shouldPausePlaylist = true;
					// Setup the restore callback
					_this.restorePlayerCallback = callback;
					// Request ads
					mw.log( "DoubleClick:: addManagedBinding : requestAds for preroll:" +  _this.getConfig( 'adTagUrl' )  );
					_this.requestAds();
				}
			});

			_this.embedPlayer.bindHelper( 'AdSupport_midroll' + _this.bindPostfix, function( event, sequenceProxy ){
				// Add the slot to the given sequence proxy target target
				sequenceProxy[ _this.getSequenceIndex( 'midroll' ) ] = function( callback ){
					// if a preroll set it as such:
					_this.currentAdSlotType = 'midroll';
					// Setup the restore callback
					_this.restorePlayerCallback = callback;
				}
			});
			_this.embedPlayer.bindHelper( 'AdSupport_postroll' + _this.bindPostfix, function( event, sequenceProxy ){
				// Add the slot to the given sequence proxy target target
				sequenceProxy[ _this.getSequenceIndex( 'postroll' ) ] = function( callback ){
					// if a preroll set it as such:
					_this.currentAdSlotType = 'postroll';
					// Setup the restore callback
					_this.postRollCallback = callback;
					//no need to request ads
					if ( _this.getConfig("adTagUrl") && ( _this.isLinear === false || _this.allAdsCompletedFlag || _this.adLoaderErrorFlag) ){
						_this.restorePlayer(true);
					}
				};

				//if we're in JS mode - check if we have spacific JS configuration for the postroll
				if ( !_this.isChromeless &&
					_this.getConfig("postrollUrlJS") &&
					!_this.getConfig("adTagUrl")){
					_this.contentDoneFlag = true;
					_this.adTagUrl = _this.getConfig("postrollUrlJS");
					_this.currentAdSlotType = "postroll";
					_this.requestAds("postroll");
					return;
				}
				if ( _this.getConfig("postrollUrl") && !_this.getConfig("adTagUrl") ){
					_this.contentDoneFlag = true;
					_this.adTagUrl = _this.getConfig("postrollUrl");
					_this.currentAdSlotType = "postroll";
					_this.requestAds("postroll");
				}
			});
			_this.embedPlayer.bindHelper('Vidiun_SendNotification' + this.bindPostfix, function (event, notificationName, notificationData) {
				if (_this.playingLinearAd) {
					if ( notificationName === "doPause" ) {
						_this.pauseAd(true);
					}
					if ( notificationName === "doPlay" ) {
						_this.resumeAd(true);
					}
				}
			});

			_this.embedPlayer.bindHelper('AdSupport_StartAdPlayback' + this.bindPostfix, function (event) {
				if (_this.isChromeless){
					_this.embedPlayer.getPlayerElement().sendNotification("hideContent");
				}else{
					if ( _this.embedPlayer.isVideoSiblingEnabled() && !mw.isAndroidNativeBrowser() ) {
						$(".mwEmbedPlayer").addClass("mwEmbedPlayerBlackBkg");
						_this.embedPlayer.addBlackScreen();
					}else{
						_this.embedPlayer.removePoster();
					}
				}
			});

			_this.embedPlayer.bindHelper('AdSupport_EndAdPlayback' + this.bindPostfix, function (event) {
				if (_this.isChromeless){
					_this.embedPlayer.getPlayerElement().sendNotification("showContent");
				}else{
					if ( _this.embedPlayer.isVideoSiblingEnabled() && !mw.isAndroidNativeBrowser() ) {
						$(".mwEmbedPlayer").removeClass("mwEmbedPlayerBlackBkg");
						_this.embedPlayer.removeBlackScreen();
					}else{
						_this.embedPlayer.updatePosterHTML();
					}
				}
			});
		},

		pauseAd: function (isLinear) {
			var _this = this;
			this.embedPlayer.paused = true;
			$(this.embedPlayer).trigger('onpause');
			var classes = "adCover";
			if (mw.isIE8()){
				classes += " adCoverIE8";
			}
			var adCover = $('<div class="' + classes + '"></div>').on('click', function(){
				_this.embedPlayer.hideSpinnerOncePlaying();
				_this.resumeAd(isLinear)
			});
			$(".adCover").remove();
			if (this.isChromeless){
				$(".videoDisplay").prepend(adCover);
			}else{
				$(this.getAdContainer()).append(adCover);
			}
			$(this.embedPlayer).trigger("onPlayerStateChange", ["pause", this.embedPlayer.currentState]);

			if (isLinear && !this.isNativeSDK) {
				this.embedPlayer.enablePlayControls(["scrubber","share","infoScreen","related"]);
			} else {
				_this.embedPlayer.pause();
			}

			if (_this.isChromeless) {
				_this.embedPlayer.getPlayerElement().sendNotification("pauseAd");
			} else {
				if(this.adsManager) {
					this.adsManager.pause();
				}else{
					_this.embedPlayer.getPlayerElement().pause();
				}
			}
		},

		resumeAd: function (isLinear) {
			var _this = this;
			this.embedPlayer.paused = false;
			$(".adCover").remove();
			$(this.embedPlayer).trigger("onPlayerStateChange", ["play", this.embedPlayer.currentState]);
			if (isLinear) {
				this.embedPlayer.disablePlayControls();
			} else {
				_this.embedPlayer.play();
			}

			if (_this.isChromeless) {
				_this.embedPlayer.getPlayerElement().sendNotification("resumeAd");
			} else {
				if (this.adsManager) {
					this.adsManager.resume();
				}else{
					_this.embedPlayer.getPlayerElement().resume();
				}
			}
		},

		toggleAdPlayback: function (isLinear) {
			if (this.getConfig("pauseAdOnClick") !== false) {
				if (this.embedPlayer.paused) {
					this.resumeAd(isLinear);
				} else {
					$(this.embedPlayer).trigger('adClick');
					this.pauseAd(isLinear);
				}
			}else{
				$(this.embedPlayer).trigger('adClick');
			}
		},

		/**
		 * Get the content video tag
		 */
		getContent:function(){
			// Set the content element to player element:
			var playerElement =  this.embedPlayer.getPlayerElement();
			//Load the video tag to enable setting the source by doubleClick library
			if (mw.isMobileDevice() && !this.playerElementLoaded) {
				this.playerElementLoaded = true;
				playerElement.load();
			}
			this.saveTimeWhenSwitchMedia = mw.isMobileDevice();
			return playerElement;
		},
		getAdContainer: function(){
			if( !$('#' + this.getAdContainerId() ).length ){
				this.embedPlayer.getVideoHolder().after(
					$('<div />')
						.attr( 'id',  this.getAdContainerId() )
						.css({
							'position' : 'absolute',
							'top' : '0px',
							'left' : '0px'
						})
				);
				if ( this.getConfig( 'countdownText' )){
					this.embedPlayer.getInterface().find("#"+this.getAdContainerId()).append(
						$('<span />')
							.addClass( 'ad-component ad-notice-label' )
							.css({"position": "fixed","margin-bottom": 36+"px"})
							.hide()
					)
				}
			}
			return $('#' + this.getAdContainerId() ).get(0);
		},
		getAdContainerId: function(){
			return 'adContainer' + this.embedPlayer.id;
		},
		hideAdContainer: function () {
			$("#" + this.getAdContainerId()).hide();
		},
		getAdDisplayContainer: function(){
			//  Create the ad display container. Use an existing DOM element
			//	to house the ad display container. Ideally, the element is
			//	positioned above the content video player, so the ads are
			//	displayed correctly.
			//
			if( ! this.adDisplayContainer ){
				this.adDisplayContainer = new google.ima.AdDisplayContainer(
					this.getAdContainer(),
					this.getContent()
				);
			}
			return this.adDisplayContainer;
		},
		addSkipSupport: function(){
			var _this = this;
			if ( this.embedPlayer.getRawVidiunConfig('skipBtn') && this.embedPlayer.getVideoHolder().find(".ad-skip-btn").length === 0){
				var label = "Skip Ad";
				if( this.embedPlayer.getVidiunConfig( 'skipBtn', 'label' ) ){
					label = this.embedPlayer.getVidiunConfig( 'skipBtn', 'label' );
				}
				this.embedPlayer.getVideoHolder().append(
					$('<span />')
						.text( label )
						.addClass( 'ad-component ad-skip-btn' )
						.css({"position": "absolute", "float": "right", "display": "none"})
						.on("click touchstart", function(e){
							e.stopPropagation();
							e.preventDefault();
							$( _this.embedPlayer).trigger( 'onAdSkip' );
							if ( _this.isChromeless ){
								_this.embedPlayer.getPlayerElement().sendNotification( 'skipAd' );
							}else{
								_this.adsManager.stop();
								if (_this.currentAdSlotType === "postroll" && _this.getConfig( 'adTagUrl' ) ){
									_this.restorePlayer(true);
								}
							}
							$(this).hide();
							return false;
						})
				);
				if ( this.embedPlayer.getRawVidiunConfig('skipNotice') && this.embedPlayer.getVideoHolder().find(".ad-skip-label").length === 0){
					this.embedPlayer.getVideoHolder().append(
						$('<span />')
							.addClass( 'ad-component ad-skip-label' )
							.css({"position": "absolute", "float": "right", "display": "none"})
					);
				}
			}
		},
		showSkipBtn: function(){
			if( this.embedPlayer.getVidiunConfig( 'skipBtn', 'skipOffset' ) ){
				$(".ad-skip-label").show();
				this.skipTimeoutId = setTimeout(function(){
					$(".ad-skip-btn").show();
					$(".ad-skip-label").hide();
				},parseFloat(this.embedPlayer.getVidiunConfig( 'skipBtn', 'skipOffset' ) * 1000))
			}else{
				$(".ad-skip-btn").show();
				$(".ad-skip-label").hide();
			}
		},
		hideSkipBtn: function(){
			if( this.skipTimeoutId !== null ){
				clearTimeout(this.skipTimeoutId);
				this.skipTimeoutId = null;
			}
			$(".ad-skip-btn").hide();
		},
		/**
		 * Adds custom params to ad url.
		 */
		addCustomParams: function( adUrl, cust_params ){
			var postFix = "";
			//Use cust_params if available on double click URL, otherwise opt in to use old customParams config if available
			if( !cust_params ) {
				postFix = (this.getConfig( 'customParams' )) ?
					'cust_params=' + encodeURIComponent( this.getConfig( 'customParams' ) ) : '';
			} else {
				postFix = 'cust_params=' + cust_params;
			}
			if( postFix ){
				var paramSeperator = adUrl.indexOf( '?' ) === -1 ? '?' :
						adUrl[ adUrl.length -1 ] == '&' ? '': '&';

				return unescape( adUrl ) + paramSeperator + postFix;
			} else {
				return unescape( adUrl );
			}
		},
		// note in flash this is supported as a methods on adRequest:
		// https://developers.google.com/interactive-media-ads/docs/sdks/googleflashas3_apis#AdsRequest
		// but in html5
		// we have to do this manually:
		// https://developers.google.com/interactive-media-ads/docs/sdks/googlehtml5_apis#ima.SimpleAdsRequest
		addAdRequestParams: function( adTagUrl ){
			var _this = this;
			if( adTagUrl ){
				var paramSep = adTagUrl.indexOf( '?' ) === -1 ? '?' : '&';
			}
			var adRequestMap = {
				'contentId' : 'vid',
				'cmsId' : 'cmsid'
			};
			$.each( adRequestMap, function( uiconfId, paramId ){
				if( _this.getConfig( uiconfId) ){
					adTagUrl+= paramSep + paramId + '=' + encodeURIComponent( _this.getConfig( uiconfId ) );
					paramSep = '&';
				}
			});
			return adTagUrl;
		},
		// This function requests the ads.
		requestAds: function( adType ) {
			if (!this.adTagUrl){
				if ($.isFunction(this.restorePlayerCallback))
				{
					this.restorePlayerCallback();
				}
				this.getAdDisplayContainer().initialize();
				return;
			}
			var _this = this;
			this.addSkipSupport();
			this.parseAdTagUrlParts(this.embedPlayer, this.pluginName);
			var adTagUrl = this.adTagUrl;
			var cust_params = this.cust_params;
			// Add any custom params:
			adTagUrl = _this.addCustomParams( adTagUrl, cust_params );

			// Add any adRequest mappings:
			adTagUrl = _this.addAdRequestParams( adTagUrl );

			// Update the local lastRequestedAdTagUrl for debug and audits
			_this.embedPlayer.setVDPAttribute( this.pluginName, 'requestedAdTagUrl', adTagUrl );

			// Create ad request object.
			var adsRequest = {};
			if (this.isChromeless) {
				//If chromeless then send adTagUrl escaped and cust_params separately so it will be parsed correctly
				// on the flash plugin
				adTagUrl = _this.addAdRequestParams( this.adTagUrl );
				adsRequest.adTagUrl = adTagUrl;
				adsRequest.cust_params = cust_params;
			} else {
				adsRequest.adTagUrl = adTagUrl;
			}

			mw.log( "DoubleClick::requestAds: url: " + adTagUrl );

			if( adType ){
				adsRequest['adType'] = adType;
			}
			// Set the size in the adsRequest
			var size = _this.getPlayerSize();

			adsRequest.linearAdSlotWidth = size.width;
			adsRequest.linearAdSlotHeight = size.height;

			adsRequest.nonLinearAdSlotWidth = size.width;
			adsRequest.nonLinearAdSlotHeight = size.height;

			var timeoutVal = _this.getConfig("adsManagerLoadedTimeout") || 5000;
			mw.log( "DoubleClick::requestAds: start timer for adsManager loading check: " + timeoutVal + "ms");
			this.adsManagerLoadedTimeoutId = setTimeout(function(){
				if ( !_this.adManagerLoaded ){
					mw.log( "DoubleClick::requestAds: adsManager failed loading after " + timeoutVal + "ms");
					_this.onAdError("adsManager failed loading!");
				}
			}, timeoutVal);

			// if on chromeless - reuest ads using the VDP DoubleClick plugin instead of the JS plugin
			if (this.isChromeless){
				adsRequest.adTagUrl = encodeURIComponent(adsRequest.adTagUrl);
				_this.embedPlayer.getPlayerElement().sendNotification( 'requestAds', adsRequest );
				mw.log( "DoubleClick::requestAds: Chromeless player request ad from VDP plugin");
				return;
			}

			if ( this.isNativeSDK ) {
				this.embedPlayer.getPlayerElement().attr( 'doubleClickRequestAds', this.getConfig( 'adTagUrl' ));
				mw.log( "DoubleClick::requestAds: Native SDK player request ad ");
				return;
			}

			// Make sure the  this.getAdDisplayContainer() is created as part of the initial ad request:
			this.getAdDisplayContainer().initialize();

			// Create ads loader.
			_this.adsLoader = new google.ima.AdsLoader( _this.adDisplayContainer );

			// Attach the events before making the request.
			_this.adsLoader.addEventListener(
				google.ima.AdsManagerLoadedEvent.Type.ADS_MANAGER_LOADED,
				function( event ){
					_this.onAdsManagerLoaded( event );
				},
				false);
			_this.adsLoader.addEventListener(
				google.ima.AdErrorEvent.Type.AD_ERROR,
				function(event ){
					_this.onAdError( event );
				},
				false);

			// 4. Make the request.
			try{
				_this.adsLoader.requestAds( adsRequest );
			}catch(e){
				_this.onAdError( e );
			}
		},
		// Handles the ads manager loaded event. In case of no ads, the AD_ERROR
		// event is issued and error handler is invoked.
		onAdsManagerLoaded: function( loadedEvent ) {
			var _this = this;
			mw.log( 'DoubleClick:: onAdsManagerLoaded' );

			mw.log( "DoubleClick::requestAds: clear timer for adsManager loading check");
			clearTimeout(this.adsManagerLoadedTimeoutId);
			this.adsManagerLoadedTimeoutId = null;

			// 1. Retrieve the ads manager. Regardless of ad type (video ad,
			//	overlay or ad playlist controlled by ad rules), the API is the
			//	same.
			//
			// It is required to pass in the ad display container created
			// previously and the content element, so the SDK can track content
			// and play ads automatically.
			//
			var adsRenderingSettings = new google.ima.AdsRenderingSettings();
			if (!this.getConfig("adTagUrl")){
				adsRenderingSettings.restoreCustomPlaybackStateOnAdBreakComplete = true; // for manual VAST, get the SDK to restore the player
			}
			adsRenderingSettings.useStyledNonLinearAds = true;
			this.adsManager = loadedEvent.getAdsManager( this.embedPlayer, adsRenderingSettings );
			if ( _this.adManager != null ) {
				_this.adManagerLoaded = true;
			}

			// add a global ad manager refrence:
			$( _this.embedPlayer ).data( 'doubleClickAdsMangerRef', _this.adsManager );

			// Add Ad Manager Listeners
			_this.addAdMangerListeners();

			// Add embedPlayer listeners:
			_this.addEmbedPlayerListeners();

			// Initialize the ads manager. In case of ad playlist with a preroll,
			// the preroll will start playing immediately.
			_this.adsManager.init( _this.embedPlayer.getWidth(), _this.embedPlayer.getHeight(), google.ima.ViewMode.NORMAL);
			_this.adsManager.setVolume( _this.embedPlayer.getPlayerElementVolume() );
			// Start the ad playback. For video and overlay ads, this will
			// start the ads. For automatic ad rules controller ads, this will be
			// ignored.
			mw.log( "DoubleClick::adsManager.play" );
			_this.adsManager.start();
		},
		displayCompanions: function(ad){
			if ( this.getConfig( 'disableCompanionAds' )){
				return;
			}
			if ( this.getConfig( 'htmlCompanions' )){
				var companions = this.getConfig( 'htmlCompanions').split(";");
				for (var i=0; i < companions.length; i++){
					var companionsArr = companions[i].split(":");
					if (companionsArr.length == 3){
						var companionID = companionsArr[0];
						var adSlotWidth = companionsArr[1];
						var adSlotHeight = companionsArr[2];
						var companionAds = [];

						try {
							companionAds = ad.getCompanionAds(adSlotWidth, adSlotHeight, {resourceType: google.ima.CompanionAdSelectionSettings.ResourceType.STATIC, creativeType: google.ima.CompanionAdSelectionSettings.CreativeType.IMAGE});
						} catch(e) {
							mw.log("Error: DoubleClick could not access getCompanionAds");
						}
						// match companions to targets
						if (companionAds.length > 0){
							var companionAd = companionAds[0];
							// Get HTML content from the companion ad.
							var content = companionAd.getContent();
							this.showCompanion(companionID, content);
						}
					}
				}
			}
		},
		showCompanion: function(companionID, content){
			// Check the iframe parent target:
			try{
				var targetElm = window['parent'].document.getElementById( companionID );
				if( targetElm ){
					targetElm.innerHTML = content;
				}
			} catch( e ){
				mw.log( "Error: DoubleClick could not access parent iframe" );
			}
		},
		addAdMangerListeners: function(){
			var _this = this;
			var adsListener = function( eventType, callback ){
				_this.adsManager.addEventListener(
					google.ima.AdEvent.Type[ eventType ],
					function( event ){
						mw.log( "DoubleClick::AdsEvent:" + eventType );
						if (event.type === google.ima.AdEvent.Type.STARTED) {
							// Get the ad from the event and display companions.
							_this.displayCompanions(event.getAd());
						}
						if( $.isFunction( callback ) ){
							callback( event );
						}
					},
					false
				);
			};

			// Add error listener:
			_this.adsManager.addEventListener(
				google.ima.AdErrorEvent.Type.AD_ERROR,
				function( event ){ _this.onAdError( event ) },
				false
			);
			// A flag to protect against double ad start.
			var lastAdStartTime = null;

			// Add ad listeners:
			adsListener( 'CONTENT_PAUSE_REQUESTED', function(event){
				//Save video content duration for restoring after ad playback
				var previousDuration = _this.embedPlayer.duration;
				if (_this.currentAdSlotType === 'midroll') {
					var restoreMidroll = function(){
						_this.embedPlayer.adTimeline.restorePlayer( 'midroll', true );
						//Restore video content duration after ad playback
						_this.embedPlayer.setDuration(previousDuration);
						_this.embedPlayer.addPlayerSpinner();
						if ( _this.saveTimeWhenSwitchMedia && _this.timeToReturn ) {
							//Save original onLoadedCallback
							var orgOnLoadedCallback = _this.embedPlayer.onLoadedCallback;
							//Wait for video loadedmetadata before issuing seek
							_this.embedPlayer.onLoadedCallback = function() {
								//Restore original onLoadedCallback
								_this.embedPlayer.onLoadedCallback = orgOnLoadedCallback;
								if ( _this.getConfig("adTagUrl") ){
									_this.embedPlayer.seek( _this.timeToReturn );
									_this.timeToReturn = null;
								}
							};
						}
						_this.embedPlayer.play();
						_this.embedPlayer.restorePlayerOnScreen();
						_this.embedPlayer.hideSpinner();
					};
					_this.embedPlayer.adTimeline.displaySlots( 'midroll' ,restoreMidroll);
				}
				// set a local method for true ad playback start.
				_this.startedAdPlayback = function(){
					_this.embedPlayer.adTimeline.updateUiForAdPlayback( _this.currentAdSlotType );
					_this.startedAdPlayback = null;
				};
				// loading ad:
				_this.embedPlayer.pauseLoading();
				_this.embedPlayer.stopPlayAfterSeek = true;

				if ( _this.saveTimeWhenSwitchMedia ) {
					_this.timeToReturn = _this.embedPlayer.currentTime;
				}
				// sometimes CONTENT_PAUSE_REQUESTED is the last event we receive :(
				// give double click 12 seconds to load the ad, else return to content playback
				setTimeout( function(){
					if( $.isFunction( _this.startedAdPlayback ) ){
						mw.log( " CONTENT_PAUSE_REQUESTED without no ad LOADED! ");
						// ad error will resume playback
						_this.onAdError( " CONTENT_PAUSE_REQUESTED without no ad LOADED! ");
					}
				}, 12000 );
			} );
			adsListener( 'LOADED', function(adEvent){
				var adData = adEvent.getAdData();
				if ( adData) {
					_this.isLinear = adData.linear;
				}
				var currentAdSlotType = _this.isLinear ? _this.currentAdSlotType : "overlay";
				$("#" + _this.getAdContainerId()).show();
				// dispatch adOpen event
				$( _this.embedPlayer).trigger( 'onAdOpen',[adData.adId, adData.adSystem, currentAdSlotType, adData.adPodInfo ? adData.adPodInfo.adPosition : 0] );

				// check for started ad playback sequence callback
				if( _this.startedAdPlayback ){
					_this.startedAdPlayback();
				}
				_this.duration= _this.adsManager.getRemainingTime();
				if (_this.duration >= 0) {
					_this.embedPlayer.triggerHelper( 'AdSupport_AdUpdateDuration' , _this.duration );
				}
				var size = _this.getPlayerSize();
				_this.adsManager.resize( size.width, size.height, google.ima.ViewMode.NORMAL );
				if ( _this.isLinear ) {
					// Hide player content
					_this.hideContent();
					// show the loading spinner until we start ad playback
					_this.embedPlayer.addPlayerSpinner();
					// if on iPad hide the quicktime logo:
					_this.hidePlayerOffScreen( _this.getAdContainer() );
					// show notice message
					_this.embedPlayer.getInterface().find(".ad-notice-label").text("").show();
					// Monitor ad progress
					_this.monitorAdProgress();
				} else{
					_this.embedPlayer.getInterface().find(".ad-notice-label").hide();
					_this.restorePlayer();
				}

			} );
			adsListener( 'STARTED', function(adEvent){
				var ad = adEvent.getAd();
				_this.isLinear = ad.isLinear();
				var currentAdSlotType = _this.isLinear ? _this.currentAdSlotType : "overlay";
				if( mw.isIpad() && _this.embedPlayer.getPlayerElement().paused ) {
					_this.embedPlayer.getPlayerElement().play();
				}
                var adPosition =  0;
                if ( ad.getAdPodInfo() && ad.getAdPodInfo().getAdPosition() ){ adPosition = ad.getAdPodInfo().getAdPosition(); }

                // collect POD parameters is exists (ad.getAdPodInfo().getPodIndex() exists = POD)
                var podPosition;
                var podStartTime;

                if( ad.getAdPodInfo() && ad.getAdPodInfo().getPodIndex() !== -1) {
                    podPosition = ad.getAdPodInfo().getPodIndex()+1;
                    podStartTime = ad.getAdPodInfo().getTimeOffset();
                }
                // trigger ad play event
                $(_this.embedPlayer).trigger("onAdPlay",[ad.getAdId(),ad.getAdSystem(),currentAdSlotType,adPosition,ad.getDuration(), podPosition, podStartTime]);
				// This changes player state to the relevant value ( play-state )
				$(_this.embedPlayer).trigger("playing");
				// Check for ad Stacking ( two starts in less then 250ms )
				if( lastAdStartTime !== null &&
					new Date().getTime() - lastAdStartTime < 250
					){
					mw.log("ERROR:: Stacking Ad STARTED! :" + ( lastAdStartTime - new Date().getTime() ) );
					// Not sure what we should do here:
					// 1) we can't unload manager since we have to play back the active ads
					// 2) we can't pause the ad since it could pause the really active ad
					// 3) .. all we can do is break out of event flow for player and hope, double click,
					// 		fixes this bug on their side.
					return ;
				} else{
					mw.log( 'DoubleClick:: time delta since last adStart: ' +
						( new Date().getTime() - lastAdStartTime ) );
				}
				// update the last ad start time:
				lastAdStartTime = new Date().getTime();

				// check for started ad playback sequence callback
				if( _this.startedAdPlayback ){
					_this.startedAdPlayback();
				}
				_this.adActive = true;
				if (_this.isLinear) {
					if (!ad.isSkippable()){
						_this.showSkipBtn();
					}
					_this.playingLinearAd = true;
					// hide spinner:
					_this.embedPlayer.hideSpinner();
					// make sure the player is in play state:
					_this.embedPlayer.playInterfaceUpdate();

					// hide content / show playerplayer position:
					_this.hideContent();

					if ( mw.isIOS() && _this.embedPlayer.seeking ){
						_this.embedPlayer.restorePlayerOnScreen();
					}
					// set ad playing flag:

					_this.embedPlayer.sequenceProxy.isInSequence = true;

					_this.adStartTime = new Date().getTime();
					// Update duration

					// Monitor ad progress
					_this.monitorAdProgress();

					// Send a notification to trigger associated events and update ui
					_this.embedPlayer.sendNotification('doPlay');
				}else{
					_this.embedPlayer.getInterface().find(".largePlayBtn").css(	"z-index", 1);
				}
			} );
			adsListener( 'PAUSED', function(){
				// Send a notification to trigger associated events and update ui
				_this.embedPlayer.sendNotification('doPause');
			} );

			adsListener('CLICK', function (adEvent) {
				var ad = adEvent.getAd();
				var isLinear = ad.isLinear();
				_this.toggleAdPlayback(isLinear);
			});

			adsListener( 'FIRST_QUARTILE', function(){
				// Monitor ad progress ( if for some reason we are not already monitoring )
				_this.monitorAdProgress();
			});
			adsListener( 'MIDPOINT' );
			adsListener( 'THIRD_QUARTILE' );
			adsListener( 'COMPLETE', function(adEvent){
				var ad = adEvent.getAd();
				//$(".doubleClickAd").remove();
				$(_this.embedPlayer).trigger('onAdComplete',[ad.getAdId(), mw.npt2seconds($(".currentTimeLabel").text())]);
				_this.duration= -1;
				_this.embedPlayer.getInterface().find(".largePlayBtn").css(	"z-index", "");
				_this.hideSkipBtn();
			});
			// Resume content:
			adsListener( 'CONTENT_RESUME_REQUESTED', function(){
				_this.playingLinearAd = false;
				// Update slot type, if a preroll switch to midroll
				if( _this.currentAdSlotType === 'preroll' ){
					_this.currentAdSlotType = 'midroll';
					// ( will be updated to postroll at contentDoneFlag update time )
				}
				if ( _this.currentAdSlotType != 'postroll') {
					_this.restorePlayer();

					if( mw.isIOS8_9() && mw.isIpad()  ) {
						$( _this.embedPlayer.getPlayerElement() ).attr('preload',"metadata" );
					}
				}
			});
			adsListener( 'ALL_ADS_COMPLETED', function(){
				// check that content is done before we restore the player, managed players with only pre-rolls fired
				// ALL_ADS_COMPLETED after preroll not after all ad opportunities for this content have expired.
				// set the allAdsCompletedFlag to not call restore player twice
				_this.allAdsCompletedFlag = true;
				if( _this.contentDoneFlag ){
					// restore the player but don't play content since ads are done:
					_this.restorePlayer( true );
				} else {
					_this.hideAdContainer();
				}
				_this.embedPlayer.triggerHelper( 'onAllAdsCompleted' );
			});
		},
		bindChromelessEvents: function(){
			//First check that we even have a player element to access, player will be empty in cases where we do
			//an empty player loading first and only after that we ask for entry data
			if (this.embedPlayer.getPlayerElement() !== undefined && this.embedPlayer.getPlayerElement() !== null) {
				var _this = this;
				// bind to chromeless player events
				this.embedPlayer.getPlayerElement().subscribe(function () {
					mw.log("DoubleClick:: adLoadedEvent");
					_this.adManagerLoaded = true;
				}, 'adLoadedEvent');

				this.embedPlayer.getPlayerElement().subscribe(function (adInfo) {
					mw.log("DoubleClick:: adStart");
					_this.embedPlayer.sequenceProxy.isInSequence = true;
					// set volume when ad starts to enable autoMute. TODO: remove next line once DoubleClick fix their bug when setting adsManager.volume before ad starts
					_this.embedPlayer.setPlayerElementVolume(_this.embedPlayer.volume);
					// trigger ad play event
					$(_this.embedPlayer).trigger("onAdPlay", [adInfo.adID, null, null, 0, adInfo.duration]); //index is missing =0 by now
					// This changes player state to the relevant value ( play-state )
					$(_this.embedPlayer).trigger("playing");
					$(_this.embedPlayer).trigger("onplay");
					if (_this.currentAdSlotType != _this.prevSlotType) {
						_this.embedPlayer.adTimeline.updateUiForAdPlayback(_this.currentAdSlotType);
						_this.prevSlotType = _this.currentAdSlotType;
					}
					if (adInfo.duration > 0) {
						_this.embedPlayer.triggerHelper('AdSupport_AdUpdateDuration', adInfo.duration);
					}
					if (_this.isChromeless) {
						$(".mwEmbedPlayer").hide();
					}
					if (_this.getConfig('countdownText') && _this.embedPlayer.getInterface().find(".ad-notice-label").length == 0) {
						// Add the notice target:
						_this.embedPlayer.getVideoHolder().append(
								$('<span />')
										.addClass('ad-component ad-notice-label')
						);
					}
					// Send a notification to trigger associated events and update ui
					_this.embedPlayer.paused = false;
				}, 'adStart', true);


				this.embedPlayer.getPlayerElement().subscribe(function (adInfo) {
					mw.log("DoubleClick:: adLoaded");
					_this.isLinear = adInfo.isLinear;
					if (!_this.isLinear && _this.isChromeless) {
						$(".mwEmbedPlayer").hide();
						mw.setConfig("EmbedPlayer.EnableFlashActivation", false);
					}
					var currentAdSlotType = _this.isLinear ? _this.currentAdSlotType : "overlay";
					// dispatch adOpen event
					$(_this.embedPlayer).trigger('onAdOpen', [adInfo.adID, adInfo.adSystem, currentAdSlotType, adInfo.adPosition]);
					if (!_this.isLinear) {
						_this.restorePlayer();
						setTimeout(function () {
							_this.embedPlayer.getPlayerElement().play();
						}, 250);
					} else {
						if (!adInfo.skippable) {
							_this.showSkipBtn();
						}
					}
				}, 'adLoaded', true);

				this.embedPlayer.getPlayerElement().subscribe(function (adInfo) {
					mw.log("DoubleClick:: adCompleted");
					$(_this.embedPlayer).trigger('onAdComplete', [adInfo.adID, mw.npt2seconds($(".currentTimeLabel").text())]);
					_this.hideSkipBtn();
				}, 'adCompleted', true);

				this.embedPlayer.getPlayerElement().subscribe(function (adInfo) {
					mw.log("DoubleClick:: adClicked");
					_this.toggleAdPlayback(adInfo.isLinear);
				}, 'adClicked', true);

				this.embedPlayer.getPlayerElement().subscribe(function (companionInfo) {
					mw.log("DoubleClick:: displayCompanion");
					_this.showCompanion(companionInfo.companionID, companionInfo.content);
				}, 'displayCompanion', true);

				this.embedPlayer.getPlayerElement().subscribe(function (adInfo) {
					mw.log("DoubleClick:: allAdsCompleted");
					setTimeout(function () {
						// content completed
						_this.restorePlayer(true);
					}, 0);
					if (_this.currentAdSlotType == 'postroll') {
						_this.embedPlayer.triggerHelper('AdSupport_AdUpdateDuration', _this.entryDuration);
						_this.embedPlayer.triggerHelper('timeupdate', 0);
					}
					_this.embedPlayer.triggerHelper('onAllAdsCompleted');
				}, 'allAdsCompleted', true);

				this.embedPlayer.getPlayerElement().subscribe(function (adInfo) {
					mw.log("DoubleClick:: adRemainingTimeChange");
					if (adInfo.duration > 0) {
						_this.embedPlayer.triggerHelper('AdSupport_AdUpdatePlayhead', (adInfo.duration - adInfo.remain));
						_this.embedPlayer.updatePlayHead(adInfo.time / adInfo.duration);
					}
					// Update sequence property per active ad:
					if (adInfo.remain > 0) {
						_this.embedPlayer.adTimeline.updateSequenceProxy('timeRemaining', parseInt(adInfo.remain));
					}
					if (_this.getConfig('countdownText')) {
						_this.embedPlayer.getInterface().find(".ad-notice-label").text(_this.getConfig('countdownText'));
					}
					_this.updateRemainingAdTime(adInfo.time);
				}, 'adRemainingTimeChange', true);

				this.embedPlayer.getPlayerElement().subscribe(function (adInfo) {
					mw.log("DoubleClick:: contentResumeRequested");
					_this.embedPlayer.sequenceProxy.isInSequence = false;
					if (_this.prevSlotType === "midroll") {
						_this.prevSlotType = ""; // to support multiple midrolls we must clear prevSlotType when the midroll is finished
					}
					_this.currentAdSlotType = _this.embedPlayer.adTimeline.currentAdSlotType;
					if (_this.currentAdSlotType == 'midroll') {
						setTimeout(function () {
							_this.embedPlayer.setDuration(_this.entryDuration);
							_this.embedPlayer.startMonitor();
							_this.embedPlayer.getPlayerElement().play();
						}, 250);
					}
					if (_this.currentAdSlotType !== 'postroll') {
						_this.restorePlayer(null, true);
						if (_this.currentAdSlotType === 'preroll') {
							_this.currentAdSlotType = "midroll";
						}
						if (!_this.isNativeSDK) {
							setTimeout(function () {
								_this.embedPlayer.startMonitor();
								_this.embedPlayer.getPlayerElement().play();
							}, 100);
						}
					}
					_this.playingLinearAd = false;
				}, 'contentResumeRequested', true);

				this.embedPlayer.getPlayerElement().subscribe(function (adInfo) {
					mw.log("DoubleClick:: contentPauseRequested");
					_this.entryDuration = _this.embedPlayer.getDuration();
					_this.embedPlayer.stopMonitor();
					_this.playingLinearAd = true;
				}, 'contentPauseRequested', true);

				this.embedPlayer.getPlayerElement().subscribe(function (adInfo) {
					mw.log("DoubleClick:: adsLoadError");
					setTimeout(function () {
						_this.embedPlayer.hideSpinner();
						_this.adLoaderErrorFlag = true;
						$(_this.embedPlayer).trigger("adErrorEvent");
						_this.restorePlayer();
					}, 100);
				}, 'adsLoadError', true);
			}
		},

		getPlayerSize: function(){
			return {
				'width': this.embedPlayer.getVideoHolder().width(),
				'height': this.embedPlayer.getVideoHolder().height()
			};
		},
		hideContent: function(){
			mw.log("DoubleClick:: hide Content / show Ads");
			var _this = this;
			// show the ad container:
			$( this.getAdContainer() ).css({
				'top' : 0,
				'left' : 0
			});
			if( this.adsManager && this.adsManager.resize ){
				var size = this.getPlayerSize();
				this.adsManager.resize(
					size.width, size.height, google.ima.ViewMode.NORMAL
				);
			}
		},
		/**
		 * iPad displays a quicktime logo while loading, this helps hide that
		 */
		hidePlayerOffScreen:function(target){
			$( target ).css({
				'position' : 'absolute',
				'left': '-4048px'
			});
		},
		addEmbedPlayerListeners: function(){
			var _this = this;
			var embedPlayer = this.embedPlayer;

			embedPlayer.bindHelper( 'updateLayout' + this.bindPostfix, function() {
				if( _this.adActive ){
					var size = _this.getPlayerSize();
					mw.log( "DoubleClick::onResizePlayer: size:" + size.width + ' x ' + size.height );
					// Resize the ad manager on player resize: ( no support for animate )
					_this.adsManager.resize( size.width, size.height, google.ima.ViewMode.NORMAL );
				}
			});

			embedPlayer.bindHelper( 'volumeChanged' + this.bindPostfix, function(event, percent){
				if( _this.adActive ){
					mw.log("DoubleClick::volumeChanged:" + percent );
					_this.adsManager.setVolume( percent );
				}
			});

			embedPlayer.bindHelper( 'ended' + this.bindPostfix, function(event){
				if (!_this.contentDoneFlag) {
					mw.log( "DoubleClick::playbackComplete:" );
					_this.contentDoneFlag = true;
					_this.adsLoader.contentComplete();
					_this.embedPlayer._propagateEvents = false;
				}
				if (!_this.getConfig("adTagUrl") && !_this.getConfig("postrollUrl")){
					_this.currentAdSlotType = "postroll";
					_this.restorePlayer(true);
				}

			});


			/**
			 * Handle any send notification events:
			 */

			embedPlayer.bindHelper( 'Vidiun_SendNotification' + this.bindPostfix, function(event, notificationName, notificationData){
				// Only take local api actions if in an Ad.
				if( _this.adActive ){
					mw.log("DoubleClick:: sendNotification: " + notificationName );
					switch( notificationName ){
						case 'doPause':
							_this.adPaused = true;
							_this.adsManager.pause();
							embedPlayer.paused = true;
							$( embedPlayer ).trigger( 'onpause' );
							$( embedPlayer ).trigger( "onPlayerStateChange", ["pause", embedPlayer.currentState] );
							break;
						case 'doPlay':
							_this.adPaused = false;
							_this.adsManager.resume();
							embedPlayer.paused = false;
							$( embedPlayer ).trigger( 'onplay' );
							$( embedPlayer ).trigger( "onPlayerStateChange", ["play", embedPlayer.currentState] );
							_this.monitorAdProgress();
							break;
						case 'doStop':
							_this.adsManager.stop();
							_this.adActive = false;
							_this.embedPlayer.sequenceProxy.isInSequence = false;
							_this.embedPlayer.stop();
							break;
					}
				}
			});
		},
		monitorAdProgress: function(){
			var _this = this;
			// Keep monitoring ad progress at MonitorRate as long as ad is playing:
			if( !this.adMonitor ){
				this.adMonitor = setInterval( function(){
					_this.doMonitorAdProgress();
				}, mw.getConfig( 'EmbedPlayer.MonitorRate' ) );
			}
		},
		doMonitorAdProgress: function(){
			var _this = this;
			// check if we are still playing an ad:
			if( !_this.adActive ){
				// update 'timeRemaining' and duration for no-ad )
				_this.embedPlayer.adTimeline.updateSequenceProxy( 'timeRemaining',  null );
				_this.embedPlayer.adTimeline.updateSequenceProxy( 'duration', null );
				clearInterval( this.adMonitor );
				this.adMonitor = 0;
				return ;
			}
			// make sure we are not displaying the loading spinner:
			_this.embedPlayer.hideSpinner();

			// update the adPreviousTimeLeft
			_this.adPreviousTimeLeft = _this.adsManager.getRemainingTime();

			// Update sequence property per active ad:
			if (_this.adsManager.getRemainingTime()<0){
				return;
			}
			_this.embedPlayer.adTimeline.updateSequenceProxy( 'timeRemaining',  _this.adsManager.getRemainingTime() );
			if (_this.adsManager.getRemainingTime() > 0){
				_this.embedPlayer.adTimeline.updateSequenceProxy( 'timeRemaining',  parseInt(_this.adsManager.getRemainingTime()) );
			}
			if (_this.duration === -1){
				_this.duration = _this.adsManager.getRemainingTime();
			}  else {
				var currentTime = _this.duration - _this.adsManager.getRemainingTime();
				if (currentTime >=0){
					_this.embedPlayer.adTimeline.updateSequenceProxy( 'duration',  _this.duration );
					_this.embedPlayer.triggerHelper( 'AdSupport_AdUpdatePlayhead',  currentTime);
					_this.embedPlayer.updatePlayHead( currentTime/ _this.duration );
				}
			}
			if (_this.getConfig('countdownText')){
				this.embedPlayer.getInterface().find(".ad-notice-label").text(_this.getConfig('countdownText'));
			}
			_this.updateRemainingAdTime(_this.duration - _this.adsManager.getRemainingTime());
		},

		updateRemainingAdTime: function(remainTime){
			if ( this.embedPlayer.getInterface().find(".ad-skip-label").length ){
				var offsetRemaining = Math.max(Math.ceil(parseFloat(this.embedPlayer.getVidiunConfig( 'skipBtn', 'skipOffset' )) - remainTime), 0);
				this.embedPlayer.adTimeline.updateSequenceProxy( 'skipOffsetRemaining', offsetRemaining );
				this.embedPlayer.getInterface().find(".ad-skip-label").text(this.embedPlayer.evaluate( this.embedPlayer.getRawVidiunConfig('skipNotice','text')) );
			}
		},
		// Handler for various ad errors.
		onAdError: function( errorEvent ) {
			var errorMsg = ( typeof errorEvent.getError != 'undefined' ) ? errorEvent.getError() : errorEvent;
			mw.log('DoubleClick:: onAdError: ' + errorMsg );
			if (!this.adLoaderErrorFlag){
				$( this.embedPlayer ).trigger("adErrorEvent");
				this.adLoaderErrorFlag = true;
			}
			if (this.adsManager && $.isFunction( this.adsManager.unload ) ) {
				this.adsManager.unload();
			}
			if (this.embedPlayer.sequenceProxy.isInSequence){
				this.restorePlayer(this.contentDoneFlag);
			}
		},
		restorePlayer: function( onContentComplete, adPlayed ){
			if (this.isdestroy && this.getConfig("adTagUrl")){ // DFP trafficed and already destroyed
				return;
			}
			mw.log("DoubleClick::restorePlayer: content complete:" + onContentComplete);
			var _this = this;
			this.adActive = false;
			if (this.isChromeless){
				if (_this.isLinear || _this.adLoaderErrorFlag){
					$(".mwEmbedPlayer").show();
				}
				this.embedPlayer.getInterface().find(".ad-notice-label").remove();
				this.embedPlayer.getPlayerElement().redrawObject(50);
			}else{
				if (_this.isLinear || _this.adLoaderErrorFlag){
					_this.hideAdContainer();
				}
			}
			this.embedPlayer.sequenceProxy.isInSequence = false;

			// Check for sequence proxy style restore:
			if( $.isFunction( this.restorePlayerCallback ) && !onContentComplete ){
				// also do the normal restore ( will issue an async play call )
				var shouldContinue = !onContentComplete;
				this.restorePlayerCallback(shouldContinue);
				this.restorePlayerCallback = null;
			} else { // do a manual restore:
				// restore player with normal events:
				this.embedPlayer.adTimeline.restorePlayer( null, adPlayed);
				this.embedPlayer.setDuration(this.embedPlayer.duration);
				// managed complete ... call clip done if content complete.
				if( onContentComplete ){
					if (_this.postRollCallback){
						_this.postRollCallback();
					}
					this.isdestroy = true;
					this.destroy();

				} else {
					if ( _this.saveTimeWhenSwitchMedia ) {
						_this.embedPlayer.seek(_this.timeToReturn);
						_this.timeToReturn = null;
					}

					this.embedPlayer.play();
				}
			}
			if( _this.adClickEvent ) {
				$(window).unbind(_this.adClickEvent);
			} else if( _this.isAdClickTimeoutEnabled ) {
				_this.isAdClickTimeoutEnabled = false;
			}
		},
		/**
		 * TODO should be provided by the generic ad plugin class.
		 */
		getConfig: function( attrName ){
			// always get the config from the embedPlayer so that is up-to-date
			return this.embedPlayer.getVidiunConfig( this.pluginName, attrName );
		},
		destroy:function(){
			// remove any old bindings:
			var _this = this;
			if ( this.getConfig("adTagUrl") || this.currentAdSlotType === "postroll" ){
				this.embedPlayer.unbindHelper( this.bindPostfix );
			}
			if (!this.isChromeless){
				if ( this.getConfig("adTagUrl") && this.playingLinearAd ) {
					this.restorePlayer(true);
				}
				setTimeout(function(){
					_this.removeAdContainer();
					if ( _this.adsLoader ) {
						_this.adsLoader.destroy();
					}
				},100);
			}else{
				if ( !this.isLinear ){
					this.embedPlayer.getPlayerElement().sendNotification( 'destroy' );
				}
			}
			this.contentDoneFlag = false;
		}
	};

})( window.mw, jQuery);

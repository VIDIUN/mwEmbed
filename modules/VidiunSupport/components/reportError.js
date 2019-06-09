( function( mw, $ ) {"use strict";

	mw.PluginManager.add( 'reportError', mw.VBasePlugin.extend({
		vClient: null,
		didSeek: false,

		setup: function() {
			var _this = this;
			var embedPlayer = this.getPlayer();
			this.vClient = mw.vApiGetPartnerClient( embedPlayer.vwidgetid );

			this.bind( 'playerReady', function() {
				_this.didSeek = false;
			});

			this.bind( 'seeking', function() {
				_this.didSeek = true;
			});

			this.bind( 'embedPlayerError', function ( e, data ) {
				var resourceUrl = undefined;
				if ( embedPlayer.mediaElement && embedPlayer.mediaElement.selectedSource ) {
					resourceUrl = embedPlayer.mediaElement.selectedSource.getSrc();
				}

				var currentTime = $.isFunction(embedPlayer.getPlayerElement().currentTime) ?
					embedPlayer.getPlayerElement().currentTime() : embedPlayer.getPlayerElement().currentTime;

				var msgParams = [];
				msgParams[ 'pid' ] = embedPlayer.vpartnerid;
				msgParams[ 'uiconfId' ] = embedPlayer.vuiconfid;
				msgParams[ 'referrer' ] = window.vWidgetSupport.getHostPageUrl();
				msgParams[ 'didSeek' ] = _this.didSeek;
				msgParams[ 'resourceUrl' ] = resourceUrl;
				msgParams[ 'userAgent' ] = navigator.userAgent;
				msgParams[ 'playerCurrentTime' ] = currentTime;
				msgParams[ 'playerLib' ] = embedPlayer.selectedPlayer.library;
				msgParams[ 'streamerType' ] = embedPlayer.streamerType;
				//add params from data argument
				if ( data ) {
					for( var param in data){
						msgParams[ param ] = data[ param ];
					}
				}
				//translate params to errorMessage String
				var errorMessage = "";
				for( var i in msgParams ){
					errorMessage += i + ' : ' + msgParams[ i ] + " | ";
				}

				var eventRequest = { 'service' : 'stats', 'action' : 'reportError', errorCode: 'mediaError' };
				eventRequest[ 'errorMessage' ] = errorMessage;

				_this.vClient.doRequest( eventRequest );
			});
		}
	}));

} )( window.mw, window.jQuery );
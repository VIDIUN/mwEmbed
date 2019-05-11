( function( mw, $ ) {"use strict";

	mw.PluginManager.add( 'download', mw.VBaseComponent.extend({

		defaultConfig: {
			align: "right",
			"parent": mw.isMobileDevice() ? 'topBarContainer' : 'controlsContainer',
			smartContainer: 'morePlugins',
			smartContainerCloseEvent: 'downloadMedia',
			displayImportance: "low",
			downloadName: '{mediaProxy.entry.name}',
			showTooltip: true,
			preferredBitrate: '',
			flavorID: '',
			title: gM('mwe-embedplayer-download_clip'),
		 	order: 53
		},
		isSafeEnviornment: function(){
			return !mw.isIOS();
		},
		setup: function(){
			var _this = this;
			this.bind( 'downloadMedia', function() {
				_this.downloadMedia();
			});
		},
		downloadMedia: function() {
			var vs =  this.getVidiunClient().getVs();
			var downloadUrl = mw.getMwEmbedPath() + '/modules/VidiunSupport/download.php/wid/';
				downloadUrl += this.getPlayer().vwidgetid + '/uiconf_id/' + this.getPlayer().vuiconfid;
				downloadUrl += '/entry_id/' + this.getPlayer().ventryid + '?forceDownload=true';
				downloadUrl += '&downloadName=' + encodeURIComponent(this.getConfig('downloadName'));
				if( this.getConfig('flavorParamsId') ){
					downloadUrl += '&flavorParamsId=' + encodeURIComponent( this.getConfig('flavorParamsId') );
				}
				if ( this.getConfig( 'preferredBitrate' ) != '' && this.getConfig( 'preferredBitrate' ) != null ){
					downloadUrl += '&preferredBitrate=' + encodeURIComponent( this.getConfig( 'preferredBitrate' ));
				}
			    if ( this.getConfig( 'flavorID' ) != '' && this.getConfig( 'flavorID' ) != null ){
					downloadUrl += '&flavorID=' + encodeURIComponent( this.getConfig( 'flavorID' ));
				}

				if( vs ){
					downloadUrl += '&vs=' + vs;
				}
			
			window.open( downloadUrl );
		},
		getComponent: function() {
			var _this = this;
			if( !this.$el ) {
				this.$el = $( '<button />' )
							.attr( 'title', this.getConfig('title') )
							.addClass( "btn icon-download" + this.getCssClass() )
							.click( function() {
								if( _this.isDisabled ) return ;
								_this.getPlayer().triggerHelper('downloadMedia');
							});
			}
			return this.$el;
		}
	}));

} )( window.mw, window.jQuery );

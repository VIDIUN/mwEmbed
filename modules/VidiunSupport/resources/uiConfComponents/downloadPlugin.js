( function( mw, $ ) {"use strict";

	mw.PluginManager.add( 'download', mw.VBaseComponent.extend({

		defaultConfig: {
			align: "right",
			parent: "controlsContainer",
			displayImportance: "low",
			downloadName:"video",
			showTooltip: true,
			preferredBitrate: '',
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
			var downloadUrl = mw.getMwEmbedPath() + '/modules/VidiunSupport/download.php/wid/';
				downloadUrl += this.getPlayer().vwidgetid + '/uiconf_id/' + this.getPlayer().vuiconfid;
				downloadUrl += '/entry_id/' + this.getPlayer().ventryid + '?forceDownload=true';
				downloadUrl += '&downloadName=' + encodeURIComponent(this.getConfig('downloadName'));
				if ( this.getConfig( 'preferredBitrate' ) != '' && this.getConfig( 'preferredBitrate' ) != null ){
					downloadUrl += '&preferredBitrate=' + encodeURIComponent( this.getConfig( 'preferredBitrate' ));
				}
				downloadUrl += '&vs=' + this.getPlayer().getFlashvars('vs');
				
			window.open( downloadUrl );
		},
		getComponent: function() {
			var _this = this;
			if( !this.$el ) {
				this.$el = $( '<button />' )
							.attr( 'title', 'Download Media' )
							.addClass( "btn icon-download" + this.getCssClass() )
							.click( function() {
								_this.getPlayer().triggerHelper('downloadMedia');
							});
			}
			return this.$el;
		}
	}));

} )( window.mw, window.jQuery );
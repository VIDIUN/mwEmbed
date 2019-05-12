( function( mw, $ ) {"use strict";

    mw.PluginManager.add( 'vgitGuard', mw.VBasePlugin.extend({

        defaultConfig: {
            "guardText": "Using non production player"
        },

        setup: function() {
            this.proxyPosterMethods();
        },
        isSafeEnviornment: function(){
            var hostPageUrl = window.vWidgetSupport.getHostPageUrl();
            var loaderPath = vWidget.getPath();
            return ((hostPageUrl.indexOf("kgit.html5video.org") === -1) &&
                    (hostPageUrl.indexOf("player.vidiun.com") === -1) &&
                    (loaderPath.indexOf("kgit.html5video.org") !== -1));
        },
        proxyPosterMethods: function(){
            var _this = this;
            var orig_updatePosterHTML = this.embedPlayer.updatePosterHTML;
            this.embedPlayer.updatePosterHTML = function(){
                orig_updatePosterHTML.call(this);
                _this.addGuard();
            };

            var orig_addBlackScreen = this.embedPlayer.addBlackScreen;
            this.embedPlayer.addBlackScreen = function(){
                orig_addBlackScreen.call(this);
                _this.addGuard();
            };
        },
        addGuard: function(){
            $(this.embedPlayer).append('<div class="guard-ribbon-wrapper"><div class="guard-ribbon">'+this.getConfig("guardText")+'</div></div>');
        }
    }));

} )( window.mw, window.jQuery );
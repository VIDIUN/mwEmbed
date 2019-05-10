(function (mw, $) {
    "use strict";

    var tvpapiAPI = mw.VBasePlugin.extend( {

        setup: function ( ) {
            this.addBindings();
        },

        getProxyConfig: function( attr, raw ) {
            if( raw ){
                return this.embedPlayer.getRawVidiunConfig( "proxyData", attr );
            }
            return this.embedPlayer.getVidiunConfig( "proxyData", attr );
        },
        setProxyConfig: function( attr, value ) {
            this.embedPlayer.setVidiunConfig("proxyData", attr, value);
        },

        addBindings: function () {
            var _this = this;
            this.bind("renewTvpapiToken", function(event, token){
                _this.renewTvpapiToken(token);
            });
        },
        renewTvpapiToken: function(token){
            var initObj = this.getProxyConfig("initObj");
            initObj.Token = token;
            this.setProxyConfig("initObj", initObj);
        }
    });
    mw.PluginManager.add( 'tvpapiAPI', tvpapiAPI);
})(window.mw, window.jQuery);

/**
 * comScore Streaming Analytics loader
 */
(function (mw) {
    "use strict";

    mw.PluginManager.add('comScoreStreamingTag', mw.VBasePlugin.extend({
        setup: function () {
            this.vidiunComScoreSTAPlugin = new mw.VidiunComScoreSTAPlugin(this);
        },

        destroy: function () {
            this.vidiunComScoreSTAPlugin.destroy();
        }
    }));

})(window.mw);

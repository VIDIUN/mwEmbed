/**
 * Created by einatr on 6/8/15.
 */
(function(mw, $) {
    'use strict';

    $.extend(VidiunHeartbeatPluginDelegate.prototype, ADB.va.plugins.ah.AdobeHeartbeatPluginDelegate.prototype);

    function VidiunHeartbeatPluginDelegate() {
    }

    VidiunHeartbeatPluginDelegate.prototype.onError = function(errorInfo) {
        console.log("AdobeHeartbeatPlugin error: " + errorInfo.getMessage() + " | " + errorInfo.getDetails());
    };

    // Export symbols.
    window.VidiunHeartbeatPluginDelegate = VidiunHeartbeatPluginDelegate;
})(window.mw, window.jQuery);
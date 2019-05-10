/**
 * Created by einatr on 6/8/15.
 */
(function(mw, $) {
    'use strict';
    $.extend(VidiunAdobeAnalyticsPluginDelegate.prototype, ADB.va.plugins.aa.AdobeAnalyticsPluginDelegate.prototype);

    function VidiunAdobeAnalyticsPluginDelegate() {
    }

    VidiunAdobeAnalyticsPluginDelegate.prototype.onError = function(errorInfo) {
        mw.log("HeartBeat plugin :: AdobeAnalyticsPlugin error: " + errorInfo.getMessage() + " | " + errorInfo.getDetails());
    };

    // Export symbols.
    window.VidiunAdobeAnalyticsPluginDelegate = VidiunAdobeAnalyticsPluginDelegate;
})(window.mw, window.jQuery);
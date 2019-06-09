/**
 * Created by einatr on 6/8/15.
 */
(function(mw, $) {
    'use strict';

    $.extend(VidiunHeartbeatDelegate.prototype, ADB.va.HeartbeatDelegate.prototype);

    function VidiunHeartbeatDelegate() {
    }

    VidiunHeartbeatDelegate.prototype.onError = function(errorInfo) {
        mw.log("HeartBeat plugin ::  HeartbeatDelegate error: " + errorInfo.getMessage() + " | " + errorInfo.getDetails());
    };

    // Export symbols.
    window.VidiunHeartbeatDelegate = VidiunHeartbeatDelegate;
})(window.mw, window.jQuery);

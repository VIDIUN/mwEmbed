/**
* Handles segment plugin support
*/
( function( mw, $ ) { "use strict";

	mw.PluginManager.add( 'segmentScrubber', mw.VBasePlugin.extend({
		setup: function(){
			var _this = this;
			this.bind('playerReady', function(){
				_this.updateTimeOffsets();
			});
			this.bind('Vidiun_SetVDPAttribute', function(e, componentName, property){
				if( componentName == "mediaProxy" &&
					( property == 'mediaPlayFrom' || property =='mediaPlayTo' ) ){
					_this.updateTimeOffsets();
				}
			});
		},
		updateTimeOffsets: function(){
			var player = this.getPlayer();
			var stopEvent = 'doStop.segmentScrubber';
			var timeIn = player.startTime;
			var timeOut = player.pauseTime;
			player.startTime = timeIn;
			player.startOffset = timeIn;
			player.setDuration( timeOut - timeIn );
			// always retain startTime ( even at stops )
			player.unbindHelper(stopEvent).bindHelper(stopEvent, function(){
				player.startTime = parseFloat( timeIn );
			});
		}
	}));

})( window.mw, jQuery );
( function( mw, $ ) { "use strict";

mw.addVidiunPlugin( [ "mw.AdTimeline", "mw.VAds" ], "vast", function( embedPlayer, callback){
	embedPlayer.vAds = new mw.VAds( embedPlayer, function(){
		mw.log( "AdPlugin: Done loading ads, run callback" );
		// Wait until ads are loaded before running callback
		// ( We don't want to display the player until ads are ready )
		callback();
	});
});

})( window.mw, jQuery );

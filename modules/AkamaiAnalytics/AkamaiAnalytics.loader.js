( function( mw, $ ) { "use strict";

mw.addVidiunPlugin( ['mw.AkamaiMediaAnalytics'], 'akamaiMediaAnalytics', function( embedPlayer, callback ){
	embedPlayer.akamaiMediaAnalytics = new mw.AkamaiMediaAnalytics( embedPlayer, callback );
});

} )( window.mw, window.jQuery );
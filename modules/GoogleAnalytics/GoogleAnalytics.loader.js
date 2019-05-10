( function( mw, $ ) { "use strict";

mw.addVidiunPlugin( ['mw.GoogleAnalytics'], 'googleAnalytics', function( embedPlayer, callback ){
	embedPlayer.googleAnalytics = new mw.GoogleAnalytics( embedPlayer, callback );
});

} )( window.mw, window.jQuery );
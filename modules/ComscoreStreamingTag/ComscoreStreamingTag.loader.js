/**
 * ComscoreStreamingTag loader
 */
( function( mw ) { "use strict";
	mw.addVidiunPlugin( ["ComScoreStreamingTag"], 'comScoreStreamingTag', function( embedPlayer, callback ){
		new mw.ComscoreStreamingTag( embedPlayer, callback );
	});
})( window.mw);

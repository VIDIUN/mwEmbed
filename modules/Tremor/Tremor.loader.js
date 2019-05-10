( function( mw, $ ) { "use strict";

	mw.addVidiunPlugin( ['mw.Tremor'], 'tremor', function( embedPlayer, callback){
		embedPlayer.tremor = new mw.Tremor( embedPlayer, callback );
	});

} )( window.mw, window.jQuery );
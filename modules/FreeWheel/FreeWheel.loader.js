
( function( mw, $ ) { "use strict";

mw.addVidiunPlugin( ['mw.FreeWheel'], 'FreeWheel', function( embedPlayer, callback){
	embedPlayer.freeWheel = new mw.FreeWheelController( embedPlayer, callback );
});

} )( window.mw, window.jQuery );
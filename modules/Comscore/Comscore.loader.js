/**
 * Comscore loader
 */
( function( mw ) { "use strict";

mw.addVidiunPlugin( ["mw.Comscore"], 'comscore', function( embedPlayer, callback ){
	new mw.Comscore( embedPlayer, callback );
});


})( window.mw);

( function( mw, $ ) { "use strict";

mw.addVidiunPlugin( ["mw.NielsenCombined"], 'nielsenCombined', function( embedPlayer, callback) {
	new mw.NielsenCombined( embedPlayer, callback );
});

})( window.mw, window.jQuery);
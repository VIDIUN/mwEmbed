/**
* Handles access control preview code
*/
( function( mw, $ ) { "use strict";

var acCheck = function( embedPlayer ){
	var ac  = embedPlayer.vidiunContextData;
	// TODO move getAccessControlStatus to local method
	var acStatus = vWidgetSupport.getAccessControlStatus( ac, embedPlayer );
	if( acStatus !== true ){
		embedPlayer.setError( acStatus );
		return ;
	}
};

//Check for new Embed Player events:
mw.addVidiunConfCheck( function( embedPlayer, callback ){
	if( embedPlayer.vidiunContextData ){
		acCheck( embedPlayer );
	}
	callback();
});

})( window.mw, jQuery );
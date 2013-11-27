/**
* Handles access control preview code
*/
( function( mw, $ ) { "use strict";

var acCheck = function( embedPlayer ){
	var ac  = embedPlayer.kalturaContextData;
	// TODO move getAccessControlStatus to local method
	var acStatus = kWidgetSupport.getAccessControlStatus( ac, embedPlayer );
	if( acStatus !== true ){
		embedPlayer.setError( acStatus );
		return ;
	}
};

//Check for new Embed Player events:
mw.addKalturaConfCheck( function( embedPlayer, callback ){
	if( embedPlayer.kalturaContextData ){
		acCheck( embedPlayer );
	}
	callback();
});

})( window.mw, jQuery );
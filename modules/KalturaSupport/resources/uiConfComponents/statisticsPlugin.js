/**
 * <Plugin id="statistics" width="0%" height="0%" includeInLayout="false"/>
 *
 *	@dependencies
 *		mw.VAnalytics
 */
( function( mw, $ ) { "use strict";
	mw.addVidiunPlugin(  "statistics", function( embedPlayer, callback){
		mw.addVAnalytics( embedPlayer );
		callback();
	});

})( window.mw, window.jQuery );

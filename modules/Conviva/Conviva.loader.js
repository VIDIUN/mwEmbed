/**
* Conviva loader
*/

( function( mw, $ ) { "use strict";

	mw.addVidiunConfCheck( function(embedPlayer, callback ) {
		// Disable Conviva with IE9
		if( mw.isIE9() ) {
			callback();
			return;
		}
		if( embedPlayer.isPluginEnabled ( 'Conviva' ) ) {
			var config = embedPlayer.getVidiunConfig( 'Conviva', [ 'convivaVidiunHTML5Lib', 'convivaAjaxTimeout', 'convivaCustomerId', 'convivaServiceUrl' ] );

			var initParameter = function( parameter, defaultValue ) {
				if ( ! config[ parameter ] ) {
					if ( defaultValue ) {
						config[ parameter ] = defaultValue;
						return true;
					}
					return false;
				}
				return true;
			}

			// Check for required and set default config parameters
			var isError = false;

			// Initialize optional config parameters whith default values if not present explicitly
			initParameter( 'convivaAjaxTimeout', 1000 ); // default to 1 second unless explicitly set

			if ( ! initParameter( 'convivaVidiunHTML5Lib' ) ) {
				isError = true;
				mw.log( 'Conviva: Error: "Conviva.convivaVidiunHTML5Lib" is a required parameter!' );
			}
			if ( ! initParameter( 'convivaCustomerId' ) ) {
				isError = true;
				mw.log( 'Conviva: Error: "Conviva.convivaCustomerId" is a required parameter!' );
			}
			if ( ! initParameter( 'convivaServiceUrl' ) ) {
				isError = true;
				mw.log( 'Conviva: Error: "Conviva.convivaServiceUrl" is a required parameter!' );
			}

			// If required parameters are missing continue with the player build out
			if ( isError ) {
				callback();
				return;
			}
			/*
			mw.load('mw.Conviva', function(){
				new mw.Conviva( embedPlayer, callback, config );
			});
			 */


			$.ajax({
				type: "GET",
				url: config[ 'convivaVidiunHTML5Lib' ],
				dataType: 'script',
				timeout: config[ 'convivaAjaxTimeout' ],
				success: function() {
					new mw.Conviva( embedPlayer, callback, config );
				},
				error: function() {
					mw.log( 'Conviva: Error: convivaVidiunHTML5Lib failed to load or timed out!');
					// proceed if Conviva's lib fails to load or times out
					callback();
			   }
			});
			return;

		}

		// don't block player build out if Coviva module is not enabled
		callback();
	});

})( window.mw, jQuery );
/**
 * vSupport module
 *
 * Add support for vidiun api calls
 *
 * TODO this loader is a little too large portions should be refactored into separate files
 *  this refactor can happen post rl_17 resource loader support
 */
// Scope everything in "mw" ( keeps the global namespace clean )
( function( mw, $ ) { "use strict";

	// Add Vidiun specific attributes to the embedPlayer
	$( mw ).bind( 'MwEmbedSupportReady', function(){
		mw.mergeConfig( 'EmbedPlayer.Attributes', {
			'kentryid' : null, // mediaProxy.entry.id
			'kwidgetid' : null,
			'kuiconfid' : null,
			'referenceId': null,
			// helps emulate the kdp behavior of not updating currentTime until a seek is complete.
			'kPreSeekTime': null,
			// Kaltura player Metadata exported across the iframe
			'kalturaPlayerMetaData' : null,
			'kalturaEntryMetaData' : null,
			'kalturaPlaylistData' : null,
			'playerConfig': null,
			'rawCuePoints' : null
		});

		mw.mergeConfig( 'EmbedPlayer.SourceAttributes', [
			'data-flavorid'
		]);
	});
	
	mw.vidiunPluginWrapper = function( callback ){
		$(mw).bind('ProcessEmbedPlayers', callback );
	};
	
	/**
	 * Base utility functions
	 */
	mw.addVidiunConfCheck = function( callback ){
		$( mw ).bind( 'EmbedPlayerNewPlayer', function(event, embedPlayer){
			$( embedPlayer ).bind( 'Vidiun_CheckConfig', function( event, embedPlayer, checkUiCallback ){
				callback( embedPlayer, checkUiCallback );
			})
		} );
	};

	/**
	 * Abstracts the base vidiun plugin initialization
	 *
	 * @param depencies {Array} optional set of dependencies ( can also be set via php )
	 * @param pluginName {String} the unique plugin name per the uiConf / uiVars
	 * @param enabledCallback {function} the function called for a initialized plugin
	 */
	mw.addVidiunPlugin = function( dependencies, pluginName, initCallback ){
		// Handle optional dependencies
		if( ! $.isArray( dependencies ) ){
			initCallback = pluginName;
			pluginName = dependencies;
			dependencies = null;
		}

		mw.addVidiunConfCheck( function( embedPlayer, callback ){
			if( embedPlayer.isPluginEnabled( pluginName ) ){
				if( $.isArray( dependencies ) ){
					mw.load(dependencies, function(){
						initCallback(  embedPlayer, callback );
					})
				} else {
					initCallback(  embedPlayer, callback );
				}
			} else {
				callback();
			}
		});
	}

	// Make sure vWidget is part of EmbedPlayer dependencies if we have a uiConf id
	$( mw ).bind( 'EmbedPlayerUpdateDependencies', function( event, playerElement, dependencySet ){
		if( mw.getConfig( 'VidiunSupport.DepModuleList') ){
			$.merge( dependencySet,  mw.getConfig( 'VidiunSupport.DepModuleList') );
		}
		if( $( playerElement ).attr( 'vwidgetid' ) && $( playerElement ).attr( 'vuiconfid' ) ){
			dependencySet.push( 'mw.VWidgetSupport' );
		}
	});

	// Make sure flashvars and player config are ready as soon as we create a new player
	$( mw ).bind( 'EmbedPlayerNewPlayer', function(event, embedPlayer){
		if( mw.getConfig( 'VidiunSupport.PlayerConfig' ) ){
			embedPlayer.playerConfig =  mw.getConfig( 'VidiunSupport.PlayerConfig' );
			mw.setConfig('VidiunSupport.PlayerConfig', null );
		}
		// player config should be set before calling VidiunSupportNewPlayer
		$( mw ).trigger( 'VidiunSupportNewPlayer',  [ embedPlayer ] );
	});

	// Set binding to disable "waitForMeta" for vidiun items ( We get size and length from api)
	$( mw ).bind( 'EmbedPlayerWaitForMetaCheck', function(even, playerElement ){
		if( $( playerElement ).attr( 'vuiconfid') || $( playerElement ).attr( 'ventryid') ){
			playerElement.waitForMeta = false;
		}
	});


} )( window.mw, window.jQuery );

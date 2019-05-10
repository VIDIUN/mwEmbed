/**
 * Adds uiConf based playlist support
 *
 * @dependencies
 * 		"mw.EmbedPlayer", "mw.Playlist",
 * 		'mw.PlaylistHandlerVidiun',
		'mw.PlaylistHandlerVidiunRss',
		'mw.VLayout'
 */
( function( mw, $ ) { "use strict";

// Setup the Playlist source handler binding:
$( mw ).bind( "PlaylistGetSourceHandler", function( event, playlist ){
	var $playlistTarget = $( '#' + playlist.id );
	var embedPlayer = playlist.embedPlayer;
	var vplUrl0, vpl0Id, playlistConfig;

	// Check if we are dealing with a vidiun player:
	if( !embedPlayer  ){
		mw.log("Error: playlist source handler without embedPlayer");
	} else {
		playlistConfig = {
			'uiconf_id' : embedPlayer.vuiconfid,
			'widget_id' : embedPlayer.vwidgetid
		};
		vplUrl0 = embedPlayer.getVidiunConfig( 'playlistAPI', 'vpl0Url' );
		if( vplUrl0 ) {
			vplUrl0 = decodeURIComponent( vplUrl0 );
		}

		vpl0Id = embedPlayer.getVidiunConfig( 'playlistAPI', 'vpl0Id' );
	}
	// No vpl0Url, not a vidiun playlist
	if( !vplUrl0 && !vpl0Id ){
		return ;
	}

	// get first item key in vidiunPlaylistData
	var playlistId;
	if( embedPlayer.vidiunPlaylistData ) {
		for (playlistId in embedPlayer.vidiunPlaylistData) break;
	}

	var plId = vpl0Id || new mw.Uri ( vplUrl0 ).query['playlist_id'];
	// If the url has a partner_id and executeplaylist in its url assume its a "vidiun services playlist"
	if( (embedPlayer.vidiunPlaylistData ) || 
		plId || vplUrl0.indexOf('executeplaylist') != -1 ){
		playlistConfig.playlist_id = plId;
		playlist.sourceHandler = new mw.PlaylistHandlerVidiun( playlist, playlistConfig );
		return ;
	}

	mw.log("Error playlist source not found");
});

// Check for vidiun playlist:
mw.addVidiunConfCheck(function( embedPlayer, callback ) {
	// Special iframe playlist target:
	var $playerInterface = embedPlayer.getInterface();
	
	// Check if playlist is enabled and that its not already built for this player:
	if( embedPlayer.isPluginEnabled( 'playlistAPI' )
			&&
			// check for vpl0Url or vpl0Id, don't init empty playlist
			(
					embedPlayer.getVidiunConfig( 'playlistAPI', 'vpl0Url' )
					||
					embedPlayer.getVidiunConfig( 'playlistAPI', 'vpl0Id' )
			)
			&&
		// check for activatedPlaylist
		!$( '.playlistInterface' ).hasClass( 'activatedPlaylist' )
	){
		var $uiConf = embedPlayer.$uiConf;
		var layout;
		// Check ui-conf for horizontal or vertical playlist
		// we know if the playlist is vertical or horizontal based on the parent element of the #playlist
		// vbox - vertical | hbox - horizontal
		if( $uiConf.find('#playlistHolder').length ){
			layout = ( parseInt( $uiConf.find('#playlistHolder').attr('width') ) != 100 ) ?
						'horizontal' :
						'vertical';
		} else {
			mw.log("Error:: could not determine playlist layout type ( use target size ) ");
			layout = ( $playerInterface.width() < $playerInterface.height() )
				? 'vertical' : 'horizontal';
		}

		// Add layout to container class
		if( ! embedPlayer.isPluginEnabled( 'related' ) ) {
			$playerInterface.addClass( layout );
		}
		var $playlistInterface = $playerInterface.parent( '.playlistInterface');
		if( !$playlistInterface.length ){
			$playlistInterface = $playerInterface.wrap(
					$( '<div />' )
						.addClass('playlistInterface')
						.css({
							'position': 'relative',
							'width': '100%',
							'height': '100%'
						})
				).parent();
		}
		$playlistInterface
		.addClass('activatedPlaylist')
		.playlist({
			'layout': layout,
			'embedPlayer' : embedPlayer
		})
		// add the playlist activated tag:
		callback();
	} else {
		// if playlist is not enabled continue player build out
		callback();
	}
});

})( window.mw, jQuery );
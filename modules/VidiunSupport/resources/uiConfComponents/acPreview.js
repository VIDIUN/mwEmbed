/**
* Handles access control preview code
*/
( function( mw, $ ) { "use strict";

var acPreview = function( embedPlayer ){
	/**
	 * Trigger an access control preview dialog
	 */
	function acEndPreview(){
		mw.log( 'VWidgetSupport:: acEndPreview >' );
		$( embedPlayer ).trigger( 'VidiunSupport_FreePreviewEnd' );
		// Don't run normal onend action:
		mw.log( 'VWidgetSupport:: VidiunSupport_FreePreviewEnd set onDoneInterfaceFlag = false' );
		embedPlayer.onDoneInterfaceFlag = false;
		var closeAcMessage = function(){
			$( embedPlayer ).unbind( '.acpreview' );
			embedPlayer.layoutBuilder.closeMenuOverlay();
			embedPlayer.onClipDone();
		};
		// On change media reset acPreview binding
		$( embedPlayer ).bind( 'onChangeMedia.acpreview', closeAcMessage );
		// Display player dialog
		// TODO i8ln!!
		// TODO migrate to displayAlert call
		if( embedPlayer.getVidiunConfig('', 'disableAlerts' ) !== true ){
			embedPlayer.layoutBuilder.displayMenuOverlay(
				$('<div />').append(
					$('<h3 />').append( embedPlayer.getVidiunMsg('FREE_PREVIEW_END_TITLE') ),
					$('<span />').text( embedPlayer.getVidiunMsg('FREE_PREVIEW_END') ),
					$('<br />'),$('<br />'),
					$('<button />').attr({'type' : "button"})
					.addClass( "ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" )
					.append(
						$('<span />').addClass( "ui-button-text" )
						.text( 'Ok' )
						.css('margin', '10')
					).click( closeAcMessage )
				), closeAcMessage
			);
		}
	};
	// clear out any old bindings:
	$(embedPlayer).unbind( '.acPreview' );

	var ac  = embedPlayer.vidiunContextData;
	// Check for preview access control and add special onEnd binding:
	if( ac.isAdmin === false && ac.isSessionRestricted === true && ac.previewLength && ac.previewLength != -1 ){
		$( embedPlayer ).bind('postEnded.acPreview', function(){
			acEndPreview( embedPlayer );
		});
		// sometimes content does not have a content end at ac preview end time:
		$( embedPlayer ).bind( 'monitorEvent.acPreview', function(){
			if( embedPlayer.currentTime >= ac.previewLength ){
				// Stop content and show preview dialog:
				embedPlayer.stop();
				if ( mw.isIOS() ) {
					embedPlayer.getPlayerElement().webkitExitFullScreen();
				}
				acEndPreview( embedPlayer );
			}
		});
	}
};

//Check for new Embed Player events:
mw.addVidiunConfCheck( function( embedPlayer, callback ){
	if( embedPlayer.vidiunContextData ){
		acPreview( embedPlayer );
	}
	callback();
});

})( window.mw, jQuery );
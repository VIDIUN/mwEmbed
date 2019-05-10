vWidget.addReadyCallback( function( playerId ){
	var vdp = document.getElementById(playerId);
	var addOnce = false;
	var genClipListId = 'v-clipList-' + playerId;
	// remove any old genClipListId:
	$('#' + genClipListId ).remove();

	function getClipListTarget(){
		// check for generated id:
		if( $('#' + genClipListId ).length ){
			return  $('#' + genClipListId );
		}
		var clipListId = vdp.evaluate('{playlistOnPage.clipListTargetId}' );
		if( clipListId == "null" ){
			clipListId = null;
		}
		// check for clip target:
		if( clipListId && $('#' + clipListId ).length ){
			return  $('#' + clipListId)
		}
		// Generate a new clip target ( if none was found )
		return $('<div />').attr('id', genClipListId ).insertAfter(  $( '#' + playerId ) )
	}
	function activateEntry( activeEntryId ){
		var $carousel = getClipListTarget().find( '.v-carousel' );
		// highlight the active clip ( make sure only one clip is highlighted )
		var $clipList = getClipListTarget().find( 'ul li' );
		if( $clipList.length && activeEntryId ){
			$clipList.each( function( inx, clipLi ){
				// vdp moves entryId to .entryId in playlist data provider ( not a db mapping )
				var entryMeta =  $( clipLi ).data( 'entryMeta' );
				var clipEntryId = entryMeta.entryId || entryMeta.id;
				if( clipEntryId == activeEntryId ){
					$( clipLi ).addClass( 'v-active' ).data( 'activeEntry', true );

					// scroll to the target entry ( if not already shown ):
					if( inx == 0 || getClipListTarget().find('ul').width() > getClipListTarget().width() ){
						$carousel[0].jCarouselLiteGo( inx );
					}
				} else {
					$( clipLi ).removeClass( 'v-active' ).data('activeEntry', false)
				}
			});
		}
	}
	vdp.vBind( "changeMedia.onPagePlaylist", function( clip ){
		activateEntry( clip.entryId );
	});
	
	vdp.vBind( "mediaReady.onPagePlaylist", function(){
		if( addOnce ){
			return ;
		}
		var clipListId = vdp.evaluate('{playlistOnPage.clipListTargetId}' );
		if( clipListId == "null" ){
			clipListId = null;
		}
		addOnce = true;
		var playlistObject = vdp.evaluate("{playlistAPI.dataProvider}");
		if( !playlistObject || !playlistObject.content ){
			vWidget.log("Error:: playlistOnPage: no playlist object found");
			// no sense in building out playlist if it does not exist: 
			return ;
		}
		// check for a target
		$clipListTarget = getClipListTarget();
		// Add a base style class:
		$clipListTarget.addClass( 'vWidget-clip-list' );

		// add layout mode:
		var layoutMode = vdp.evaluate( '{playlistOnPage.layoutMode}' ) || 'horizontal';
		$clipListTarget.addClass( 'v-' + layoutMode );

		// get the thumbWidth:
		var thumbWidth =  vdp.evaluate('{playlistOnPage.thumbWidth}') || '110';
		// standard 3x4 box ratio:
		var thumbHeight = thumbWidth*.75;

		// calculate how many clips should be visible per size and cliplist Width
		var clipsVisible = null;
		var liSize = {};
		
		// check layout mode:
		var isVertical = ( layoutMode == 'vertical' );
		if( isVertical ){
			// Give player height if dynamically added:
			if( !clipListId ){
				// if adding in after the player make sure the player is float left so
				// the playlist shows up after:
				$(vdp).css('float', 'left');
				$clipListTarget
				.css( {
					'float' : 'left',
					'height' : $( vdp ).height() + 'px',
					'width' : $( vdp ).width() + 'px'
				});
			}

			clipsVisible = Math.floor( $clipListTarget.height() / ( parseInt( thumbHeight ) + 4 ) );
			liSize ={
				'width' : '100%',
				'height': thumbHeight
			};
		} else {
			// horizontal layout
			// Give it player width if dynamically added:
			if( !clipListId ){
				$clipListTarget.css({
					'width' : $( vdp ).width() + 'px',
					'height' : thumbHeight
				});
			}
			clipsVisible = Math.floor( $clipListTarget.width() / ( parseInt( thumbWidth ) + 4 ) );
			liSize = {
				'width': thumbWidth,
				'height': thumbHeight
			};
		}
		
		var $clipsUl = $('<ul>').css({
			"height": '100%'
		})
		.appendTo( $clipListTarget )
		.wrap(
			$( '<div />' ).addClass('v-carousel')
		)
		
		//var cat = vdp.evaluate('{playlistOnPage.thumbWidth}');
		// append all the clips
		$.each( playlistObject.content, function( inx, clip ){
			$clipsUl.append(
				$('<li />')
				.css( liSize )
				.data( {
					'entryMeta': clip,
					'index' : inx
				})
				.append(
					$('<img />')
					.attr({
						'src' : clip.thumbnailUrl + '/width/' + thumbWidth
					}),
					$('<div />')
					.addClass( 'v-clip-desc' )
					.append(
						$('<h3 />')
						.addClass( 'v-title' )
						.text( clip.name ),

						$('<p />')
						.addClass( 'v-description' )
						.text( ( clip.description == null ) ? '': clip.description )
					)
				)
				.click(function(){
					vdp.setVDPAttribute("playlistAPI.dataProvider", "selectedIndex", inx );
				}).hover(function(){
					$( this ).addClass( 'v-active' );
				},
				function(){
					// only remove if not the active entry:
					if( !$( this ).data( 'activeEntry' ) ){
						$( this ).removeClass( 'v-active' );
					}
				})
			)
		});

		// Add scroll buttons
		$clipListTarget.prepend(
			$( '<a />' )
			.addClass( "v-scroll v-prev" )
		)
		$clipListTarget.append(
			$( '<a />' )
			.addClass( "v-scroll v-next" )
		)
		// don't show more clips then we have available 
		if( clipsVisible > playlistObject.content.length ){
			clipsVisible = playlistObject.content.length;
		}
		
		// Add scrolling carousel to clip list ( once dom sizes are up-to-date )
		$clipListTarget.find( '.v-carousel' ).jCarouselLite({
			btnNext: ".v-next",
			btnPrev: ".v-prev",
			visible: clipsVisible,
			mouseWheel: true,
			circular: false,
			vertical: isVertical
		});
		// test if v-carousel is too large for scroll buttons:
		if( !isVertical && $clipListTarget.find( '.v-carousel' ).width() > $clipListTarget.width() - 40 ){
			$clipListTarget.find( '.v-carousel' ).css('width',
				$clipListTarget.width() - 40
			)
		}

		// sort ul elements:
		$clipsUl.find('li').sortElements(function(a, b){
			return $(a).data('index') > $(b).data('index') ? 1 : -1;
		});

		// activate entry:
		activateEntry(  vdp.evaluate( '{mediaProxy.entry.id}' ) );
	});
});
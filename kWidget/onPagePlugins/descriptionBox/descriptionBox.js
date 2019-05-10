vWidget.addReadyCallback( function( playerId ){
	var vdp = document.getElementById( playerId );
	// Shortcut to get config:
	var gc = function( attr ){
		return vdp.evaluate('{descriptionBox.' + attr + '}' );
	}
	
	var addDescriptionBox = function(){
		var descriptionTitle	= gc( 'descriptionLabel') || vdp.evaluate('{mediaProxy.entry.name}');
		// check for target:
		var boxTargetID = gc( 'boxTargetId' ) || 'descriptionBox_' + playerId;

		// if no box target ( remove )
		if( ! gc( 'boxTargetId' ) || gc( 'boxTargetId' ) == "null" ){
			$( '#' + boxTargetID ).remove();
		}
		// Add box target if missing from page:
		if( !$('#' + boxTargetID ).length ){
			var $descBox = $("<div>")
				.attr("id", boxTargetID )
				.css({
					"height" : gc( 'boxHeight' ),
					'width' : gc( 'boxWidth' ) || null
				})
				// for easy per site theme add vWidget class:
				.addClass('vWidget-descriptionBox');
			// check for where it should be appended:
			switch( gc('boxLocation') ){
				case 'before':
					$(vdp)
						.css( 'float', 'none')
						.before( $descBox );
				break;
				case 'left':
					$descBox.css('float', 'left').insertBefore(vdp);
					$(vdp).css('float', 'left');
				break;
				case 'right':
					$descBox.css('float', 'left').insertAfter( vdp );
					$(vdp).css('float', 'left' );
				break;
				case 'after':
				default:
					$(vdp)
						.css( 'float', 'none')
						.after( $descBox );
				break;
			};
		}
		// Empty any old description box
		$( '#' + boxTargetID )
			.empty()
			.append(
				$( "<h2>" ).text( descriptionTitle ),
				$( "<p>" ).html( vdp.evaluate('{mediaProxy.entry.description}') )
			)
	}
	window['descriptionBoxMediaReady'] = function(){
		addDescriptionBox();
	};
	vdp.addJsListener( "mediaReady", "descriptionBoxMediaReady" );
});
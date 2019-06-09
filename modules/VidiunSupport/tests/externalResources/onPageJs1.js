if( console && console.log )
	console.log( 'OnPageJs 1' );
VWidget.addReadyCallback( function( playerId ){
	if( console && console.log )
		console.log( 'OnPageJs 1: ' + playerId );
});
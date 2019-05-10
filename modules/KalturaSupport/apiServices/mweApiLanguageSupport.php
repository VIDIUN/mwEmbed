<?php
/**
* This file enables slow javascript response for testing blocking scripts relative to player embeds
*/
$wgMwEmbedApiServices['languageSupport'] = 'mweLanguageSupport';

class mweLanguageSupport {
	function run(){
		global $coreLanguageNames, $messages;
		// get the list of language names
		require_once( dirname( __FILE__ ) . '/../../../includes/languages/Names.php' );
		// get all the message supported in embedPlayer
		include( dirname( __FILE__ ) . '/../../EmbedPlayer/EmbedPlayer.i18n.php' );
		$embedPlayerMessages = $messages;
		
		// get all the messages supported in VidiunSupport:
		include( dirname( __FILE__ ) . '/../VidiunSupport.i18n.php' );
		$vMessages = $messages;

		// sort language keys A-Z: 
		vsort( $coreLanguageNames );
		$messageSupport = array();
		// build support list array: 
		foreach( $coreLanguageNames as $key => $name){
			$support = 'none';
			if( isset( $embedPlayerMessages[$key]) ){
				$support = 'partial';
			} 
			if( isset( $vMessages[ $key ] ) ){
				$support = 'full';
			}
			$messageSupport[$key] = array( 
				'name' => $name,
				'support'=> $support
			);
		}
		echo json_encode($messageSupport);
	}
}
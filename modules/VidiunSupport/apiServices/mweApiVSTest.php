<?php
/**
* This file enables slow javascript response for testing blocking scripts relative to player embeds
*/
$wgMwEmbedApiServices['VSTest'] = 'mweApiVSTest';

// Include the vidiun client
require_once( dirname( __FILE__ ) . '../../Client/VidiunClientHelper.php' );

class mweApiVSTest {
	function run(){
		global $wgVidiunAdminSecret;
		// validate params ( hard coded to test a particular test file / account )
		if( !isset( $_REQUEST['wid'] ) ||  $_REQUEST['wid'] != '_243342' ){
			$this->outputError( 'bad widget param');
		}
		$this->partnerId = '243342';
		if( !isset( $_REQUEST['entry_id'] ) || $_REQUEST['entry_id'] != '1_20x0ca3l' ){
			$this->outputError( 'bad entry_id param');
		}
		$this->entryId = '1_20x0ca3l';
		
		// load library and get vs for given entry:
		if( !isset( $wgVidiunAdminSecret ) || ( $wgVidiunAdminSecret == null ) ) {
			$this->outputError( 'no admin vs configured');
		}
	
		$client = $this->getClient();
		$vs = $client->session->start ( $wgVidiunAdminSecret, 
				$_SERVER['REMOTE_ADDR'], 
				VidiunSessionType::ADMIN, 
				$this->partnerId, 
				null, 
				"sview:{$this->entryId}"
			);
		header( 'Content-type: text/javascript');
		echo json_encode(array('vs' => $vs ) );
	}
	function getClient(){
		$conf = new VidiunConfiguration( $this->partnerId );
		$conf->serviceUrl = $this->getServiceConfig( 'ServiceUrl' );
		$conf->serviceBase = $this->getServiceConfig( 'ServiceBase' );
		return new VidiunClient( $conf );
	}
	function getServiceConfig( $name ){
		switch( $name ){
			case 'ServiceUrl' : 
				global $wgVidiunServiceUrl;
				return $wgVidiunServiceUrl;
				break;
			case 'ServiceBase':
				global $wgVidiunServiceBase;
				return $wgVidiunServiceBase;
				break;
		}
	}
	function outputError( $msg ){
		header( 'Content-type: text/javascript');
		echo json_encode(array( 'error' => $msg  ) );
		exit(1);
	}
};
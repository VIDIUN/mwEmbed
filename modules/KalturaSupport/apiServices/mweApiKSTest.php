<?php
/**
* This demonstrates grabbing a admin VS for a particular action ( sview ) being granted to the current user / session.
*/
$wgMwEmbedApiServices['VSTest'] = 'mweApiVSTest';

// Include the vidiun client
require_once( dirname( __FILE__ ) . '../../Client/VidiunClientHelper.php' );

class mweApiVSTest {
	function run(){
		global $wgVidiunUserSecret;
		// validate params ( hard coded to test a particular test file / account )
		if( !isset( $_REQUEST['wid'] ) ||  $_REQUEST['wid'] != '_243342' ){
			$this->outputError( 'bad widget param');
		}
		$this->partnerId = '243342';

		if( !isset( $_REQUEST['entry_id'] ) ){
			$this->outputError( 'bad entry_id param');
		}
		$this->entryId = $_REQUEST['entry_id'];

		// load library and get vs for given entry:
		if( !isset( $wgVidiunUserSecret ) || ( $wgVidiunUserSecret == null ) ) {
			$this->outputError( 'no user vs configured');
		}
	
		$client = $this->getClient();
		$vs = $client->session->start ( $wgVidiunUserSecret, 
				$_SERVER['REMOTE_ADDR'], 
				VidiunSessionType::USER, 
				$this->partnerId, 
				3600, // expire in one hour
				"sview:{$this->entryId}" // give permision to "view" the entry
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
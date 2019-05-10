<?php

// Include the vidiun client
require_once(  dirname( __FILE__ ) . '/vidiun_client_v3/VidiunClient.php' );
// Include the vidiun named multi request helper class: 
require_once(  dirname( __FILE__ ) . '/VidiunNamedMultiRequest.php');

class VidiunClientHelper {

	private $options = array();
	var $vs = null;
	var $client = null;
	
	function __construct( $options ) {
		$this->options = $options;
		$this->client = $this->getClient();
	}

	private function getOption( $key ) {
		if( isset($this->options[ $key ] ) ) {
			return $this->options[ $key ];
		}
		return null;
	}

	function getClient() {

		// Check if client already exists
		if( ! $this->client ) {
			$conf = new VidiunConfiguration( null );

			$conf->serviceUrl = $this->getOption('ServiceUrl');
			$conf->serviceBase = $this->getOption( 'ServiceBase' );
			$conf->clientTag = $this->getOption('ClientTag');
			$conf->curlTimeout = $this->getOption('ServiceTimeout');
			$conf->userAgent = $this->getOption('UserAgent');
			$conf->verifySSL = false;
			$conf->requestHeaders = $this->getOption('RequestHeaders');

			if( $this->getOption('Method') ) {
				$conf->method = $this->getOption('Method');
			}

			if( $this->getOption('Logger') ) {
				$conf->setLogger( $this->getOption('Logger') );
			}
			
			$this->client = new VidiunClient( $conf );

			if( $this->getOption('VS') ) {
				$this->setVS( $this->getOption('VS') );
			} else if( $this->getOption('WidgetId') ) {
				$this->generateVS( $this->getOption('WidgetId') );
			}
		}

		return $this->client;		
	}

	public function generateVS( $widgetId ) {
		try{
			$session = $this->getClient()->session->startWidgetSession( $widgetId );
			$this->partnerId = $session->partnerId;
		} catch ( Exception $e ){
			throw new Exception( VIDIUN_GENERIC_SERVER_ERROR . "\n" . $e->getMessage() );
		}
		// Save VS to the client
		$this->setVS( $session->vs );
		return $session;
	}

	public function setVS( $vs = null ) {
		if( $vs ) {
			$this->vs = $vs;
			$this->getClient()->setVS( $vs ) ;
		}
	}

	public function getVS() {
		if( ! $this->client ) 
			$this->getClient();
		
		return ($this->vs) ? $this->vs : null;
	}
}
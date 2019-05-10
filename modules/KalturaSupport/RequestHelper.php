<?php

class RequestHelper {

	var $vs = null;
	var $noCache = false;
	var $debug = false;
	var $utility = null;

	/**
	 * Variables set by the Frame request:
	 */
	public $urlParameters = array(
		'cache_st' => null,
		'p' => null,
		'partner_id' => null,
		'wid' => null,
		'uiconf_id' => null,
		'entry_id' => null,
		'flashvars' => null,
		'playlist_id' => null,
		'urid' => null,
		// Custom service url properties ( only used when wgVidiunAllowIframeRemoteService is set to true ) 
		'ServiceUrl'=> null,
		'ServiceBase'=>null,
		'CdnUrl'=> null,
		'UseManifestUrls' => null,
		'vs' => null,
		'debug' => null,
		// for thumbnails
		'width' => null,
		'height'=> null,
		'playerId' => null,
		'vid_sec' => null,
		'vid_slices' => null,
		'inlineScript' => null
	);


	function __construct( $utility ){
		if(!$utility)
			throw new Exception("Error missing utility object");

		$this->utility = $utility;
		//parse input:
		$this->parseRequest();
		// Set VS if available in URL parameter or flashvar
		$this->setVSIfExists();
	}

	// Parse the embedFrame request and sanitize input
	private function parseRequest(){
		global $wgEnableScriptDebug, $wgVidiunUseAppleAdaptive,
				$wgVidiunPartnerDisableAppleAdaptive;
		// Support /key/value path request:
		if( isset( $_SERVER['PATH_INFO'] ) ){
			$urlParts = explode( '/', $_SERVER['PATH_INFO'] );
			foreach( $urlParts as $inx => $urlPart ){
				foreach( $this->urlParameters as $attributeKey => $na){
					if( $urlPart == $attributeKey && isset( $urlParts[$inx+1] ) ){
						$_REQUEST[ $attributeKey ] = $urlParts[$inx+1];
					}
				}
			}
		}

		// TODO refactor this parameter sanitation  
		foreach( $this->urlParameters as $attributeKey => $na){
			if( isset( $_REQUEST[ $attributeKey ] ) ){
				// set the url parameter and don't let any html in:
				$this->urlParameters[ $attributeKey ] = $_REQUEST[ $attributeKey ];
			}
		}
		
		// support CORS for IE9 and lower
		global $HTTP_RAW_POST_DATA;
		if ( count($_POST) == 0 && count( $HTTP_RAW_POST_DATA) > 0 ){
			parse_str($HTTP_RAW_POST_DATA, (
					html_entity_decode(
					preg_replace("/%u([0-9a-f]{3,4})/i", "&#x\\1;",
								urldecode($HTTP_RAW_POST_DATA)
							),
						null,
						'UTF-8')
					));
			foreach( $data as $k => $v){
				$this->urlParameters[ $k ] = $v;
			}
		}

		// string to boolean  
		foreach( $this->urlParameters as $k=>$v){
			if( $v == 'false'){
				$this->urlParameters[$k] = false;
			}
			if( $v == 'true' ){
				$this->urlParameters[$k] = true;
			}
		}
		
		if( isset( $this->urlParameters['p'] ) && !isset( $this->urlParameters['wid'] ) ){
			$this->urlParameters['wid'] = '_' . $this->urlParameters['p'];  
		}

		if( isset( $this->urlParameters['partner_id'] ) && !isset( $this->urlParameters['wid'] ) ){
			$this->urlParameters['wid'] = '_' . $this->urlParameters['partner_id'];  
		}		
			
		// Check for debug flag
		if( isset( $_REQUEST['debug'] ) ){
			$this->debug = true;
			$wgEnableScriptDebug = true;
		}

		// Check for no cache flag
		if( isset( $_REQUEST['nocache'] ) && $_REQUEST['nocache'] == 'true' ) {
			$this->noCache = true;
		}

		// Check for required config
		if( $this->urlParameters['wid'] == null ){
			//throw new Exception( 'Can not display player, missing widget id' );
		}
	}

	function get( $name = null ) {
		if( $name && isset( $this->urlParameters[ $name ] ) ) {
			return $this->urlParameters[ $name ];
		}
		return null;
	}

	function set( $key = null, $val = null ) {
		if( $key && $val ) {
			$this->urlParameters[ $key ] = $val;
			return true;
		}
		return false;
	}

	function getServiceConfig( $name ){
		global $wgVidiunAllowIframeRemoteService;
		
		// Check if we allow URL override: 
		if(( $wgVidiunAllowIframeRemoteService == true ) || $this->isEmbedServicesEnabled()){
			// Check for urlParameters
			if( $this->get( $name ) ){
				return $this->get( $name );
			}
		}
		
		// Else use the global config: 
		switch( $name ){
			case 'ServiceUrl' : 
				global $wgVidiunServiceUrl;
				return $wgVidiunServiceUrl;
				break;
			case 'ServiceBase':
				global $wgVidiunServiceBase;
				return $wgVidiunServiceBase;
				break;
			case 'CdnUrl':
				global $wgVidiunCDNUrl;
				return $wgVidiunCDNUrl;
				break;
			case 'UseManifestUrls':
				global $wgVidiunUseManifestUrls;
				return $wgVidiunUseManifestUrls;
				break;
		}
	}

	function isEmbedServicesEnabled(){
	    global $wgEnableVidiunEmbedServicesRouting, $wgVidiunAuthEmbedServicesDomains;
	    if ($wgEnableVidiunEmbedServicesRouting){
	        return true;
	    } else {
	        return false;
        }
	}

	function isEmbedServicesRequest(){
	    $proxyData = $this->getFlashVars("proxyData");
        return (isset($proxyData) && !empty($proxyData));
    }

	function getEmbedServicesRequest(){
	    return $this->getFlashVars("proxyData");
	}

	public function getUserAgent() {
		return isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
	}

	public function getReferer(){
		global $wgVidiunForceReferer;
		if( $wgVidiunForceReferer !== false ){
			return $wgVidiunForceReferer;
		}
		if( isset( $_SERVER['HTTP_REFERER'] ) ){
			$urlParts = parse_url( $_SERVER['HTTP_REFERER'] );
			if (isset( $urlParts['scheme'] ) &&  isset( $urlParts['host']) ) {
				return $urlParts['scheme'] . "://" . $urlParts['host'] . "/";
			}
		}
		return 'http://www.vidiun.com/';
	}

	// Check if private IP
	private function isIpPrivate($ip){
		$privateRanges = array(
			'10.0.0.0|10.255.255.255',
			'172.16.0.0|172.31.255.255',
			'192.168.0.0|192.168.255.255',
			'169.254.0.0|169.254.255.255',
			'127.0.0.0|127.255.255.255',
		);

		$longIp = ip2long($ip);
		if ($longIp && $longIp != -1)
		{
			foreach ($privateRanges as $range)
			{
				list($start, $end) = explode('|', $range);
				if ($longIp >= ip2long($start) && $longIp <= ip2long($end)) {
					return true;
				}
			}
		}

		return false;
	}

	// Get the first real IP
	private function getRealIP( $headerIPs ){
		$remote_addr = null;
		$headerIPs = trim( $headerIPs, ',' );
		$headerIPs = explode(',', $headerIPs);
		foreach( $headerIPs as $ip ) {
			// ignore any string after the ip address
			preg_match('/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/', trim($ip), $matches); 
			if (!isset($matches[0]))
				continue;

 			$tempAddr = trim($matches[0]);
 			if ($this->isIpPrivate($tempAddr))	// verify that ip is not from a private range
 				continue;

 			$remote_addr = $tempAddr;
 			break;
		}
		return $remote_addr;
	}

	public function getRemoteAddrHeader(){
		global $wgVidiunRemoteAddressSalt, $wgVidiunForceIP;
		if( $wgVidiunRemoteAddressSalt === false ){
			return '';
		}
		$ip = null;
		// Check for x-forward-for and x-real-ip headers 
		$requestHeaders = getallheaders(); 
		if( isset( $requestHeaders['X-Forwarded-For'] ) ){
			$ip = $this->getRealIP( $requestHeaders['X-Forwarded-For'] );
		}
		// Check for x-real-ip
		if( !$ip && isset( $requestHeaders['X-Real-IP'] ) ){
			// also trim any white space
			list( $ip ) = explode( ',', $requestHeaders['X-Real-IP'] );
		}
		if( !$ip ){
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		if( $wgVidiunForceIP ){
			$ip = $wgVidiunForceIP;
		}
		// make sure there is no white space
		$ip = trim( $ip );
		$s = $ip . "," . time() . "," . microtime( true );
		return "X-VIDIUN-REMOTE-ADDR: " . $s . ',' . md5( $s . "," . $wgVidiunRemoteAddressSalt );
	}

	public function getCacheSt(){
		return ( $this->get('cache_st') ) ? $this->get('cache_st') : '';
	}
	public function getUiConfId(){
		return $this->get('uiconf_id');
	}
	public function getWidgetId() {
		return $this->get('wid');
	}
	public function getEntryId(){
		return $this->get('entry_id');
	}
	public function getReferenceId() {
		if ( $this->getFlashVars('referenceId') ) {
			return $this->getFlashVars('referenceId');
		}
		return false;
	}
	/**
	 * getFlashVars
	 * returns flashVars from the request
	 * If no key passed, return the entire flashVars array
	 */
	public function getFlashVars( $key = null, $default = null ) {
		if( $this->get('flashvars') ) {
			$flashVars = $this->get('flashvars');
			if( ! is_null( $key ) ) {
				if(is_array($flashVars) && isset($flashVars[$key]) ) {
					return $this->utility->formatString($flashVars[$key]);
				} else {
					return $default;
				}
			}
			return is_array($flashVars) ? $flashVars : array();
		}
		return (!is_null($key)) ? $default : array();
	}

	private function setVSIfExists() {
		$vs = null;
		if( $this->getFlashVars('vs') ) {
			$vs = $this->getFlashVars('vs');
		} else if( $this->get('vs') ) {
			$vs = $this->get('vs');
		}
		// check for empty vs
		if( $vs && trim($vs) != '' ){
			$this->vs = $vs;
		}
	}
	
	public function hasKS() {
		global $wgForceCache;
		return $wgForceCache ? false : isset($this->ks);
	}

	public function getVS() {
		return $this->vs;
	}
}
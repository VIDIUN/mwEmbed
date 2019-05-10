<?php
/**
 * VidiunIframe support
 */
@ob_end_clean();

// Check for custom resource ps config file:
if( isset( $wgVidiunPSHtml5SettingsPath ) && is_file( $wgVidiunPSHtml5SettingsPath ) ){
	require_once( $wgVidiunPSHtml5SettingsPath );
}

require_once 'vidiunIframeClass.php';

// Setup the vidiunIframe
$vIframe = new vidiunIframeClass();

// start gzip compression if available: 
if(!ob_start("ob_gzhandler")) ob_start();

// Support Etag and 304
if( $wgEnableScriptDebug == false && @trim($_SERVER['HTTP_IF_NONE_MATCH']) == $vIframe->getIframeOutputHash() ){
	header("HTTP/1.1 304 Not Modified"); 
	exit();
} 

// Check if we are wrapping the iframe output in a callback
if( isset( $_REQUEST['callback']  )) {
	// check for json output mode ( either default raw content or 'parts' for sections
	$json = null;
	if( isset ( $_REQUEST['parts'] ) && $_REQUEST['parts'] == '1' ){
		$json = array(
			'rawHead' =>  $vIframe->outputIframeHeadCss(),
			'rawScripts' => $vIframe->getVidiunIframeScripts() . $vIframe->getPlayerCheckScript()
		);
	} else {
		// For full page replace:
		$json = array(
			'content' => utf8_encode( $vIframe->getIFramePageOutput() )
		);
	}
	// Set the iframe header:
	$vIframe->setIFrameHeaders();
	echo htmlspecialchars( $_REQUEST['callback'] ) .
		'(' . json_encode( $json ). ');';
	header('Content-Type: text/javascript' );
} else {
	// If not outputting JSON output the entire iframe to the current buffer:
	$iframePage =  $vIframe->getIFramePageOutput();
	// Set the iframe header:
	$vIframe->setIFrameHeaders();
	echo $iframePage;
}
ob_end_flush();


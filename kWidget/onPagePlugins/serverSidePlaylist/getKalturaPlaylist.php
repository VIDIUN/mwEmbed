<?php 
// Include the vidiun php api, you can get your copy here:
// http://www.vidiun.com/api_v3/testme/client-libs.php
require_once( dirname( __FILE__ ) . '/../../../modules/VidiunSupport/Client/vidiun_client_v3/VidiunClient.php');
/**
 * Takes in a : 
 * $wid, string, The widget id 
 * $playlistId, string, The playlist_id
 */
function getVidiunPlaylist( $partnerId, $playlistId ){
	$config = new VidiunConfiguration($partnerId);
	$config->serviceUrl = 'http://www.vidiun.com/';
	$client = new VidiunClient($config);
	$client->startMultiRequest();
	// the session: 
	$vparams = array();
	$client->addParam( $vparams, 'widgetId', '_' . $partnerId );
	$client->queueServiceActionCall( 'session', 'startWidgetSession', $vparams );
	// The playlist meta:
	$vparams = array();
	$client->addParam( $vparams, 'vs', '{1:result:vs}' );
	$client->addParam( $vparams, 'id', $playlistId );
	$client->queueServiceActionCall( 'playlist', 'get', $vparams );
	// The playlist entries: 
	$client->queueServiceActionCall( 'playlist', 'execute', $vparams );
	
	$rawResultObject = $client->doQueue();
	return array(
		'meta' => (array)$rawResultObject[1],
		'playlist' => (array)$rawResultObject[2] 
	);
}
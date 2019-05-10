<?php
/**
 * This file store all of mwEmbed local configuration ( in a default svn check out this file is empty )
 *
 * See includes/DefaultSettings.php for a configuration options
 */

// Old vConf path
$vConfPath = '../../../app/alpha/config/vConf.php';
if( ! file_exists( $vConfPath ) ) {
	// New vConf path
	$vConfPath = '../../../app/infra/vConf.php';
	if( ! file_exists( $vConfPath ) ) {
		die('Error: Unable to find vConf.php at ' . $vConfPath);
	}
}
// Load vidiun configuration file
require_once( $vConfPath );

$vConf = new vConf();

// Vidiun HTML5lib Version
$wgVidiunVersion = basename(getcwd()); // Gets the version by the folder name

// The default Vidiun service url:
$wgVidiunServiceUrl = wgGetUrl('cdn_api_host');
// Default Vidiun CDN url:
$wgVidiunCDNUrl = wgGetUrl('cdn_host');
// Default Stats URL
$wgKalturaStatsServiceUrl = wgGetUrl('stats_host');
// Default Live Stats URL
$wgKalturaLiveStatsServiceUrl = wgGetUrl('live_stats_host');
// Default Kaltura Analytics URL
$wgKalturaAnalyticsServiceUrl = wgGetUrl('analytics_host');

// SSL host names
if( $wgHTTPProtocol == 'https' ){
	$wgKalturaServiceUrl = wgGetUrl('cdn_api_host_https');
	$wgKalturaCDNUrl = wgGetUrl('cdn_host_https');
	$wgKalturaStatsServiceUrl = wgGetUrl('stats_host_https');
	$wgKalturaLiveStatsServiceUrl = wgGetUrl('live_stats_host_https');
	$wgKalturaAnalyticsServiceUrl = wgGetUrl('analytics_host_https');

}

// Default Asset CDN Path (used in ResouceLoader.php):
$wgCDNAssetPath = $wgVidiunCDNUrl;

// Default Vidiun Cache Path
$wgScriptCacheDirectory = $vConf->get('cache_root_path') . '/html5/' . $wgVidiunVersion;

if (strpos($_SERVER["HTTP_HOST"], "kaltura.com")){
	$wgLoadScript = $wgKalturaServiceUrl . '/html5/html5lib/' . $wgKalturaVersion . '/load.php';
	$wgResourceLoaderUrl = $wgLoadScript;
}

// Salt for proxy the user IP address to Vidiun API
if( $vConf->hasParam('remote_addr_header_salt') ) {
	$wgVidiunRemoteAddressSalt = $vConf->get('remote_addr_header_salt');
}

// Disable Apple HLS if defined in vConf
if( $vConf->hasParam('use_apple_adaptive') ) {
	$wgVidiunUseAppleAdaptive = $vConf->get('use_apple_adaptive');
}

// Get Vidiun Supported API Features
if( $vConf->hasParam('features') ) {
	$wgVidiunApiFeatures = $vConf->get('features');
}

// Allow Iframe to connect remote service
$wgVidiunAllowIframeRemoteService = true;

// Set debug for true (testing only)
$wgEnableScriptDebug = false;

// Get PlayReady License URL
if( $vConf->hasMap('playReady') ) {
	$playReadyMap = $vConf->getMap('playReady');
	if($playReadyMap)
		$wgVidiunLicenseServerUrl = $playReadyMap['license_server_url'];
}

// Get PlayReady License URL
if( $kConf->hasMap('drm') ) {
	$drmMap = $kConf->getMap('drm');
	if($drmMap)
		$wgKalturaUdrmLicenseServerUrl = $drmMap['license_server_url'];
}

if( $kConf->hasParam('overrideDomain') ) {
	$wgEnableKalturaOverrideDomain = $kConf->get('overrideDomain');
}

if( $kConf->hasParam('enableEmbedServicesRouting') ) {
	$wgEnableKalturaEmbedServicesRouting = $kConf->get('enableEmbedServicesRouting');
}


$wgUseMemcache = false;
$wgMemcacheConfiguration = $kConf->get('memcacheLocal','cache',null);
if( $wgMemcacheConfiguration )
{
	$wgUseMemcache = true;
}


// A helper function to get full URL of host
function wgGetUrl( $hostKey = null ) {
	global $wgHTTPProtocol, $wgServerPort, $vConf;
	if( $hostKey && $vConf->hasParam($hostKey) ) {
		return $wgHTTPProtocol . '://' . $vConf->get($hostKey) . $wgServerPort;
	}
	return null;
}
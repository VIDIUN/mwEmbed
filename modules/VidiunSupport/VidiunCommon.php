<?php

define( 'VIDIUN_GENERIC_SERVER_ERROR', "Error getting sources from server. Please try again.");

/* 
 * TODO: Use PHP5 auto loading capability instead of requiring all of our resources all the time
 */

// Include Pimple - Dependency Injection
// http://pimple.sensiolabs.org/
require_once( dirname( __FILE__ ) . '/../../includes/Pimple.php' );
// Include request utility helper
require_once( dirname( __FILE__ ) . '/RequestHelper.php' );
// Include the vidiun client
require_once( dirname( __FILE__ ) . '/Client/VidiunClientHelper.php' );
// Include Vidiun Logger
require_once( dirname( __FILE__ ) . '/VidiunLogger.php' );
// Include Vidiun Cache
require_once( dirname( __FILE__ ) . '/Cache/vFileSystemCacheWrapper.php');
require_once( dirname( __FILE__ ) . '/Cache/vMemcacheCacheWrapper.php');
require_once( dirname( __FILE__ ) . '/Cache/vNoCacheWrapper.php');
require_once( dirname( __FILE__ ) . '/VidiunCache.php');
require_once( dirname( __FILE__ ) . '/VidiunUtils.php');

// Include Vidiun Utilities

// Initilize our shared container
$container = new Pimple();

// Setup Request helper
$container['request_helper'] = $container->share(function ($c) {
	return new RequestHelper( $c['utility_helper'] );
});

$container['utility_helper'] = $container->share(function ($c) {
	return new VidiunUtils();
});

$vUtility = $container['utility_helper'];

// Set global vars
$container['mwembed_version'] = $wgMwEmbedVersion;
$container['cache_directory'] = $wgScriptCacheDirectory;
$container['logs_directory'] = $wgScriptCacheDirectory . '/logs';
$container['cache_expiry'] = $wgVidiunUiConfCacheTime;
$container['enable_logs'] = $wgLogApiRequests;
$container['service_timeout'] = $wgVidiunServiceTimeout;

// Setup Logger object
$container['logger'] = $container->share(function ($c) {
	return new VidiunLogger( $c['logs_directory'], $c['enable_logs'] );
});

// Setup Cache Adapter / Helper
$container['no_cache_adapter'] = $container->share(function ($c) {
	return new vNoCacheWrapper();
});
$container['file_cache_adapter'] = $container->share(function ($c) {
	$fileCache = new vFileSystemCacheWrapper();
	$fileCache->init($c['cache_directory'], 'iframe', 2, false, $c['cache_expiry'], true);
	return $fileCache;
});

$container['memcache_cache_adapter'] = $container->share(function ($c) {
	global $wgMemcacheConfiguration;
	$memCache = new vMemcacheCacheWrapper();
	$memCache->init($wgMemcacheConfiguration['host'], $wgMemcacheConfiguration['port'], $wgMemcacheConfiguration['flags']);
	return $memCache;
});

$container['cache_helper'] = $container->share(function ($c) {

	// Choose which cache adapter to use
	global $wgEnableScriptDebug, $wgVidiunForceResultCache,$wgUseMemcache;
	$useCache = !$wgEnableScriptDebug;
	// Force cache flag ( even in debug )
	if( $wgVidiunForceResultCache === true){
		$useCache = true;
	}
	$request = $c['request_helper'];

	// Check for Cache st   + check that the cache_st is less then 15 min from now
	if( intval($request->getCacheSt()) > time()  && intval($request->getCacheSt()) < time() + 900 ) {
 		$useCache = false;
	}
	$cacheProvider = 'file_cache_adapter';
	if ($wgUseMemcache){
		$cacheProvider = 'memcache_cache_adapter';
	}
	$className = ($useCache) ? $cacheProvider : 'no_cache_adapter';
	return new VidiunCache( $c[ $className ], $c['cache_expiry'] );
});

// Setup client helper
$container['client_helper'] = $container->share(function ($c) {

	// Get request & logger object
	$request = $c['request_helper'];
	$logger = $c['logger'];

	// Setup client config
	$config = array(
		'ClientTag'			=>	'html5iframe:' . $c['mwembed_version'] . ',cache_st: ' . $request->getCacheSt(),
        'ServiceUrl'		=>	$request->getServiceConfig('ServiceUrl'),
		'ServiceBase'		=>	$request->getServiceConfig('ServiceBase'),
		'ServiceTimeout'	=>	$c['service_timeout'],
		'UserAgent'			=>	$request->getUserAgent(),
		'RequestHeaders'	=>	($request->getRemoteAddrHeader()) ? array( $request->getRemoteAddrHeader() ) : array(),
		'Method'			=>	'GET',
	);

	// Add logger if needed
	if( $c['enable_logs'] ) {
		$config['Logger'] = $c['logger'];
	}
	// Set VS from our request or generate a new VS
	global $wgForceCache;
	if( $wgForceCache || $request->hasVS() ) {
		$config['VS'] = $request->getVS();
	} else {
		$config['WidgetId'] = $request->getWidgetId();
	}	

	return new VidiunClientHelper( $config );
});

$container['uiconf_result'] = $container->share(function ($c) {
	require_once( dirname( __FILE__ ) .  '/UiConfResult.php' );
	return new UiConfResult(
		$c['request_helper'], 
		$c['client_helper'], 
		$c['cache_helper'], 
		$c['logger'], 
		$c['utility_helper'] 
	);
});

$container['entry_result'] = $container->share(function ($c) {
	require_once( dirname( __FILE__ ) .  '/EntryResult.php' );
	return new EntryResult(
		$c['request_helper'], 
		$c['client_helper'], 
		$c['cache_helper'], 
		$c['logger'],
		$c['uiconf_result']
	);
});

$container['playlist_result'] = $container->share(function ($c) {
	require_once( dirname( __FILE__ ) .  '/PlaylistResult.php' );
	return new PlaylistResult(
		$c['request_helper'], 
		$c['client_helper'], 
		$c['cache_helper'], 
		$c['uiconf_result'], 
		$c['entry_result']
	);
});
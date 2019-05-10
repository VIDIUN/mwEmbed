
function getBootStrapPath(){
	var scripts = document.getElementsByTagName('script');
	for(var i=0; i < scripts.length ; i++ ){
		var script = scripts[i];
		if( script.src && script.src.indexOf( 'doc-bootstrap.js') !== -1 ){
			return script.src.replace( 'doc-bootstrap.js', '' );
		}
	}
}
// Shows a top level menu for all test files if ( not running an automated test and not part of doc page )
if( !window.QUnit ){
	// find the current path: 
	var baseBootStrapUrl = getBootStrapPath();
	window.vDocPath = baseBootStrapUrl + '../../docs/';
	// output any blocking scripts that need to be ready before dom ready: 
	document.write( '<script src="' + vDocPath + 'bootstrap/js/bootstrap-tab.js"></script>' );
	document.write( '<script src="' + vDocPath + 'bootstrap/js/bootstrap-dropdown.js"></script>' );
	document.write( '<script src="' + vDocPath + 'js/jquery.prettyVidiunConfig.js"></script>' );
	document.write( '<script src="' + vDocPath + 'js/vWidget.featureConfig.js"></script>' );
	// vwidget auth: 
	document.write( '<script src="' + vDocPath + '../vWidget/vWidget.auth.js"></script>' );
	
	// inject all the twitter bootstrap css and js ( ok to be injected after page is rendering )
	$( 'head' ).append(
		$( '<link rel="shortcut icon" href="' + vDocPath + 'css/favicon.ico">' ),
		$( '<link href="' + vDocPath + 'bootstrap/build/css/bootstrap.min.css" rel="stylesheet">' ),
		$( '<link href="' + vDocPath + 'css/vdoc.css" rel="stylesheet">'),
		// bootstrap-modal
		$( '<script type="text/javascript" src="' + vDocPath + 'bootstrap/js/bootstrap-modal.js"></script>' ),
		// pretify: 
		$( '<script src="' + vDocPath + 'bootstrap/docs/assets/js/google-code-prettify/prettify.js"></script>' ),
		$( '<link href="' + vDocPath + 'bootstrap/docs/assets/js/google-code-prettify/prettify.css" rel="stylesheet">' ),
		// color picker:
		$( '<link rel="stylesheet" media="screen" type="text/css" href="' + vDocPath + 'js/colorPicker/css/colorpicker.css" />' ),
		$( '<script type="text/javascript" src="' + vDocPath + 'js/colorPicker/js/colorpicker.js"></script>' ),
		// dialog box: 
		$( '<script type="text/javascript" src="' + vDocPath + 'js/bootbox.min.js"></script>' )
	);
	// check if we should enable google analytics: 
	// TODO remove dependency on mw
	if( typeof mw != 'undefined' && mw.getConfig( 'Vidiun.PageGoogleAnalytics' ) ) {
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', mw.getConfig( 'Vidiun.PageGoogleAnalytics' )]);
		_gaq.push(['_trackPageview']);

		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	}
} else{
	// provide a stub for prettyVidiunConfig so that tests don't have javascript errors:
	$.fn.prettyVidiunConfig = function( pluginName, flashVars, flashvarCallback ){
		$(this).text( 'running qunit test');
	};
	// provide a stub for featureConfig for running tests ( just directly map to vWidget.embed )
	vWidget.featureConfig = function( embedOptions ){
		vWidget.embed( embedOptions );
	}
	// hide all prettyconfig: 
	$(function(){
		$('pre.prettyprint').hide();
	});
}
window.isVidiunDocsIframe = false;
// Detect if in an doc iframe:
try{
	if( document.URL.indexOf( 'noparent=') === -1 &&
		window.parent && window.parent['mw'] && window.parent.mw.getConfig('VidiunDocContext')){
		window.isVidiunDocsIframe = true;
		// call parent loaded if set: 
		if(  window.parent['handleLoadedIframe'] ){
			window.parent['handleLoadedIframe']();
		}
	} else {
		// if not in an iframe add some padding
		$('head').append(
			$('<style>body{padding:15px}</style>')
		);
	}
}catch(e){
	// maybe not in the right env.
}
// clock player render time
var vdocPlayerStartTime = new Date().getTime();
if( typeof vWidget != 'undefined' && vWidget.addReadyCallback ){
	var vdocTimePerPlayer = {};
	vWidget.addReadyCallback( function( pId ){
		if( ! $( '#' + pId ).length ){
			return ;
		}
		$( '#' + pId )[0].vBind("playerReady.pTimeReady", function(){
			if( vdocTimePerPlayer[ pId] ){
				return ;
			}
			alreadyRun = true;
			var readyTime = ( new Date().getTime() - vdocPlayerStartTime )/1000;
			var fileName = location.pathname.split('/').pop();
			// trigger the google track event if set:: 
			if( window['_gaq'] ){
				// send feature page load time event:
				_gaq.push(['_trackEvent', 'FeaturePage', 'PlayerLoadTimeMs', fileName, readyTime*1000]);
			}
			// note vUnbind seems to unbind all mediaReady
			//$( '#' + pId )[0].vUnbind(".pTimeReady");
			vdocTimePerPlayer[ pId ] = ( new Date().getTime() - vdocPlayerStartTime )/1000;
			// note vUnbind seems to unbind all mediaReady
			$( '#' + pId )[0].vUnbind(".pTimeReady");
			$('body').append( '<div class="vdocPlayerRenderTime" style="clear:both;"><span style="font-size:11px;">' + pId + ' ready in: <i>' + 
					vdocTimePerPlayer[ pId ] + '</i> seconds</span></div>');
			if( document.URL.indexOf( 'noparent=') === -1 && parent && parent.sycnIframeContentHeight ){
				parent.sycnIframeContentHeight();
			}
		});
	});
}
// the update player button: 
$(document).on('click',  '.vdocUpdatePlayer', function(){
	$('.vdocPlayerRenderTime').empty();
	vdocPlayerStartTime = new Date().getTime();
})

// Set vdocEmbedPlayer to html5 by default:
if( ! localStorage.vdocEmbedPlayer ){
	localStorage.vdocEmbedPlayer = 'html5';
}
// always disable playback-mode selector ( v2 ) 
// now only pages with disablePlaybackModeSelector set LeadWithHTML5 to false, and require forceMobileHTML5
if( !window['disablePlaybackModeSelector'] ){
	// don't set flag if any special properties are set: 
	if( localStorage.vdocEmbedPlayer == 'html5' && window['mw'] && 
			mw.getConfig( 'Vidiun.LeadWithHTML5') == null &&
			mw.getConfig( 'disableForceMobileHTML5') == null && 
			mw.getConfig( 'Vidiun.ForceFlashOnDesktop' ) !== true  
	){
		mw.setConfig('Vidiun.LeadWithHTML5', true);
	}
}
// support forceVDPFlashPlayer flag: 
if( document.URL.indexOf('forceVDPFlashPlayer') !== -1 ){
	mw.setConfig( 'Vidiun.LeadWithHTML5', false);
	mw.setConfig( 'EmbedPlayer.DisableVideoTagSupport', true );
}

// document ready events:
$(function(){
	// Do any configuration substitutions
	if( localStorage.vdoc_html5url ){
		$('pre.prettyprint').each(function(){
			$(this).html( $(this).html().replace('{{HTML5LibraryURL}}', localStorage.vdoc_html5url) )
		})
	}
	
	// make active all the pref links:
	$('.adjust-your-preferences').click(function(){
		// invoke the pref menu
		return false;
	})
	
	// make code pretty
	window.prettyPrint && prettyPrint();

});



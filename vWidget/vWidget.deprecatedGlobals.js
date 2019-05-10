(function(mw, vWidget){

	vWidget.deprecatedGlobals = function(){
		// Note not all these were likely to be used externally,
		// we can more aggressively remove in a later library version.
		var globalFunctionMap = {
				'vIsIOS': 'isIOS',
				'vSupportsHTML5': 'supportsHTML5',
				'vGetFlashVersion': 'getFlashVersion',
				'vSupportsFlash': 'supportsFlash',
				'vidiunIframeEmbed': 'embed',
				'vOutputFlashObject': 'outputFlashObject',
				'vIsHTML5FallForward': 'isHTML5FallForward',
				'vIframeWithoutApi': 'outputIframeWithoutApi',
				'vDirectDownloadFallback': 'outputDirectDownload',
				'vGetVidiunEmbedSettings': 'getEmbedSetting',
				'vGetVidiunPlayerList': 'getVidiunObjectList',
				'vCheckAddScript': 'rewriteObjectTags',
				'vAddScript' : 'loadHTML5Lib',
				'vPageHasAudioOrVideoTags' : 'pageHasAudioOrVideoTags',
				'vLoadJsRequestSet' : 'loadRequestSet',
				'vOverideJsFlashEmbed' : 'overrideFlashEmbedMethods',
				'vDoIframeRewriteList' : 'embedFromObjects',
				'vEmbedSettingsToUrl' : 'embedSettingsToUrl',
				'vGetAdditionalTargetCss' : 'getAdditionalTargetCss',
				'vAppendCssUrl' : 'appendCssUrl',
				'vAppendScriptUrl' : 'appendScriptUrl',
				'vFlashVars2Object' : 'flashVars2Object',
				'vFlashVarsToUrl' : 'flashVarsToUrl',
				'vFlashVarsToString' : 'flashVarsToString',
				'vServiceConfigToUrl' : 'serviceConfigToUrl',
				'vRunMwDomReady': 'rewriteObjectTags',
				// fully deprecated ( have no purpose any more )
				'restoreVidiunVDPCallback': false
		}
		for( var gName in globalFunctionMap ){
			(function( gName ){
				window[ gName ] = function(){
					// functions that have no server any purpose
					if( globalFunctionMap[ gName] === false ){
						vWidget.log( gName + ' is deprecated. This method no longer serves any purpose.' );
						return ;
					}
					vWidget.log( gName + ' is deprecated. Please use vWidget.' + globalFunctionMap[ gName] );
					var args = Array.prototype.slice.call( arguments, 0 );
					if( typeof vWidget[ globalFunctionMap[ gName] ] != 'function' ){
						vWidget.log( "Error vWidget missing method: " + globalFunctionMap[ gName] );
						return ;
					}
					return vWidget[ globalFunctionMap[ gName ] ].apply( vWidget, args );
				}
			})( gName );
		}
	}
	// Add all the deprecated globals:
	vWidget.deprecatedGlobals();

})( window.mw, window.vWidget );
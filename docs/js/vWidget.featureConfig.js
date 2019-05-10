/**
* Wraps jQuery.prettyVidiunConfig with a single object based config and support for custom
* entry, uiconf and wid ( partner )
* 
* @dependencies jQuery, jQuery.prettyVidiunConfig
*/
( function( vWidget ){ "use strict"
	// make sure vWidget is set: 
	if( !vWidget ){
		return ;
	}
	vWidget.getLocalFeatureConfig = function( embedOptions ){
		var localEmbedOptions = $.extend( true, {}, embedOptions );
		// Check for any vdoc-embed localStorage setting overrides
		var setKeys = [ 'wid', 'uiconf_id', 'entry_id' ];
		$.each( setKeys, function(inx, key){
			if( localEmbedOptions && localEmbedOptions[ key] && localStorage[ 'vdoc-embed-' + key ] ){
				localEmbedOptions[ key] = localStorage[ 'vdoc-embed-' + key ];
			}
		});
		// Do a special check for plugins with "vs" if we have a localStorage override. 
		if( localStorage[ 'vdoc-embed-vs' ] && localEmbedOptions && localEmbedOptions.flashvars ){
			$.each( localEmbedOptions.flashvars, function( pKey, pObj){
				if( pKey == 'vs' ){
					localEmbedOptions.flashvars[ pKey ] = localStorage[ 'vdoc-embed-vs' ];
				}
				if( $.isPlainObject( pObj ) ){
					$.each( pObj, function( pluginKey, pluginValue ){
						if( pluginKey == 'vs' ){
							localEmbedOptions.flashvars[ pKey ][pluginKey] = localStorage[ 'vdoc-embed-vs' ];
						}
					})
				}
			})
		}
		var hashConfig;
		// check if we are in an iframe or top level page: 
		if( self == top || document.URL.indexOf( 'noparent=') !== -1 ){
			hashConfig =  document.location.hash.substr(1) ;
		} else {
			hashConfig = top.document.location.hash.substr(1) ;
		}
		hashConfig = decodeURIComponent( hashConfig );
		// strip leading config= if present:( legacy config lines ) 
		if( hashConfig.substr(0, 7) == 'config=' ){
			hashConfig = hashConfig.substr(7);
		}
		// parse JSON 
		var urlOptions = {};
		if( hashConfig ){
			try{
				urlOptions = JSON.parse( hashConfig );
			} catch ( e ){
				if( console )
					console.warn( 'Error could not parse config: ' + e.message );
			}
		}
		if( !$.isEmptyObject( urlOptions ) ){
			$.extend( true, localEmbedOptions, urlOptions);
			// TODO warning on edit pages to remove local settings if they want to "login" 
			// XSS :: evil passes users a integration url, 
			// uses custom uiConf pointing to evil.com,
			// custom is logged in with their "vs" 
			// evil.com can now run actions with the clients vs. 

			// We never want to accept local login credentials + url based uiConf setting.  
			// because uiconf_id could reference an evil uiconf that will do bad things with
			// your saved vs. 
			if( urlOptions['uiconf_id'] ){
				$.each( localEmbedOptions.flashvars, function( pKey, pObj){
					if( pKey == 'vs' ){
						delete( localEmbedOptions.flashvars[ pKey ] )
					}
					$.each( pObj, function( spKey, spObj ){
						if( spKey == 'vs' ){
							delete( localEmbedOptions.flashvars[ pKey ][spKey] )
						}
					})
				})
			}
		}
		
		return localEmbedOptions;
	}
	vWidget.featureConfig = function( embedOptions ){
		
		var pageEmbed = $.extend( true, {}, embedOptions );
		embedOptions = vWidget.getLocalFeatureConfig( embedOptions );
		
		// check for only display player flag: 
		if( document.URL.indexOf( 'onlyDisplayPlayer') != -1 ){
			// then just map directly to vWidget.embed:
			vWidget.embed( embedOptions );
			return ;
		}
		
		// add targets for documentation config and player selection
		$( '#' + embedOptions.targetId ).before(
			$('<div>').attr("id", embedOptions.targetId + '_doc'),
			$('<br>')
		)
		
		// By convention we document the first plugin ontop ( prettyVidiunConfig initial design 
		// required passing a given pluginId. 
		var firstPluginId = null;
		$.each( embedOptions.flashvars, function( pName, pSet ) {
			if( $.isPlainObject( pSet ) ){
				firstPluginId = pName;
			}
			return false;
		})
		// Display pretty config box:
		$( '#' + embedOptions.targetId + '_doc' ).prettyVidiunConfig(
				firstPluginId, 
				embedOptions.flashvars, 
				function( updatedFlashvars ){
					// Destroy any existing target:
					vWidget.destroy( $('#' + embedOptions.targetId )[0] );
					// update flashvars:
					embedOptions.flashvars = updatedFlashvars;
					// update player embed with any local settings:
					vWidget.embed( vWidget.getLocalFeatureConfig( embedOptions ) );
				},
				true, // showSettingsTab
				pageEmbed // the base page embed settings ( used to generate "short" share urls ) 
		)
		// do the actual vWidget embed
		vWidget.embed( embedOptions );
	}
	
})( window.vWidget );
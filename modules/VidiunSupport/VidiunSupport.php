<?php
	// Return the VidiunSupport modules 
	return array(
		"mw.VidiunIframePlayerSetup" =>  array( 
			'scripts' => "resources/mw.VidiunIframePlayerSetup.js",
			'dependencies' => array(
				'mw.MwEmbedSupport'
			),
			'vidiunLoad' => 'always'
		),
		"mw.VWidgetSupport" => array( 
			'scripts' => "resources/mw.VWidgetSupport.js",
			'dependencies' => array(
				'base64_encode',
				'matchMedia',
				'mw.VApi',
				'mw.VDPMapping',
				'mw.VCuePoints'
			),
			'vidiunLoad' => 'always',
			'messageFile' => 'VidiunSupport.i18n.php'
		),
		"mw.VBaseScreen" => array(
			'scripts' => "resources/mw.VBaseScreen.js",
			'dependencies' => array( 'mw.VBaseComponent' )
		),
		"mw.VBaseComponent" => array(
			'scripts' => "resources/mw.VBaseComponent.js",
			'dependencies' => array( 'mw.VBasePlugin', 'mediawiki.vmenu' )
		),
		"mw.VBaseButton" => array(
			'scripts' => "resources/mw.VBaseButton.js",
			'dependencies' => array( 'mw.VBaseComponent')
		),
		"mw.VBasePlugin" => array(
			'scripts' => "resources/mw.VBasePlugin.js",
			'dependencies' => array( 'class', 'mw.PluginManager', 'mediawiki.util.tmpl' )
		),
		"mw.VCuePoints"=> array( 
			'scripts' => "resources/mw.VCuePoints.js" 
		),
		"mw.VTimedText"=> array( 
			'scripts' => "resources/mw.VTimedText.js" 
		),
		"mw.VAnalytics"=> array( 
			'scripts' => "resources/mw.VAnalytics.js"
		),
		"mw.PlaylistHandlerVidiun"=> array( 
			'scripts' => "resources/mw.PlaylistHandlerVidiun.js",
			'dependencies' => array(
				'mw.MwEmbedSupport'
			)
		), 
		"mw.VDPMapping"=> array(
			'scripts' => "resources/mw.VDPMapping.js",
		),
		"mw.VApi"=> array(
			'scripts' => "resources/mw.VApi.js", 
			'dependencies' => array(
				'MD5'
			)	
		),
		"mw.VAds"=> array( 
			'scripts' => "resources/mw.VAds.js",
			'dependencies' => array(
				"mw.AdTimeline",
				"mw.VAdPlayer"
			)
		),
		"mw.VAdPlayer"=> array( 
			'scripts' => "resources/mw.VAdPlayer.js" 
		),
		"dualScreen" => array(
		    'scripts' => "components/dualScreen/dualScreen.js",
		    'styles' =>  "components/dualScreen/displayControlBar.css",
		    'templates' => "components/dualScreen/displayControlBar.tmpl.html",
		    'dependencies' => array( 'mw.VBaseComponent', 'jquery.ui.draggable', 'jquery.ui.resizable' ),
		    'vidiunPluginName' => 'dualScreen'
        ),
        "search" => array(
            'scripts' => "components/search/search.js",
            'styles' =>  "components/search/search.css",
            'templates' => "components/search/search.tmpl.html",
            'dependencies' => array( 'mw.VBaseComponent' ),
            'vidiunPluginName' => 'search'
        ),
        "mediaList" => array(
            'scripts' => "components/mediaList/mediaList.js",
            'styles' =>  "components/mediaList/mediaList.css",
            'templates' => "components/mediaList/mediaList.tmpl.html",
            'dependencies' => array( 'mw.VBaseComponent', 'jCarouse' ),
            'vidiunPluginName' => 'mediaList'
        ),
		/* Core plugins */
		"keyboardShortcuts" => array(
			'scripts' => "resources/mw.KeyboardShortcuts.js",
			'dependencies' => 'mw.VBasePlugin',
			'vidiunLoad' => 'always'			
		),
		/* Layout Container */
		"controlBarContainer" => array(
			'scripts' => "components/controlBarContainer.js",
			'dependencies' => 'mw.VBasePlugin',
			'vidiunLoad' => 'always'
		),
		"topBarContainer" => array(
			'scripts' => "components/topBarContainer.js",
			'dependencies' => 'mw.VBasePlugin',
			'vidiunLoad' => 'always'
		),
		"sideBarContainer" => array(
            'scripts' => "components/sideBarContainer.js",
            'dependencies' => 'mw.VBasePlugin',
            'vidiunLoad' => 'always'
        ),
		/** 
		 * Layout Components 
		 **/
		"theme" => array(
			'scripts' => "components/theme.js",
			'dependencies' => 'mw.VBaseComponent',
			'vidiunPluginName' => 'theme',
		),
		"largePlayBtn" => array(
			'scripts' => "components/largePlayBtn.js",
			'dependencies' => 'mw.VBaseComponent',
			'vidiunPluginName' => 'largePlayBtn',
		),	
		"playPauseBtn" => array(
			'scripts' => "components/playPauseBtn.js",
			'dependencies' => 'mw.VBaseComponent',
			'vidiunPluginName' => 'playPauseBtn',
		),
		"fullScreenBtn" => array(
			'scripts' => "components/fullScreenBtn.js",
			'dependencies' => 'mw.VBaseComponent',
			'vidiunPluginName' => 'fullScreenBtn',
		),
		"expandToggleBtn" =>array(
			'scripts' => "components/expandToggleBtn.js",
	        'dependencies' => 'mw.VBaseButton',
	        'vidiunPluginName' => 'expandToggleBtn',
		),
		"scrubber" => array(
			'scripts' => "components/scrubber.js",
			'dependencies' => 'mw.VBaseComponent',
			'vidiunPluginName' => 'scrubber',
		),
		"volumeControl" => array(
			'scripts' => "components/volumeControl.js",
			'dependencies' => 'mw.VBaseComponent',
			'vidiunPluginName' => 'volumeControl',
		),
		"accessibilityButtons" => array(
			'scripts' => "components/accessibilityButtons.js",
			'dependencies' => 'mw.VBaseComponent',
			'vidiunPluginName' => 'accessibilityButtons',
		),
		"currentTimeLabel" => array(
			'scripts' => "components/currentTimeLabel.js",
			'dependencies' => 'mw.VBaseComponent',
			'vidiunPluginName' => 'currentTimeLabel',
		),				
		"durationLabel" => array(
			'scripts' => "components/durationLabel.js",
			'dependencies' => 'mw.VBaseComponent',
			'vidiunPluginName' => 'durationLabel',
		),
		"sourceSelector" => array(
			'scripts' => "components/sourceSelector.js",
			'dependencies' => 'mw.VBaseComponent',
			'vidiunPluginName' => 'sourceSelector',
		),
		"logo" => array(
			'scripts' => "components/logo.js",
			'dependencies' => 'mw.VBaseComponent',
			'vidiunPluginName' => 'logo',
		),
		"closeFSMobile" => array(
			'scripts' => "components/closeFSMobile.js",
			'dependencies' => 'mw.VBaseComponent',
			'vidiunPluginName' => 'closeFSMobile',
		),
		"airPlay" => array(
			'scripts' => "components/airPlay.js",
			'dependencies' => 'mw.VBaseComponent',
			'vidiunPluginName' => 'airPlay',
		),
		"closedCaptions" => array(
			'scripts' => "resources/mw.ClosedCaptions.js",
			'dependencies' => array( 
				'mw.VBaseComponent', 
				'mw.TextSource',
				'mw.Language.names' 
			),
			'vidiunPluginName' => 'closedCaptions',
			'messageFile' => '../TimedText/TimedText.i18n.php',
		),
		"infoScreen" => array(
			'scripts' => "components/info/info.js",
			'templates' => "components/info/info.tmpl.html",
			'dependencies' => array( 'mw.VBaseScreen' ),
			'vidiunPluginName' => 'infoScreen',
		),
		"related" => array(
			'scripts' => "components/related/related.js",
			'styles' => "components/related/related.css",
			'templates' => "components/related/related.tmpl.html",
			'dependencies' => array( 'mw.VBaseScreen' ),
			'vidiunPluginName' => 'related',
		),
		"share" => array(
			'scripts' => "components/share/share.js",
			'styles' =>  "components/share/share.css",
			'templates' => "components/share/share.tmpl.html",
			'dependencies' => array( 'mw.VBaseScreen' ),
			'vidiunPluginName' => 'share',
		),

		"pptWidgetPlugin"=> array( 
			'scripts' => "resources/uiConfComponents/pptWidgetPlugin.js",
			'vidiunPluginName' => 'pptWidgetAPI'
		),

		/* playlist */
		"playlistPlugin"=> array( 
			'scripts' => "resources/uiConfComponents/playlistPlugin.js", 
			'dependencies' => array(
				// core playlist module
				"mw.Playlist",
				// vidiun specific playlist modules
				'mw.PlaylistHandlerVidiun',
				// support playlist layout
				'mw.VLayout'
			),
			'vidiunPluginName' => 'playlistAPI'
		),
		
		/* uiConf based plugins */
		"acCheck" => array(
			'scripts' => "resources/uiConfComponents/acCheck.js",
			// We always should load access controls since 
			// it can be invoked per entry . 
			'vidiunLoad' => 'always'
		),
		"acPreview"=> array( 
			'scripts' => "resources/uiConfComponents/acPreview.js",
			// We always should load access controls since 
			// it can be invoked per entry 
			'vidiunLoad' => 'always'
		),
		"bumperPlugin"=> array( 
			'scripts' => "resources/uiConfComponents/bumperPlugin.js",
			'dependencies' => array( 'mw.VAds' ),
			'vidiunPluginName' => 'bumper'
		),
		"captureThumbnailPlugin"=> array( 
			'scripts' => "resources/uiConfComponents/captureThumbnailPlugin.js",
			'dependencies' => 'mw.VBaseComponent',
			'vidiunPluginName' => 'captureThumbnail' 
		),
		"carouselPlugin"=> array( 
			'scripts' => "resources/uiConfComponents/carouselPlugin.js",
			'dependencies' => array( 'jCarouse' ),
			'vidiunPluginName' => array(
				'related',
				'carousel'
			)
		),
		"likeAPIPlugin" => array(
			'scripts' => "resources/uiConfComponents/likeAPIPlugin.js", 
			'vidiunPluginName' => 'likeAPI'
		),
		"liveStream" => array(
			'scripts' => array(
				"components/live/liveCore.js", // Will run API requests for isLive service and trigger events ( extends mw.VBasePlugin )
				"components/live/liveStatus.js", // Live status components  ( extends mw.VBaseComponent )
				"components/live/liveBackBtn.js" // Back to live button ( extends mw.VBaseComponent )
			),
			'styles' => 'components/live/liveStream.css',
			'dependencies' => 'mw.VBaseComponent',
			'vidiunLoad' => 'always'
		),
		"titleLabel"=> array( 
			'scripts' => "resources/uiConfComponents/titleLabel.js",
			'dependencies' => 'mw.VBaseComponent',
			'vidiunPluginName' => 'titleLabel'
		),		
		"shareSnippet"=> array( 
			'scripts' => "resources/uiConfComponents/shareSnippet.js", 
			'vidiunPluginName' => 'shareSnippet'
		),
		"moderationPlugin"=> array( 
			'scripts' => "resources/uiConfComponents/moderationPlugin.js",
			'dependencies' =>  array( 'mw.VBaseScreen' ),
			'vidiunPluginName' => 'moderation'
		),
		"downloadPlugin"=> array( 
			'scripts' => "resources/uiConfComponents/downloadPlugin.js",
			'dependencies' => 'mw.VBaseComponent',
			'vidiunPluginName' => "download"
		),
		"jCarouse"=> array( 
			'scripts' => "resources/uiConfComponents/jcarousellite_1.0.1.js" 
		),
		"mw.VLayout"=> array( 
			'scripts' => "resources/mw.VLayout.js" 
		),
		"restrictUserAgentPlugin"=> array( 
			'scripts' => "resources/uiConfComponents/restrictUserAgentPlugin.js",
			'dependencies' => 'mw.VBasePlugin',
			'vidiunPluginName' => 'restrictUserAgent' 
		),
		"segmentScrubberPlugin" => array(
			'scripts' => "resources/uiConfComponents/segmentScrubberPlugin.js",
			'dependencies' => 'mw.VBasePlugin',
			'vidiunPluginName' => 'segmentScrubber',
		),
		"statisticsPlugin"=> array( 
			'scripts' => "resources/uiConfComponents/statisticsPlugin.js",
			'dependencies' => array( 'mw.VAnalytics' ), 
			'vidiunPluginName' => 'statistics'
		),
		'playbackRateSelectorPlugin' => array(
			'scripts' => "resources/uiConfComponents/playbackRateSelector.js",
			'dependencies' => 'mw.VBaseComponent',
			'vidiunPluginName' => 'playbackRateSelector'
		),
		"watermarkPlugin"=> array( 
			'scripts' => "resources/uiConfComponents/watermarkPlugin.js",
			'dependencies' => 'mw.VBaseComponent',
			'vidiunPluginName' => 'watermark'
		),
		"vastPlugin"=> array( 
			'scripts' => "resources/uiConfComponents/vastPlugin.js",
			'dependencies' => array(
				"mw.VAds"
			),
			'vidiunPluginName' => 'vast'
		),
		"audioDescription" => array(
				'scripts' => "components/audioDescription.js",
				'dependencies' => 'mw.VBaseComponent',
				'vidiunPluginName' => 'audioDescription'
		),
	);
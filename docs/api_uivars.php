<?php
$uiVars = array(
	'services' => array(
		'desc' => "Vidiun service variables define define respective Vidiun API configuration.",
		'vars' => array(
			'Vidiun.ServiceUrl' => array(
				'type' => 'String',
				'desc' => 'The API service URL, used to for all API calls. Can be overwritten for on-prem or api proxy setups.',
				'default' => 'http://cdnapi.vidiun.com',
				'example' => ''
			),
			'Vidiun.ServiceBase' => array(
					'type' => 'String',
					'desc' => 'URL Path on the server to the API services.',
					'default' => '/api_v3/index.php?service=',
					'example' => ''
			),
			'Vidiun.StatsServiceUrl' => array(
					'type' => 'String',
					'desc' => 'The URL used for all Vidiun analytics events.',
					'default' => 'http://stats.vidiun.com',
					'example' => ''
			),
			'Vidiun.NoApiCache' => array(
					'type' => 'String',
					'desc' => 'Set to true to disable the player API cache.',
					'default' => 'false',
					'example' => ''
			),
			'Vidiun.ForceIframeEmbed' => array(
					'type' => 'String',
					'desc' => 'Set to true to force iframe output with player API. Useful for simulating iframe syndication environment.',
					'default' => 'false',
					'example' => ''
			),
			'Vidiun.VWidgetPsPath' => array(
					'type' => 'String',
					'desc' => 'Used to append path to additional library of professional service scripts and plugins, that are outside the mwEmbed repository. ',
					'default' => '../vwidget-ps/',
					'example' => ''
			),
			'Vidiun.AllowIframeRemoteService' => array(
					'type' => 'String',
					'desc' => 'By default external API service URLs are not allowed, set this to true to allow them',
					'default' => 'false',
					'example' => ''
			),
			'Vidiun.ForceFlashOnDesktop' => array(
					'type' => 'String',
					'desc' => 'If the player should be forced to use flash on desktop (vdp only).',
					'default' => 'false',
					'example' => '../modules/VidiunSupport/tests/ForceFlashOnDesktop.html'
			),
			'ForceFlashOnDesktopSafari' => array(
				'type' => 'String',
				'desc' => 'If the player should be forced to use flash on desktop Safari.',
				'default' => 'false',
				'example' => '../modules/VidiunSupport/tests/ForceFlashOnDesktopSafari.html'
			),
			'Vidiun.EnableEmbedUiConfJs' => array(
					'type' => 'String',
					'desc' => 'If the player should request uiConf Javascript prior to embed',
					'default' => 'false',
					'example' => '../modules/VidiunSupport/tests/ExternalResources.qunit.html'
			),
			'Vidiun.ForceFlashOnIE10' => array(
					'type' => 'String',
					'desc' => 'Will force flash exclusively on IE10',
					'default' => 'false',
					'example' => ''
			),
			'Vidiun.IframeRewrite' => array(
					'type' => 'String',
					'desc' => 'Enables the HTML5 player. A legacy flag to convert objects to iframes',
					'default' => 'true',
					'example' => ''
			),
			'Vidiun.LicenseServerURL' => array(
					'type' => 'String',
					'desc' => 'The playReady license server URL.',
					'default' => 'null',
					'example' => ''
			),
			'Vidiun.BlackVideoSources' => array(
					'type' => 'String',
					'desc' => "A array of assets used for black video streams. 
						Used to capture user gestures against a valid asset where the actual asset is not yet available",
					'default' => '',
					'example' => ''
			),
			'Vidiun.UseManifestUrls' => array(
					'type' => 'String',
					'desc' => 'Used to designate usage of playMainfest URL type instead of legacy flvclipper Vidiun media URLs',
					'default' => 'true',
					'example' => ''
			),
			'Vidiun.CdnUrl' => array(
					'type' => 'String',
					'desc' => 'The CDN URL used to construct Vidiun media asset URLs',
					'default' => 'http://cdnakmi.vidiun.com',
					'example' => ''
			),
			'Vidiun.Protocol' => array(
					'type' => 'String',
					'desc' => 'The current protocol of player instance, http or https. Protocol relative urls can\'t be used where different CDN prefixes for secure and standard http',
					'default' => 'http',
					'example' => ''
			),
			'Vidiun.UseFlavorIdsUrls' => array(
					'type' => 'String',
					'desc' => 'If the adaptive streams should be dynamically constructed passing along respective flavor list per device capabilities.',
					'default' => 'true',
					'example' => ''
			),
			'Vidiun.LeadHLSOnAndroid' => array(
					'type' => 'String',
					'desc' => 'If Apple HLS streams should be used when available on Android devices, 
			by default progressive streams are used on Android because of Android HLS compatibility issues.',
					'default' => 'false',
					'example' => '../modules/VidiunSupport/tests/UseHLS_WhereAvailable.qunit.html'
			),
			'Vidiun.UseAppleAdaptive' => array(
					'type' => 'String',
					'desc' => 'If apple HLS streams should be used when available',
					'default' => 'true',
					'example' => '../modules/VidiunSupport/tests/UseHLS_WhereAvailable.qunit.html'
			),
			'LeadWithHLSOnFlash' => array(
					'type' => 'Boolean',
					'desc' => 'If Apple HLS streams should be on desktop browsers where Flash and an HLS stream are available',
					'default' => 'false',
					'example' => '../modules/VidiunSupport/tests/LeadWithHLSOnFlash.html'
			),
			'forceHDS' => array(
            					'type' => 'Boolean',
            					'desc' => 'Force HDS streamerType for Vidiun Live (HLS by default)',
            					'default' => 'false',
            					'example' => ''
            ),
            'ignoreAkamaiHD' => array(
                        					'type' => 'Boolean',
                        					'desc' => 'Play HDS without AkamaiHD plugin (the plugin is loaded by default for HDNETWORK or HDNETWORK_HDS streamerTypes)',
                        					'default' => 'false',
                        					'example' => ''
                        ),
			'host' => array(
					'type' => 'String',
					'desc' => 'The URL of the Vidiun server to work with',
					'default' => '',
					'example' => ''
			),
			'cdnHost' => array(
					'type' => 'String',
					'desc' => 'The base URL of the CDN to load media and assets from',
					'default' => 'The host parameter value',
					'example' => ''
			),
			'clientTag' => array(
					'type' => 'String',
					'desc' => 'A custom text that is concatenated to VDP version. The tag is used by the Vidiun server widget caching mechanism and for tracking and analytics',
					'default' => 'VDP:VDP_VERSION',
					'example' => ''
			),
			'srvUrl' => array(
					'type' => 'String',
					'desc' => 'Reserved for future use, determine the API services part of the base Vidiun API calls',
					'default' => '',
					'availability' => 'vdp',
					'example' => ''
			),
			'partnerId' => array(
					'type' => 'String',
					'desc' => 'The id of the current Vidiun partner',
					'default' => '',
					'example' => ''
			),
			'vs' => array(
					'type' => 'String',
					'desc' => 'Vidiun Session',
					'default' => 'By default, the VDP generates a VS by calling the widget.get API',
					'example' => ''
			),
			'referrer' => array(
					'type' => 'String',
					'desc' => 'The URL of the hosting web page for tracking and analytics',
					'default' => '',
					'example' => ''
			),
			'disableReferrerOverride' => array(
					'type' => 'Boolean',
					'desc' => 'Flag indicating whether to take the referrer from the page (if true) or from the referrer Flashvar (if false)',
					'default' => 'false',
					'availability' => 'vdp',
					'example' => ''
			),
			'storageId' => array(
					'type' => 'String',
					'desc' => "This Flashvar contains the storageId from which the entry loads (assuming there is such storage. If there isn't, there is no reason to pass this Flashvar)",
					'default' => '',
					'example' => ''
			),
			'jsTraces' => array(
					'type' => 'Boolean',
					'desc' => "Flag indicating whether to print traces to a box in the page. Useful when there's no Flash debugger version",
					'default' => 'false',
					'availability' => 'vdp',
					'example' => ''
			),
			'centerPreloader' => array(
					'type' => 'Boolean',
					'desc' => 'Flag indicating whether to center the preloader SWF. Should be true in case the preloader registration point is not at its center.',
					'default' => 'false',
					'availability' => 'vdp',
					'example' => ''
			),
			'usePreloaderBufferAnimation' => array(
					'type' => 'Boolean',
					'desc' => 'Flag indication whether we should use the preloader SWF animation as the buffering animation. if "false", buffering animation is taken from "vspin" class in VDP skin.',
					'default' => 'false',
					'availability' => 'vdp',
					'example' => ''
			),
			'httpProtocol' => array(
					'type' => 'String',
					'desc' => 'The HTTP protocol to load the VDP application from',
					'default' => 'Trimmed protocol of the URL the VDP was loaded from',
					'availability' => 'vdp',
					'example' => ''
			),
			'strings.vs-no-flash-installed' => array(
            					'type' => 'String',
            					'desc' => 'No Flash installed message for IE8 users. This Flashvar can be used only through mw.setConfig(). For example: mw.setConfig( \'strings.vs-no-flash-installed\' , \'Flash Player nėra įdiegtas jūsų kompiuteryje\' ); Note: IE8 may parse utf-8 characters incorrectly. To translate the message, save the HTML file with UTF-8 encoding and add a META tag to the HEAD of the HTML page: &lt;META http-equiv=Content-Type content=\'text/html; charset=utf-8\'&gt;',
            					'default' => 'Flash does not appear to be installed or active. Please install or activate Flash.',
            					'example' => ''
            ),
		)
	),
	'mediaEntry' => array(
		'desc' => "Vidiun mediaEntry variables enable controls of flavor and protocol selection.",
		'vars' => array(
			'entryId' => array(
				'type' => 'String',
				'desc' => 'Valid Vidiun media entry id. To support directly assigning media see <a href="#uiVarsMediaProxy">MediaProxy</a>',
				'default' => '',
				'example' => '../modules/VidiunSupport/tests/vWidget.embed.qunit.html'
			),
			'referenceId' => array(
				'type' => 'String',
				'desc' => "Reference Id is an alternate unique identifier for media assets. Can be used instead of the entry id. 
					The player will use the first found matching referenceId found.",
				'default' => '',
				'example' => '../modules/VidiunSupport/tests/ReferenceId.html'
			),
			'flavorId' => array(
				'type' => 'String',
				'desc' => 'The flavor asset id of the media entry being played (applicable only when sourceType=entryId)',
				'default' => '',
				'example' => ''
			),
			'sourceType' => array(
				'type' => 'String',
				'desc' => 'The type of media source to load, either a URL or id of valid Vidiun media entry',
				'default' => 'entryId',
				'availability' => 'vdp',
				'example' => ''
			),
			'streamerType' => array(
				'type' => 'String',
				'desc' => 'The media source streaming protocol to use (http / rtmp / live / hdnetwork / auto ). Auto will select http or adaptive based on content length and protocols available on the platform.',
				'default' => 'auto',
				'example' => ''
			),
			'streamerUrl' => array(
				'type' => 'String',
				'desc' => "A full RTMP URL to the streaming application that will be used as the streaming provider, e.g. 'rtmp://rtmpakmi.vidiun.com/ondemand' (Used by the FMSURL OSMF class)",
				'default' => '',
				'availability' => 'vdp',
				'example' => ''
			),
			'streamFormat' => array(
				'type' => 'String',
				'desc' => 'Defines the video type of the RTMP stream to be played. To play mp4 streams over RTMP, pass streamFormat=mp4',
				'default' => 'undefined',
				'availability' => 'vdp',
				'example' => ''
			),
			'rtmpFlavors' => array(
				'type' => 'String',
				'desc' => 'Determine whether to use a multi-bitrate content flavors for dynamic streaming (set to 1)',
				'default' => 'undefined',
				'availability' => 'vdp',
				'example' => ''
			),
			'useRtmptFallback' => array(
				'type' => 'Boolean',
				'desc' => 'Flag indicating whether VDP should try to connect to rtmpt/rtmpte when mediaProtocol is rtmp/rtmpe.',
				'default' => 'true',
				'availability' => 'vdp',
				'example' => ''
			),
			'disableBitrateCookie' => array(
				'type' => 'Boolean',
				'desc' => 'Flag indicating whether the VDP should take the bitrate from the Flash cookie',
				'default' => 'false',
				'example' => ''
			),
			'requiredMetadataFields' => array(
				'type' => 'Boolean',
				'desc' => "This Flashvar is a flag indicating whether the player should request entry metadata",
				'default' => 'false',
				'example' => ''
			),
			'metadataProfileId' => array(
				'type' => 'String',
				'desc' => 'This Flashvar contains a specific custom metadata profile id to deliver. If it is not passed, the VDP delivers the latest custom metadata profile',
				'default' => '',
				'example' => ''
			),
			'getCuePointsData' => array(
				'type' => 'Boolean',
				'desc' => 'This Flashvar is a flag indicating whether the player should deliver cue-point data related to the current playing entry',
				'default' => 'true',
				'example' => ''
			),
			'loadThumbnailWithVs' => array(
				'type' => 'Boolean',
				'desc' => 'Flag indicating whether the VDP should append the VS to the thumbnail request. Default value "false" to take advantage of caching.',
				'default' => 'false',
				'example' => ''
			),
			'loadThumbnailWithReferrer' => array(
				'type' => 'Boolean',
				'desc' => 'Flag indicating whether the KDP should append the referrer to the thumbnail serve request. Default value "false" to take advantage of caching.',
				'default' => 'false',
				'example' => ''
			),
			'noThumbnail' => array(
				'type' => 'Boolean',
				'desc' => 'Flag indicating whether the VDP should forgo loading the thumbnail',
				'default' => 'false',
				'availability' => 'vdp',
				'example' => ''
			),
			'liveCore.showThumbnailWhenOffline' => array(
            				'type' => 'Boolean',
            				'desc' => 'Flag indicating whether the the default thumbnail should be shown if live stream becomes offline',
            				'default' => 'false',
            				'example' => ''
            )
		)
	),
	'layout' => array(
		'desc' => "Controls basic layout properties and provides access to player config ids.",
		'vars' => array(
			'widgetId' => array(
				'type' => 'String',
				'desc' => 'The widget id as provided by Preview & Embed in VMC (if unsure use _partnerId e.g. _309)',
				'default' => '',
				'example' => ''
			),
			'uiConfId' => array(
				'type' => 'String',
				'desc' => 'The player uiConf id as provided by VMC (or by calling uiConf.add api)',
				'default' => '',
				'example' => ''
			),
			'disableAlerts' => array(
				'type' => 'Boolean',
				'desc' => 'Disable the alert boxes',
				'default' => 'false',
				'example' => ''
			),
			'debugMode' => array(
				'type' => 'Boolean',
				'desc' => 'Reserved for future use or use by plugins; Usually used to allow Flash trace commands',
				'default' => 'false',
				'example' => ''
			),
			'disableOnScreenClick' => array(
				'type' => 'Boolean',
				'desc' => 'This Flashvar configures whether the on-screen click in VDP pauses/resumes playback',
				'default' => 'false',
				'example' => ''
			),
			'VidiunSupport_ForceUserAgent' => array(
				'type' => 'String',
				'desc' => 'Enable forcing a specific user agent by setting the user agent string. Player rules are validated against this user agent string',
				'default' => '',
				'example' => ''
			),
			'disableForceMobileHTML5' => array(
				'type' => 'Boolean',
				'desc' => 'Disables forced usage of the HTML5 player set by the forceMobileHTML5 Flash var',
				'default' => '',
				'example' => '../modules/VidiunSupport/tests/UserAgentPlayerRules.html'
			),
			'forceMobileHTML5' => array(
				'type' => 'Boolean ',
				'desc' => 'When set to true, forces the usage of the HTML5 player',
				'default' => '',
				'example' => '../modules/VidiunSupport/tests/UserAgentPlayerRules.html'
			),
			'alertForCookies' => array(
				'type' => 'Boolean',
				'desc' => 'When set to true, pops a user confirmation alert when the player needs to save a cookie in the local machine',
				'default' => 'false',
				'example' => '../modules/VidiunSupport/tests/AlertForCookies.qunit.html'
			),
			'fileSystemMode' => array(
				'type' => 'Boolean',
				'desc' => 'Use to load the uiConf XML and skin assets from predefined path when debugging or loading VDP from local file system',
				'default' => 'false',
				'availability' => 'vdp',
			),
			'thumbnailUrl' => array(
				'type' => 'String',
				'desc' => 'External thumbnail URL to load instead of the entry default thumbnail. Supports evaluated expressions within curly brackets',
				'default' => '',
				'example' => '../modules/VidiunSupport/tests/ThumbnailEmbedExternalThumbnail.html',
			),
			'vml' => array(
				'type' => 'String',
				'desc' => 'The source from which to load the VDP uiConf (VML=Vidiun Meta ui Language). If undefined, the vml will be loaded from the Vidiun server via uiConf.get api. Options are: local / inject',
				'default' => 'undefined',
				'availability' => 'vdp',
			),
			'vmlPath' => array(
					'type' => 'String',
					'desc' => 'An accessible path to valid vml file (use with vml=local)',
					'default' => 'config.xml',
					'availability' => 'vdp',
					'example' => ''
			),
			'embeddedWidgetData' => array(
					'type' => 'String',
					'desc' => "Valid uiConf XML result, that is used by the 'VDP wrapper'; A Flash application that wraps the VDP for caching purposes",
					'default' => 'null',
					'availability' => 'vdp',
			),
			'disableTrackElement' => array(
				'type' => 'Boolean',
				'desc' => 'Under iOS - if there are captions within the HLS stream, users should set disableTrackElement to true to prevent caption duplications',
				'default' => 'false',
				'example' => '../modules/VidiunSupport/tests/ClosedCaptions.html'
			),
			'VidiunSupport.LeadWithHTML5' => array(
				'type' => 'Boolean',
				'desc' => 'When set to true, first tries to load the HTML5 player and if loading fails, loads the Flash player',
				'default' => 'false',
			),
			'VidiunSupport.PlayerConfig' => array(
				'type' => 'Object',
				'desc' => 'The Vidiun player configuration object',
				'default' => '',
				'example' => ''
			)
		)
	),
	'playback' => array(
		'desc' => "UiVars for contoling basic playback.",
		'vars' => array(
			'autoPlay' => array(
				'type' => 'Boolean',
				'desc' => "Auto play single media (doesn't apply to playlists)",
				'default' => 'false',
				'example' => '../modules/VidiunSupport/tests/AutoPlay.qunit.html'
			),
			'EmbedPlayer.WebKitPlaysInline' => array(
			 		'type' => 'Boolean',
					'desc' => "Determines if should play the video inline when inside a webview on iOS.",
					'default' => 'false',
					'example' => ''
			),
			'autoMute' => array(
				'type' => 'Boolean',
				'desc' => 'Determine whether to start playback with volume muted (usually used by video ads or homepage auto play videos)',
				'default' => 'false',
				'example' => '../modules/VidiunSupport/tests/PlaylistAutoMute.html'
			),
			'loop' => array(
				'type' => 'Boolean',
				'desc' => 'Indicates whether the media should be played again after playback has completed',
				'default' => 'false',
				'example' => '../modules/VidiunSupport/tests/Loop.qunit.html'
			),
			'enableControlsDuringAd' => array(
				'type' => 'Boolean',
				'desc' => 'If true, play pause button will be active during ad playback',
				'default' => 'false',
				'example' => '../modules/VidiunSupport/tests/AdEnableControls.html'
			),
			'adsOnReplay' => array(
				'type' => 'Boolean',
				'desc' => 'Indicates whether to play ads after video replay',
				'default' => 'false',
				'example' => '../modules/DoubleClick/tests/DoubleClickManagedPlayerAdApi.qunit.html'
			),
			'autoRewind' => array(
					'type' => 'Boolean',
					'desc' => 'Determine whether the first or the last frame of the media will show when playback ends',
					'default' => 'false',
					'example' => '',
					'availability' => 'vdp',
			),
			'stretchVideo' => array(
					'type' => 'Boolean',
					'desc' => 'When true, stretchs the video to fill its container even if video aspect ratio breaks',
					'default' => 'false',
					'example' => '',
					'availability' => 'vdp',
			),
		)
	),
	'playerProperties' => array(
		'desc' => "Properties that control basic embed and player types.",
		'vars' => array(
			/*'EmbedPlayer.IsIframeServer' => array(
			 'type' => '',
					'desc' => "",
					'default' => '',
					'example' => ''
			),*/
			/*'EmbedPlayer.IframeParentUrl' => array(
			 'type' => '',
					'desc' => "",
					'default' => '',
					'example' => ''
			),
			'EmbedPlayer.ForceNativeComponent' => array(
					'type' => '',
					'desc' => "",
					'default' => '',
					'example' => ''
			),*/
			'EmbedPlayer.DisableVideoTagSupport' => array(
					'type' => 'Boolean',
					'desc' => "If video tag support should be disabled all-together",
					'default' => 'false',
					'example' => ''
			),
			'EmbedPlayer.DisableHTML5FlashFallback' => array(
					'type' => 'Boolean',
					'desc' => "If detected, browser Flash support should be ignored and Flash support should be set to false. This eliminates support for Flash based playback.",
					'default' => 'false',
					'example' => ''
			),
			'EmbedPlayer.UseFlashOnAndroid' => array(
					'type' => 'Boolean',
					'desc' => "If on Android, should use HTML5 ( even if Flash is installed on the machine )",
					'default' => 'false',
					'example' => ''
			),
			'EmbedPlayer.RewriteSelector' => array(
					'type' => 'String',
					'desc' => "What tags will be re-written to video player by default. Set to empty string or null to avoid automatic video tag rewrites to embedPlayer",
					'default' => 'video,audio,playlist',
					'example' => ''
			),
			/*'EmbedPlayer.Attributes' => array(
			 'type' => '',
					'desc' => "",
					'default' => '',
					'example' => ''
			),*/
			'EmbedPlayer.DefaultSkin' => array(
					'type' => 'String',
					'desc' => "Default player skin name",
					'default' => 'mvpcf',
					'example' => ''
			),
			'EmbedPlayer.MonitorRate' => array(
					'type' => 'Integer',
					'desc' => "Number of milliseconds between interface updates",
					'default' => '250',
					'example' => ''
			),
			'EmbedPlayer.DefaultSize' => array(
					'type' => 'String',
					'desc' => "Default video size ( if no size provided )",
					'default' => '400x300',
					'example' => ''
			),
			'EmbedPlayer.ReplaceSources' => array(
					'type' => 'Boolean',
					'desc' => "Can be used to set player sources via configuration",
					'default' => 'false',
					'example' => ''
			),
			/*'EmbedPlayer.IgnoreStreamerType' => array(
			 'type' => '',
					'desc' => "",
					'default' => '',
					'example' => ''
			),
			'EmbedPlayer.ShowPlayerAlerts' => array(
					'type' => 'Boolean',
					'desc' => "If player errors / alerts should be displayed",
					'default' => 'true',
					'example' => ''
			),*/
			'EmbedPlayer.NotPlayableDownloadLink' => array(
					'type' => 'Boolean',
					'desc' => "When there is no in-browser playback mechanism, provides a download link for the play button",
					'default' => 'true',
					'example' => ''
			),
			'EmbedPlayer.BlackPixel' => array(
					'type' => 'String',
					'desc' => "A Base64 black pixel image for source switching",
					'default' => '',
					'example' => ''
			),
			'EmbedPlayer.DisableEntryCache' => array(
			 'type' => '',
					'desc' => "When set to true, entry data is not saved in the player cache. This can improve performances, especially when using long play lists",
					'default' => 'false',
					'example' => '../modules/VidiunSupport/tests/PlaylistEvents.qunit.html'
			),
			'EmbedPlayer.NativeControls' => array(
					'type' => 'Boolean',
					'desc' => "Determines if mwEmbed should use the Native player controls. This will prevent video tag rewriting and skinning. Useful for devices such as iPad / iPod that don't fully support DOM overlays or don't expose full-screen functionality to JavaScript",
					'default' => 'false',
					'example' => '../modules/VidiunSupport/tests/iPadNativeControls.html'
			),
			'EmbedPlayer.EnableIpadHTMLControls' => array(
					'type' => 'Boolean',
					'desc' => "Determines if iPad should use HTML controls. With HTML controls you can't access native fullscreen. With HTML controls you can support HTML themed controls, overlays, ads etc.",
					'default' => 'true',
					'example' => ''
			),
			'EmbedPlayer.OverlayControls' => array(
					'type' => 'Boolean',
					'desc' => 'Determines if the player controls should be overlaid on top of the video ( if supported by playback method)',
					'default' => 'true',
					'example' => ''
			),
			'EmbedPlayer.ShareEmbedMode' => array(
					'type' => 'String',
					'desc' => "The default share embed mode ( can be 'iframe' or 'xssVideo' )",
					'default' => 'iframe',
					'example' => ''
			),
			'EmbedPlayer.EnableURLTimeEncoding' => array(
					'type' => 'Boolean',
					'desc' => "Determines if embedPlayer should support server side temporal URLs for seeking",
					'default' => false,
					'example' => ''
			),
			'EmbedPlayer.DefaultImageDuration' => array(
					'type' => 'Integer',
					'desc' => "Default duration for playing images",
					'default' => '2',
					'example' => ''
			),
			'EmbedPlayer.SeekTargetThreshold'  => array(
					'type' => 'Number',
					'desc' => "Seek target precision threshold. Will not seek if difference between playback element time and seek target time is lower than the specified value",
					'default' => '0.1',
					'example' => ''
			),
			/*'EmbedPlayer.WebKitPlaysInline' => array(
			 		'type' => 'Boolean',
					'desc' => "Determines if should play the video inline or not",
					'default' => 'false',
					'example' => ''
			),
			'EmbedPlayer.WebKitAllowAirplay' => array(
					'type' => '',
					'desc' => "",
					'default' => '',
					'example' => ''
			),
			'EmbedPlayer.DisableVideoTagSupport' => array(
					'type' => '',
					'desc' => "",
					'default' => '',
					'example' => ''
			),*/
			'EmbedPlayer.EnableFullscreen' => array(
					'type' => 'Boolean',
					'desc' => "If fullscreen is globally enabled",
					'default' => 'true',
					'example' => ''
			),
			'EmbedPlayer.NewWindowFullscreen' => array(
					'type' => 'Boolean',
					'desc' => "Determines if fullscreen should pop-open a new window ( instead of trying to expand the video player to browser fullscreen )",
					'default' => 'false',
					'example' => ''
			),
			'EmbedPlayer.EnableIpadNativeFullscreen' => array(
					'type' => 'Boolean',
					'desc' => "Whether to use the native device fullscreen call on iPad",
					'default' => 'false',
					'example' => ''
			),
			'EmbedPlayer.EnableNativeChromeFullscreen' => array(
					'type' => 'Boolean',
					'desc' => "Whether to use the native device fullscreen call on Android Chrome",
					'default' => 'false',
					'example' => ''
			),
			'EmbedPlayer.FullScreenZIndex' => array(
					'type' => 'Integer',
					'desc' => "The z-index given to the player interface during full screen ( high z-index )",
					'default' => '999998',
					'example' => ''
			),
			'EmbedPlayer.CodecPreference' => array(
					'type' => 'String',
					'desc' => "The preferred media codec preference ('h264', 'webm', 'ogg')",
					'default' => 'n/a',
					'example' => ''
			),
			'EmbedPlayer.ShowPosterOnStop' => array(
					'type' => 'Boolean',
					'desc' => "When set to true, shows the movie thumbnail upon movie ends",
					'default' => 'true',
					'example' => ''
			),
			'EmbedPlayer.HidePosterOnStart' => array(
					'type' => 'Boolean',
					'desc' => "When set to true, movie thumbnail doesn't show upon movie load (before playback starts)",
					'default' => 'false',
					'example' => ''
			),
			'EmbedPlayer.ShowOriginalPoster' => array(
					'type' => 'Boolean',
					'desc' => "When set to true, the thumbnail is loaded with its original size",
					'default' => 'false',
					'example' => '../modules/VidiunSupport/tests/ImageEntry.html'
			),
			/*'EmbedPlayer.SourceAttributes' => array(
			 'type' => '',
					'desc' => "",
					'default' => '',
					'example' => ''
			),*/
			'EmbedPlayer.ControlsHeight' => array(
					'type' => 'Integer',
					'desc' => "Default player controls size",
					'default' => '31',
					'example' => ''
			),
			'EmbedPlayer.HoverOutTimeout' => array(
					'type' => 'Integer',
					'desc' => "Default Timeout (in milliseconds) for Player controls hover out",
					'default' => '1000',
					'example' => ''
			),
			'EmbedPlayer.EnableRightClick' => array(
					'type' => 'Boolean',
					'desc' => "If users can right click on the player",
					'default' => 'true',
					'example' => ''
			),
			'EmbedPlayer.ShowNativeWarning' => array(
					'type' => 'Boolean',
					'desc' => "Set the browser player warning flag displays warning for non optimal playback",
					'default' => 'false',
					'example' => ''
			),
			'EmbedPlayer.WaitForMeta' => array(
					'type' => 'Boolean',
					'desc' => "If the player should wait for metadata like video size and duration before trying to draw the player interface.",
					'default' => 'true',
					'example' => ''
			),
			'EmbedPlayer.ForceVPlayer' => array(
					'type' => 'Boolean',
					'desc' => "Force loading the legacy VDP Flash video player.",
					'default' => 'false',
					'example' => '../modules/VidiunSupport/tests/ForceVPlayer.qunit.html'
			),
			'EmbedPlayer.ForceSPlayer' => array(
					'type' => 'Boolean',
					'desc' => "Force loading the Silverlight video player.",
					'default' => 'false',
					'example' => ''
			),
			/*'EmbedPlayer.DataAttributes' => array(
			 'type' => '',
					'desc' => "",
					'default' => '',
					'example' => ''
			),
			'EmbedPlayer.IframeParentUrl' => array(
					'type' => '',
					'desc' => "",
					'default' => '',
					'example' => ''
			),*/
			'EmbedPlayer.iPhoneShowHTMLPlayScreen' => array(
					'type' => 'Boolean',
					'desc' => "By default, an HTML play screen is displayed with image, thumb and play button. If you are not using ad plugins you may want to set this to false and display the native play button",
					'default' => 'true',
					'example' => ''
			),
			'EmbedPlayer.twoPhaseManifestHlsAndroid' => array(
					'type' => 'Boolean',
					'desc' => "If the player should load the final location of m3u8 file and not a URL that redirects to the m3u8 file on Android set this flag to true",
					'default' => 'false',
					'example' => ''
			),
			'EmbedPlayer.DisableBufferingSpinner' => array(
					'type' => 'Boolean',
					'desc' => "If the player should hide the loading spinner when it is in buffering mode",
					'default' => 'false',
					'example' => ''
			),
			'EmbedPlayer.DisableContextMenu' => array(
					'type' => 'Boolean',
					'desc' => "Disables the player's right-click context menu",
					'default' => 'false',
					'example' => '../modules/VidiunSupport/tests/ThumbnailEmbedManyPlayers.qunit.html'
			),
			'EmbedPlayer.KeepPoster' => array(
					'type' => 'Boolean',
					'desc' => "Keeps the entry thumbnail shown during playback (covers the video)",
					'default' => 'false',
					'example' => ''
			)
		)
	),
	'mediaProxy'=> array(
		'desc' => "The MediaProxy object is responsible for referencing and loading of the current playing media.",
		'vars' => array(
			'mediaProxy.entry' => array(
					'type' => 'Object',
					'desc' => 'Supports partial or complete override of <a href="http://www.vidiun.com/api_v3/testmeDoc/index.php?object=VidiunBaseEntry">entry object</a>.',
					'example' => '../modules/VidiunSupport/tests/StandAlonePlayerMediaProxyOverride.html'
			),
			'mediaProxy.entryCuePoints' => array(
					'type' => 'Object',
					'desc' => 'Supports partial or complete override of <a href="http://www.vidiun.com/api_v3/testmeDoc/index.php?object=VidiunCuePoint">player cuePoints</a>.',
					'example' => '../modules/VidiunSupport/tests/StandAlonePlayerMediaProxyOverride.html'
			),
			'mediaProxy.entryCuePoints' => array(
					'type' => 'Object',
					'desc' => 'Supports partial or complete override of <a href="http://www.vidiun.com/api_v3/testmeDoc/index.php?object=VidiunCuePoint">player cuePoints</a>.',
					'example' => '../modules/VidiunSupport/tests/StandAlonePlayerMediaProxyOverride.html'
			),
			'mediaProxy.contextData' => array(
					'type' => 'Object',
					'desc' => 'Supports partial or complete override of entry access control restriction.',
					'example' => '../modules/VidiunSupport/tests/StandAlonePlayerMediaProxyOverride.html'
			),
			'mediaProxy.entryMetadata' => array(
					'type' => 'Object',
					'desc' => 'Supports partial or complete override of entry custom metadata.',
					'example' => '../modules/VidiunSupport/tests/StandAlonePlayerMediaProxyOverride.html'
			),
			'mediaProxy.sources' => array(
					'type' => 'Object',
					'desc' => 'Supports partial or complete override of entry media sources.',
					'example' => '../modules/VidiunSupport/tests/StandAlonePlayerMediaProxyOverride.html'
			),
			'mediaProxy.selectedFlavorId' => array(
					'type' => 'String',
					'desc' => 'The transcoding flavor currently playing. A valid id of a transcoding flavor associated with Vidiun entry currently being played',
					'default' => '',
					'availability' => 'vdp',
					'example' => ''
			),
			'mediaProxy.preferedFlavorBR' => array(
					'type' => 'Integer',
					'desc' => 'A prefered bitrate for selecting the flavor to be played (progressive download and RTMP). '.
						'In case of an RTMP adaptive mbr, a -1 value will force an auto switching as opposed to manual one. Will be affective only if the "disableBitrateCookie=true" Flashvar is sent.',
					'default' => '1000',
					'example' => '../modules/VidiunSupport/tests/FlavorSelector.preferedFlavorBR.qunit.html'
			),
			'mediaProxy.imageDefaultDuration' => array(
					'type' => 'Integer',
					'desc' => 'In case an Image media is played in a playlist, this value sets the default time period that the image will hold until the next image is presented. Any positive number representing seconds is acceptable',
					'default' => '3',
			),
			'mediaProxy.supportImageDuration' => array(
					'type' => 'Boolean',
					'desc' => 'This is used to turn an image to a timed image. It is useful in case of playlist where an image should only show for a specific time before the next item will show. If the image should show without time (static), set this to false',
					'default' => 'true in case of playlists, false in case of single image',
					'availability' => 'vdp',
			),
			'mediaProxy.initialBufferTime' => array(
					'type' => 'Integer',
					'desc' => "Set the initial buffer time in dual buffering method. When a number of seconds indicated by this parameter will be buffered, the stream playback will start and the buffer size will increase to expandedBufferTime. Any positive number representing the number of seconds the buffer should hold before playback",
					'default' => '2',
					'availability' => 'vdp',
			),
			'mediaProxy.expandedBufferTime' => array(
					'type' => 'Integer',
					'desc' => 'Set the desired buffer time in dual buffering method. After the stream buffer has accumulated the number of seconds indicated by initialBufferTime, the buffer size increases to the number of seconds indicated by this parameter to maximize the buffer download size during playback. Any positive number representing the desired seconds to buffer',
					'default' => '10',
					'availability' => 'vdp',
			),
			'mediaProxy.mediaPlayFrom' => array(
					'type' => 'Integer',
					'desc' => 'Indicates the time from which to play the media. If passed and unequal to 0, the player seeks to this time before beginning to play content.',
					'default' => 'null',
					'example' => '../modules/VidiunSupport/tests/PlayFromOffsetStartTimeToEndTime.html'
			),
			'mediaProxy.mediaPlayTo' => array(
					'type' => 'Integer',
					'desc' => 'Indicates the time to which to play the media. If passed and unequal to 0, the player pauses upon arrival at this time',
					'default' => 'null',
					'example' => '../modules/VidiunSupport/tests/PlayFromOffsetStartTimeToEndTime.html'
			)
		)
	)
);

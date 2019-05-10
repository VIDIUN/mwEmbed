<?php
$sendNotificationActions = array (
		'doPause' => array (
				'desc' => 'Pauses media playback.',
				'example' => '../modules/VidiunSupport/tests/PlayStopApi.qunit.html'
		),
		'doPlay' => array (
				'desc' => 'Plays media. If in stopped state will initiate playback sequence.',
				'example' => '../modules/VidiunSupport/tests/PlayStopApi.qunit.html'
		),
		'doStop' => array (
				'desc' => 'Stops media playback. Will pause and move the playhead to 0.', 
				'example' => '../modules/VidiunSupport/tests/PlayStopApi.qunit.html'
		),
		'doSeek' => array (
				'notificationDataType' => 'Float',
				'notificationData' => 'Seconds of target seek position.',
				'notificationDataValue' => '30',
				'desc' => 'Issues a seek.',
				'example' => '../modules/VidiunSupport/tests/SeekApi.qunit.html'
		),
		'changeMedia' => array (
				'notificationDataType' => 'Object',
				'notificationData' => 'Data object can specify an entryId or referenceId',
				'desc' => 'Change the current media entry within the player.',
				'notificationDataValue' => array(
						'{ "entryId" : "0_wm82kqmm" }',
						'{ "mediaProxy" : mediaProxyObject }'
				),
				'example' => '../modules/VidiunSupport/tests/ChangeMediaEntry.qunit.html'
		),
		'changeVolume' => array (
				'notificationData' => 'Volume value from 0 to 1',
				'notificationDataType' => 'Float',
				'notificationDataValue' => '0.5',
				'desc' => 'Change the audio volume',
				'example' => '../modules/VidiunSupport/tests/SendNotificationWithAds.html'
		),
		'cleanMedia' => array (
				'desc' => 'Cleans the media from the player.'
		),
		'doSwitch' => array (
				'notificationData' => 'Switch to a target flavor index',
				'notificationDataType' => 'Object',
				'notificationDataValue' => '{ flavorIndex: 3 }',
				'desc' => 'Command the player to manually switch between streams within the resource.' 
		),
		'changePreferredBitrate' => array (
				'notificationData' => 'The new preferred bitrate',
				'desc' => 'Change the preferedFlavorBR on mediaProxy.vo object',
				'availability' => 'vdp' 
		),
		'doReplay' => array (
				'desc' => 'Re-plays the video' 
		),
		'alert' => array (
				'notificationData' => 'message: alert message, title: alert title',
				'desc' => 'Pop up an alert' ,
				'example' => '../modules/VidiunSupport/tests/showAlert.html'
		),
		'showUiElement' => array (
				'notificationData' => 'id: ID of the element, show: true / false',
				'desc' => 'Show/hide an element from the layout',
				'availability' => 'vdp' 
		),
		'removeAlerts' => array (
				'notificationData' => 'None',
				'desc' => 'Fired when all alerts popped by the player need to be removed',
				'availability' => 'vdp' 
		),
		'enableGui' => array (
				'notificationData' => '{ guiEnabled: true / false, enableType: full / controls }',
				'desc' => 'Enable or Disable GUI',
				'example' => '../modules/VidiunSupport/tests/EnableGui.html'
		),
		'cancelAlerts' => array (
				'notificationData' => 'None',
				'desc' => 'Hide Alerts at the Alerts Mediator',
				'availability' => 'vdp' 
		),
		'liveEntry' => array (
				'notificationData' => 'The URL resource of the played entry',
				'desc' => 'Call the LiveStream command which tests whether the stream is currently on air',
				'availability' => 'vdp'
		),
		'showClosedCaptions' => array (
				'notificationData' => 'None',
				'desc' => 'Display closed captions',
				'example' => '../modules/VidiunSupport/tests/ClosedCaptions.html'
		),
		'hideClosedCaptions' => array (
				'notificationData' => 'None',
				'desc' => 'Hide closed captions',
				'example' => '../modules/VidiunSupport/tests/ClosedCaptions.html'
		)
);

/* should ideally auto generate or be in a separate file */
$methodDocs = array (
		'vWidget.embed' => array (
				'desc' => 'Used to embed the Vidiun player against an element target in the DOM',
				'params' => array (
						'targetId' => array (
								'type' => 'String', // assumed
								'optional' => true,
								'desc' => 'The DOM player target id attribute string. ( if not included, you must include targetId in "settings" object )' 
						),
						'settings' => array (
								'type' => 'vWidget.settingsObject',
								'desc' => 'Object of settings to be used in embedding.' 
						) 
				),
				'returns' => array (
						'type' => 'boolean|null',
						'desc' => 'Returns boolean false if id not found' 
				),
				'examples' => array (
						array (
								// either doc name or path can be defined ( for feature listed files vs non-feature listed )
								'type' => 'link',
								'name' => 'vWidget.embed',
								'docPath' => 'vwidget' 
						),
						array (
								'type' => 'link',
								'name' => 'vWidget.embed playlist',
								'docFullPath' => 'modules/VidiunSupport/tests/vWidget.embed.playlist.qunit.html ' 
						) 
				) 
		),
		'vWidget.thumbEmbed' => array (
				'desc' => 'Used to embed a thumbnail player. When the user clicks on the thumbnail vWidget.embed will be called with the provided settings.',
				'params' => array (
						'targetId' => array (
								'type' => 'String', // assumed
								'optional' => true,
								'desc' => 'The DOM player target id attribute string. ( if not included, you must include targetId in "settings" object' 
						),
						'settings' => array (
								'type' => 'vWidget.settingsObject',
								'desc' => 'Object of settings to be used in embedding.' 
						) 
				),
				'examples' => array (
						array (
								// either doc name or path can be defined ( for feature listed files vs non-feature listed )
								'type' => 'link',
								'name' => 'vWidget.thumbEmbed',
								'docPath' => 'thumb' 
						) 
				) 
		),
		'vWidget.getVidiunThumbUrl' => array (
				'desc' => 'Get video thumbnail URL.',
				'params' => array (
						'settings' => array (
								'type' => 'vWidget.settingsObject',
								'desc' => 'Object of settings to be used in embedding.'
						)
				)
		),
		'vWidget.isMobileDevice' => array(
				'desc' => 'If user agent identifies as mobile device ( android, iOS or windows phone )',
				'returns' => array (
						'type' => 'boolean',
						'desc' => 'true|false'
				),
		),
		'vWidget.supportsHTML5' => array(
				'desc' => 'If the device or browser supports HTML5',
				'returns' => array (
						'type' => 'boolean',
						'desc' => 'true|false'
				),
		),
		'vWidget.supportsFlash' => array(
				'desc' => 'If the device or browser supports Flash ( version 10 and above )',
				'returns' => array (
						'type' => 'boolean',
						'desc' => 'true|false'
				),
		),
		'vWidget.isIOS' => array (
				'desc' => 'If user agent identifies as iOS device',
				'returns' => array (
						'type' => 'boolean',
						'desc' => 'true|false'
				),
		),
		'vWidget.isIE' => array(
				'desc' => "If user agent identifies as Internet Explorer browser",
				'returns' => array (
						'type' => 'boolean',
						'desc' => 'true|false'
				),
		),
		'vWidget.isIE8' => array(
				'desc' => "If user agent identifies as Internet Explorer 8 browser",
				'returns' => array (
						'type' => 'boolean',
						'desc' => 'true|false'
				),
		),
		'vWidget.isAndroid' => array(
				'desc' => "If user agent identifies as Android device",
				'returns' => array (
						'type' => 'boolean',
						'desc' => 'true|false'
				),
		),
		'vWidget.isWindowsDevice' => array(
				'desc' => "If user agent identifies as Windows Phone device",
				'returns' => array (
						'type' => 'boolean',
						'desc' => 'true|false'
				),
		),
		'vWidget.addReadyCallback' => array (
				'desc' => 'Adds a ready callback to be called after the VDP or HTML5 player is ready.',
				'params' => array (
						'readyCallback' => array (
								'type' => 'String',
								'desc' => 'Function to call after a player or widget is ready on the page.' 
						) 
				),
				'examples' => array (
						array (
								'type' => 'link',
								'name' => 'vWidget.addReadyCallback',
								'docFullPath' => 'modules/VidiunSupport/tests/ChangeMediaEntry.qunit.html ' 
						) 
				) 
		),
		'vWidget.destroy' => array (
				'desc' => 'Removes the player from the DOM.',
				'params' => array (
						'target' => array (
								'type' => 'String',
								'desc' => 'The target element or element ID to destroy.' 
						) 
				),
				'examples' => array (
						array (
								'type' => 'link',
								'name' => 'vWidget.embed',
								'docPath' => 'vwidget' 
						) 
				) 
		),
		'vWidget.api' => array (
				'desc' => 'The vWidget API object, used to create new instances of Vidiun API request.',
				'params' => array (
						'apiObject' => array (
								'type' => 'vWidget.apiOptions',
								'desc' => 'Object of API settings to be used in API requests.' 
						),
						'callback' => array (
								'type' => 'function',
								'desc' => 'Callback of API response, with data as the first argument.'
						)
				),
				'methods' => array (
						'doRequest' => array (
								'type' => 'function',
								'desc' => "( RequestObject, callback ) Run the API request, issue callback with API response data." 
						) 
				),
				'returns' => array (
						'type' => 'vWidget.api',
						'desc' => 'Returns an instance of the vWidget API object.' 
				),
				'examples' => array (
						array (
								'name' => 'vWidget.api',
								'docFullPath' => 'vWidget/tests/vWidget.api.html' 
						),
						array (
								'name' => 'vWidget.getSources',
								'docFullPath' => 'modules/VidiunSupport/tests/vWidget.getSources.html' 
						) 
				) 
		),
		'sendNotification' => array (
				'desc' => 'Call a VDP notification (perform actions using this API, for example: play, pause, changeMedia, etc.)',
				'params' => array (
						'notificationName' => array (
								'type' => 'String',
								'desc' => 'The name of notification to call.' 
						),
						'notificationData' => array (
								'type' => 'Object',
								'optional' => true,
								'desc' => 'The custom data to pass with the notification.' 
						) 
				) 
		),
		'vBind'=> array(
				'desc' => 'Register a JavaScript handler function for a VDP notification',
				'params' => array (
						'eventName' => array (
								'type' => 'String',
								'desc' => 'The name of the notification to listen to. Can be namespaced for easy group event removal.'
						),
						'callback' => array (
								'type' => 'String',
								'desc' => 'A function to be called when the named event is triggered.'
						),
				),
				'examples'  => array (
						array (
							'type' => 'link',
							'name' => 'vBind and vUnBind',
							'docFullPath' => 'modules/VidiunSupport/tests/vBind_vUnbind.qunit.html'
						)
					)
		),
		'vUnbind' => array(
				'desc' => 'Remove a JavaScript handler function by name or by setfor a VDP notification',
				'params' => array (
						'eventName' => array (
								'type' => 'String',
								'desc' => 'The name of the notification to remove, prefix with period for removal of a set of namespaced events.'
						)
				),
				'examples' => array (
							'type' => 'link',
							'name' => 'vBind and vUnBind',
							'docFullPath' => '../modules/VidiunSupport/tests/vBind_vUnbind.qunit.html'
						)
		),
		'addJsListener' => array (
				'desc' => 'Register a javascript handler function for a VDP notification',
				'params' => array (
						'listenerString' => array (
								'type' => 'String',
								'desc' => 'The name of the notification to listen to.' 
						),
						'jsFunctionName' => array (
								'type' => 'String',
								'desc' => 'The name of the JavaScript handler function.' 
						) 
				) 
		),
		'evaluate' => array (
				'desc' => "Retrieves the value of a VDP model property or component's property, using the standard OOP dot notation inside curly braces",
				'params' => array (
						'object.property.properties' => array (
								'type' => 'String',
								'desc' => 'The reference to the component object with data that you want to extract. Enclose the reference in curly braces within single or double quotation marks.' 
						) 
				) 
		),
		'setVDPAttribute' => array (
				'desc' => "Change a value of a player configuration property or component's property using the standard OOP dot notation.",
				'params' => array (
						'object' => array (
								'type' => 'String',
								'desc' => 'A string that represents the object you want to modify. Use standard dot notation to specify sub-objects, for example, configProxy.flashvars' 
						),
						'property' => array (
								'type' => 'String',
								'desc' => 'The player property that you want to modify.' 
						),
						'value' => array (
								'type' => 'String',
								'desc' => 'The new value that you want to set for the player property.' 
						) 
				) 
		),
		'jsCallbackReady' => array (
				'desc' => "A JavaScript function on the hosting web page that is called by VDP when the setup of externalInterface APIs is completed.",
				'params' => array (
						'objectId' => array (
								'type' => 'String',
								'desc' => 'Represents the identifier of the player that is embedded.' 
						) 
				) 
		) 
);
$objectDefinitions = array (
		'vWidget.apiOptions' => array (
				'wid' => array (
						'desc' => "The partner id to be used in the API request." 
				),
				'vs' => array (
						'desc' => "The Vidiun secret to be used in the request, if not supplied an anonymous VS will be generated and used." 
				),
				'serviceUrl' => array (
						'desc' => 'Can be overwritten to target a different Vidiun server.',
						'default' => 'http://cdnapi.vidiun.com' 
				),
				'serviceBase' => array (
						'desc' => "Can be overwritten to alternate Vidiun service path.",
						'default' => '/api_v3/index.php?service=' 
				),
				'statsServiceUrl' => array (
						'desc' => "Default supplied via Vidiun library include, can be overwritten to alternate URL for core analytics events.",
						'default' => 'http://stats.vidiun.com' 
				),
				'disableCache' => array (
						'desc' => "Sends no-cache param to API, for a fresh result. Can hurt performance and CDN cachability should be used sparingly.",
						'default' => 'false' 
				) 
		),
		'vWidget.settingsObject' => array (
				'targetId' => array (
						'desc' => 'The DOM player target id attribute string if not defined as top level param.' 
				),
				'wid' => array (
						'desc' => 'Widget id, usually the partner id prefixed by underscore.' 
				),
				'uiconf_id' => array (
						'type' => 'Number',
						'optional' => true,
						'desc' => 'The player uiconf_id' 
				),
				'entry_id' => array (
						'desc' => 'The content entry id. Can be left empty for a JavaScript based entry id.' 
				),
				'flashvars' => array (
						'type' => 'Object',
						'desc' => 'Runtime configuration object, can override arbitrary uiVars and plugin config.' 
				),
				'params' => array (
						'type' => 'Object',
						'desc' => 'Runtime configuration object, can override arbitrary uiVars and plugin config.' 
				),
				'cache_st' => array (
						'optional' => true,
						'desc' => 'String to burst player cache' 
				),
				'readyCallback' => array (
						'optional' => true,
						'type' => 'Function',
						'desc' => 'Local callback method to be called once player is ready for bindings. Player id is passes as an argument. 
						See <a target="_new" href="../modules/VidiunSupport/tests/vWidget.embed.qunit.html">live example</a>' 
				)
		) 
);

?>
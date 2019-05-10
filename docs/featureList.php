<?php 
	return array(
		'KeyFeatures'=> array(
			'title' => "Key features",
			'desc' => "Key features of the vidiun front end platform.",
			'featureSets' => array(
				'Captions' => array(
					'title' => 'Accessibility and Close Captions',
					'desc' => 'The Vidiun captions player API, supports S and TTML formats.',
					'testfiles' => array(
						'AccessibilityControls' => array(
							'title' => 'Accessibility Controls',
							'path' => 'VidiunSupport/tests/AccessibilityControls.html',
						),
						'KeyboardShortcuts' => array(
							'title' => 'Keyboard Shortcuts',
							'path' => 'VidiunSupport/tests/KeyboardShortcuts.html'
						),
						'CaptionsVidiunApi' => array(
							'title' => 'Captions API',
							'path' => 'VidiunSupport/tests/ClosedCaptions.html',
						),
						'Localization' => array(
							'title' => 'Player Localization',
							'path' => 'VidiunSupport/tests/Localization.il8n.html'
						),
						/*
						'InVideo Search' => array(
							'title' => 'In-Video Search',
							'path' => '',
						),*/
						'CaptionsCustomVarsTTML' => array(
							'title' => 'Captions, TTML format',
							'path' => 'VidiunSupport/tests/CaptionsCustomVarsTTML.qunit.html',
						),
						// not working with player v2:
						/*'CaptionsPlyMedia' => array(
							'title' => 'PlyMedia Captions',
							'path' => 'Plymedia/tests/Plymedia_Vidiun.html',
						)*/
					)
				),
				'Live' => array(
					'title' => 'Live',
					'desc' => 'The Vidiun LIVE supports sending streams to both HLS (iOS / mobile) and HDS ( flahs ).',
					'testfiles' => array(
						'LiveStream' => array(
							'title' => 'Live Stream',
							'path' => 'VidiunSupport/tests/LiveStream.html',
						),
					),
				),
				'Access_Control'=> array(
					'title' => "Access Controls",
					'desc' => 'Provides mechanism to control access to player content',
					'testfiles' => array(
						'CustomMessageAccessControlVS' => array(
							'title' => 'Custom Control Message',
							'path' => 'VidiunSupport/tests/AccessControlCustomMessage.html'
						),
						'AccessControlPreview' => array(
							'title' => 'Access Control Preview',
							'path' => 'VidiunSupport/tests/AccessControlPreview.qunit.html'
						),
						'AccessControlPlaylistBlockMobileFirstEntry' => array(
							'title' => 'Playlist Block Entry',
							'path' => 'VidiunSupport/tests/AccessControlPlaylistBlockMobileFirstEntry.qunit.html'
						)
					)
				),
				'Playlists'=> array(
					'title' => "Playlists",
					'desc' => 'Playlists support is built into the vidiun player',
					'testfiles' => array(
						'playlistApi' => array(
							'title' => 'Playlist API',
							'path' => 'VidiunSupport/tests/PlaylistVidiunApi.qunit.html'
						),
						'ServerSidePlaylist' => array(
							'title' => "Server Side Playlist",
							'path' => '../vWidget/onPagePlugins/serverSidePlaylist/ServerSidePlaylist.php'
						),
						'PlaylistFeatures' => array(
							'title' => "Playlist features",
							'path' => 'VidiunSupport/tests/PlaylistFeatures.qunit.html'
						),
						'PlaylistEvents' => array(
							'title' => "Playlist events",
							'path' => 'VidiunSupport/tests/PlaylistEvents.qunit.html'
						),
						'PlaylistOnPage' => array(
							'title' => "Playlist on page",
							'path' => 'VidiunSupport/tests/PlaylistOnPage.qunit.html'
						),
						'PlaylistNoClipList' => array(
							'title' => "Playlist No Clip List",
							'path' => 'VidiunSupport/tests/PlaylistNoClipList.qunit.html'
						),
						'PlaylistVidiunMRSS' => array(
							'title' => "Media RSS source",
							'path' => 'VidiunSupport/tests/PlaylistVidiunMRSS.qunit.html'
						),
						'PlaylistInitItemEntryId' => array(
							'title' => "Initial EntryId",
							'path' => 'VidiunSupport/tests/PlaylistInitItemEntryId.qunit.html'
						),
						'PlaylistVAST' => array(
							'title' => "Playlist VAST ads",
							'path' => 'VidiunSupport/tests/PlaylistVAST.qunit.html'
						),
						'PlaylistDoubleclick' => array(
							'title' => "Playlist Doubleclick ads",
							'path' => 'VidiunSupport/tests/PlaylistDoubleclick.qunit.html'
						),
                        'PlaylistSideBar' => array(
                            'title' => "Playlist within side bar",
                            'path' => 'VidiunSupport/tests/PlaylistSideBar.qunit.html'
                        )
					)
				),
			)
		),
		'Plugins'=> array(
			'title' => "Plugins",
			'desc' => "Leverage 3rd party services to enhance player capabilities",
			'featureSets' => array(
				'Ads' => array(
					'title' => "Monetization",
					'desc' => 'The Vidiun player supports several systems for video monitization.',
					'testfiles' => array(
						'kvast' => array(
							'title' => 'VAST Preroll & Companion',
							'path' => 'VidiunSupport/tests/AdFlashvarVastDoubleClickCompanion.qunit.html'
						),
						'vpaid' => array(
							'title' => 'VPAID',
							'path' => 'AdSupport/tests/VPAID.html'
						),
						'AdPatterns'=>array(
							'title' => 'Ad Patterns Playlist',
							'path' => 'VidiunSupport/tests/AdPatternPlaylist.qunit.html'
						),
						'VastAdPods' => array(
							'title' => 'VAST 3 Ad Pods',
							'path' => 'VidiunSupport/tests/AdPodsVast3.html'
						),
						'vbumper' => array(
							'title' => 'Bumper video',
							'path' => 'VidiunSupport/tests/BumperVideoNoAdd.qunit.html'
						),
						'vcuepoints' => array(
							'title' => 'Vidiun Ad Cue Points',
							'path' => 'VidiunSupport/tests/CuePointsMidrollVast.html'
						),
						'DoubleClick' => array(
							'title' => "DoubleClick",
							'path' => 'DoubleClick/tests/DoubleClickManagedPlayerAdApi.qunit.html'
						),
						'FreeWheel' => array(
							'title' => "FreeWheel",
							'path' => 'FreeWheel/tests/FreeWheelPlayer.html'
						),
						'Tremor' => array(
							'title' => "Tremor",
							'path' => 'Tremor/tests/TremorPrerollPostroll.qunit.html'
						),
					)
				),
				
				'Analytics' => array(
					'title' => 'Analytics',
					'desc' => 'The Vidiun player supports several systems for tracking video playback',
					'testfiles' => array(
						'VidiunAnalytics' => array( 
							'title' => 'Vidiun Analytics',
							'path' => 'VidiunSupport/tests/VidiunAnalytics.qunit.html',
						),
						'AkamaiAnalytics' => array( 
							'title' => 'Akamai Analytics',
							'path' => 'AkamaiAnalytics/tests/AkamaiAnalytics.qunit.html',
						),
						'GoogleAnalytics' => array(
							'title' => 'Google Analytics',
							'path' => 'GoogleAnalytics/tests/GoogleAnalytics.qunit.html',
						),
						'NielsenVideoCensus' => array(
							'title' => 'Nielsen VideoCensus',
							'path' => 'NielsenVideoCensus/tests/ShortFromNielsenVideoCensus.html',
						),
						'ComscoreAnalytics' => array(
							'title' => 'Comscore Analytics',
							'path' => 'Comscore/tests/Comscore.html',
						),
						'NielsenCombined' => array(
							'title' => 'Nielsen Combined',
							'path' => 'NielsenCombined/tests/NielsenCombinedPlayer.qunit.html',
						),
						'NielsenCombinedFreeWheel' => array(
							'title' => 'Nielsen Combined & FreeWheel',
							'path' => 'NielsenCombined/tests/IntegrationFreeWheelNielsen.html',
						),
						'OmnitureOnPage' => array(
							'title' => 'Omniture sCode config',
							'path' => '../vWidget/onPagePlugins/omnitureOnPage/OmnitureOnPage.qunit.html',
						),
						/*'OmnitureSiteCatalyst15' => array(
							'title' => 'Omniture manual config',
							'path' => 'Omniture/tests/siteCatalyst15.qunit.html',
						)*/
					),
				),
				'On_Page_Plugins' => array(
					'title' => 'Engagement',
					'desc' => 'On page widgets load the same plugin for both flash and HTML5',
					'testfiles' => array(
						'chaptersView' => array(
							'title' => 'Chapters',
							'path' => '../vWidget/onPagePlugins/chapters/chaptersView.qunit.html'
						),
						'chaptersEdit' => array(
							'title' => 'Chapters Editor',
							'path' => '../vWidget/onPagePlugins/chapters/chaptersEdit.qunit.html'
						),
						/*'AttracTV' => array(
							'title' => 'AttracTV',
							'path' => 'AttracTV/tests/AttracTV.qunit.html'
						),*/
						'LimeSurvey' => array(
							'title' => 'LimeSurvey On Video',
							'path' => '../vWidget/onPagePlugins/limeSurveyCuePointForms/limeSurveyCuePointForms.qunit.html'
						),
						'videoDetailsBlock' => array(
							'title' => 'Video Details Block',
							'path' => '../vWidget/onPagePlugins/videoDetailsBlock/videoDetailsBlock.qunit.html'
						),
					)
				),
				'CallToAction' => array(
					'title' => 'Call To Action',
					'desc' => 'Call to action plugins.',
					'testfiles' => array(
						'ActionButtons' => array(
							'title' => 'Basic Buttons',
							'path' => 'CallToAction/tests/ActionButtons.qunit.html'
						),
						'RelatedButtons' => array(
							'title' => 'Related Buttons',
							'path' => 'CallToAction/tests/ActionButtonsRelated.qunit.html'
						),
						'ActionForm' => array(
							'title' => 'Submit Form',
							'path' => 'CallToAction/tests/ActionForm.qunit.html'
						),
					)
				),
				'Transport' => array(
					'title' => 'Transport',
					'desc' => 'These plugins help optimize video delivery',
					'testfiles' => array(
						'Peer5' => array( 
							'title' => 'Peer5 HTML5 P2P',
							'path' => 'Peer5/tests/Peer5.qunit.html',
						),
					)
				),
			)
		),
		'Customization' => array(
			'title' => "Customization",
			'desc' => "Tools for customizing the look and feel of the player and on-page display",
			'featureSets' => array(
				'Custom_Players' => array(
					'title' => "Player Appearance",
					'desc' => 'The Vidiun supports loading external CSS and JS to customize players look and feel',
					'testfiles' => array(
						'ExternalResources' => array(
							'title' => 'External Resources',
							'path' => 'VidiunSupport/tests/ExternalResources.qunit.html'
						),
						'Chromeless' => array(
							'title' => 'Chromeless No Controls',
							'path' => 'VidiunSupport/tests/ChromelessPlayer.qunit.html'
						),
						'Strings' => array(
							'title' => 'Custom Strings',
							'path' => 'VidiunSupport/tests/Strings.html'
						),/*
						'CustomSkinAudioPlayer' => array(
							'title' => 'Custom Audio Player Skin',
							'path' => 'VidiunSupport/tests/CustomSkinAudioPlayer.html'
						)*/
					)
				),
				
				'Player_Features' => array(
					'title' => "Player features",
					'desc' => 'Player features',
					'testfiles' => array(
						'Watermark' => array(
							'title' => 'Player Watermark',
							'path' => 'VidiunSupport/tests/WatermarkTest.qunit.html'
						),
						'branding' => array(
							'title' => 'Custom Branding',
							'path' => 'VidiunSupport/tests/branding.html'
						),
						'TitleLabel' => array(
							'title' => 'Title Label',
							'path' => 'VidiunSupport/tests/TitleLabel.qunit.html'
						),
						'Share' => array(
							'title' => 'Share',
							'path' => 'VidiunSupport/components/share/Share.html'
						),
						'Info' => array(
							'title' => 'Info',
							'path' => 'VidiunSupport/components/info/Info.html'
						),
						'Related' => array(
							'title' => 'Related',
							'path' => 'VidiunSupport/components/related/Related.html'
						),
						'FlavorSelector' => array(
							'title' => 'Flavor Selection',
							'path' => 'VidiunSupport/tests/FlavorSelector.preferedFlavorBR.qunit.html'
						),
						'PlaybackRateSelector' => array(
							'title' => "Playback Rate Selector",
							'path' => 'VidiunSupport/tests/PlaybackRate.qunit.html'
						)
					)
				),
			) 
		),
		'Tools' => array(
			'title' => "Integration tools",
			'desc' => "Front end tools from embedding content, api helpers and sample integration code",
			'featureSets' => array(
		
				'Embedding'  => array(
					'title' => 'Embedding the Vidiun player',
					'desc' => 'These files cover basic embedding from <a href="#rewrite">legacy</a> object embed, to the dynamic <a href="#vwidget">vWidget</a> embed method', 
					'testfiles' =>array(
						'vwidget' => array(
							'title' => 'Dynamic embed',
							'path' => 'VidiunSupport/tests/vWidget.embed.qunit.html'
						),
						'autoEmbed' => array(
							'title' => 'Auto embed',
							'path' => 'VidiunSupport/tests/AutoEmbed.html'
						),
						'thumb' => array( 
							'title' => 'Thumbnail embed',
							'path' => 'VidiunSupport/tests/ThumbnailEmbedManyPlayers.qunit.html',
						),
						'responsive' => array(
							'title' => "Responsive embed",
							'path' => 'VidiunSupport/tests/RWDMinimal.html',
						),
						'NativeCallout'=> array(
							'title' => 'Native callout',
							'path' => 'VidiunSupport/tests/NativeCalloutComingSoon.html',
						),
						'referenceId' => array(
							'title' => 'Reference Id',
							'path' => 'VidiunSupport/tests/ReferenceId.html'
						),
						'vwidgetPlaylist' => array( 
							'title' => 'vWidget playlist',
							'path' => 'VidiunSupport/tests/vWidget.embed.playlist.qunit.html'
		 				),
						'rewrite' => array(
							'title' => 'Object rewrite ( legacy )',
							'path' => 'VidiunSupport/tests/BasicPlayer.qunit.html'
						),
		 				'swfObject' => array(
		 					'title' => 'swfObject ( legacy )', 
							'path' => 'VidiunSupport/tests/EmbedSWFObject.2.2.qunit.html'
		 				),
						'Flashembed' => array(
		 					'title' => 'flashembed ( legacy )', 
							'path' => 'VidiunSupport/tests/Flashembed.onPageLinks.qunit.html'
						),
						'PlayerRules' => array(
							'title' => 'Player Rules',
							'path' => 'VidiunSupport/tests/UserAgentPlayerRules.html'
						)
		 			)
				), // Embedding
				
				
				'Player_API' => array(
					'title' => "Player API",
					'desc' => 'The Vidiun player includes a robust API to build custom media experiences.',
					'testfiles' => array(
						'vbind' => array(
							'title' => 'vBind and vUnbind',
							'path' => 'VidiunSupport/tests/vBind_vUnbind.qunit.html'
						),
						'changeMedia' => array(
							'title' => 'Change Media Entry',
							'path' => 'VidiunSupport/tests/ChangeMediaEntry.qunit.html'
						),
						'BufferEvents' => array(
							'title' => 'Buffer Events',
							'path' => 'VidiunSupport/tests/BufferEvents.qunit.html'
						),
						'SeekApi' => array(
							'title' => 'Seek Api', 
							'path' => 'VidiunSupport/tests/SeekApi.qunit.html'
						),
						'StartEndPreview' => array(
							'title' => "Start End Preview",
							'path' => 'VidiunSupport/tests/PlayFromOffsetStartTimeToEndTime.html'
						),
						'CustomMetaData' => array( 
							'title' => 'Access Custom Meta Data',
							'path' => 'VidiunSupport/tests/CustomMetaData.html'
						),
						'showAlert' =>  array(
							'title' => 'Show Alert',
							'path' => 'VidiunSupport/tests/showAlert.html'
						),
						'AutoPlay' => array(
							'title' => 'Auto play',
							'path' => 'VidiunSupport/tests/AutoPlay.qunit.html'
						)
					)
				),
				
				'Stand_Alone_Tools' => array(
					'title' => 'Stand alone tools',
					'desc' => 'Stand alone tools',
					'testfiles' => array(
						'getSources' => array(
							'title' => 'Get Flavor Urls',
							'path' => '../vWidget/tests/vWidget.getSources.html',
						),
						'selfHostedSources' => array(
							'title' => 'Self Hosted Player Sources',
							'path' => 'EmbedPlayer/tests/Player_Sources.html'
						),
					)
				),
			)
		)
	);

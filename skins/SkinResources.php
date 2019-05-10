<?php

// go over the folder list 
return array(
	'vdark' => array(
		/** 
		  * We need to have mw.EmbedPlayer dependency for our skin
		  * So that the Core CSS will load before Skin CSS
		 **/
		'dependencies' => 'mw.EmbedPlayer',
		'styles' => array(
			'skins/vdark/css/layout.css',
			'skins/vdark/css/icons.css',
		)
	),
	'ott' => array(
        /**
          * We need to have mw.EmbedPlayer dependency for our skin
          * So that the Core CSS will load before Skin CSS
         **/
        'dependencies' => 'mw.EmbedPlayer',
        'styles' => array(
            'skins/ott/css/layout.css',
            'skins/ott/css/icons.css',
        )
    )
);
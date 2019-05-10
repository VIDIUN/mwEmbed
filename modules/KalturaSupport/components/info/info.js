( function( mw, $ ) {"use strict";

mw.PluginManager.add( 'infoScreen', mw.VBaseScreen.extend({

	defaultConfig: {
		parent: "topBarContainer",
		order: 3,
		align: "right",
		tooltip: 'Info',
		showTooltip: true,
		usePreviewPlayer: true,
		previewPlayerEnabled: true,			
		templatePath: 'components/info/info.tmpl.html'
	},
	iconBtnClass: "icon-info"
}));

} )( window.mw, window.jQuery );
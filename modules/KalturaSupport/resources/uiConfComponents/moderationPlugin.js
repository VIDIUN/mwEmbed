( function( mw, $ ) { "use strict";

	mw.PluginManager.add( 'moderation', mw.VBaseScreen.extend({

		defaultConfig: {
			"parent": mw.isMobileDevice() ? 'topBarContainer' : 'controlsContainer',
		 	"order": 62,
		 	"displayImportance": "low",
		 	"align": "right",
		 	"showTooltip": true,
			"smartContainer": 'morePlugins',
			"smartContainerCloseEvent": 'closeMenuOverlay',
			"title": gM("vs-MODERATION-REPORT"),
			"header": gM("vs-MODERATION-HEADER"),
			"text": gM("vs-MODERATION-TEXT"),
			"placeholder": gM("vs-MODERATION-PLACEHOLDER"),
		 	"tooltip": gM("vs-MODERATION-REPORT"),
		 	"reasonSex": gM("vs-MODERATION-REASON-SEX"),
		 	"reasonViolence": gM("vs-MODERATION-REASON-VIOLENCE"),
		 	"reasonHarmful": gM("vs-MODERATION-REASON-HARMFUL"),
		 	"reasonSpam": gM("vs-MODERATION-REASON-SPAM")
		},

		setup: function () {
			this.addBindings();
		},

		addBindings: function () {
			this.bind('onChangeMedia', $.proxy(function () {
				this.getPlayer().triggerHelper( 'onEnableKeyboardBinding' );
				$(this.getPlayer().getPlayerElement()).removeClass( "blur" );
				this.getPlayer().getPlayerPoster().removeClass( "blur" );
			}, this));
		},

		drawModal: function() {
			if (this.isDisabled) return;
			var _this = this;

			var isPlaying = this.getPlayer().isPlaying();
			if( isPlaying ) {
				this.getPlayer().pause();
			}

			// Disable space key binding to enable entering "space" inside the textarea
		 	this.getPlayer().triggerHelper( 'onDisableKeyboardBinding' );
		 	var $header = $( '<h2 />' ).text(this.getConfig( 'header' ));
			var $moderationMessage = $( '<div />' ).append(
				$( '<span />' ).text(this.getConfig( 'text' )),
				$('<div></div>').append(
						$('<i></i>')
							.addClass("icon-toggle")).append(
				$( '<select />' )
					.attr( 'id','flagType' )
					.append(
						$( '<option />' ).attr( 'value', 1 ).text( _this.getConfig( 'reasonSex' ) ),
						$( '<option />' ).attr( 'value', 2 ).text( _this.getConfig( 'reasonViolence' ) ),
						$( '<option />' ).attr( 'value', 3 ).text( _this.getConfig( 'reasonHarmful' ) ),
						$( '<option />' ).attr( 'value', 4 ).text( _this.getConfig( 'reasonSpam' ) )
					)
					.css({'width': '100%', 'height': '26px', 'margin-top': '10px'})),
				$( '<textarea />' )
					.attr( 'id', 'flagComments' )
					.attr( 'placeholder', gM("vs-MODERATION-PLACEHOLDER" ))
					.css({'width': '100%', 'height': '40px', 'margin-top': '10px'}),
				$('<div/>' ).append(
					$( '<div />' )
					.addClass( 'reportButton right' )
					.text( gM("vs-MODERATION-SUBMIT") )
					.click(function() {
						_this.submitFlag({
							'flagType': $( '#flagType' ).val(),
							'flagComments': $( '#flagComments' ).val()
						});
					}) )
			);

			var $moderationScreen = $( '<div />' ).append($header, $moderationMessage );

			var closeCallback = function() {
				// Enable space key binding
				_this.getPlayer().triggerHelper( 'onEnableKeyboardBinding' );
				$(_this.getPlayer().getPlayerElement()).removeClass( "blur" );
				_this.getPlayer().getPlayerPoster().removeClass( "blur" );
				if( isPlaying ) {
					_this.getPlayer().play();
				}
			};

			this.showModal($moderationScreen, closeCallback);
		},
		showModal: function(screen, closeCallback){
			this.getPlayer().disablePlayControls();
			this.getPlayer().layoutBuilder.displayMenuOverlay( screen, closeCallback );
			$(this.getPlayer().getPlayerElement()).addClass("blur");
			this.getPlayer().getPlayerPoster().addClass("blur");
			this.getPlayer().triggerHelper( 'moderationOpen' );
		},
		closeModal: function(){
			this.getPlayer().enablePlayControls();
			$( this.getPlayer().getPlayerElement() ).removeClass( "blur" );
			this.getPlayer().getPlayerPoster().removeClass( "blur" );
			this.getPlayer().layoutBuilder.closeMenuOverlay();
		},
		submitFlag: function(flagObj) {
			var _this = this;
			this.getPlayer().triggerHelper( 'moderationSubmit', flagObj.flagType );
			this.getPlayer().addPlayerSpinner();
			this.getVidiunClient().doRequest( {
				'service' : 'baseentry',
				'action' : 'flag',
				'moderationFlag:objectType' : 'VidiunModerationFlag',
				'moderationFlag:flaggedEntryId' : _this.getPlayer().ventryid,
				'moderationFlag:flagType' : flagObj.flagType,
				'moderationFlag:comments' : flagObj.flagComments
			}, function( data ) {
				_this.getPlayer().hideSpinner();
				var $flagScreen = $( '<div />' )
					.append(
						$( '<h3 />' ).text( gM("vs-MODERATION-THANKS") ),
						$( '<div />' ).append(
							$( '<div />' )
								.addClass( 'reportButton' )
								.text( gM("vs-MODERATION-DONE") )
								.click(function() {
									_this.getPlayer().triggerHelper( 'onEnableKeyboardBinding' );
									_this.closeModal();
								})
						)
					);
				_this.getPlayer().layoutBuilder.displayMenuOverlay( $flagScreen );
			},
			false,
			function(error){
				_this.log("Error sending report to server: " + error);
				_this.getPlayer().layoutBuilder.closeMenuOverlay();
			});
		},
		getComponent: function(){
			var _this = this;
			if( !this.$el ){
				this.$el = $( '<button />' )
								.addClass( 'btn icon-flag' + this.getCssClass() )
								.attr({
									'title': this.getConfig('tooltip')
								})
								.click( function(){
									_this.drawModal();
								});
			}
			return this.$el;
		}
	}));

})( window.mw, window.jQuery );
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
			"minDescriptionLength" : 0,
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
			var embedPlayer = this.getPlayer();

			this.bind('onChangeMedia', $.proxy(function () {
				this.getPlayer().triggerHelper( 'onEnableKeyboardBinding' );
				$(this.getPlayer().getPlayerElement()).removeClass( "blur" );
				this.getPlayer().getPlayerPoster().removeClass( "blur" );
			}, this));

			this.bind('showScreen', function (event, screenName) {
				if ( screenName === "moderation" ){
					this.getInterface().find(".overlay-win .icon-close").focus();
					this.getInterface().find(".overlay").css("z-index","1100"); // force moderation screen to be higher

					embedPlayer.getInterface().find(".overlay").keydown(function(e){
						if(e.keyCode === 9){// keyCode = 9 - tab button
							setTimeout(function () {
								if(!$(':focus').parents('.overlay').hasClass('overlay')){
									embedPlayer.getInterface().find(".overlay-win .icon-close").focus();
								}
							}, 0);
						}
					});
				}
			});
		},
		getScreen: function(){
			return $.Deferred().resolve(this.screen);
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
		 	var $header = $( '<h2 id="dialogTitle" />' ).text(this.getConfig( 'header' ));
			var $moderationMessage = $( '<div id="moderationText" />' ).append(
				$( '<span />' )
					.text(this.getConfig( 'text' ))
					.attr({'title':this.getConfig( 'text' ), 'tabindex':1}),
				$('<div></div>').append(
						$('<i></i>')
							.addClass("icon-toggle")).append(
				$( '<select />' )
					.attr( {'id':'flagType', 'aria-label': 'Choose your reason', 'role':'listbox'} )
					.append(
						$( '<option />' ).attr( {'value': 1, 'role':'option', 'aria-label':_this.getConfig( 'reasonSex' )} ).text( _this.getConfig( 'reasonSex' ) ),
						$( '<option />' ).attr( {'value': 2, 'role':'option', 'aria-label':_this.getConfig( 'reasonViolence' )} ).text( _this.getConfig( 'reasonViolence' ) ),
						$( '<option />' ).attr( {'value': 3, 'role':'option', 'aria-label':_this.getConfig( 'reasonHarmful' )} ).text( _this.getConfig( 'reasonHarmful' ) ),
						$( '<option />' ).attr( {'value': 4, 'role':'option', 'aria-label':_this.getConfig( 'reasonSpam' )} ).text( _this.getConfig( 'reasonSpam' ) )
					)
					.css({'width': '100%', 'height': '26px', 'margin': '10px 0 10px 0'})),
				$( '<label for="flagComments">'+ gM("vs-MODERATION-PLACEHOLDER" ) +'</label>' ),
				$( '<textarea />' )
					.attr( 'id', 'flagComments' )
					.bind('input propertychange', function() {
						if( $(this).val().length == _this.getConfig("minDescriptionLength")){
						$(this).removeClass("validationError");
						}
					})
					.css({'width': '100%', 'height': '40px', 'margin-top': '10px'}),
				$('<div/>' ).append(
					$( '<div />' )
					.addClass( 'reportButton right' )
					.text( gM("vs-MODERATION-SUBMIT-BTN") )
					.attr( 'tabindex',0 )
					.attr( 'role', 'button')
					.click(function() {
						_this.submitFlag({
							'flagType': $( '#flagType' ).val(),
							'flagComments': $( '#flagComments' ).val()
						});
					}) )
			);
			if (mw.isAndroid()){
				$moderationMessage.find(".icon-toggle").remove();
			}
			var $moderationScreen = $( '<div />' ).append($header, $moderationMessage );

			var closeCallback = function() {
				// Enable space key binding
				_this.hideScreen();
				_this.getPlayer().triggerHelper( 'onEnableKeyboardBinding' );
				$(_this.getPlayer().getPlayerElement()).removeClass( "blur" );
				_this.getPlayer().getPlayerPoster().removeClass( "blur" );
				if( isPlaying ) {
					_this.getPlayer().play();
				}
			};
			this.screen = $moderationScreen;
			this.showScreen();
			this.showModal($moderationScreen, closeCallback);

			$moderationScreen.parent().parent().attr({
				"role" : "dialog",
				"aria-labelledby" : "dialogTitle"
			})
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
			//validation length of description check
			if (_this.getConfig("minDescriptionLength") != 0 && flagObj.flagComments.length < this.getConfig("minDescriptionLength")  ){
				this.screen.find("#flagComments").addClass("validationError");
				return;
			}
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
				var tooltipLabel = this.getConfig('tooltip');
				this.$el = $( '<button />' )
								.addClass( 'btn icon-flag' + this.getCssClass() )
								.attr({
									'title': tooltipLabel
								})
								.click( function(){
									_this.drawModal();
								});
				this.setAccessibility(this.$el, tooltipLabel + gM('mwe-embedplayer-open_dialog'));
			}
			return this.$el;
		}
	}));

})( window.mw, window.jQuery );
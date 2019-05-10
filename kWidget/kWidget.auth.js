/**
* A simple authentication api for consuming VS from vidiun authenticated api provider
*/
(function(vWidget){ "use strict"
	if( !vWidget ){
		return ;
	}
	var vAuthentication = function(){
		this.init();
	}
	vAuthentication.prototype = {
		// callbacks to auth object events go here: 
		authCallbackList : [],
		
		// Store the latest user data response
		userData: null,
		
		init: function(){
			var _this = this;
			// setup vars:
			this.authPageUrl = vWidget.getPath() + 'auth/authPage.php';
			this.authOrgin = vWidget.getPath().split('/').slice(0,3).join('/');
			
			// Await postMessage response:
			if( !window.addEventListener ){
				vWidget.log( "vWidget.auth, requires postMessage browser support" );
				return ;
			}
			window.addEventListener( "message", function( event ){
				//console.log( "vWidget.auth: message: ", event.data );
				// check for correct event origin:
				if( event.origin != _this.authOrgin ){
					// error origin mismatch 
					return ;
				}
				if( event.data ){
					try{
						_this.userData = JSON.parse( event.data );
					} catch(e){
						// not json? ignore
						return;
					}
					
					for( var i=0; i < _this.authCallbackList.length; i++ ){
						_this.authCallbackList[i]( _this.userData );
					}
				}
			}, false );
			// Add the communication iframe ( will seed message response if already authenticated )
			// added once document is ready ( all auth checks are async )
			$(document).ready(function(){
				$('body').append(
					$( '<iframe style="width:0px;height:0px;border:none;overflow:hidden;" id="vwidget_auth_iframe">' )
					.attr('src', _this.authPageUrl )
					.load( function(){
						var _this = this;
						// issue postMessage after .25 second to give a chance for the page to be ready.
						setTimeout(function(){
							//console.log( 'auth check: ' + $( _this )[0].contentWindow );
							$( _this )[0].contentWindow.postMessage( 'vidiun-auth-check',  '*');
						}, 250);
					})
				)
			});
		},
		addAuthCallback: function( callback ) {
			// Check if we are already authenticated: 
			if( this.userData ){
				callback( this.userData );
			}
			// Still add the callback for updates ( such as logout or domain deny ) 
			this.authCallbackList.push( callback );
		},
		getWidget: function( targetId, callback ){
			var _this = this;
			var loginText = "Login to Vidiun";
			var denyDomainText = "Please re-login";
			var $userIcon = $('<div>')
			.addClass( 'vidiun-user-icon' )
			.css({
				'display': 'inline',
				'float': 'left',
				'margin-right': 5,
				'width': 33,
				'height': 24,
				'background-image': 'url(\'' + vWidget.getPath() + 'auth/vidiun-user-icon-gray.png\')',
				'background-repeat':'no-repeat',
				'background-position':'bottom left'
			});
			
			$('#' + targetId ).append( 
				$( '<a>' )
				.addClass('btn')
				.append( 
					$userIcon,
					$('<span>')
					.text( loginText )
				).click( function(){
					var authPage = (window.open( _this.authPageUrl +'?ui=1' , 
						'vidiunauth',
						 "menubar=no,location=yes,resizable=no,scrollbars=no,status=no" +
						 "left=50,top=100,width=400,height=250" 
					));
				})
			);
			this.addAuthCallback( function( userData ){
				if( userData.code ){
					var $icon =$('#' + targetId ).find('a div');
					var grayIconUrl = 'url(\'' + vWidget.getPath() + 'auth/vidiun-user-icon-gray.png\')';
					if( grayIconUrl != $icon.css('background-image') ){
						$icon.css({
							'background-image': grayIconUrl
						});
					}
					if( userData.code == 'LOGIN' ){
						if( $('#' + targetId ).find('a span').text() != loginText ){
							$('#' + targetId ).find('a span').text( loginText );
						}
					}
					if(  userData.code == 'DOMAIN_DENY'){
						if( $('#' + targetId ).find('a span').text() != denyDomainText ){
							$('#' + targetId ).find('a span').text( denyDomainText );
						}
					}
					// error check:
					return ;
				}
				// check for data:
				// update the icon to "vidiun light" 
				$('#' + targetId ).find('a').empty()
				.append(
					$userIcon.css({
						'background-image': 'url(\'' + vWidget.getPath() + 'auth/vidiun-user-icon.png\')'
					}),
					$('<span>').text( userData.fullName )
				);
				callback( userData ); 
			})
		}
	}
	
	// export the auth object into vWidget.auth:
	vWidget.auth = new vAuthentication();

})( window.vWidget );

( function( mw, $ ) {"use strict";

mw.PlaylistHandlerVidiun = function( playlist, options ){
	return this.init( playlist, options );
};
// For players playlist that don't have layout information
mw.setConfig('VidiunSupport.PlaylistDefaultItemRenderer', '<HBox id="irCont" height="100%" width="100%" x="10" y="10" verticalAlign="top" styleName="Button_upSkin_default"><Image id="irImageIrScreen" height="48" width="72" url="{this.thumbnailUrl}" source="{this.thumbnailUrl}"/><VBox height="100%" width="100%" id="labelsHolder" verticalGap="0"><HBox id="nameAndDuration" width="100%" height="18"><Label id="irLinkIrScreen" height="18" width="100%" text="{this.name}" styleName="itemRendererLabel" label="{this.name}" prefix="" font="Arial"/><Label id="irDurationIrScreen" height="18" width="70" text="{formatDate(this.duration, \'NN:SS\')}" styleName="itemRendererLabel" prefix="" font="Arial"/></HBox><Label id="irDescriptionIrScreen" width="240" height="18" text="{this.description}" styleName="itemRendererLabel" prefix="" font="Arial"/></VBox></HBox>');

mw.PlaylistHandlerVidiun.prototype = {

	clipList: null,
	widget_id: null,
	playlist_id: null,
	mrssHandler: null,

	playlistSet : [],

	titleHeight : 0, // Vidiun playlist include title via player ( not playlist )

	// ui conf data
	$uiConf : null,
	includeInLayout: true,

	// flag to store the current loading entry
	loadingEntry: null,

	bindPostFix: '.playlistHandlerVidiun',

	// store any playlist loading errors:
	errorMsg: null,

	init: function ( playlist, options ){
		this.playlist = playlist;
		// set all the options:
		for( var i in options){
			this[i] = options[i];
		}
	},
	getConfig: function( key ){
		return this.playlist.embedPlayer.getVidiunConfig( 'playlistAPI', key );
	},
	loadPlaylist: function ( callback ){
		var _this = this;
		var embedPlayer = this.playlist.embedPlayer;
		var $uiConf = embedPlayer.$uiConf;

		mw.log( "mw.PlaylistHandlerVidiun:: loadPlaylist > ");

		// check if we have playlist data
		if( !embedPlayer.vidiunPlaylistData ) {
			mw.log('Error: no playlists were found in embedPlayer.vidiunPlaylistData.');
			return false;
		}

		_this.playlistSet = [];
		// Populate playlist set with vidiunPlaylistData
		for (var playlistId in embedPlayer.vidiunPlaylistData ) {
			if (embedPlayer.vidiunPlaylistData.hasOwnProperty(playlistId)) {
			   _this.playlistSet.push( embedPlayer.vidiunPlaylistData[ playlistId ] );
			}
		}
		// Check if we have playlists
		if( _this.playlistSet.length == 0 ){
			mw.log( "Error: could not find any playlists." );
			return false;
		}		

		var plConf = _this.playlist.embedPlayer.getVidiunConfig(
				'playlist',
				[ 'includeInLayout', 'width', 'height' ]
		);
		// Check for autoContinue
		_this.autoContinue = _this.getConfig( 'autoContinue' );
		mw.log("mw.PlaylistHandlerVidiun::loadPlaylist > autoContinue: " + _this.autoContinue );

		// Set autoPlay
		_this.autoPlay =_this.getConfig( 'autoPlay' );

		// Check for loop
		_this.loop =_this.getConfig( 'loop' );

		// Set width:
		_this.videolistWidth = ( plConf.width )?  plConf.width : $uiConf.find('#playlist').attr('width');
		_this.videolistWidth = _this.videolistWidth ? _this.videolistWidth : 300;

		// Set height:
		_this.videolistHeight = ( plConf.height )?  plConf.height : $uiConf.find('#playlist').attr('height');

		if( plConf.includeInLayout === false || parseInt( $uiConf.find( '#playlistHolder' ).attr('width') ) == 0 ){
			_this.includeInLayout = false;
		} else if( parseInt( _this.videolistWidth ) == 0 ){
			_this.videolistWidth  = 250;
		}

		// Store all the playlist item render information:
		_this.$playlistItemRenderer = $uiConf.find('#playlistItemRenderer');
		if( _this.$playlistItemRenderer.children().length == 0  ){
			// No layout info use default
			var itemRenderer =  mw.getConfig('VidiunSupport.PlaylistDefaultItemRenderer');
			if (mw.isIE8()){
				// for IE8, add xml name spaces for custom HTML tags so jQuery can identify them
				itemRenderer = itemRenderer.split("<HBox").join("<HBox xmlns='HBox'");
				itemRenderer = itemRenderer.split("<VBox").join("<VBox xmlns='VBox'");
			}
			_this.$playlistItemRenderer = $(itemRenderer );
		}

		// Force autoContoinue if there is no interface
		if( !_this.includeInLayout ){
			_this.autoContinue = true;
		}

		mw.log( "PlaylistHandlerVidiun:: got  " +  _this.playlistSet.length + ' playlists ' );
		// Set the playlist to the first playlist
		_this.setPlaylistIndex( 0 );

		// Load playlist by Id
		_this.loadCurrentPlaylist(function(){
			// Check if clipIndex should be updated
			var initItemEntryId = _this.getConfig( 'initItemEntryId' );
			if( initItemEntryId ){
				$.each( _this.getClipList(), function( inx, clip ){
					if( clip.id == initItemEntryId ){
						// Update the clipInx
						_this.playlist.clipIndex = inx;
					}
				});
			}
			if( $.isFunction( callback ) ){
				callback();
			}
		});
	},
	getPlaylistSize: function() {
		var embedPlayer =  this.playlist.getEmbedPlayer();

		// Get Width
		var pWidth = embedPlayer.getVidiunConfig('playlistHolder', 'width');
		if( ! pWidth ) {
			pWidth = embedPlayer.getVidiunConfig('playlist', 'width');
		}
		// Get Height
		var pHeight = embedPlayer.getVidiunConfig('playlistHolder', 'height');
		if( ! pHeight ) {
			pHeight = embedPlayer.getVidiunConfig('playlist', 'height');
		}

		// Add px if not percentage
		if( typeof pWidth == 'string' && pWidth.indexOf('%') == -1 ) {
			pWidth = pWidth + 'px';
		}
		if( typeof pHeight == 'string' && pHeight.indexOf('%') == -1 ) {
			pHeight = pHeight + 'px';
		}

		return {
			width: pWidth,
			height: pHeight
		};
	},
	setupPlaylistMode: function( layout ) {
		var _this = this;
		var embedPlayer =  this.playlist.getEmbedPlayer();

		// Hide our player if not needed
		var playerHolder = embedPlayer.getVidiunConfig('PlayerHolder', ["visible", "includeInLayout"]);
		if( ( playerHolder.visible === false  || playerHolder.includeInLayout === false ) && !embedPlayer.useNativePlayerControls() ) {
			embedPlayer.displayPlayer = false;
		}

		var updateLayout = function() {
			mw.log( "PlaylistHandlerVidiun:: updateLayout:" );
			var playlistSize = _this.getPlaylistSize();
			if( layout == 'vertical' ){
				if( playlistSize.height == '100%' ) {
					var windowHeight = window.innerHeight; 
					if( mw.getConfig( 'EmbedPlayer.IsFriendlyIframe' ) &&  mw.isIOS() ){
						// iOS window.innerHeight return the height of the entire content and not the window so we get the iframe height if we can
						windowHeight = $( window.parent.document.getElementById( embedPlayer.id ) ).height()
					} 
					playlistSize.height = ( windowHeight - embedPlayer.getComponentsHeight() );
				}
				_this.playlist.setVideoWrapperHeight( playlistSize.height );
			} else {
				_this.playlist.getVideoListWrapper().width( playlistSize.width );
			}
		};
		updateLayout();
		embedPlayer.bindHelper( 'updateLayout' + this.bindPostFix, function(){
			updateLayout()
		});
	},
	hasMultiplePlaylists: function(){
		return ( this.playlistSet.length > 1 );
	},
	hasPlaylistUi: function(){
		return this.includeInLayout;
	},
	isNextButtonDisplayed: function(){
		return !!this.playlist.getEmbedPlayer().$uiConf.find( '#nextBtnControllerScreen' ).length;
	},
	isPreviousButtonDisplayed: function(){
		return !!this.playlist.getEmbedPlayer().$uiConf.find( '#previousBtnControllerScreen' ).length;
	},
	getPlaylistSet: function(){
		return this.playlistSet;
	},
	getVideoListWidth: function(){
		// we have to add a bit for spacing ( should fix css files )
		return parseInt( this.videolistWidth ) + 10;
	},
	setPlaylistIndex: function( playlistIndex ){
		this.playlist_id = this.playlistSet[ playlistIndex ].id;
		var embedPlayer =  this.playlist.getEmbedPlayer();
		// Update the player data ( if we can )
		if( embedPlayer.vidiunPlaylistData ){
			embedPlayer.vidiunPlaylistData.currentPlaylistId = this.playlist_id;
		}
	},
	setClipIndex: function( clipIndex ){
		var embedPlayer =  this.playlist.getEmbedPlayer();
		// Update the player data ( if we can )
		if( embedPlayer.vidiunPlaylistData ){
			embedPlayer.vidiunPlaylistData.currentPlaylistId = this.playlist_id;
			embedPlayer.setVidiunConfig( 'playlistAPI', 'dataProvider', {'selectedIndex' : clipIndex} );
		}
	},
	loadCurrentPlaylist: function( callback ){
		this.loadPlaylistById( this.playlist_id, callback );
	},
	loadPlaylistById: function( playlist_id, loadedCallback ){
		var _this = this;
		mw.log("PlaylistHandlerVidiun::loadPlaylistById> " + playlist_id );
		var embedPlayer = this.playlist.embedPlayer;

		if( ! embedPlayer.vidiunPlaylistData ) {
			embedPlayer.vidiunPlaylistData = {};
		}

		// Local ready callback  to trigger playlistReady
		var callback = function(){
			// Check if player is ready before issuing playlist ready event
			if( embedPlayer.playerReadyFlag ) {
				embedPlayer.triggerHelper( 'playlistReady' );
			} else {
				embedPlayer.bindHelper('playerReady.playlistReady', function(){
					$( embedPlayer ).unbind( 'playerReady.playlistReady' );
					embedPlayer.triggerHelper( 'playlistReady' );
				});
			}
			// Issue the callback if set:
			if( $.isFunction( loadedCallback ) ){
				loadedCallback();
			}
		};

		// Check for playlist cache
		if( embedPlayer.vidiunPlaylistData[ playlist_id ] 
			&& embedPlayer.vidiunPlaylistData[ playlist_id ].items
			&& embedPlayer.vidiunPlaylistData[ playlist_id ].items.length ){
			_this.clipList = embedPlayer.vidiunPlaylistData[ playlist_id ].items;
			embedPlayer.setVidiunConfig( 'playlistAPI', 'dataProvider', {'content' : _this.clipList} );
			callback();
			return ;
		}

		var playlistRequest = {
			'service' : 'playlist',
			'action' : 'execute',
			'id': playlist_id
		};
		this.getVClient().doRequest( playlistRequest, function( playlistDataResult ) {
			// Empty the clip list
			_this.clipList = [];
			var playlistData;
			// The api does strange things with multi-playlist vs single playlist
			if( playlistDataResult[0] && playlistDataResult[0].id ){
				playlistData = playlistDataResult;
			} else if( playlistDataResult[0] && playlistDataResult[0][0].id ){
				playlistData = playlistDataResult[0];
			} else {
				mw.log("Error: vidiun playlist:" + playlist_id + " could not load:" + playlistDataResult.code);
				_this.errorMsg = "Error loading playlist:" + playlistDataResult.code;
				callback();
				return ;
			}
			mw.log( 'PlaylistHandlerVidiun::Got playlist of length::' +   playlistData.length );
			if( playlistData.length > mw.getConfig( "Playlist.MaxClips" ) ){
				playlistData = playlistData.splice(0, mw.getConfig( "Playlist.MaxClips" ) );
			}
			// Add it to the cache:
			embedPlayer.vidiunPlaylistData[ playlist_id ].items = playlistData;
			embedPlayer.setVidiunConfig( 'playlistAPI', 'dataProvider', {'content' : playlistData} );
			// update the clipList:
			_this.clipList = playlistData;
			callback();
		});
	},

	getVClient: function(){
		if( !this.vClient ){
			this.vClient = mw.vApiGetPartnerClient( this.widget_id );
		}
		return this.vClient;
	},

	/**
	 * Get clip count
	 * @return {number} Number of clips in playlist
	 */
	getClipCount: function(){
		return this.getClipList().length;
	},

	getClip: function( clipIndex ){
		return this.getClipList()[ clipIndex ];
	},
	getClipList: function(){
		return this.clipList;
	},
	playClip: function( embedPlayer, clipIndex, callback ){
		var _this = this
		if( !embedPlayer ){
			mw.log("Error:: PlaylistHandlerVidiun:playClip > no embed player");
			if( $.isFunction( callback ) ){
				callback();
			}
			return ;
		}
		// Send notifications per play request
		if( clipIndex == 0 ) {
			embedPlayer.triggerHelper( 'playlistFirstEntry' );
		} else if( clipIndex == (_this.getClipCount()-1) ) {
			embedPlayer.triggerHelper( 'playlistLastEntry' );
		} else {
			embedPlayer.triggerHelper( 'playlistMiddleEntry' );
		}

		// Check if entry id already matches ( and is loaded )
		if( embedPlayer.ventryid == this.getClip( clipIndex ).id ){
			if( this.loadingEntry ){
				mw.log("Error: PlaylistHandlerVidiun is loading Entry, possible double playClip request");
			}else {
				embedPlayer.play();
			}
			if( $.isFunction( callback ) ){
				callback();
			}
			return ;
		}
		// Update the loadingEntry flag:
		this.loadingEntry = this.getClip( clipIndex ).id;
		var originalAutoPlayState = embedPlayer.autoplay;

		// Listen for change media done
		var bindName = 'onChangeMediaDone' + this.bindPostFix;
		$( embedPlayer).unbind( bindName ).bind( bindName, function(){
			mw.log( 'mw.PlaylistHandlerVidiun:: onChangeMediaDone' );
			_this.loadingEntry = false;
			// Sync player size
			/*embedPlayer.bindHelper( 'loadeddata', function() {
				embedPlayer.layoutBuilder.syncPlayerSize();
			});*/
			// restore autoplay state: 
			embedPlayer.autoplay = originalAutoPlayState;
			embedPlayer.play();
			if( $.isFunction( callback ) ){
				callback();
			}
		});
		mw.log("PlaylistHandlerVidiun::playClip::changeMedia entryId: " + this.getClip( clipIndex ).id);

		// Make sure its in a playing state when change media is called if we are autoContinuing:
		if( this.autoContinue && !embedPlayer.firstPlay ){
			embedPlayer.stopped = embedPlayer.paused = false;
		}
		// Update the playlist data selectedIndex ( before issuing change media call )
	 	_this.setClipIndex( clipIndex );
		// Use internal changeMedia call to issue all relevant events
	 	
	 	// set autoplay to true to continue to playback: 
	 	embedPlayer.autoplay = true;
		embedPlayer.sendNotification( "changeMedia", {'entryId' : this.getClip( clipIndex ).id, 'playlistCall': true} );
	},
	drawEmbedPlayer: function( clipIndex, callback ){
		var _this = this;
		var $target = _this.playlist.getVideoPlayerTarget();
		mw.log( "PlaylistHandlerVidiun::drawEmbedPlayer:" + clipIndex );
		// Get the embed
		var embedPlayer = _this.playlist.getEmbedPlayer();
		embedPlayer.doUpdateLayout();
		// update the selected index:
		_this.setClipIndex( clipIndex );

		// check if player already ready:
		if( embedPlayer.playerReadyFlag ){
			callback();
		} else {
			// Set up ready binding (for ready )
			$( embedPlayer ).bind('playerReady' + this.bindPostFix, function(){
				callback();
			});
		}

		// Call changeMedia
		if( embedPlayer.ventryid != this.getClip( clipIndex ).id ){
			embedPlayer.sendNotification( 'changeMedia', { entryId: this.getClip( clipIndex ).id} );
		}

	},
	updatePlayerUi: function( clipIndex ){
		// no updates need since vidiun player interface components are managed by the player
	},
	addEmbedPlayerBindings: function( embedPlayer ){
		var _this = this;
		mw.log( 'PlaylistHandlerVidiun:: addEmbedPlayerBindings');
		// remove any old bindings;
		$( embedPlayer ).unbind( this.bindPostFix );
		// add the binding:
		$( embedPlayer ).bind( 'Vidiun_SetVDPAttribute' + this.bindPostFix, function( event, componentName, property, value ){
			mw.log("PlaylistHandlerVidiun::Vidiun_SetVDPAttribute:" + property + ' value:' + value);
			switch( componentName ){
				case "playlistAPI.dataProvider":
					_this.doDataProviderAction( property, value );
				break;
				case 'tabBar':
					_this.switchTab( property, value )
				break;
			}
		});

		$( embedPlayer ).bind( 'Vidiun_SendNotification'+ this.bindPostFix , function( event, notificationName, notificationData){
			switch( notificationName ){
				case 'playlistPlayNext':
				case 'playlistPlayPrevious':
					mw.log( "PlaylistHandlerVidiun:: trigger: " + notificationName );
					$( embedPlayer ).trigger( notificationName );
					break;
			}
		});
	},
	switchTab:function( property, value ){
		if( property == 'selectedIndex' ){
			this.playlist.switchTab( value );
		}
	},
	doDataProviderAction: function ( property, value ){
		 switch( property ){
		 	case 'selectedIndex':
		 		// Update the selected clip ( and actually play it )
		 		this.playlist.playClip( parseInt( value ) );
			break;
		 }
	},
	/**
	* Get an items poster image ( return missing thumb src if not found )
	*/
	getClipPoster: function ( clipIndex, size ){
		if( this.mrssHandler ){
			return this.mrssHandler.getClipPoster( clipIndex, size );
		}
		var clip = this.getClip( clipIndex );
		if( !size ){
			return clip.thumbnailUrl;
		}
		return vWidget.getVidiunThumbUrl({
			'width': size.width,
			'height': size.height,
			'entry_id' : clip.id,
			'partner_id' : clip.partnerId
		});
	},
	/**
	* Get an item title from the $rss source
	*/
	getClipTitle: function( clipIndex ){
		if( this.mrssHandler ){
			return this.mrssHandler.getClipTitle( clipIndex );
		}
		return this.getClip( clipIndex ).name;
	},

	getClipDesc: function( clipIndex ){
		if( this.mrssHandler ){
			return this.mrssHandler.getClipDesc( clipIndex );
		}
		return this.getClip( clipIndex ).description;
	},
	getClipDuration: function ( clipIndex ) {
		if( this.mrssHandler ){
			return this.mrssHandler.getClipDuration( clipIndex );
		}
		// In case of image entry get the real duration
		if( this.getClip( clipIndex).mediaType == 2 ) {
			var embedPlayer = this.playlist.embedPlayer;
			var imageDuration = embedPlayer.getVidiunConfig( '', 'imageDefaultDuration' ) ? embedPlayer.getVidiunConfig( '', 'imageDefaultDuration' ) : mw.getConfig( "EmbedPlayer.DefaultImageDuration" );
			return parseFloat( imageDuration );
		}
		return this.getClip( clipIndex ).duration;
	},
	getPlaylistItem: function( clipIndex ){
		var _this = this;

		var $item = $('<div />');
		$item.append(
			this.getBoxLayout(clipIndex, this.$playlistItemRenderer)
		);
		$item.find('.nameAndDuration')
			.after( $('<div />').css({'display': 'block', 'height': '20px'} ) )
			//.find( 'div span:last' ).css('float', 'right')

		// check for decendent margin-left
		$item.find('.hasMarginLeft' ).slice(1).css('margin-left', '');

		return $item;
	},
	adjustTextWidthAfterDisplay: function( $clipList ){
		var textWidth = $clipList.width() - $clipList.find('img').width();
		// there is about 64 pixles of padding involved;
		textWidth = textWidth - 64;
		$clipList.find( '.irDescriptionIrScreen' ).css( 'width', textWidth );
	},
	getBoxLayout: function(  clipIndex, $currentBox ){
		var _this = this;
		var offsetLeft = 0;
		var $boxContainer = $('<div />');
		$.each( $currentBox.children(), function( inx, boxItem ){
			switch( boxItem.nodeName.toLowerCase() ){
				case 'img':
					var $node = $('<img />');
					// Custom html based alt tag ( not described in uiConf
					$node.attr('alt', _this.getClipTitle( clipIndex ) );
					break;
				case 'vbox':
				case 'hbox':
				case 'canvas':
					var $node = $('<div />');
					if( offsetLeft ){
						$node.css( 'margin-left', offsetLeft )
							.addClass("hasMarginLeft")
					}
					$node.append(
						_this.getBoxLayout( clipIndex, $(boxItem) )
					);
					break;
				case 'spacer':
					// spacers do nothing for now.
					$node = $('<div />').css('display','inline');
					break;
				case 'label':
					var nodeSiblings = $( boxItem ).siblings();
					// Avoid duplicate labels - Skip nodes with common id's that differ 
					// only by the hover prefix, i.e hoverNameLabel and nameLabel
					if ( nodeSiblings && nodeSiblings.length && 
							$(nodeSiblings[0]).attr('id').toLowerCase() == 'hover' + 
							$( boxItem ).attr('id').toLowerCase() ) 
					{
						break;
					}
				case 'text':
					var $node = $('<span />').css('display','block');
					break;
				default:
					var $node = false;
					break;
			}

			if( $node && $node.length ){
				$node.addClass( boxItem.nodeName.toLowerCase() );
				_this.applyUiConfAttributes(clipIndex, $node, boxItem);
				// add offset if not a percentage:
				if( $node.css('width').indexOf('%') === -1 ){
					offsetLeft+= $node.width();
				}
				// Box model! containers should not have width:
				if( $node[0].nodeName.toLowerCase() == 'div' ){
					$node.css('width', '');
				}
				$boxContainer.append( $node );
				// For hboxes add another div with the given height to block out any space represented by inline text types
				if(  boxItem.nodeName.toLowerCase() == 'hbox' ){
					$boxContainer.append(
						//$("<div />").css( 'height', $node.css('height') )
					);
				}
			}
		});

		// check for box model ("100%" single line float right, left );
		if( $boxContainer.find('span').length == 2 && $boxContainer.find('span').slice(0).css('width') == '100%'){
			 $boxContainer.find('span').slice(0).css({'width':'', 'float':'left'});
			 $boxContainer.find('span').slice(1).css('float', 'right');
		} else if ( $boxContainer.find('span').length > 1 ){ // check for multiple spans
			$boxContainer.find('span').each(function(inx, node){
				if( $(node).css('float') != 'right'){
					$(node).css('float', 'left');
				}
			} );
		}
		// and adjust 100% width to 95% ( handles edge cases of child padding )
		$boxContainer.find('div,span').each(function( inx, node){
			//if( $(node).css('width') == '100%')
			$(node).css('width', '');
			// and box layout does crazy things with virtual margins :( remove width for irDescriptionIrScreen
			if( $(node).data('id') == 'irDescriptionIrScreen' || $(node).data('id') == 'irDescriptionIrText'  ){
				$(node).css({
					'height': '',
					'float': 'left'
				});
			}
			if( $(node).hasClass('hbox') || $(node).hasClass('vbox') || $(node).hasClass('canvas') ){
				$(node).css('height', '');
			}

			if( $(node).hasClass('itemRendererLabel')
				&& $(node).css('float') == 'left'
				&& ( $(node).siblings().hasClass('hbox') || $(node).siblings().hasClass('vbox')  )
			){
				$(node).css({
					'display': 'block'
				});
			}

			if( $(node).hasClass('irDurationIrScreen')  ){
				$( node ).css( 'float', 'right');
			}
		});
		return $boxContainer;
	},

	applyUiConfAttributes:function(clipIndex, $target, confTag ){
		var _this = this;
		if( ! confTag ){
			return ;
		}
		var styleName = null;
		var idName = null;
		$.each( confTag.attributes, function( inx , attr){
			switch(  attr.nodeName.toLowerCase() ){
				case 'id':
					idName = attr.nodeValue;
					$target.data('id', idName);
					$target.addClass(idName);
					break;
				case 'stylename':
					styleName = attr.nodeValue;
					$target.addClass(styleName);
					break;
				case 'url':
					$target.attr('src',  _this.uiConfValueLookup( clipIndex, attr.nodeValue ) );
					break;
				case 'width':
				case 'height':
					var appendPx = '';
					if( attr.nodeValue.indexOf('%') == -1 ){
						appendPx= 'px';
					}
					$target.css( attr.nodeName, attr.nodeValue + appendPx );
					break;
				case 'paddingright':
					$target.css( 'padding-right', attr.nodeValue);
					break;
				case 'text':
					var val = _this.uiConfValueLookup( clipIndex, attr.nodeValue ) || '';
					$target.text( val );
					break;
				case 'font':
					var str = attr.nodeValue;
					if( str.indexOf('bold') !== -1 ){
						$target.css('font-weight', 'bold');
						str = str.replace('bold', '');
					}
					var f = str.charAt(0).toUpperCase();
					$target.css('font-family', f + str.substr(1) );
					break;
				case 'x':
					$target.css({
						'left' :  attr.nodeValue
					});
					break;
				case 'y':
					$target.css({
						'top' :  attr.nodeValue
					});
					break;
			}
		});
		// Styles enforce some additional constraints
		switch( styleName ){
			case 'itemRendererLabel':
				// XXX should use .playlist.formatTitle and formatDescription ( once we fix .playlist ref )
				// hack to read common description id ( no other way to tell layout size )
				$target.attr('title', $target.text());
				if( idName =='irDescriptionIrScreen' || idName == 'irDescriptionIrText' ){
					$target.text( _this.playlist.formatDescription( $target.text() ) );
				} else{
					$target.text( _this.playlist.formatTitle( $target.text() ) );
				}
				if( $target.text() == 'null' ){
					$target.text( '' );
				}
				break;
		}
	},
	uiConfValueLookup: function(clipIndex, objectString ){
		var parsedString = objectString.replace( /\{|\}/g, '' );
		var objectPath = parsedString.split('.');
		//mw.log("mw.Playlist:: uiConfValueLookup >: " + objectPath[0]);
		switch( objectPath[0] ){
			case 'div10002(this':
				return this.uiConfValueLookup(clipIndex, 'this.' + objectPath[1].replace( /\)/, '' ) );
				break;
			// XXX todo a more complete parser and ui-conf evaluate property / text emulator
			case 'formatDate(this':
				// xxx should use suggested formating
				return mw.seconds2npt( this.getClipDuration( clipIndex ) );
			break;
			case 'this':
				// some named properties:
				switch( objectPath[1] ){
					case 'thumbnailUrl':
						return this.getClipPoster( clipIndex );
						break;
					case 'name':
						return this.getClipTitle( clipIndex );
						break;
					case 'description':
						return this.getClipDesc( clipIndex );
					break;
				};
				if( this.getClip( clipIndex )[ objectPath[1] ] ){
					return this.getClip( clipIndex )[ objectPath[1] ];
				} else {
					mw.log("Error: Vidiun Playlist Handler could not find property:" + objectPath[1] );
				}

			break;
			default:
				return objectString;
		}
	}
};

} )( window.mediaWiki, window.jQuery );

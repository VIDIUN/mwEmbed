<?php      // Some includes for output of configuration options
require_once( realpath( dirname( __FILE__ ) ) . '/doc-base.php' );
require_once( realpath( dirname( __FILE__ ) ) . '/api_uivars.php' );
require_once( realpath( dirname( __FILE__ ) ) . '/api_methods.php' );
require_once( realpath( dirname( __FILE__ ) ) . '/api_listeners.php');
require_once( realpath( dirname( __FILE__ ) ) . '/api_evaluates.php' );

	function getDocTypeStr( $param ){
		global $objectDefinitions;
		$typeStr = ( isset( $param['type'] ) )?  $param['type'] : 'String';
		$optionalStr = ( isset( $param['optional'] ) )? ' <i>( Optional )</i> ': '';
		
		if( isset( $param['type'] ) &&  isset( $objectDefinitions[ $param['type'] ] )){
			$typeStr = '<a href="#'. $param['type'] . '">'.$param['type'] . '</a>';
		}
		return  '<span class="vartype">' . $typeStr . '</span> ' . $optionalStr;
	}
	function getObjectDocs( $objName ){
		$o='';
		// support recusive lookup for arrays: 
		if( is_array($objName) ){
			foreach( $objName as $name ){
				$o.= getObjectDocs( $name );
			}
			return $o;
		}
		global $objectDefinitions;
		$o= '<hr></hr>'.
			'<h4 class="linkable objectdoc" id="'. $objName . '">' . $objName . '</h4>' .
			'<div class="docblock">'.
			'<ul>';
		foreach( $objectDefinitions[$objName] as $attrName => $attrObj){
			$o.='<li><b>' . $attrName .'</b> ' . getDocTypeStr( $attrObj ) . ' ' . $attrObj['desc'] . '</li>';
		}
		$o.='<ul>';
		return $o;
	}
	function getDocs( $fnName){
		$o='';
		// support recursive lookup for arrays: 
		if( is_array($fnName) ){
			foreach( $fnName as $name ){
				$o.= getDocs( $name );
			}
			return $o;
		}
		global $methodDocs;
		$paramStr = '';
		$paramBlock = '';
		if( isset(  $methodDocs[$fnName]['params'] ) ){
			$paramBlock.='<h5 class="linkable" id="'. $fnName .'-parameters">PARAMETERS:</h5>'.
					'<ul>';
			$coma = '';
			foreach( $methodDocs[$fnName]['params'] as $paramName => $param ){
				if( isset( $param['optional'] ) && $param['optional'] == true ){
					$paramStr.=$coma . ' [' . $paramName . ']';
				} else{
					$paramStr.=$coma. $paramName;
				}
				
				$paramBlock.= '<li><b>' . $paramName . '</b> '.
						getDocTypeStr( $param ) .
						$param['desc'] .
						"</li>";
				$coma = ', ';
			}
			$paramBlock.='</ul>';
		}
		
		$o= '<hr></hr>'.
			'<h4 class="linkable" id="'. $fnName . '">' . $fnName . ' ('. $paramStr . ')</h4>' . 
			'<span class="description">'. $methodDocs[$fnName]['desc'] . '</span>'. 
			'<div class="docblock">';
		// output parameters if set: 
		$o.= $paramBlock;
		// output returns if set:
		if( isset(  $methodDocs[$fnName]['returns'] ) ){
			$o.='<h5 id="'. $fnName .'-returns">RETURNS:</h5>';
			$o.= '<ul><li>' . getDocTypeStr( $methodDocs[$fnName]['returns']  ) .
			 ' ' . $methodDocs[$fnName]['returns']['desc'] . '</li></ul>';
		}
		// output examples if set:
		if( isset( $methodDocs[$fnName]['examples'] ) ){
			$o.='<h5 class="linkable" id="'. $fnName .'-examples">EXAMPLES:</h5><ul>';
			foreach( $methodDocs[$fnName]['examples'] as $example ){
				$text = '';
				if( !isset( $example['type'] ) ){
					$example['type'] = 'link';
				}
				switch ($example['type']) {
					case 'link':
						$link = ( isset( $example['docPath'] ) ) ?
							'index.php?path=' . $example['docPath']: '';
						if( $link == '' && isset( $example['docFullPath'] ) ){
							$link = '../' . $example['docFullPath'];
						}
						$text = '<a href="'. $link . '">' . $example['name'] . '</a>';
						break;
					case 'code':
						$text = $example['name'] . '<br><pre class="prettyprint linenums">'.htmlspecialchars($example['code']).'</pre>';
						break;
				}
				$o.= '<li>'. $text .'</li>';
			}
			$o.='</ul>';
		}
		// close <div class="docblock">
		$o.='</div>';
		return $o;
	}
	function getOutlineContent( $objectSet ){
		$o='<ul class="outline-vars">';
		foreach( $objectSet as $key => $var ){
			$o.='<li class="linkable" id="'. $key .'">';
			$o.='<span class="key">'. $key . '</span><br>';
			$o.= $var['desc'];
			if( isset( $var['example'] ) && $var['example'] != '' ){
				$o.= '<br><a href="'. $var['example'] . '" target="_blank">Usage Example</a>';
			}
			if(  isset( $var['type'] ) ){
				$o.='<br><span class="type">Type</span>: <br>&nbsp;&nbsp;&nbsp;&nbsp;' .$var['type'];
			}
			if( isset( $var['callbackArgs'] ) ){
				$o.='<br><span class="type">Callback Args</span>: <br>&nbsp;&nbsp;&nbsp;&nbsp;' .$var['callbackArgs'];
			}
			if(  isset( $var['params'] ) ){
				$o.='<br><span class="type">Params</span>: <br>&nbsp;&nbsp;&nbsp;&nbsp;' .$var['params'];
			}
			if ( isset( $var['notificationData'] ) ){
				$o.='<br><span class="type">Notification Data</span>: ';
				if( isset( $var['notificationDataType'] ) ){
					$o.='<span class="vartype">' . $var['notificationDataType'] . '</span>';
				}
				$o.=$var['notificationData'];
			}
			if( isset( $var['notificationDataValue'] ) ){
				$o.='<br><span class="type">Sample</span>:<br>';
				if( !is_array( $var['notificationDataValue'] ) ){
					$var['notificationDataValue'] = array( $var['notificationDataValue'] );
				}
				foreach( $var['notificationDataValue'] as $k => $v ){
					$o.='<pre class="prettyprint linenums">vdp.sendNotification("'. $key . '", ' .  $v . ');</pre>';
				}
			}
			if( isset( $var['default'] ) && $var['default'] != '' ){
				$o.='<br><span class="default">Default</span>: <br>&nbsp;&nbsp;&nbsp;&nbsp;' .$var['default'];
			}
			if( isset( $var['availability'] ) && $var['availability'] == 'vdp' ){
				$o.= '<br><span class="label label-warning">Legacy Only</span>';
			}
		}
		$o.='</ul>';
		return $o;
	}

	function getTableContent($headers, $param){
		$paramArrayObject = new ArrayObject($param);
		$paramArrayObject->ksort();
		$o = "<table>";
		$o.= "<tr>";
		foreach( $headers as $header ){
			$o.= "<th>".$header."</th>";
		}
		$o.= "</tr>";
		if( is_array($param) ){
			foreach( $paramArrayObject as $key => $value ){
				$restrictedAvailability = false;
				$o.= '<tr class="linkable" id="'. $key .'">';
				$o.= "<td>".$key;
				foreach( $value as $val => $value1){
					if ($val == 'availability' && $value1 == 'vdp'){
						$o.= '<br><span class="label label-warning">Legacy Only</span>';
						$restrictedAvailability = true;
					}
				}
				//if (!$restrictedAvailability)
				//	$o.= '<br><span class="label label-success">Legacy / Universal</span>';
				$o.= "</td>";

				foreach( $value as $val => $value){
					if ($val != 'availability' && $val != 'example')
						$o.= "<td>".$value."</td>";
					if ($val == 'example'){
						if ($value != ''){
								$o.= '<td><a href="'.$value.'" target="_blank">Example</a></td>';
							}else{
								$o.= '<td>-</td>';
							}

						}
				}
/*
				foreach( $value as $val){
						$o.= "<td>".$val."</td>";
				}
				$o.= "</tr>";*/
			}

		}
		$o.= "</table>";
		return $o;
	}

?>
<style>
	ul.outline-vars li {
		list-style-type: circle;
		padding-top:15px;
	}
	ul.outline-vars .key{
		font-weight:800;
		font-size:110%;
	}
	ul.outline-vars .type, ul.outline-vars .default{
		text-decoration: underline;
		font-weight:800;
	}
	.vartype{
		margin-right:5px;
		border: 2px solid #DDD;
		background-color: #F6F6F6;
		border-radius: 4px;
		padding-left: 3px;
		padding-right: 3px;
	}
	.docblock{
		padding-left:20px;
	}
	.linkable{
		cursor: pointer;
	}
	.objectdoc{
		color:#777;
	}
	table,th,td{
		border:1px solid black;
		border-collapse:collapse;
	}
	th,td{
		padding:5px;
	}
	th{
		text-align:left;
	}
</style>


<script>
//document ready events:
$(function(){
	// make code pretty
	window.prettyPrint && prettyPrint();
	// add linkable actions: 
	$('.linkable').on('click', function(){
		window.location.hash = '#' + $(this).attr('id');
	});
});</script>
<div id="hps-resources"></div>
<h2>Vidiun Player API</h2>
<p>This documentation covers version <strong><i><?php global $wgMwEmbedVersion; echo $wgMwEmbedVersion ?></i></strong> of the html5 library. </p>
<p>
<a href="#vWidget" class="btn btn btn-info">vWidget API &raquo;</a>
<a href="#uiVars" class="btn btn btn-info">UiVars &raquo;</a>
<a href="#vdpAPI" class="btn btn btn-info">Player API &raquo;</a>
<a href="#vWidgetApi" class="btn btn btn-info">VWidget Server API &raquo;</a>
</p>

<a name="vWidget"></a>
<h2>vWidget Embedding API</h2>
The vWidget API is available after you include the Vidiun player library. vWidget provides embedding and basic utility functions.
The Vidiun player library can be embeded into both <a href="http://knowledge.vidiun.com/vidiun-player-sdk-android">Native Android</a>
 and <a href="http://knowledge.vidiun.com/vidiun-player-sdk-ios">Native iOS</a>.
<br><br>Sample JavaScript Vidiun player library include :
<pre class="prettyprint linenums">
&lt!-- Substitute {partner_id} for your Vidiun partner id, {uiconf_id} for uiconf player id --&gt;
&lt;script src=&quot;http://cdnapi.vidiun.com/p/{partner_id}/sp/{partnerId}00/embedIframeJs/uiconf_id/{uiconf_id}/partner_id/{partnerId}&quot;&gt;&lt;/script&gt;
</pre>
After you include the Vidiun player library, the following vWidget API is available:
<div class="docblock">
	<?php echo getDocs( array( 'vWidget.embed', 'vWidget.thumbEmbed', 'vWidget.getVidiunThumbUrl','vWidget.addReadyCallback','vWidget.destroy' ) ) ?>
	<h3 class="linkable" id="vwidget-feature-and-user-agent"> User Agent and Feature Detection </h2>
	<?php echo getDocs( array( 'vWidget.isMobileDevice', 'vWidget.supportsHTML5', 'vWidget.supportsFlash','vWidget.isIOS' ,'vWidget.isIE','vWidget.isIE8', 'vWidget.isAndroid','vWidget.isWindowsDevice') ) ?>
	<h3 class="linkable" id="vwidget-settingsObject"> Settings Embed Object:</h2>
	<?php echo getObjectDocs( array( 'vWidget.settingsObject' ) ) ?>
</div><br><br>
<a name="vWidgetApi"></a>
<h3>Server API requests ( vWidget.api )</h3>
vWidget Server API enables direct <a href="http://www.vidiun.com/api_v3/testmeDoc/index.php">Vidiun Server API</a> calls from JavaScript. 
This should not be confused with the <a href="http://www.vidiun.com/api_v3/testme/client-libs.php">JavaScript client library</a>, 
which offers object mappings and works with the code generated in the 
<a href="http://www.vidiun.com/api_v3/testme/index.php">test me console</a>. <br>
The Vidiun Server API offers minimal object validation, in exchange for being much smaller, and included with every vidiun player library include.<br><br>
Creating a vWidget API object, issue a playlist request, log the result:
<pre class="prettyprint linenums">
new vWidget.api( { 'wid' : '_243342', })
.doRequest({'service':'playlist', 'action': 'execute', 'id': '1_e387kavu'}, 
	function( data ){
		console.log( data );
	}
);
</pre> 
For more examples see the <a href="../vWidget/tests/vWidget.api.html">vWidget.api test page.</a>
<div class="docblock">
	<?php echo getDocs('vWidget.api' ) ?>
	<?php echo getObjectDocs( array( 'vWidget.apiOptions' ) ) ?>
</div>

<a name="uiVars"></a>
<h2>Player Configuration key value pairs ( UiVars )</h2>
<p>
	<?php
		foreach( $uiVars as $key => $na){
			echo '<a href="#uiVars' . ucfirst( $key ) . '" class="btn btn btn-info">' . 
				ucfirst( $key ) . ' &raquo;</a>&nbsp;';
		}
	?>

</p>
UiVars enable configuration of all player features. There are two classes of UiVars: 
<ul>
	<li>top level configuration options</li>  
	<li>plugins configuration options</li>
</ul>
These values can be set a few ways:<br> <br> 
<p>
Within the <a href="http://knowledge.vidiun.com/universal-studio-information-guide">player studio</a>
UiVar configuration appears plugins -> uivars:<br>
<img src="http://knowledge.vidiun.com/sites/default/files/styles/large/public/ui_variables_2.png">
</p>
<p>
You can control the raw JSON code for UiVars by modifying the "uiVars" section of the JSON config using the <a href="http://player.vidiun.com/vWidget/tests/PlayerVersionUtility.html">player version utility</a>. 
</p>
<pre class="prettyprint linenums">
{
   "plugins":{
	/* plugins go here */
   },
   "uiVars": [{
	"key": "autoPlay",
	"value": false,
	"overrideFlashvar": false
   }]
}
</pre>
Player configuration can be set at embed time as "flashvars": 
<pre class="prettyprint linenums">
vWidget.embed({
	...
	flashvars:{
		"autoPlay": false
	}
})
</pre>

</pre>
All player properties can also be retrieved at runtime or used in plugins macro evaluations. 
<pre class="prettyprint linenums">
vWidget.addReadyCallback( function(playerId){
	alert( document.getElementById( playerId ).evaluate("{autoPlay}") );
})
</pre>
Finally many properties can be upated at runtime using <a href="#setVDPAttribute-desc">setVDPAttribute</a>.
<br>

<?php
	foreach( $uiVars as $key => $uiVarSet ){
		echo '<h2 class="linkable objectdoc" id="uiVars' . ucfirst($key) . '">' . ucfirst($key) . '</h2>';
		if( $uiVarSet['desc'] ){
			echo '<p>'. $uiVarSet['desc'] . '</p>';
		}
		// print all the vars: 
		echo '<div class="docblock">' . 
			getOutlineContent( $uiVarSet['vars']) . 
			'</div><br>';
	}
?>

</div><br><br>
<h3>VDP Components & Plugins:</h3>
<p>Using a standard OOP dot notation, each VDP component and plugin attribute can be overridden via Flashvars: objectId.parameter=value.<br>For example, to set the playlist to load automatically, pass the following Flashvar: playlistAPI.autoPlay=true</p><br><br>

Code sample:<br>
<pre class="prettyprint linenums">
vWidget.embed({
  "targetId": "vidiun_player_1402219661",
  "wid": "_1645161",
  "uiconf_id": 24231962,
  "flashvars": {
		'autoMute': true,
		'autoPlay': false,
		'adsOnReplay': true,
		'imageDefaultDuration': 5,
		'mediaProxy.preferedFlavorBR': 1400,
		'closedCaptions': {
				'layout': 'ontop',
				'useCookie': true,
				'defaultLanguageKey': 'en',
				'fontsize': 12,
				'bg' : '0x335544',
				'fontFamily' : 'Arial',
				'fontColor' : '0xFFFFFF',
				'useGlow' : 'false',
				'glowBlur': 4,
				'glowColor': '0x133693'
				}
  },
  "cache_st": 1402219661,
  "entry_id": "1_a3njcsia"
});
</pre>

<br><br>
<a name="vdpAPI"></a>

 <h2>Player API</h2>
<p>The JavaScript API is a two-way communication channel that lets the player communicate what it is doing and lets you instruct the player to perform operations.
<br>For more information: <a href="http://knowledge.vidiun.com/javascript-api-vidiun-media-players#UnderstandingtheJavaScriptAPIWorkflow" target="_blank">JavaScript API for Vidiun Media Players</a></p>
<p>Available JavaScript API:</p>
<a class="btn btn btn-info" href="#vWidget.addReadyCallback-desc">Ready Notifications</a>
<a class="btn btn btn-info" href="#sendNotification-desc">sendNotification</a>
<a class="btn btn btn-info" href="#vBind-desc">Bind</a>
<a class="btn btn btn-info" href="vUnbind-desc">unBind</a>
<a class="btn btn btn-info" href="#evaluate-desc">Evaluate</a>
<a class="btn btn btn-info" href="#setVDPAttribute-desc">Update properties</a>


<a name="vWidget.addReadyCallback-desc"></a>
<h3>Receiving notification that the player API is ready</h3>
<p>See <a href="#vWidget.addReadyCallback">vWidget.addReadyCallback</a> or the "<a href="#vWidget.settingsObject">readyCallback</a>" function within a dynamic embed.</p>

<a name="sendNotification-desc"></a>
<h3>Calling a player method from JavaScript</h3>
<p>Use the <b>sendNotification</b> method to create custom notifications that instruct the player to perform an action, such as play, seek, or pause.</p>
<?php echo getDocs( array( 'sendNotification' ) ) ?>
<br><br>Code sample:<br>
<pre class="prettyprint linenums">
vWidget.addReadyCallback( function( playerId ){
	var vdp = document.getElementById( playerId );
	vdp.vBind( 'mediaReady', function(){
		// Seek to 30 seconds from the start of the video
		vdp.sendNotification("doSeek", 30);
	})
});
</pre>
<h4>Available Notifications:</h4>
<?php
echo '<div class="docblock">' .
		getOutlineContent( $sendNotificationActions) .
	'</div><br>';
?>
<a name="vBind-desc"></a>
<h4>Registering to a player event ( vBind )</h4>
<p>Use the <b>vBind</b> method to add listen for a specific notification that something happened in the player,
such as the video is playing or is paused.</p>
<?php echo getDocs( array( 'vBind' ) ) ?>
<br><br>Code sample:<br>
<pre class="prettyprint linenums">
vWidget.addReadyCallback(function( playerId ){
	var vdp = document.getElementById( playerId );
	// binds an event and namespces it to "myPluginName"
	vdp.vBind("playerUpdatePlayhead.myPluginName", function( data, id ){
		// data = the player's progress time in seconds
		// id = the ID of the player that fired the notification
	});
});
</pre>
<a name="vUnbind-desc"></a>
<h3>Un-registering a player event</h3>
<p>Use the <b>vUnbind</b> method to remove a listener that is no longer needed.</p>
Removing event listeners that are no longer needed can improve performance 
<br><br>Code sample:<br>
<pre class="prettyprint linenums">
vWidget.addReadyCallback(function( playerId ){
	var vdp = document.getElementById( playerId );
	// removes all events namespaced with "myPluginName"
	vdp.vUnbind(".myPluginName");
	// removes events by event name: 
	vdp.vUnbind("playerUpdatePlayhead");
});
</pre>

<h3>Player Life Cycle:</h3>
<?php 
	echo getOutlineContent( $eventsPlayerLifeCycle );
?>
<h3>Player State Events:</h3>
<?php echo getOutlineContent( $eventsPlayerStates ) ?>

<h3>Player Advertisement Related Notifications:</h3>
<?php echo getOutlineContent( $eventAds ) ?>

<h3>Playlist and Related Notifications:</h3>
<?php echo getOutlineContent( $playlists ) ?>


<a name="evaluate-desc"></a>
<h3>Retrieving a player property</h3>
<p>Use the <b>evaluate</b> method to find out something about a player by extracting data from player components.</p>
<?php echo getDocs( array( 'evaluate' ) ) ?>
<br><br>Code sample:<br>
<pre class="prettyprint linenums">
vWidget.addReadyCallback(function( playerId ){
	var vdp = document.getElementById( playerId );
	// alert the entry name
	alert('Entry name: '+ vdp.evaluate('{mediaProxy.entry.name}') );
});
</pre>
<h3>Available Properties:</h3>
<?php echo getOutlineContent( $evaluates ) ?>


<a name="setVDPAttribute-desc"></a>
<h3>Setting a player attribute</h3>
<p>Use the <b>setVDPAttribute</b> method to change a player attribute by setting its value.</p>
<br>Code sample:<br>
<pre class="prettyprint linenums">
vdp.setVDPAttribute("configProxy.flashvars","autoPlay","true")
</pre>
<br><p>Some plugins support runtime updates using <b>setVDPAttribute</b>.
<br>For example, the "theme" plugin supports such updates:</p>
<pre class="prettyprint linenums">
var vdp = document.getElementById('vVideoTarget');
vdp.setVDPAttribute("theme", "buttonsSize", "14");
</pre>
<?php echo getDocs( array( 'setVDPAttribute' ) ) ?>

<h3 id="standAlonePlayerModes" > Stand Alone Player Modes </h3>
	Vidiun player supports several modes for associating content and configuration with the player. To 
	evaluate of what is best for your integration requirements we strongly recommend consulting with Vidiun 
	Solutions team.<br><br>
	
	<ul>
		<li> <b>MediaProxy Override</b> -- Overrides media and player configuration at embed time.
			<ul>
				<li> Good for "light" integrations tests a few lines of JavaScript</li>
				<li> Can be used with changeMedia, to retain CDN cache for player & config</li>
				<li> Not good for portability, native apps, or player iframe services.</li>
				<li> Not compatible with entity baased plugins or clip lists ( playlist, related videos, bumper ) </li> 
			</ul>
		</li>
		<li> <b>Embed Services Lib</b> -- The "embed service" library includes tools for translating your own entitiy 
		 and player JSON data store against Vidiun player provided identifiers.
		 	<ul>
				<li> Recommended approach for connecting the player to multiple entity services outside of Vidiun API</li>
				<li> Retains portability, native apps, and player iframe services.</li>
				<li> Compatible with entity baaed plugins or clip lists ( playlist, related videos, etc. ) </li>
			</ul>
		</li>
		<li> <b> Vidiun Platform API </b> -- baseline platform data provider 
			<ul>
				<li> Uses Vidiun provided entries with flexible custom MetaData store, internal and external asset urls references etc.</li>
			</ul>
		</li>  
	</ul> 
	
<h3 id="mediaProxyObject">MediaProxy Object</h3> 
Defines the full set of entities for mediaProxy object:




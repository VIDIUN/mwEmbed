<!DOCTYPE HTML>
<html>
<head>
<title>Server Side playlist</title>
<script type="text/javascript" src="../../../tests/qunit/qunit-bootstrap.js"></script>
<script type="text/javascript" src="../../../mwEmbedLoader.php"></script>
<script type="text/javascript" src="../../../docs/js/doc-bootstrap.js"></script>
<script type="text/javascript">	
function jsVidiunPlayerTest( videoId ){
	// global jsCallbacks will be re-issued we are testing against inline vWiget calls
	asyncTest("Server side playlist", function(){
		
	});
}
</script>
<!-- qunit-vidiun must come after qunit-bootstrap.js and after mwEmbedLoader.php and after any jsCallbackReady stuff-->
<script type="text/javascript" src="resources/qunit-vidiun-bootstrap.js"></script>
</head>
<body>
<h2>Server Side playlist</h2>
<p style="max-width:800px;">
<b>Server Side playlists</b> are built on the server and are in the page before javascript or the player is invoked.
This is best for cases where you need to optimize your playlists for search engine discoverability.

A sample file getVidiunPlaylist.php is included that includes a single simple method for 
translating vidiun playlist api response into a ul list

The on-page plugin handles binding all elements of your choosing. 
</p>
<?php 
include_once dirname( __FILE__ ) . '/getVidiunPlaylist.php';
$playlist = getVidiunPlaylist( '243342', '1_h92ak5el' );
?>
<br>
<h3>Player with Default Entry</h3>
<div id="vidiun_player" style="width:560px;height:330px;"></div>
<script type="text/javascript">
	// only set autoplay if running a test:
	vWidget.embed({
		'targetId': 'vidiun_player',
		'wid': '_243342',
		'uiconf_id' : '12905712',
		'entry_id' : '0_l1v5vzh3',
		'readyCallback': function( playerId ){
			var vdp = $( '#' + playerId ).get(0);
			$('li.vidiun-video').click(function(){
				var entryId = $(this).find('a').attr('data-entryid');
				vdp.sendNotification('changeMedia', {'entryId': entryId } );
			})
		}
	});
</script>
<br>
<div style="clear:both"></div>
<br>
<h3>Playlist Title: <?php echo $playlist['meta']['name']?></h3>
<ul class="thumbnails">
<?php 
foreach( $playlist['playlist'] as $key => $entry ){
	$entry =  (array)$entry;
?>
	<li itemscope itemtype="http://schema.org/VideoObject" 
		class="vidiun-video span2">
		<meta itemprop="duration" content="<?php echo $entry['duration'] ?>"
		<meta itemprop="thumbnailURL" content="<?php echo $entry['thumbnailUrl'] ?>">
		<a data-entryid="<?php echo $entry['id'] ?>" href="#" class="thumbnail" title="<?php echo $entry['name'] ?>">
			<img alt="<?php echo htmlspecialchars( $entry['name'] )?>" 
				style="width: 160px; max-height: 120px;" 
				src="<?php echo $entry['thumbnailUrl'] ?>/width/160">
		</a>
		<span itemprop="description"><?php echo htmlspecialchars( $entry['name'] )?></span>
	</li>
<?php 
}
?>
</ul>
<h3>Player includes on-page playlist binding</h3>
<pre  class="prettyprint linenums">
vWidget.embed({<br/>		'targetId': 'vidiun_player',<br/>		'wid': '_243342',<br/>		'uiconf_id' : '12905712',<br/>		'entry_id' : '0_l1v5vzh3',<br/>		'readyCallback': function( playerId ){<br/>			var vdp = $( '#' + playerId ).get(0);<br/>			$('li.vidiun-video').click(function(){<br/>				var entryId = $(this).find('a').attr('data-entryid');<br/>				vdp.sendNotification('changeMedia', {'entryId': entryId } );<br/>			})<br/>		}<br/>	});
</pre>
<h3>Server side code to generate playlist</h3>
<pre  class="prettyprint linenums">
&lt;?php <br/>include_once dirname( __FILE__ ) . '/getVidiunPlaylist.php';<br/>$playlist = getVidiunPlaylist( '243342', '1_h92ak5el' );<br/>
?&gt;
&lt;ul class=&quot;thumbnails&quot;&gt;<br/>&lt;?php <br/>foreach( $playlist['playlist'] as $key =&gt; $entry ){<br/>	$entry =  (array)$entry;<br/>?&gt;<br/>	&lt;li itemscope itemtype=&quot;http://schema.org/VideoObject&quot; <br/>		class=&quot;vidiun-video span2&quot;&gt;<br/>		&lt;meta itemprop=&quot;duration&quot; content=&quot;&lt;?php echo $entry['duration'] ?&gt;&quot;<br/>		&lt;meta itemprop=&quot;thumbnailURL&quot; content=&quot;&lt;?php echo $entry['thumbnailUrl'] ?&gt;&quot;&gt;<br/>		&lt;a data-entryid=&quot;&lt;?php echo $entry['id'] ?&gt;&quot; href=&quot;#&quot; class=&quot;thumbnail&quot; title=&quot;&lt;?php echo $entry['name'] ?&gt;&quot;&gt;<br/>			<br/>				alt=&quot;&lt;?php echo htmlspecialchars( $entry['name'] )?&gt;&quot; <br/>				style=&quot;width: 160px; max-height: 120px;&quot; <br/>				src=&quot;&lt;?php echo $entry['thumbnailUrl'] ?&gt;/width/160&quot;&gt;<br/>		&lt;/a&gt;<br/>		&lt;span itemprop=&quot;description&quot;&gt;&lt;?php echo htmlspecialchars( $entry['name'] )?&gt;&lt;/span&gt;<br/>	&lt;/li&gt;<br/>&lt;?php <br/>}<br/>?&gt;<br/>&lt;/ul&gt;
</pre>
<h3>getVidiunPlaylist.php</h3>
<pre  class="prettyprint linenums">
&lt;?php <br/>// Include the vidiun php api, you can get your copy here:<br/>// http://www.vidiun.com/api_v3/testme/client-libs.php<br/>require_once( dirname( __FILE__ ) . '/../../../modules/VidiunSupport/Client/vidiun_client_v3/VidiunClient.php');<br/>/**<br/> * Takes in a : <br/> * $wid, string, The widget id <br/> * $playlistId, string, The playlist_id<br/> */<br/>function getVidiunPlaylist( $partnerId, $playlistId ){<br/>	$config = new VidiunConfiguration($partnerId);<br/>	$config-&gt;serviceUrl = 'http://www.vidiun.com/';<br/>	$client = new VidiunClient($config);<br/>	$client-&gt;startMultiRequest();<br/>	// the session: <br/>	$vparams = array();<br/>	$client-&gt;addParam( $vparams, 'widgetId', '_' . $partnerId );<br/>	$client-&gt;queueServiceActionCall( 'session', 'startWidgetSession', $vparams );<br/>	// The playlist meta:<br/>	$vparams = array();<br/>	$client-&gt;addParam( $vparams, 'vs', '{1:result:vs}' );<br/>	$client-&gt;addParam( $vparams, 'id', $playlistId );<br/>	$client-&gt;queueServiceActionCall( 'playlist', 'get', $vparams );<br/>	// The playlist entries: <br/>	$client-&gt;queueServiceActionCall( 'playlist', 'execute', $vparams );<br/>	<br/>	$rawResultObject = $client-&gt;doQueue();<br/>	return array(<br/>		'meta' =&gt; (array)$rawResultObject[1],<br/>		'playlist' =&gt; (array)$rawResultObject[2] <br/>	);<br/>}
?&gt;
</pre>
</body>
</html>
<?php 
	// Some includes for output of configuration options
	require_once( realpath( dirname( __FILE__ ) ) . '/doc-base.php' );
?>
<div id="hps-resources"></div>
		<a id="githublink" href="https://github.com/vidiun/mwEmbed"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png" alt="Fork me on GitHub"></a>
		<h3>Developer Resources</h3>
		<p style="margin-right: 40px;">Vidiun Players Framework Developer Resources. Learn how to build plugins, customize the player, use the API, test and tweak performance. Check us out <a href="http://github.com/vidiun/mwEmbed">on GitHub</a> and join the project. <br>
		<!-- This documentation covers version 
			<strong><i><?php global $wgMwEmbedVersion; echo $wgMwEmbedVersion ?></i></strong> of the html5 library.   -->
		</p>
		<script>  </script>
		<p>
		<a href="#Getting Started" class="btn btn btn-info btn-large">Getting Started &raquo;</a>
		<a href="https://github.com/vidiun/mwEmbed/issues/new" class="btn btn btn-info btn-large">Report an Issue &raquo;</a>
		<a href="http://www.vidiun.org/forums/html5-video/html5-video" class="btn btn btn-info btn-large">Questions & Feedback &raquo;</a>
		<a href="index.php?path=readme" class="btn btn btn-info btn-large">Readme &raquo;</a>
		</p>
		<div class="row-fluid">
			<div class="span8">
			  <h3>Vidiun HTML5 Library Docs & Guides</h3	>
			  <ul>
			  	<li><a href="http://html5video.org/wiki/Vidiun_HTML5_Configuration" target="_new">Vidiun HTML5 FAQ</a> A detailed list of frequenly used configuration options</li>
			  	<li><a href="http://html5video.org/wiki/Vidiun_OnPage_Plugins">OnPage Plugins</a> Documentation about building on page plugins</li>
			  </ul>
				<p><a class="btn" href="http://knowledge.vidiun.com">Vidiun Knowledge Center&raquo;</a></p>
			</div><!--/span-->
		</div>
		<div class="row-fluid">
			<div class="span9">
				<a name="Getting Started"></a>
				<h3>Getting Started</h3>
				To get started with player v2 please read the 
				<a href="http://knowledge.vidiun.com/vidiun-player-v2-toolkit-theme-skin-guide">skin and component guide</a>. 
				<a name="Setup and Embed"></a>
				<h3>Setup and Embed</h3>
				<ul>
					<li>The Vidiun Management Console ( VMC ) provides four embedding options:
						<ul>
							<li><a href="index.php?path=Tools/Embedding/autoEmbed">AutoEmbed</a>: Single line of script! Great for quickly getting a
							player on the page.</li>
							<li><a href="index.php?path=Tools/Embedding/vwidget">Dynamic Embed</a>: Great for code integration in web apps.
							Responsive web-design friendly. Cleaner configuration.</li>
							<li><a href="index.php?path=Tools/Embedding/thumb">Thumbnail embed</a>: Fast loading, great for pages with lots of
							players. Best used in video-blogs.</li>
							<li>Iframe: Single line of HTML! Great for when JS is not allowed.
							Best option for Share/Embed players.</li>
						</ul>
					</li>
				</ul>
				
				<a name="Overview"></a>
				<h3>Overview</h3>
				<ul>
					<li>Complete API and Player integration overview doc ( <a href="http://cdnknowledge.vidiun.com/sites/default/files/Vidiun%20API%20and%20Players%20Framework%20Training%20for%20Developers_0.pdf">PDF</a> ) </li>
					<li>Unified Flash and HTML5 API</li>
					<li>Intelligent per-platform player selection</li>
					<li>Open Source and Widely Used.</li>
				</ul>
				<h3>Vidiun Player Toolkit ( v2 )</h3>
				<ul>
					<li>Vidiun Player Toolkit; HTML5 first player across platforms</li>
					<ul>
						<li>JSON config</li>
						<li>CSS based skins with state classes</li>
						<li>Simple plugins with extended base component classes</li>
						<li>Native iOS and Android components</li>
					</ul>
				</ul>
				<h3>Legacy: Vidiun Flash Player� aka VDP3</h3>
				<ul>
					<li>Vidiun Dynamic Player is a Flash based media player</li>
					<li>An XML configuration file defines its layout, behavior
						and visual elements/skin. The XML is dubbed uiConf</li>
					<li>Flash VDP is based Open Source Standards:</li>
					<ul>
						<li>Adobe OSMF</li>
						<li>PureMVC</li>
						<li>Yahoo! Astra</li>
						<li>Fl Components</li>
						<li>Vidiun ActionScript 3 Client Library</li>
					</ul>
				</ul>
				<a name="vWidget API"></a>
				<h3>vWidget API</h3>
				<ul>
					<li>vWidget.embed – Dynamic Embed</li>
					<li>vWidget.thumbEmbed – Thumbnail Embed</li>
					<li>vWidget.getVidiunThumbUrl – Get thumbnail URL</li>
					<li>vWidget.addReadyCallback – Add event listener, listen to when players on the page are ready for JS binding</li>
					<li>vWidget.destory – Removes the player from the DOM</li>
				</ul>
				<a name="Player JavaScript API"></a>
				<h3>Player JavaScript API - Basic Example</h3>
				Log Player Id to Console, once Player is Ready to Play
				<pre class="prettyprint linenums">vWidget.embed({<br/>		'targetId': 'myVideoTarget',<br/>		'wid': '_243342',<br/>		'uiconf_id' : '12905712',<br/>		'entry_id' : '0_uka1msg4',<br/>		'readyCallback': function( playerId ){<br/>			console.log( &quot;Hello World, playerId: &quot; + playerId );<br/>		}<br/>});</pre>
				
			</div><!--/span-->
		</div>
		<div class="row-fluid">
			<div class="span8">
			  <h3>HTML5Video.org Blog</h3>
			  <p>Learn more about html5video on html5video.org</p>
			  <p><a class="btn" href="http://html5video.org/blog/">HTML5Video.org Blog&raquo;</a></p>
			</div><!--/span-->
 		</div><!--/row-->
 		<div class="row-fluid">
			<div class="span8">
			  <h3>Player Framework Performance Tools</h3>
			  <p>Compare performance of the vidiun html5 library with other popular html5 libraries</p>
			  <p><a class="btn" href="index.php?path=performance">Performance page &raquo;</a></p>
			</div><!--/span-->
		</div><!--/row-->
		<div class="row-fluid">
			<div class="span8">
			  <h3>Vidiun and Open Source</h3>
			  <p>Learn more about vidiun and open source</p>
			  <p><a class="btn" href="http://www.vidiun.org">Vidiun.org &raquo;</a></p>
			</div><!--/span-->
		</div>
 		<div class="row-fluid">
 			<div class="span8">
				  <h3>Automated Testing</h3>
				  <p id="testswarm-status"> loading ... </p>
				  <p><a class="btn" href="http://html5video.org/testswarm/user/vbot">View automated tests&raquo;</a></p>
				<script>
					$(function(){
						$.getJSON('http://html5video.org/testswarm/api.php?action=user&item=vbot&format=jsonp&callback=?', function( data ){
							$ul = $('<ul />');
							$.each( data.user.recentJobs, function( inx, job ){
								$ul.append(
									$('<li />').append(
										$( '<a />')
											.text( 'Job ' + job.id )
											.attr('href', 'http://html5video.org/testswarm/job/'+ job.id ),
										$('<span />').text( ' -- '),
										job.name 
									)
								)	
							});
							$('#testswarm-status').empty().append( $ul );
						});
					});
				</script>
			</div><!--/span-->
		</div><!--/row-->
 		<div class="row-fluid">
 			<div class="span8">
			  <h3>Recent Commits</h3>
			  <p id="github-commits"></p>
			  <p><a class="btn" href="http://github.com/vidiun/mwEmbed/">Commits on github &raquo;</a></p>
			 <script src="<?php echo $pathPrefix; ?>js/github.commits.widget.js"></script>
			 <script> 
				 $(function() {
					 $('#github-commits').githubInfoWidget(
						 { user: 'vidiun', repo: 'mwEmbed', branch: 'master' });
				 });
			 </script>
			</div>
		</div><!--/row-->

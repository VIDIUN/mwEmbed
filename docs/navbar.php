<?php 
	$featureSet = include( 'featureList.php' );
	$o = '<ul id="vdoc-navbar">';
	foreach( $featureSet as $featureCategoryKey => $featureCategory ){
		// output a top level li
		$o.='<li class="nav-header nav-category">' .
			'<a title="' . $featureCategory['title'] . '" ' . 
				'class="link-category" ' .
				'href="#vdoc-nav-' . $featureCategoryKey . '" '.
			'>' .
				'<i class="kicon-'. strtolower( $featureCategoryKey ) . '"></i>' .
				'<span>'. str_replace('_', ' ', $featureCategory['title']  ) .'</span>' .
		'	</a>'; 
		$o.='<ul id="vdoc-nav-' . $featureCategoryKey . '" class="nav nav-list featureset" style="height:0px;overflow:hidden;">';
		foreach( $featureCategory['featureSets'] as $featureSetKey => $featureSet){
			$o .='<li class="nav-header nav-featureset" >' .
					'<a title="' . $featureSet['title'] . '" ' . 
						'onClick="javascript:$(this).parent().parent().css(\'height\',\'auto\');" '.
						'href="#vdoc-nav-' . $featureSetKey . '" ' .
					'>' . 
							$featureSet['title'] . 
					'</a>' . 
				'</li>';
			$o .= '<ul id="vdoc-nav-' . $featureSetKey .'" style="height:0px;overflow:hidden;">';
			foreach( $featureSet['testfiles'] as $testfileKey =>  $testfile ){
				$o.= '<li class="featurefile" style="line-height: 24px"><a href="index.php?path=' .$testfileKey . '">' . $testfile['title'] . '</a></li>';
			}
			$o .= '</ul>';
		}		
		$o.='</ul>';
		$o.='</li>';
	}
	$o.= '</ul>';
	echo $o;
?>

<!--  build out automatically.
              <li class="nav-header">Embeding</li>
              <li><a href="#">Object rewrite</a></li>
              <li><a href="#">vWidget embed</a></li>
              <li><a href="#">vWidget thumb embed</a></li>
              <li><a href="#">Vwidget Playlist</a></li>
              <li class="nav-header">Analytics</li>
              <li><a href="#">Nielsen Combined</a></li>
              <li><a href="#">Nielsen Video Sensus</a></li>
              <li><a href="#">Vidiun Analytics</a></li>
              <li><a href="#">Omniture</a></li>
              <li><a href="#">Conviva</a></li>
              <li class="nav-header">Ads</li>
              <li><a href="#">Vidiun Vast ads</a></li>
              <li><a href="#">Double Click</a></li>
              <li><a href="#">Freewheel</a></li>
              <li class="nav-header">Player Features</li>
              <li><a href="#">Playlist</a></li>
              <li><a href="#">Access controls</a></li>
              <li><a href="#">Bumper etc.</a></li>
 -->
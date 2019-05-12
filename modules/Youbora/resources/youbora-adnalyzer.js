/**
 * @license,
 * Youbora Plugin Vidiun player
 * Copyright NicePopleAtWork & Vidiun
 * @author Jordi Aguilar & Dan Ziv
 */

var VERSION = '1.0.0';

$YB.adnalyzers.VidiunAds = function (plugin) {
  try {
    this.adnalyzerVersion = '5.4.5-' + VERSION + '-vidiunads-js';

    // Reference to the plugin where it was called.
    this.startMonitoring(plugin, plugin.player);

    this.resetValues();

    this.registerListeners();
  } catch (err) {
    $YB.error(err);
  }
};

// Inheritance
$YB.adnalyzers.VidiunAds.prototype = new $YB.adnalyzers.Generic();

// Expose info from ads plugin
$YB.adnalyzers.VidiunAds.prototype.getMediaPlayhead = function () {
  if (this.plugin.viewManager.isShowingAds) {
    return this.mediaPlayhead;
  } else {
    return this.plugin.getPlayhead();
  }
};

$YB.adnalyzers.VidiunAds.prototype.getAdPlayhead = function () {
  return this.playhead;
};

$YB.adnalyzers.VidiunAds.prototype.getAdPosition = function () {
  var pos = this.ads.getPlayer().adTimeline.currentAdSlotType;
  switch (pos) {
    case 'preroll':
    case 'pre':
      return 'pre';
    case 'postroll':
    case 'post':
      return 'post';
     case 'bumperPreSeq':
       return 'pre_sequence_bumper';
     case 'bumperPostSeq':
      return 'post_sequence_bumper';
    default:
      return 'mid';
  }
};

$YB.adnalyzers.VidiunAds.prototype.getAdDuration = function () {
  return this.duration;
};

$YB.adnalyzers.VidiunAds.prototype.getAdTitle = function () {
  return this.title;
};

$YB.adnalyzers.VidiunAds.prototype.getAdPlayerVersion = function () {
  return 'vidiun-player-v' + MWEMBED_VERSION;
};

// Register listeners
$YB.adnalyzers.VidiunAds.prototype.registerListeners = function () {
  try {
    this.enableAdBufferMonitor();

    //Save context
    var adnalyzer = this;

    this.ads.bind('onAdPlay', function (e, id, system, type, position, duration, podPosition, podStartTime, title, props) {
      if (type === 'overlay'){
        return;
      }
      adnalyzer.title = title;
      adnalyzer.duration = duration;
      adnalyzer.mediaPlayhead = podStartTime;
      adnalyzer.startJoinAdHandler();
    });

      this.ads.bind( 'onPlayerStateChange', function ( event, newState ) {
          if ( newState === "pause" ) {
              adnalyzer.pauseAdHandler();
          } else if ( newState === "play" ) {
              adnalyzer.resumeAdHandler();
          }
      } );

    this.ads.bind('AdSupport_AdUpdatePlayhead', function (e, currentTime) {
      adnalyzer.playhead = currentTime;
    });

    this.ads.bind('onAdComplete', function () {
      adnalyzer.endedAdHandler();
      adnalyzer.resetValues();
    });

    this.ads.bind('onAdSkip', function () {
      adnalyzer.skipAdHandler();
      adnalyzer.resetValues();
    });


  } catch (error) {
    $YB.error(error);
  }
};

$YB.adnalyzers.VidiunAds.prototype.resetValues = function () {
  this.title = '';
  this.mediaPlayhead = 0;
  this.duration = 0;
  this.playhead = 0;
};

function jsVidiunPlayerTest( videoId ){
		module('RaptMedia');

    window.onTestPlayerPlayed = function setPlayedOnce() {
        window.RaptMedia_playing = true;
    };

    var vdp = $('#' + videoId)[0];

    asyncTest('RaptMedia plugin exists', function() {
        vidiunQunitWaitForPlayer(function(){
            equal(vdp.evaluate('{raptMedia.plugin}'), true, 'RaptMedia plugin exists');
            start();
        });
    });
    asyncTest('Playback has started', function() {
        vidiunQunitWaitForPlayer(function() {
            vdp.addJsListener('playerPlayed', 'onTestPlayerPlayed');
					  vdp.sendNotification('doPlay');
            setTimeout(function() {
                ok(window.RaptMedia_playing, 'Player has started playing');
                start();
            }, 2000);  // NOTE 2s to start playing should be enough
        });
    });
}
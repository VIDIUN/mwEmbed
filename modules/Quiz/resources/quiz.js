/**
 * Created by mark.feder Vidiun.
 *
 * */

(function (mw, $) {
    "use strict";
    $.cpObject = {};
    $.quizParams = {};
    mw.PluginManager.add('quiz', mw.VBaseScreen.extend({
        defaultConfig: {
            parent: "controlsContainer",
            order: 5,
            align: "right",
            tooltip: gM('mwe-quiz-tooltip'),
            visible: false,
            showTooltip: true,
            displayImportance: 'medium',
            templatePath: '../Quiz/resources/templates/quiz.tmpl.html',
            usePreviewPlayer: false,
            previewPlayerEnabled: false
        },

        isSeekingIVQ:false,
        inFullScreen:false,
        selectedAnswer:null,
        seekToQuestionTime:null,
        multiStreamWelcomeSkip:false,
        IVQVer:'IVQ-2.41.rc2',

        setup: function () {
            var _this = this;
            var embedPlayer = _this.getPlayer();
            // make sure we actually have a layout builder
            embedPlayer.getInterface();
            embedPlayer.disableComponentsHover();
            mw.log("Quiz: " + _this.IVQVer);
            this.bind('onChangeStream', function () {
                mw.log("Quiz: multistream On");
                _this.multiStreamWelcomeSkip = true;
            });

            embedPlayer.addJsListener( 'vdpReady', function(){
                _this.VIVQModule = new mw.VIVQModule(embedPlayer, _this);
                _this.VIVQModule.isVPlaylist = (typeof (embedPlayer.playlist) === "undefined" ) ? false : true;

                if (embedPlayer.vidiunPlayerMetaData.capabilities === "quiz.quiz"){
                    if (embedPlayer.autoplay) {
                        embedPlayer.autoplay = false;
                    }

                    _this.VIVQModule.setupQuiz().fail(function(data, msg) {
                        mw.log("Quiz: error loading quiz, error: " + msg);
                        embedPlayer.hideSpinner();
                        _this.VIVQModule.unloadQuizPlugin(embedPlayer);
                        embedPlayer.enablePlayControls();
                    }).done(function(data) {
                        mw.log("Quiz: setup is completed, continuing...");
                    });

                    _this.VIVQScreenTemplate = new mw.VIVQScreenTemplate(embedPlayer);

                    if(_this.VIVQModule.isVPlaylist){
                        _this.VIVQModule.unloadQuizPlugin(embedPlayer);
                        embedPlayer.stop();
                    }else{
                        if(!_this.multiStreamWelcomeSkip){
                            embedPlayer.disablePlayControls();
                        }
                        embedPlayer.addPlayerSpinner();
                    };

                    _this.VIVQModule.checkCuepointsReady(function(){

                        _this.addBindings();

                        if(_this.VIVQModule.isVPlaylist){
                            embedPlayer.stop();//
                            _this.enablePlayDuringScreen = false;
                            _this.ssWelcome();
                            mw.log("Quiz: playlistWelcome");
                        };
                        embedPlayer.hideSpinner();
                        embedPlayer.enablePlayControls();
                    });

                    mw.log("Quiz: Quiz Loading..");

                    try {
                        var cssLink = "modules/Quiz/resources/css/quizFonts.css";
                        cssLink = cssLink.toLowerCase().indexOf("http") === 0 ? cssLink : vWidget.getPath() + cssLink;
                        if (!$("link[href=cssLink]").length){
                            $('head', window.parent.document).append('<link type="text/css" rel="stylesheet" href="' + cssLink + '"/>');
                        }
                    }
                    catch(err) {
                        mw.log("Quiz: Err loading fonts :"+err.message);
                    }
                }
                else{
                    _this.VIVQModule.unloadQuizPlugin(embedPlayer);
                    embedPlayer.enablePlayControls();
                    if(_this.VIVQModule.isVPlaylist){
                        _this.embedPlayer.setVDPAttribute('playlistAPI','autoContinue',true);
                    };
                 }
            });
        },
        addBindings: function () {
            var _this = this;
            var embedPlayer = this.getPlayer();
            mw.log("Quiz: Add Bindings ");
            if (!_this.multiStreamWelcomeSkip){
                this.bind('prePlayAction'+_this.VIVQModule.bindPostfix, function (e, data) {
                    mw.log("Quiz: Bind PrePlay");
                    if(!_this.VIVQModule.isVPlaylist){
                        if(_this.getPlayer().firstPlay) {
                            mw.log("Quiz: Welcome");
                            data.allowPlayback = false;
                            _this.enablePlayDuringScreen = false;
                            _this.ssWelcome();

                        }else{
                            _this.VIVQModule.showQuizOnScrubber();
                            mw.log("Quiz: preplay Show Quiz on Scrubber");
                        };
                    };
                    _this.unbind('prePlayAction' + _this.VIVQModule.bindPostfix);
                });
            }else{
                this.bind('prePlayAction'+_this.VIVQModule.bindPostfix, function (e, data) {
                    _this.VIVQModule.showQuizOnScrubber();
                });
                _this.VIVQModule.continuePlay();
            };
            this.bind('VidiunSupport_CuePointReached'+_this.VIVQModule.bindPostfix, function (e, cuePointObj) {
                if(!_this.isSeekingIVQ){
                    if ((_this.seekToQuestionTime ===  cuePointObj.cuePoint.startTime)
                        || (_this.seekToQuestionTime === null))
                         {
                        _this.VIVQModule.cuePointReachedHandler(e, cuePointObj);
                        _this.seekToQuestionTime = null;
                        mw.log("Quiz: CuePoint Reached time: " + cuePointObj.cuePoint.startTime);
                    }
                }
                if(_this.enablePlayDuringScreen) {
                    _this.enablePlayDuringScreen = false;
                }
            });

            embedPlayer.bindHelper('seeked'+_this.VIVQModule.bindPostfix, function () {
               _this.isSeekingIVQ = false;
                mw.log("Quiz: Seeked");
            });

            embedPlayer.bindHelper('seeking'+_this.VIVQModule.bindPostfix, function () {
                _this.isSeekingIVQ = true;
                mw.log("Quiz: Seeking.. ");
            });

            embedPlayer.bindHelper('playbackComplete'+_this.VIVQModule.bindPostfix, function(){
                _this.VIVQModule.quizEndScenario();
                mw.log("Quiz: playbackComplete");
            });

            embedPlayer.bindHelper('onOpenFullScreen'+_this.VIVQModule.bindPostfix, function() {
                _this.inFullScreen = true;
                if (!_this.isScreenVisible()) {
                    _this.VIVQModule.showQuizOnScrubber();
                }
            });
            embedPlayer.bindHelper('onCloseFullScreen'+_this.VIVQModule.bindPostfix, function() {
                _this.inFullScreen = false;
                if (!_this.isScreenVisible()) {
                    _this.VIVQModule.showQuizOnScrubber();
                }
            });
            embedPlayer.bindHelper( 'preShowScreen'+_this.VIVQModule.bindPostfix, function( event, screenName ){
                if ( !embedPlayer.isInSequence() ){
                    embedPlayer.disablePlayControls();
                    embedPlayer.triggerHelper( 'onDisableKeyboardBinding');
                }
                _this.VIVQModule.hideQuizOnScrubber();
            });
            embedPlayer.bindHelper( 'preHideScreen'+_this.VIVQModule.bindPostfix, function( event, screenName ){
                if (screenName != 'quiz' && !_this.getPlayer().firstPlay){
                    _this.VIVQModule.showQuizOnScrubber();
                }
            });
            embedPlayer.bindHelper('hideScreen'+_this.VIVQModule.bindPostfix, function(event, screenName){
                if(screenName === 'quiz'){
                    if (!_this.embedPlayer._playContorls){
                        _this.VIVQModule.showQuizOnScrubber();
                        embedPlayer.enablePlayControls();
                        mw.log("Quiz: Continue Play Hide Screen");
                        embedPlayer.play();
                    };
                }
            });
          },
        getVClient: function () {
            if (!this.vClient) {
                this.vClient = mw.vApiGetPartnerClient(this.embedPlayer.vwidgetid);
            }
            return this.vClient;
        },
        getTemplateHTML: function (data) {
            var defer = $.Deferred();
            var quizStartTemplate = this.getTemplatePartialHTML("quizstart");
            var $template = $(quizStartTemplate({
                'quiz': this,
                quizStartTemplate: quizStartTemplate
            }));
            return defer.resolve($template);
        },

        showScreen:function(){
            this.embedPlayer.pause();
            this._super();
        },

        ssWelcome: function () {
            var _this = this;
            _this.ivqShowScreen();
            _this.VIVQScreenTemplate.tmplWelcome();

            $(".welcome").html(gM('mwe-quiz-welcome'));
                if ($.quizParams.allowDownload ) {
                    $(".pdf-download").prepend('<div class="pdf-download-img">' +
                    '</div><div class="pdf-download-txt">'
                    + gM('mwe-quiz-pdf')+'</div>');

                    $(".pdf-download-img").on('click',function(){
                        _this.VIVQModule.getIvqPDF(_this.embedPlayer.ventryid);
                    });
                }
                $.grep($.quizParams.uiAttributes, function (e) {
                     switch(e.key){
                        case 'welcomeMessage':
                            $(".welcomeMessage").html(e.value);
                            break;
                        case 'inVideoTip':
                            if (e.value ==='true'){
                                $(".InvideoTipMessage").html(gM('mwe-quiz-invideoTip'));
                            }
                            break;
                    }
                });

            $(".confirm-box").html(gM('mwe-quiz-continue')).show()
                .on('click', function () {
                    _this.VIVQModule.checkIfDone(-1);
                });
        },

        ssAlmostDone: function (unAnsweredArr) {
            var _this = this,embedPlayer = this.getPlayer();;

            _this.ivqShowScreen();
            _this.VIVQScreenTemplate.tmplAlmostDone();

            $(".title-text").html(gM('mwe-quiz-almostDone'));
            $(".sub-text").html(gM('mwe-quiz-remainUnAnswered') + '</br>' + gM('mwe-quiz-pressRelevatToAnswer'))
            $(".confirm-box").html(gM('mwe-quiz-okGotIt'))

            $(document).off('click','.confirm-box')
                .on('click', '.confirm-box', function () {
                    _this.embedPlayer.stopPlayAfterSeek = false;
                    _this.embedPlayer.seek(0,false);
                    _this.ivqHideScreen();
                });
        },

        ssDisplayHint: function(questionNr){
            var _this = this;
            var embedPlayer = _this.getPlayer();
            $("<div>"+ gM('mwe-quiz-hint') +"</div>").prependTo(".header-container").addClass('hint-why-box')
                .on('click', function () {
                    _this.VIVQScreenTemplate.tmplHint();
                    $(".header-container").addClass('close-button')
                        .on('click', function () {
                            _this.ssSetCurrentQuestion(questionNr,true);
                        });
                    $(".hint-container").append($.cpObject.cpArray[questionNr].hintText);
                })
        },
        ssDisplayWhy: function (questionNr) {
            var _this = this;
            $("<div>"+ gM('mwe-quiz-why') +"</div>").prependTo(".header-container").addClass('hint-why-box')
                .on('click', function () {
                    _this.VIVQScreenTemplate.tmplWhy();
                    $(".header-container").addClass('close-button')
                        .on('click', function () {
                            _this.VIVQScreenTemplate.tmplReviewAnswer();
                            _this.ssReviewAnswer(questionNr);
                        });
                    $(".hint-container").append($.cpObject.cpArray[questionNr].explanation);
                })
        },
        ssSetCurrentQuestion: function (questionNr,replaceContentNoReload) {
            var _this = this,cPo = $.cpObject.cpArray[questionNr];

            _this.ivqShowScreen();
            _this.VIVQScreenTemplate.tmplQuestion();

            if ($.cpObject.cpArray[questionNr].hintText){
                _this.ssDisplayHint(questionNr)
            }

            if (cPo.question.length < 68){
                $(".display-question").addClass("padding7");
            }
            $(".display-question").text(cPo.question);
            $.each(cPo.answeres, function (key, value) {
                var div= $("<div class ='single-answer-box-bk'>"
                + "<div class ='single-answer-box-txt' id="
                + key + "><p></p></div></div>");
                div.find('p').text(value);
                div.appendTo('.answers-container');
            });

            if (cPo.isAnswerd){
                _this.showAnswered(cPo, questionNr);
            }
            else {
                _this._selectAnswerConroller(cPo, questionNr);
            }
            this.addFooter(questionNr);
        },
        ssAllCompleted: function () {
            var _this = this;
            _this.VIVQModule.reviewMode = true;
            _this.ivqShowScreen();
            _this.VIVQScreenTemplate.tmplAllCompleted();

            $(".title-text").html(gM('mwe-quiz-completed'));
            $(".sub-text").html(gM('mwe-quiz-TakeAMoment') + '<strong> '+ gM('mwe-quiz-review').toLowerCase() +' </strong>'
                + gM('mwe-quiz-yourAnswers') + '</br><strong> '+ gM('mwe-quiz-or') +' </strong>'
                + gM('mwe-quiz-goAhead')+ '<strong> '+ gM('mwe-quiz-submit').toLowerCase() +' </strong>'
            );

            $(".review-button").html(gM('mwe-quiz-review'))
                .on('click', function () {
                    _this.embedPlayer.seek(0,true);
                    _this.VIVQModule.continuePlay();
                });

            $(".submit-button").html(gM('mwe-quiz-submit'))
                .on('click', function () {
                    $(this).off('click');
                    $(this).html(gM('mwe-quiz-plsWait'));
                    _this.VIVQModule.setSubmitQuiz();
                });
        },
        ssSubmitted: function (score) {
            var _this = this,cpArray = $.cpObject.cpArray;
            _this.ivqShowScreen();
            _this.VIVQScreenTemplate.tmplSubmitted();

            $(".title-text").html(gM('mwe-quiz-Submitted'));

            if ($.quizParams.showGradeAfterSubmission){
                if (!$.quizParams.showCorrectAfterSubmission) {
                    $(".title-text").addClass("padding23");
                    $(".sub-text").html(gM('mwe-quiz-completedScore')
                    + '<span class="scoreBig">' + score + '</span>' + ' %');
                    $(".bottomContainer").addClass("paddingB20");
                } else {
                    if(cpArray.length <= 6){
                        $(".title-text").addClass("padding10");
                    }else{
                        $(".title-text").addClass("padding3");
                    }

                    $(".sub-text").html(gM('mwe-quiz-completedScore')
                    + '<span class="scoreBig">' + score + '</span>' + ' %' + '</br>'
                    + gM('mwe-quiz-reviewSubmit'));

                    _this.VIVQModule.displayHex(_this.VIVQModule.setHexContainerPos("current"),cpArray);

                    $(document).off('click','.q-box')
                        .on('click', '.q-box', function () {
                            _this.VIVQScreenTemplate.tmplReviewAnswer();
                            _this.ssReviewAnswer(parseInt($(this).attr('id')));
                        });
                    $(document).off('click','.q-box-false')
                        .on('click', '.q-box-false', function () {
                            _this.VIVQScreenTemplate.tmplReviewAnswer();
                            _this.ssReviewAnswer(parseInt($(this).attr('id')));
                        });
                }
            }else{
                $(".title-text").addClass("padding23");
                $(".sub-text").html(gM('mwe-quiz-completedQuiz'));
                $(".bottomContainer").addClass("paddingB20");
            }
            $(document).off('click','.confirm-box')
            $(".confirm-box").html(gM('mwe-quiz-done'))
                .on('click', function () {
                    if (mw.isMobileDevice() || _this.embedPlayer.getPlayerElementTime() === 0 ){
                        _this.VIVQModule.continuePlay();
                    }else {
                        _this.VIVQScreenTemplate.tmplThankYou();
                        $(".title-text").html(gM('mwe-quiz-thankYou'));
                        $(this).delay(1000).fadeIn(function () {
                            _this.VIVQModule.quizEndFlow = false;
                            if (_this.embedPlayer.getPlayerElementTime() > 0) {
                                _this.ivqHideScreen();
                                _this.embedPlayer.seek(0, false);
                            }
                            _this.VIVQModule.continuePlay();
                        });
                    }
                    if(_this.VIVQModule.isVPlaylist){
                        mw.log("Quiz: Playlist Auto Continue After Submitted");
                        _this.embedPlayer.setVDPAttribute('playlistAPI','autoContinue',true);
                    }
                });
        },
        ssReviewAnswer: function (selectedQuestion) {
            var _this = this;

            if ($.cpObject.cpArray[selectedQuestion].explanation ){
                _this.ssDisplayWhy(selectedQuestion)
            }
            $(".reviewAnswerNr").append(_this.VIVQModule.i2q(selectedQuestion));
            //$(".theQuestion").html(gM('mwe-quiz-q') + "  " + $.cpObject.cpArray[selectedQuestion].question);
            $(".theQuestion").html($.cpObject.cpArray[selectedQuestion].question);
            $(".yourAnswerText").html(gM('mwe-quiz-yourAnswer'));
            $(".yourAnswer").html($.cpObject.cpArray[selectedQuestion].answeres[$.cpObject.cpArray[selectedQuestion].selectedAnswer]);
            if (!$.cpObject.cpArray[selectedQuestion].isCorrect) {
                $(".yourAnswer").addClass("wrongAnswer")
            }
            $(".correctAnswerText").html(gM('mwe-quiz-correctAnswer'));

            $(".correctAnswer").html(function () {
                if (!$.isEmptyObject($.cpObject.cpArray[selectedQuestion].correctAnswerKeys)) {

                    return $.cpObject.cpArray[selectedQuestion]
                        .answeres[
                        _this.VIVQModule.q2i($.cpObject.cpArray[selectedQuestion].correctAnswerKeys[0].value)
                        ];
                }
                else {return " "}
            });
            $('.gotItBox').html(gM('mwe-quiz-gotIt')).bind('click', function () {
                _this.ssSubmitted(_this.VIVQModule.score);
            });
        },
        showSelectedQuestion:function(questionNr){
            var _this = this;
            $('.single-answer-box-txt#'+_this.selectedAnswer +'')
                .parent().addClass("wide")
                .addClass('single-answer-box-bk-apply')
                .children().removeClass('single-answer-box-txt')
                .addClass(function(){
                    $(this).addClass('single-answer-box-txt-wide')
                        .after($('<div></div>')
                            .addClass("single-answer-box-apply qContinue")
                            .text(gM('mwe-quiz-continue'))
                    )
                });
        },
        showAnswered: function (cPo, questionNr) {
            var _this = this;
            $.each(cPo.answeres, function (key, value) {
                if (key == $.cpObject.cpArray[questionNr].selectedAnswer) {
                    $('#' + key).parent().addClass("wide single-answer-box-bk-apply disable");
                    $('#' + key).removeClass('single-answer-box-txt')
                        .addClass(function(){
                            $(this).addClass('single-answer-box-txt-wide ')
                                .after($('<div></div>')
                                    .addClass("single-answer-box-apply qApplied disable")
                                    .text(gM('mwe-quiz-applied'))
                            )
                        });
                }
            });
            if ($.quizParams.allowAnswerUpdate ) {
                _this._selectAnswerConroller(cPo, questionNr);
            }
        },
        _selectAnswerConroller: function (cPo, questionNr) {
            var _this = this;
            if (_this.VIVQModule.quizSubmitted) {return false};

            if (_this.selectedAnswer &&! cPo.selectedAnswer ){
                _this.showSelectedQuestion(questionNr);
            };

            $('.single-answer-box-bk').off().on('click',function(e){

                if ($(this).hasClass('disable')) {return false};

                if (e.target.className === 'single-answer-box-apply qContinue' ){
                    e.stopPropagation();
                    $('.single-answer-box-bk').addClass('disable');
                    $('.single-answer-box-apply').fadeOut(100,function(){
                        $(this).addClass('disable')
                            .removeClass('qContinue')
                            .text(gM('mwe-quiz-applied'))
                            .addClass('qApplied').fadeIn(100);
                    });
                    _this.VIVQModule.submitAnswer(questionNr,_this.selectedAnswer);
                    _this.selectedAnswer = null;
                    setTimeout(function(){_this.VIVQModule.checkIfDone(questionNr)},1800);
                }
                else{
                    $('.answers-container').find('.disable').removeClass('disable');
                    $('.single-answer-box-bk').each(function () {
                        $(this).removeClass('wide single-answer-box-bk-apply single-answer-box-bk-applied');
                        $('.single-answer-box-apply').empty().remove();
                        $(this).children().removeClass('single-answer-box-txt-wide').addClass('single-answer-box-txt');
                    });

                    $(this).addClass("wide")
                        .addClass('single-answer-box-bk-apply')
                        .children().removeClass('single-answer-box-txt')
                        .addClass(function(){
                            $(this).addClass('single-answer-box-txt-wide')
                                .after($('<div></div>')
                                    .addClass("single-answer-box-apply qContinue")
                                    .text(gM('mwe-quiz-continue'))
                            )
                        });
                    _this.selectedAnswer =  $('.single-answer-box-txt-wide').attr('id');
                }
            });
        },
        ivqShowScreen:function(){
            var _this = this,embedPlayer = this.getPlayer();
            _this.showScreen();
        },
        ivqHideScreen:function(){
            var _this = this,embedPlayer = this.getPlayer();
            embedPlayer.getInterface().find('.ivqContainer').empty().remove();
            _this.hideScreen();
            _this.embedPlayer.enablePlayControls();
            _this.embedPlayer.triggerHelper( 'onEnableKeyboardBinding' );
            _this.VIVQModule.showQuizOnScrubber();
            $(".icon-close").css("display", "");
        },
        addFooter: function (questionNr) {
            var _this = this;

            if (_this.VIVQModule.quizSubmitted) {
                $(".ftr-right").html(gM('mwe-quiz-next')).on('click', function () {
                    _this.VIVQModule.continuePlay();
                });
                return;
            }
            if (_this.VIVQModule.reviewMode) {
                $(".ftr-left").append ($('<span>   ' +  gM('mwe-quiz-review').toUpperCase()
                + ' ' + gM('mwe-quiz-question') + ' ' + this.VIVQModule.i2q(questionNr)
                + '/' + $.cpObject.cpArray.length + '</span>'));

                $(".ftr-right").html(gM('mwe-quiz-next')).on('click', function () {
                    _this.VIVQModule.continuePlay();
                });
            } else {
                $(".ftr-left").append($('<span> ' + gM('mwe-quiz-question') + ' ' + this.VIVQModule.i2q(questionNr)
                + '/' + $.cpObject.cpArray.length + '</span>')
                    .css("float", "right")
                    .css("cursor","default"))
                    .append($('<div></div>')
                        .addClass("pie")
                        .css("float", "right"))
                    .append($('<span>' + (_this.VIVQModule.getUnansweredQuestNrs()).length + ' '
                    + gM('mwe-quiz-unanswered') + '</span>')
                        .css("float", "right")
                        .css("cursor","default"));
                if (_this.VIVQModule.canSkip) {
                    var skipTxt;
                    if ($.cpObject.cpArray[questionNr].isAnswerd){
                        skipTxt = gM('mwe-quiz-next');
                    }else{
                        skipTxt = gM('mwe-quiz-skipForNow');
                    }
                    $(".ftr-right").html(skipTxt).on('click', function () {
                        _this.VIVQModule.checkIfDone(questionNr)
                    });
                }else if(!_this.VIVQModule.canSkip && $.cpObject.cpArray[questionNr].isAnswerd ){
                    $(".ftr-right").html(gM('mwe-quiz-next')).on('click', function () {
                        _this.VIVQModule.checkIfDone(questionNr)
                    });
                }
            }
        },
        displayBubbles:function(){
            var  _this = this,displayClass,embedPlayer = this.getPlayer(),handleBubbleclick;
            var scrubber = embedPlayer.getInterface().find(".scrubber");
            var buSize = _this.VIVQModule.bubbleSizeSelector(_this.inFullScreen);

            _this.VIVQModule.hideQuizOnScrubber();

            var buCotainerPos = _this.VIVQModule.quizEndFlow ? "bubble-cont bu-margin3":"bubble-cont bu-margin1";

            scrubber.parent().prepend('<div class="'+buCotainerPos+'"></div>');

            $.each($.cpObject.cpArray, function (key, val) {
                displayClass = val.isAnswerd ? "bubble bubble-ans " + buSize.bubbleAnsSize
                    : "bubble bubble-un-ans " + buSize.bubbleUnAnsSize;

                var pos = (Math.round(((val.startTime/embedPlayer.vidiunPlayerMetaData.msDuration)*100) * 10)/10)-1;
                $('.bubble-cont').append($('<div id ="' + key + '" style="margin-left:' + pos + '%">' +
                    _this.VIVQModule.i2q(key) + ' </div>')
                        .addClass(displayClass)
                );
            });

            if (_this.VIVQModule.canSkip) {
                handleBubbleclick = '.bubble';
            }
            else{
                handleBubbleclick = '.bubble-ans';
            }
            $('.bubble','.bubble-ans','.bubble-un-ans').off();
            $(handleBubbleclick).on('click', function () {
                var qNumber = parseInt($(this).attr('id'));
                _this.seekToQuestionTime = $.cpObject.cpArray[qNumber].startTime;
                _this.VIVQModule.gotoScrubberPos(qNumber);
                _this.isSeekingIVQ = true;
                mw.log("Quiz: gotoScrubberPos : " + qNumber);
            });
        },
        displayQuizEndMarker:function(){
            var  _this = this;
            var scrubber = this.embedPlayer.getInterface().find(".scrubber");

            scrubber.parent().prepend('<div class="quizDone-cont"></div>');

            $(document).off( 'click', '.quizDone-cont' )
                .on('click', '.quizDone-cont', function () {
                    _this.VIVQModule.quizEndScenario();
                });
        }
    }));
})(window.mw, window.jQuery);

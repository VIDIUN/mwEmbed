/**
 * Created by mark.feder on 10/13/2015.
 */
(function (mw, $) {
    "use strict";
    mw.VIVQApi = function (embedPlayer) {
        return this.init(embedPlayer);
    };
    if (!(mw.VIVQApi.prototype = {
            bindPostfix: '.VIVQApi',
            init: function (embedPlayer) {

                var _this = this;
                this.destroy();
                this.embedPlayer = embedPlayer;

                this.getUserEntryIdAndQuizParams = function(callback){

                    var getQuizuserEntryIdAndQuizParams = [{
                        'service': 'userEntry',
                        'action': 'list',
                        'filter:objectType': 'VidiunQuizUserEntryFilter',
                        'filter:entryIdEqual': _this.embedPlayer.ventryid,
                        'filter:userIdEqualCurrent':'1',
                        'filter:orderBy': '-createdAt'
                    }, {
                        'service': 'quiz_quiz',
                        'action': 'get',
                        'entryId': _this.embedPlayer.ventryid
                    }];

                    _this.getVClient().doRequest(getQuizuserEntryIdAndQuizParams, function (data) {

                        callback(data);
                    });
                };
                this.getQuestionAnswerCuepoint = function(vQuizUserEntryId,callback){

                    var getCp = [{
                        'service': 'cuepoint_cuepoint',
                        'action': 'list',
                        'filter:entryIdEqual': _this.embedPlayer.ventryid,
                        'filter:objectType': 'VidiunQuestionCuePointFilter',
                        'filter:cuePointTypeEqual': 'quiz.QUIZ_QUESTION',
                        'filter:orderBy': '+startTime'
                    },{
                        'service': 'cuepoint_cuepoint',
                        'action': 'list',
                        'filter:objectType': 'VidiunAnswerCuePointFilter',
                        'filter:entryIdEqual':_this.embedPlayer.ventryid,
                        'filter:quizUserEntryIdEqual':vQuizUserEntryId,
                        'filter:cuePointTypeEqual': 'quiz.QUIZ_ANSWER'
                    }];

                    _this.getVClient().doRequest(getCp, function (data) {

                        callback(data);
                    });
                };

                this.createQuizUserEntryId = function(callback){

                    var createQuizuserEntryId = {
                        'service': 'userEntry',
                        'action': 'add',
                        'userEntry:objectType': 'VidiunQuizUserEntry',
                        'userEntry:entryId': _this.embedPlayer.ventryid
                    };

                    _this.getVClient().doRequest(createQuizuserEntryId, function (data) {
                        callback(data);
                    });

                };
                this.addAnswer = function(isAnswered,selectedAnswer,vQuizUserEntryId,questionNr,callback){

                    var _this = this,answerParams = {};
                    var quizSetAnswer = {
                        'service': 'cuepoint_cuepoint',
                        'cuePoint:objectType': "VidiunAnswerCuePoint",
                        'cuePoint:answerKey': selectedAnswer,
                        'cuePoint:quizUserEntryId': vQuizUserEntryId
                    };

                    if (isAnswered) {
                        answerParams = {
                            'action': 'update',
                            'id': $.cpObject.cpArray[questionNr].answerCpId,
                            'cuePoint:entryId': _this.embedPlayer.ventryid
                        }
                    } else {
                        answerParams = {
                            'action': 'add',
                            'cuePoint:entryId': $.cpObject.cpArray[questionNr].cpEntryId,
                            'cuePoint:parentId': $.cpObject.cpArray[questionNr].cpId,
                            'cuePoint:startTime': '0'
                        };
                    }

                    $.extend(quizSetAnswer, answerParams);
                    _this.getVClient().doRequest(quizSetAnswer, function (data) {

                        callback(data);
                    });
                };

                this.submitQuiz = function (vQuizUserEntryId,callback) {

                    var submitQuizParams = {
                        'service': 'userEntry',
                        'action': 'submitQuiz',
                        'id': vQuizUserEntryId
                    };
                    _this.getVClient().doRequest(submitQuizParams, function (data) {

                        callback(data);

                    });
                };

                this.downloadIvqPDF = function (EntryId,callback) {
                    var downloadPdf = {
                        'service': 'quiz_quiz',
                        'action': 'getUrl',
                        'quizOutputType':1,
                        'entryId': EntryId
                    };
                    _this.getVClient().doRequest(downloadPdf, function (data) {
                        callback(data);
                    });
                };
            },
            destroy: function () {

            },

            getVClient: function () {
                var _this = this;
                if (!this.vClient) {
                    this.vClient = mw.vApiGetPartnerClient(_this.embedPlayer.vwidgetid);
                }
                return this.vClient;
            }

        })) {
    }
})(window.mw, window.jQuery );


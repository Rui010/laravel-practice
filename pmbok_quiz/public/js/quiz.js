(function() {
    'use strict';
    // var quizSet = @json(quizSet);
    var quizSet = [
        {
            question: "q1",
            answers: ["a1","a2","a3"],
            answer: 1
        },
        {
            question: "q2",
            answers: ["a1","a2","a3"],
            answer: 2
        },
        {
            question: "q3",
            answers: ["a1","a2","a3"],
            answer: 0
        }
    ];
    var quizApp = (quizSet) => {
        return {
            answers: [],
            correctCount: 0,
            correctRate: function() {
                return this.correctCount / this.questions.length;
            },
            comment: function() {
                if (this.correctRate() == 1) {
                    return "Perfect！";
                } else if (this.correctRate > 0.8) {
                    return "OK！";
                } else if (this.correctRate > 0.5) {
                    return "・・・";
                } else {
                    return "がんばりましょう。";
                }
            },
            questionIndex: 0,
            questions: quizSet
        }
    };
    var app = new Vue({
        el: '#app',
        data: quizApp(quizSet),
        methods: {
            addAnswer: function(index) {
                this.answers.push(index);
                if (this.questions.length == this.answers.length) {
                    var correctCount = 0;
                    for (var i in this.answers) {
                        var answer = this.answers[i];
                        if (answer == this.questions[i].answer) {
                            correctCount++;
                        }
                    }
                    this.correctCount = correctCount;
                } else {
                    this.questionIndex++;
                }
            }
        },
        computed: {
            currentQuestion: function() {
                return this.questions[this.questionIndex];
            },
            numQuestion: function() {
                return this.questions.length;
            }
        }
    });
})();
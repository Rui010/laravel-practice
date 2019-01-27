(function() {
    'use strict';
    var NUM_QUESTION = 10;
    axios
    .get('/api/cell')
    .then((respose)=>{
        // console.log(respose);
        main(createQuiz(respose.data))
    });
    
    var createQuiz = (data) => {
        // console.log(data);
        var quizSet = [];
        var process = data.map(x=>x['process']);
        
        // console.log(knowledge_area,pm_process_group,process);
        for (var i = 0; i < NUM_QUESTION; i++) {
            var temp = {};
            temp.question = data[i]['knowledge_area'] + " / " + data[i]['pm_process_group'];
            temp.answers = [];
            temp.answers[0] = data[i]['process'];
            temp.answers[1] = "aa";
            temp.answer = 0;
            quizSet.push(temp);
        }
        console.log(quizSet);
        return quizSet;
    };
    var main = (data) => {
        // var quizSet = [
        //     {
        //         question: "q1",
        //         answers: ["a1","a2","a3"],
        //         answer: 1
        //     },
        //     {
        //         question: "q2",
        //         answers: ["a1","a2","a3"],
        //         answer: 2
        //     },
        //     {
        //         question: "q3",
        //         answers: ["a1","a2","a3"],
        //         answer: 0
        //     }
        // ];
        // console.log(quizSet);
        var quizApp = (data) => {
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
                questions: data
            }
        };
        var app = new Vue({
            el: '#app',
            data: quizApp(data),
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
    };
})();
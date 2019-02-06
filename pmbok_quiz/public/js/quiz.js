$(function() {
    'use strict';
    var NUM_QUESTION = 10;
    $('#cover').fakeLoader({
        timeToHide: 6000,
        zIndex: "999",
    });
    axios
    .get('/api/cell')
    .then((respose)=>{
        // console.log(respose);
        main(createQuiz(respose.data));
        $("#cover").fadeOut("normal");
    });

    var shuffleList = (max, num, remove_list=[]) => {
        var arr = Array(max);
        arr = arr.fill(0).map((x,i) => x + i);
        arr = arr.filter(function(x) {
            return remove_list.indexOf(x) == -1;
        });

        for (var i = 0; i < arr.length; i++) {
            var rand = Math.floor(Math.random() * (i + 1));
            var tmp = arr[i];
            arr[i] = arr[rand];
            arr[rand] = tmp;
        }
        return arr.slice(0,num);
    };

    var serchSameCell = (data, knowledge_area, pm_process_group) => {
        var ret = [];
        ret = data.filter(function(x) {
            return x["knowledge_area"] == knowledge_area;
        }).filter(function(x) {
            return x["pm_process_group"] == pm_process_group;
        }).map((x)=>{
            return x["id"];
        });
        return ret;
    };
    
    var serchSameCellProcess = (id, data, knowledge_area, pm_process_group) => {
        var ret = [];
        ret = data.filter(function(x) {
            return x["knowledge_area"] == knowledge_area;
        }).filter(function(x) {
            return x["pm_process_group"] == pm_process_group;
        }).filter((x)=>{
            return x["id"] != id;
        }).map((x)=>{
            return x["process"];
        });
        return ret;
    };

    var createQuiz = (data) => {
        // console.log(data);
        var quizSet = [];
        var process = data.map(x=>x['process']);
        
        // console.log(knowledge_area,pm_process_group,process);
        var r = shuffleList(data.length,NUM_QUESTION);
        for (var i = 0; i < NUM_QUESTION; i++) {
            var temp = {};
            temp.question = "【知識エリア】　" + data[r[i]]['knowledge_area'] + " \n【プロセス群】　" + data[r[i]]['pm_process_group'];
            temp.answers = [];
            var sameArea = [];
            var sameAreaProcess = [];
            if (data[r[i]]['duplication_flag'] === '1') {
                sameArea = serchSameCell(data, data[r[i]]['knowledge_area'], data[r[i]]['pm_process_group']);
                sameAreaProcess = serchSameCellProcess(data[r[i]]['id'], data, data[r[i]]['knowledge_area'], data[r[i]]['pm_process_group']);
                temp.question += '\n同一エリア：' + sameAreaProcess.join(" - ") + " -  ? ";
            }
            // console.log(sameArea);
            var rq = shuffleList(process.length,3, sameArea);
            var ra = shuffleList(4,4);
            temp.answers[ra[0]] = data[r[i]]['process'];
            temp.answers[ra[1]] = process[rq[0]];
            temp.answers[ra[2]] = process[rq[1]];
            temp.answers[ra[3]] = process[rq[2]];
            temp.answer = ra[0];
            quizSet.push(temp);
        }
        // console.log(quizSet);
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
                        if ($('#data').data('name') != "guest") {
                            axios.post('/api/score', {
                                username: $('#data').data('name'),
                                score: correctCount
                            }).then((respose)=>{
                                console.log(respose);
                            });
                        }
                    } else {
                        this.questionIndex++;
                    }
                },
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
});
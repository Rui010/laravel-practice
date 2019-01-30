@extends('layouts.app')
@section('content')

<div id="cover" class="fakeloader"></div>
<div id="app" v-cloak>
    <div class="panel panel-default" v-if="this.questions.length != this.answers.length">
        <div class="panel-heading">
            <h4 class="list-group-item-heading">第　@{{ questionIndex + 1 }}　問 / 全@{{ numQuestion }}問</h4>
        </div>
        <div class="panel-body">
            <p style="white-space:pre-wrap; word-wrap:break-word;">@{{ currentQuestion.question }}</p>
        </div>
        <div class="list-group">
            <a type="button" class="list-group-item"
            v-for="(answer, index) in currentQuestion.answers"
            v-bind:key="index" @click="addAnswer(index);">
                @{{ index + 1 }}. @{{ answer }}
            </a>
        </div>
    </div>

    <div v-else class="panel" v-bind:class="[correctRate() > 0.4 ? 'panel-info' : 'panel-danger']">
        <div class="panel-heading">
            <h4 class="list-group-item-heading">@{{ correctCount }} 問正解です！@{{ comment() }}</h4>
        </div>
        <div class="list-group">
            <a href="/" class="list-group-item">PMBOK全体像を確認</a>
            <a href="/quiz" class="list-group-item">もう一度挑戦</a>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
<script src="js/quiz.js?<?php time(); ?>"></script>
<script src="js/fakeLoader.min.js?<?php time(); ?>"></script>
@endsection
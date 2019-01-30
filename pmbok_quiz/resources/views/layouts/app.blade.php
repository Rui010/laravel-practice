<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/mystyles.css?<?php time(); ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/fakeLoader.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript"></script>

    <title>PMBOK Quiz</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarEexample1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbarEexample1">
                    <ul class="nav navbar-nav">
                        <li id="menu-home"><a href="/">PMBOK全体像</a></li>
                        <li id="menu-quiz"><a href="/quiz">クイズ</a></li>
                        <li id="menu-admin"><a href="/admin">管理画面</a></li>
                    </ul>
                    <p class="navbar-text navbar-right">ようこそ <span id="username">ゲスト</span> さん。</p>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container"> @yield('content') </div>
    </main>
    <footer>
        <div class="container"></div>
    </footer>
    <script>
    $(function() {
        var pathname = location.pathname;
        if (pathname==="/") {
            $('#menu-home').addClass('active');
            $('#menu-quiz').removeClass('active');
            $('#menu-admin').removeClass('active');
        } else if (pathname==="/quiz") {
            $('#menu-home').removeClass('active');
            $('#menu-quiz').addClass('active');
            $('#menu-admin').removeClass('active');
        } else if (pathname==="/admin") {
            $('#menu-home').removeClass('active');
            $('#menu-quiz').removeClass('active');
            $('#menu-admin').addClass('active');
        }
    });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/mystyles.css?<?php time(); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>PMBOK Quiz</title>
</head>
<body>
    <header>
        <div class="container">
            <nav class="navbar navbar-default"></nav>
        </div>
    </header>
    <main>
        <div class="container"> @yield('content') </div>
    </main>
    <footer>
        <div class="container"></div>
    </footer>
    <!-- <script src="js/myscript.js" type="text/javascript"></script> -->
</body>
</html>
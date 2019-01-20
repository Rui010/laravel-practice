<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>フォームのサンプル（完了画面）</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="/css/sticky-footer.css" rel="stylesheet" media="screen">
</head>
<body>

<div class="container">
    <h1>フォームのサンプル（完了画面）</h1>
    <div class="row" id="content">
        <p class="lavel lavel-danger">完了画面</p>
        <div class="alert alert-success">登録が完了しました</div>
    </div>
    <a href="{{ route('request.index') }}">回答画面に戻る</a>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>
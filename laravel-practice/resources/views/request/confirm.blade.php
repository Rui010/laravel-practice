<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>フォームのサンプル（確認画面）</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="/css/sticky-footer.css" rel="stylesheet" media="screen">
</head>
<body>

<div class="container">
    <h1>フォームサンプル（確認画面）</h1>
    <div class="row" id="content">
        <form action="{{ route('request.finish') }}" method="post">
            <div class="form-group">
                <label for="username" class="control-label">名前</label>
                <input type="text" name="username" class="form-control" value="{{$username}}" readonly>
            </div>
            <div class="form-group">
                <label for="mail" class="control-label">Email</label>
                <input type="text" name="mail" class="form-control" value="{{$mail}}" readonly>
            </div>
            <div class="form-group">
                <label for="age" class="control-label">年齢</label>
                <input type="text" name="age" class="form-control" value="{{$age}}" readonly>
            </div>
            <div class="form-group">
                <label for="opinion" class="control-label">ご意見</label>
                <textarea type="text" name="opinion" class="form-control" readonly>{{$opinion}}</textarea>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="username" value="{{ $username }}">
            <input type="hidden" name="mail" value="{{ $mail }}">
            <input type="hidden" name="age" value="{{ $age }}">
            <input type="hidden" name="opinion" value="{{ $opinion }}">
            <input type="submit" name="button1" value="登録" class="btn btn-primary btn-wide">
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>
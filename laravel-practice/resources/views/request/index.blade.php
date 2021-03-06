<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>フォームのサンプル</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="/css/sticky-footer.css" rel="stylesheet" media="screen">
</head>
<body>

<div class="container">
    <h1>フォームサンプル（入力画面）</h1>
    <div class="row" id="content">
        <form action="{{ route('request.confirm') }}" method="post">
            <div class="form-group">
                <label for="username" class="control-label">名前</label>
                <input type="text" name="username" class="form-control" value="{{ old('username') }}">
                @if($errors->has('username'))
                <div class="text-danger">{{ $errors->first('username') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="mail" class="control-label">Email</label>
                <input type="text" name="mail" class="form-control" value="{{ old('mail') }}">
                @if($errors->has('mail'))
                <div class="text-danger">{{ $errors->first('mail') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="age" class="control-label">年齢</label>
                <input type="text" name="age" class="form-control" value="{{ old('age') }}">
                @if($errors->has('age'))
                <div class="text-danger">{{ $errors->first('age') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="opinion" class="control-label">ご意見</label>
                <textarea type="text" name="opinion" class="form-control">{{ old('opinion') }}</textarea>
                @if($errors->has('opinion'))
                <div class="text-danger">{{ $errors->first('opinion') }}</div>
                @endif
            </div>
            <input type="submit" name="button1" value="送信" class="btn btn-default">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
        <hr>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>名前</th><th>メールアドレス</th><th>年齢</th><th>ご意見</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($enquetes as $enquete)
                <tr>
                    <td>{{ $enquete->username }}</td>
                    <td>{{ $enquete->mail }}</td>
                    <td>{{ $enquete->age }}</td>
                    <td>{{ $enquete->opinion }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center">
        {{ $enquetes->links() }}
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>
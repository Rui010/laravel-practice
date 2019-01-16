@extends('layouts.layout')
@section('title', 'Tutrial for beginner')
@section('content')
 <div class="page-header" style="margin-top:-30px;padding-bottom:0px;">
  <h1><small>ユーザー一覧</small></h1>
  </div>
  <table class="table table-striped table-hover">
  <thead>
  <tr>
  <th>No</th>
  <th>name</th>
  <th>email</th>
  <th>tel</th>
  <th>opration</th>
  </tr>
  </thead>
  <tbody>
  <tr>
  <td>01</td><td>hoge foo</td><td>hoge@foo.com</td><td>06-1234-5678</td>
  <td>
  <a href="" class="btn btn-primary btn-sm">詳細</a>
  <a href="" class="btn btn-primary btn-sm">編集</a>
  <a href="" class="btn btn-danger btn-sm">削除</a>
  </td>
  </tr>
  <tr>
  <td>02</td><td>hoge foo</td><td>hoge@foo.com</td><td>06-1234-5678</td>
  <td>
  <a href="" class="btn btn-primary btn-sm">詳細</a>
  <a href="" class="btn btn-primary btn-sm">編集</a>
  <a href="" class="btn btn-danger btn-sm">削除</a>
  </td>
  </tr>
  <tr>
  <td>03</td><td>hoge foo</td><td>hoge@foo.com</td><td>06-1234-5678</td>
  <td>
  <a href="" class="btn btn-primary btn-sm">詳細</a>
  <a href="" class="btn btn-primary btn-sm">編集</a>
  <a href="" class="btn btn-danger btn-sm">削除</a>
  </td>
  </tr>
  <tr>
  <td>04</td><td>hoge foo</td><td>hoge@foo.com</td><td>06-1234-5678</td>
  <td>
  <a href="" class="btn btn-primary btn-sm">詳細</a>
  <a href="" class="btn btn-primary btn-sm">編集</a>
  <a href="" class="btn btn-danger btn-sm">削除</a>
  </td>
  </tr>
  <tr>
  <td>05</td><td>hoge foo</td><td>hoge@foo.com</td><td>06-1234-5678</td>
  <td>
  <a href="" class="btn btn-primary btn-sm">詳細</a>
  <a href="" class="btn btn-primary btn-sm">編集</a>
  <a href="" class="btn btn-danger btn-sm">削除</a>
  </td>
  </tr>
  </tbody>
  </table>
@endsection
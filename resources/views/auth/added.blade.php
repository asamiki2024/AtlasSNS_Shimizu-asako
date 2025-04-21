@extends('layouts.logout')

@section('content')


<div class="clear">
  <p class="login-name">{{ session ('username') }}さん</p>
  <p class="title">ようこそ！AtlasSNSへ！</p>
  <p>ユーザー登録が完了しました。</p>
  <p>早速ログインをしてみましょう。</p>

  <p class="btn btn-danger"><a href="/login">ログイン画面へ</a></p>
</div>

@endsection
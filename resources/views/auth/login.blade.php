@extends('layouts.logout')

@section('content')
<section class="log">
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/login']) !!}

    <div class="login-page">
        <h1 class="title">AtlasSNSへようこそ</h1>

        {{ Form::label('メールアドレス') }}
        {{ Form::text('mail',null,['class' => 'input-mail']) }}
        <p class="space"></p>
        {{ Form::label('パスワード') }}
        {{ Form::password('password',['class' => 'input-password']) }}
        <p class="space"></p>
        {{ Form::submit('ログイン',['class' => 'btn btn-danger btn-login']) }}
        <p class="space"></p>
        <p class="login-p"><a href="/register">新規ユーザーの方はこちら</a></p>
    </div>
</section>
{!! Form::close() !!}

@endsection

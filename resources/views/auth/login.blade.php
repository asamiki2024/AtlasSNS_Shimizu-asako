@extends('layouts.logout')

@section('content')
<section class="log">
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/login']) !!}

    <div class="login-page">
        <h1 class="title">AtlasSNSへようこそ</h1>

        {{ Form::label('メールアドレス') }}
        {{ Form::text('mail',null,['class' => 'input-mail']) }}
        <p></p>
        {{ Form::label('パスワード') }}
        {{ Form::password('password',['class' => 'input-password']) }}

        {{ Form::submit('ログイン',['class' => 'btn btn-danger']) }}

        <p><a href="/register">新規ユーザーの方はこちら</a></p>
    </div>
</section>
{!! Form::close() !!}

@endsection

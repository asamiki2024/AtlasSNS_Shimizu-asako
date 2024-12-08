@extends('layouts.logout')

@section('content')
<section class="log">
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/login']) !!}

    <div class="login-page">AtlasSNSへようこそ

        {{ Form::label('e-mail') }}
        {{ Form::text('mail',null,['class' => 'input']) }}
        {{ Form::label('password') }}
        {{ Form::password('password',['class' => 'input']) }}

        {{ Form::submit('ログイン') }}

        <p><a href="/register">新規ユーザーの方はこちら</a></p>
    </div>
</section>
{!! Form::close() !!}

@endsection

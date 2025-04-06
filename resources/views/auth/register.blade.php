@extends('layouts.logout')

@section('content')
<section class="register">
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/register']) !!}
    <div class="register-top">
<!-- エラーメッセージ表示 -->
        @if($errors->any())
        <div class="register-error">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    
        <h2 class="title2">新規ユーザー登録</h2>

        {{ Form::label('ユーザー名') }}
        {{ Form::text('username',null,['class' => 'input']) }}
        <p class="space"></p>
        {{ Form::label('メールアドレス') }}
        {{ Form::text('mail',null,['class' => 'input']) }}
        <p class="space"></p>
        {{ Form::label('パスワード') }}
        {{ Form::text('password',null,['class' => 'input']) }}
        <p class="space"></p>
        {{ Form::label('パスワード確認') }}
        {{ Form::text('password_confirmation',null,['class' => 'input']) }}
        <p class="space"></p>
        {{ Form::submit('新規登録',['class' => 'btn btn-danger btn-register']) }}
        <p class="space"></p>
        <p><a href="/login">ログイン画面へ戻る</a></p>
    </div>
{!! Form::close() !!}
</section>
@endsection

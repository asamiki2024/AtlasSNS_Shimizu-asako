@extends('layouts.login')

@section('content')
プロフィール編集
<div class="profile">
    {!! Form::open(['url' => '/users/profile']) !!}
    <div class="form-group">
    <a><img src="{{ asset('images/' . Auth::user()->images ) }}" /></a>
        {{ Form::label('ユーザー名') }}
        {{ Form::text('username',null, ['class' => 'input'] ) }}
        
        {{ Form::label('メールアドレス') }}
        {{ Form::text('mail',null, ['class' => 'input'] ) }}

        {{ Form::label('パスワード') }}
        {{ Form::password('password', ['class' => 'input']) }}

        {{ Form::label('パスワード確認') }}
        {{ Form::text('password_confirmation',null,['class' => 'input']) }}

        {{ Form::label('自己紹介') }}
        {{ Form::text('bio',null,['class' => 'input']) }}

        {{ Form::label('アイコン画像') }}
        {{ Form::text('images',['class' => 'input']) }}
        {{ Form::submit('更新') }}
    </div>
    {!! Form::close() !!}
</div>
@endsection
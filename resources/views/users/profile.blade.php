@extends('layouts.login')

@section('content')
<div class="profile">
    {!! Form::open(['url' => '/users/profile']) !!}
    <div class="form-group">
    <a><img src="{{ asset('images/' . Auth::user()->images ) }}" /></a>
        {{ Form::label('ユーザー名') }}
        {{ Form::text('username',null ) }}
        <p></p>
        {{ Form::label('メールアドレス') }}
        {{ Form::text('mail',null ) }}
        <p></p>
        {{ Form::label('パスワード') }}
        {{ Form::password('password') }}
        <p></p>
        {{ Form::label('パスワード確認') }}
        {{ Form::text('password_confirmation',null ) }}
        <p></p>
        {{ Form::label('自己紹介') }}
        {{ Form::text('bio',null ) }}
        <p></p>
        {{ Form::label('アイコン画像') }}
        {{ Form::text('images') }}
        <p></p>
        {{ Form::submit('更新') }}
    </div>
    {!! Form::close() !!}
</div>
@endsection
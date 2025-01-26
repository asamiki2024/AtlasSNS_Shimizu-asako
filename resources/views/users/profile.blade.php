@extends('layouts.login')

@section('content')
<div class="profile">
    {!! Form::open(['url' => '/users/profile']) !!}
    <div class="form-group">
        <img src="{{ asset('images/' . Auth::user()->images ) }}" />
        <div>
            {{ Form::label('ユーザー名') }}
            {{ Form::text('username', old('username', Auth::user()->username) ) }}
            <p class="profile-p"></p>
            {{ Form::label('メールアドレス') }}
            {{ Form::text('mail', old('mail', Auth::user()->mail) ) }}
            <p class="profile-p"></p>
            {{ Form::label('パスワード') }}
            {{ Form::password('password') }}
            <p class="profile-p"></p>
            {{ Form::label('パスワード確認') }}
            {{ Form::text('password_confirmation',null ) }}
            <p class="profile-p"></p>
            {{ Form::label('自己紹介') }}
            {{ Form::text('bio', old('bio', Auth::user()->bio) ) }}
            <p class="profile-p"></p>
            {{ Form::label('アイコン画像') }}
            {{ Form::text('images') }}
            <p class="profile-p"></p>
        </div>
    </div>
    {{ Form::submit('更新') }}
    {!! Form::close() !!}
</div>
@endsection
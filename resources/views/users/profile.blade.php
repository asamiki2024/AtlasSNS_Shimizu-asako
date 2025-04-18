@extends('layouts.login')

@section('content')
<div class="profile">
    {!! Form::open(['url' => '/update_profile', 'enctype' => 'multipart/form-data']) !!}
    {{ Form::token() }}
    <div class="form-group">
        <img src="{{ asset('images/' . Auth::user()->images ) }}" />
        <div class="form-space">
            {{ Form::hidden('id', old('id', Auth::user()->id )) }}
            <!-- hiddenで非表示にする -->
            {{ Form::label('ユーザー名') }}
            {{ Form::input('text', 'username', old('username', Auth::user()->username )) }}
            <p class="profile-p"></p>
            {{ Form::label('メールアドレス') }}
            {{ Form::input('mail', 'mail', old('mail', Auth::user()->mail ) ) }}
            <p class="profile-p"></p>
            {{ Form::label('パスワード') }}
            {{ Form::input('password', 'password', 'null' ) }}
            <p class="profile-p"></p>
            {{ Form::label('パスワード確認') }}
            {{ Form::input('password', 'password_confirmation', null ) }}
            <p class="profile-p"></p>
            {{ Form::label('自己紹介') }}
            {{ Form::input('bio', 'bio', old('bio', Auth::user()->bio ) ) }}
            <p class="profile-p"></p>
            {{ Form::label('アイコン画像') }}
            {{ Form::input('file','icons') }}
            <!-- fileでブレードにアップロード用の選択画面を表示 -->
            <p class="profile-p"></p>
            {{ Form::submit('更新',['class' => 'btn btn-danger btn-profile']) }}
            {!! Form::close() !!}
        </div>
    </div>
    <!-- 入力エラー文表示 -->
    @if($errors->any())
    <div class="profile-error">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
@endsection
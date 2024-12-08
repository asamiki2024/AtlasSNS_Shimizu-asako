@extends('layouts.login')

@section('content')
プロフィール編集
<div class="profile">
    <a><img src="{{ asset('images/' . Auth::user()->images ) }}" /></a>
    {{ Form::label('ユーザー名') }}  {{ Form::input('text', 'upUsername') }}
    {{ Form::label('メールアドレス') }} {{ Form::input}}
</div>
@endsection
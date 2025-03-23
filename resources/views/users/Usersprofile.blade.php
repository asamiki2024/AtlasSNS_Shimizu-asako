@extends('layouts.login')
@section('content')

<div class= "users-profile">
    ユーザーのプロフィール
    <a href="/followDate"></a>
    <ul class= "datalist">
            <li><img src="{{  asset('images/' . $followUser->images) }}"/></li>
            <li>ユーザー名 {{ $followUser->username }}</li>
            <li>自己紹介 {{ $followUser->bio }}</li>
    </ul>
    
    <form action = "/unfollow/{{ $followUser->id }}" method = "POST" >
    @csrf
    <button class="follow-cancel-button">フォロー解除</button>
    </form>
    <button class="follow-button">フォローする</button>
</div>

@endsection
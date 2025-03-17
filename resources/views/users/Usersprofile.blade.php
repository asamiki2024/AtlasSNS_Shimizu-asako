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
    @csrf
    <form action = "/unfollow/{{ $followUser->id }}" method = "POST" >
        <button class="follow-button">フォロー解除</button>
    </form>
    <button class="follow-cancel-button">フォローする</button>
</div>
    
@endsection
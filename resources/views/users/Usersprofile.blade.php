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
    @if(auth()->user()->isFollowing($followUser->id))
    <form action = "/unfollow/{{ $followUser->id }}" method = "POST" >
    @csrf
    <button class="follow-cancel-button">フォロー解除</button>
    </form>
    @else
    <form action = "/follow/{{ $followUser->id }}" method = "POST" >
    @csrf
    <button class="follow-button">フォローする</button>
    </form>
    @endif
</div>
<div class="followDate_post">
    <a><img src="{{ asset('images/' . $followDate_posts->images) }}" >{{ $followDate_posts->username }} {{ $followDate_posts->post }} {{ $followUser->created_at }} </a>
</div>
<!-- フォロー機能、フォロワー解除ボタンは、FollowsControllerで書いた記述を再利用、ボタンの切り替えは＠ifで行う -->
@endsection

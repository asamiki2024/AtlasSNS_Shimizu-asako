@extends('layouts.login')
@section('content')
<div class="followerList">フォローワーリスト</div>
    @foreach($follower_icons as $follower_icon)
    <div class="follower_icon">
        <p><a href="/Usersprofile"><img src="{{ asset('images/' . $follower_icon->images) }}"></a></p>
    </div>
    @endforeach
    @foreach($follower_posts as $follower_post)
    <div class="follower_post">
        <a><img src="{{ asset('images/' . $follower_post->user->images) }}" >{{ $follower_post->user->username }} {{ $follower_post->post }} {{ $follower_post->created_at }} </a>
        </div>
    @endforeach
@endsection
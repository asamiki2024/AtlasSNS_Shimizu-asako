@extends('layouts.login')
@section('content')
<div class="followerList">フォローワーリスト</div>
    <div class="follower_icon">
        @foreach($follower_icons as $follower_icon)
            <p><a href="/Usersprofile/{{ $follower_icon->id }}/followDate"><img src="{{ asset('images/' . $follower_icon->images) }}"></a></p>
        @endforeach
    </div>
    @foreach($follower_posts as $follower_post)
    <div class="follower_post">
        <ul>
            <li class="follower-block">
                <a><img src="{{ asset('images/' . $follower_post->user->images) }}" ></a>
                <div class="follower-box">
                    <div class="follower-name">{{ $follower_post->user->username }}</div>
                    <div class="follower-created_at">{{ $follower_post->created_at }}</div>
                    <div>{{ $follower_post->post }}</div>
                </div>
            </li>
        </ul>
    </div>
    @endforeach
@endsection
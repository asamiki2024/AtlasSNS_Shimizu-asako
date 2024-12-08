@extends('layouts.login')
@section('content')
<div class="followList">フォローリスト</div>
    @foreach($follow_icons as $follow_icon)
    <div class="follow_icon">
        <p><a href="/Usersprofile"><img src="{{ asset('images/' . $follow_icon->images) }}"></a></p>
    </div>
    @endforeach
    @foreach($follow_posts as $follow_post)
    <div class="follow_post">
        <a><img src="{{ asset('images/' . $follow_post->user->images) }}" >{{ $follow_post->user->username }} {{ $follow_post->post }} {{ $follow_post->created_at }} </a>
        </div>
    @endforeach
@endsection
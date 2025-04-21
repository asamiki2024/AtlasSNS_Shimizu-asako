@extends('layouts.login')
@section('content')
<div class="follow-top">
    <div class="followList">フォローリスト</div>
        <div class="follow_icon">
            @foreach($follow_icons as $follow_icon)
                <p><a href="/Usersprofile/{{$follow_icon->id}}/followDate"><img src="{{ asset('images/' . $follow_icon->images) }}"></a></p>
            @endforeach
        </div>
        @foreach($follow_posts as $follow_post)
        <div class="follow_post">
            <a><img src="{{ asset('images/' . $follow_post->user->images) }}" >{{ $follow_post->user->username }} {{ $follow_post->post }} {{ $follow_post->created_at }} </a>
            </div>
        @endforeach
</div>
@endsection
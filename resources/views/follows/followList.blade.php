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
            <ul>
                <li class="follow-block">
                    <a><img src="{{ asset('images/' . $follow_post->user->images) }}" ></a>
                    <div class="follow-box">
                        <div class="follow-name">{{ $follow_post->user->username }} </div>
                        <div class="follow-created_at">{{ $follow_post->created_at }} </div>
                        <div>{{ $follow_post->post }} </div>
                    </div>
                </li>
            </ul>
        </div>
        @endforeach
</div>
@endsection
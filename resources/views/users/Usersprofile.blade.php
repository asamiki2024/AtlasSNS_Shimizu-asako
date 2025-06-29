@extends('layouts.login')
@section('content')

<div class= "users-profile">
    <div class="U">
        <a href="/followDate"></a>
        <div class= "datalist">
            <figure><img src="{{  asset('images/' . $followUser->images) }}"/></figure>
            <div class="datalist-box1">
                <p class="datalist-name">ユーザー名</p>
                <p>{{ $followUser->username }}</p>
            </div>
            <div class="datalist-box2">
                <p class="datalist-bio">自己紹介</p>
                <p>{{ $followUser->bio }}</p>
            </div>
        </div>
        <div class="datalist-btn">
        @if(auth()->user()->isFollowing($followUser->id))
            <form action = "/unfollow/{{ $followUser->id }}" method = "POST" >
        @csrf
            <a class="follow-cancel-button"><button class="btn btn-danger">フォロー解除</button></a>
            </form>
        @else
            <form action = "/follow/{{ $followUser->id }}" method = "POST" >
        @csrf
            <a class="follow-button"><button class="btn btn-info">フォローする</button></a>
            </form>
        @endif
        </div>
    </div>
    <div>
    @foreach($followPost as $followPost)
        <div class="followDate_post">
            <div class="followDate-block">
                <div class="followDate-box">
                    <figure><img src="{{ asset('images/' . $followPost->user->images) }}"></figure>
                    <div class="followDate-name">{{ $followPost->user->username }}</div>
                    <div class="followDate-created_at">{{ substr($followPost->created_at, 0, 16) }} </div>
                <!-- substr($変数, 0, 表示させたい文字数を入力)投稿日時までを表示　表示する文字数を指定　秒数は文字数制限で非表示にする -->
                </div>
                <div class="followDate-post">{!! nl2br(htmlspecialchars($followPost->post)) !!} </div>
            <!-- 投稿内容を改行した状態で表示　｛!! nl2br(htmlspecialchars($変数->カラム名))!!｝ -->
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- フォロー機能、フォロワー解除ボタンは、FollowsControllerで書いた記述を再利用、ボタンの切り替えは＠ifで行う -->
@endsection

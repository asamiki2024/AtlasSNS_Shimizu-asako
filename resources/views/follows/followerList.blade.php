@extends('layouts.login')
@section('content')
<div class="follower-top">
    <div class="follower_block">
    <div class="followerList">フォロワーリスト</div>
        <div class="follower_icon">
        @foreach($follower_icons as $follower_icon)
            <!-- アイコン画像エラー防止の条件分岐。説明は、indexブレードの40行目に記載 -->
            @if (!empty($follower_icon->images) && file_exists(public_path( 'storage/' . $follower_icon->images)))
                <figure><a href="/Usersprofile/{{$follower_icon->id}}/followDate"><img src="{{ asset('storage/' . $follower_icon->images ) }}" /></a></figure>
            @elseif (!empty($follower_icon->images) && file_exists(public_path('images/' . $follower_icon->images)))
                <p><a href="/Usersprofile/{{ $follower_icon->id }}/followDate"><img src="{{ asset('images/' . $follower_icon->images) }}"></a></p>
            @endif
        @endforeach
        </div>
    </div>
    @foreach($follower_posts as $follower_post)
    <div class="follower_post">
            <div class="follower-block">
                <div class="follower-box">
                    <!-- アイコン画像エラー防止の条件分岐。説明は、indexブレードの40行目に記載　-->
                    @if (!empty($follower_post->user->images) && file_exists(public_path( 'storage/' . $follower_post->user->images)))
                        <figure><a href="/Usersprofile/{{$follower_post->user->id}}/followDate"><img src="{{ asset('storage/' . $follower_post->user->images ) }}" /></a></figure>
                    @elseif (!empty($follower_post->user->images) && file_exists(public_path('images/' . $follower_post->user->images)))
                    <figure><a href="/Usersprofile/{{ $follower_post->user->id }}/followDate"><img src="{{ asset('images/' . $follower_post->user->images) }}" ></a></figure>
                    @endif
                    <!-- 投稿アイコンからもプロフィールに飛ぶリンクを付ける。aタグで -->
                    <div class="follower-name">{{ $follower_post->user->username }}</div>
                    <div class="follower-created_at">{{ substr($follower_post->created_at, 0, 16) }}</div>
                     <!-- substr($変数, 0, 表示させたい文字数を入力)投稿日時までを表示　表示する文字数を指定　秒数は文字数制限で非表示にする -->
                </div>
                <div class="follower-post">{!! nl2br(htmlspecialchars($follower_post->post)) !!}</div>
                <!-- 投稿内容を改行した状態で表示　｛!! nl2br(htmlspecialchars($変数->カラム名))!!｝ -->
            </div>
    </div>
    @endforeach
</div>
@endsection
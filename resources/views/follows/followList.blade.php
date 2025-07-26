@extends('layouts.login')
@section('content')
<div class="follow-top">
    <div class="follow_block">
    <div class="followList">フォローリスト</div>
        <div class="follow_icon">
            @foreach($follow_icons as $follow_icon)
                @if (!empty($follow_icon->images) && file_exists(public_path( 'storage/' . $follow_icon->images)))
                    <figure><a href="/Usersprofile/{{$follow_icon->id}}/followDate"><img src="{{ asset('storage/' . $follow_icon->images ) }}" /></a></figure>
                @elseif (!empty($follow_icon->images) && file_exists(public_path('images/' . $follow_icon->images)))
                <p><a href="/Usersprofile/{{$follow_icon->id}}/followDate"><img src="{{ asset('images/' . $follow_icon->images) }}"></a></p>
                @endif
            @endforeach
        </div>
    </div>
        @foreach($follow_posts as $follow_post)
        <div class="follow_post">
                <div class="follow-block">
                    <div class="follow-box">
                        @if (!empty($follow_post->user->images) && file_exists(public_path( 'storage/' . $follow_post->user->images)))
                            <figure><a href="/Usersprofile/{{$follow_post->user->id}}/followDate"><img src="{{ asset('storage/' . $follow_post->user->images ) }}" /></a></figure>
                        @elseif (!empty($follow_post->user->images) && file_exists(public_path('images/' . $follow_post->user->images)))
                            <figure><a href="/Usersprofile/{{$follow_post->user->id}}/followDate"><img src="{{ asset('images/' . $follow_post->user->images) }}" ></a></figure>
                        @endif
                            <!-- 投稿アイコンからもプロフィールに飛ぶリンクを付ける。aタグで -->
                        <div class="follow-name">{{ $follow_post->user->username }} </div>
                        <div class="follow-created_at">{{ substr($follow_post->created_at, 0, 16) }} </div>
                        <!-- substr($変数, 0, 表示させたい文字数を入力)投稿日時までを表示　表示する文字数を指定　秒数は文字数制限で非表示にする -->
                    </div>
                    <div class="follow-post">{!! nl2br(htmlspecialchars($follow_post->post)) !!} </div>
                    <!-- 投稿内容を改行した状態で表示　｛!! nl2br(htmlspecialchars($変数->カラム名))!!｝ -->
                </div>
        </div>
        @endforeach
</div>
@endsection
@extends('layouts.login')

@section('content')
<div id="search">
    <!-- ユーザー検索 -->
     <div class="search-top">
        <form action="{{ route('users.usersearch') }}" method="get">
            @csrf
            <input type="text" name="keyword" class="search-form" size="50" placeholder="ユーザー名" >
            <!-- sizeで入力フォーム大きさ調節 -->
            <button type="submit" class="btn btn-search"><img src="images/search.png" ></button>
            <p class="Keyword">検索ワード：{{ $keyword }}</p>
        </form>
    </div>
    <div class="search-box">
    @foreach($search_user as $search_user)
        <div class="search-box1">
            <div>{{ $search_user->username }}<p><img src="{{ asset('images/' . $search_user->images ) }}" /></p></div>
            @if(auth()->user()->isFollowing($search_user->id))
            <form action="/unfollow/{{ $search_user->id }}" method="POST">
            @csrf
            <!-- @csrfは、脆弱対策として入れる -->
                <a class="follow-cancel-button"><button class="btn btn-danger">フォロー解除</button></a>
            </form>
        </div>
        @else
        <div class="search-box2">
            <form action="/follow/{{ $search_user->id }}" method="POST">
            @csrf
            <a class="follow-button"><button class="btn btn-info">フォローする</button></a>
            </form>
        </div>
    </div>
        @endif
    @endforeach
    </div>
    <!-- FollowsControllerのフォロー処理メゾットにweb.phpを通って移動する -->
    <!-- FollowsControllerのフォロー解除処理メゾットにweb.phpを通って移動する -->
    <!-- foreachの中で使用する変数は、foreachの()の中を参考にする。 -->
    <!-- user.phpなどのモデルに書いたメソッドはブレードでも使用可能 -->
    <!-- ページの動きの流れ　ブレード→web.php→コントローラーのメゾット→書いてある処理を行いブレードに戻ってくる。処理された動きをしたものがページに表示される。 -->
</div>
@endsection

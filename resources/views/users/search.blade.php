@extends('layouts.login')

@section('content')
<div id="search">
    <!-- ユーザー検索 -->
     <div class="search-top">
        <form action="{{ route('users.usersearch') }}" method="get">
            @csrf
            <input type="text" name="keyword" class="search-form" placeholder="ユーザー名">
            <button type="submit" class="btn btn-search"><img src="images/search.png" ></button>
        </form>
        <p>検索ワード：{{ $keyword }}</p>
    </div>
    <table>
    @foreach($search_user as $search_user)
    <tr>
        <td>{{ $search_user->username }}<p><img src="{{ asset('images/' . $search_user->images ) }}" /></p></td>
        @if(auth()->user()->isFollowing($search_user->id))
        <td><form action="/unfollow/{{ $search_user->id }}" method="POST">
            @csrf
            <!-- @csrfは、脆弱対策として入れる -->
            <button class="follow-cancel-button">フォロー解除</button>
            </form>
        </td>
        @else
        <td><form action="/follow/{{ $search_user->id }}" method="POST">
            @csrf
            <button class="follow-button">フォローする</button>
            </form>
        </td>
    </tr>
        @endif
    @endforeach
    </table>
    <!-- FollowsControllerのフォロー処理メゾットにweb.phpを通って移動する -->
    <!-- FollowsControllerのフォロー解除処理メゾットにweb.phpを通って移動する -->
    <!-- foreachの中で使用する変数は、foreachの()の中を参考にする。 -->
    <!-- user.phpなどのモデルに書いたメソッドはブレードでも使用可能 -->
    <!-- ページの動きの流れ　ブレード→web.php→コントローラーのメゾット→書いてある処理を行いブレードに戻ってくる。処理された動きをしたものがページに表示される。 -->
</div>
@endsection

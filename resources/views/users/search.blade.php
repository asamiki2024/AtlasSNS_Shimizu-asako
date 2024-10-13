@extends('layouts.login')

@section('content')
<div id="search">
    <!-- ユーザー検索 -->
    <form action="{{ route('users.usersearch') }}" method="get">
        @csrf
        <input type="text" name="keyword" class="search-form" placeholder="ユーザー名">
        <button type="submit" class="btn btn-search"><img src="images/search.png" ></button>
    </form>
    <p>検索ワード：{{ $keyword }}</p>
<table>
    @foreach($search_user as $search_user)
    <tr>
        <td>{{ $search_user->username }}<p><img src="{{ asset('images/' . $search_user->images ) }}" /></p></td>
        @if(auth()->user()->isFollowing($user_id->id))
        <td><form action="{{ route('follow', ['uerId' => $user_id->id]) }}" method="POST">
            <button class="follow-button">フォローする</button>
            </form>
        </td>
        @else
        <td><form action="{{ route('unfollow', ['userId' => $user_id->id]) }}" method="POST">
            <button class="follow-cancel-button">フォロー解除</button>
            </form>
        </td>
    </tr>
        @endif
    @endforeach
    </table>
    <!-- FollowsControllerのフォロー処理メゾットにweb.phpを通って移動する -->
     <!-- FollowsControllerのフォロー解除処理メゾットにweb.phpを通って移動する -->
</div>
@endsection

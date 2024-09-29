@extends('layouts.login')

@section('content')
<div id="search">
    <!-- ユーザー検索 -->
    <form action="{{ route('users.usersearch') }}" method="get">
        @csrf
        <input type="text" name="keyword" class="search-form" placeholder="ユーザー名">
        <button type="submit" class="btn btn-search"><img src="images/search.png" ></button>
    </form>
    @foreach($user_search as $search_user)
    <tr>
    <th>{{ $search_user->name }}</th><p><img src="{{ asset('images/' . $search_user->images ) }}" /></p>
    </tr>
    @endforeach
    <form action="{{ route('follows.follow') }}" method="POST">
        <button class="follow-button">フォローする</button>
    </form>
    <form action="{{ route('follows.unfollow') }}" method="POST">
    <button class="follow-cancel-button">フォロー解除</button>
    </form>

    <!-- FollowsControllerのフォロー処理メゾットにweb.phpを通って移動する -->
     <!-- FollowsControllerのフォロー解除処理メゾットにweb.phpを通って移動する -->
</div>
@endsection

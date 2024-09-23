@extends('layouts.login')

@section('content')
<div id="search">
    <form action="#" method="get">
        <input type="text" name="keyword" class="search-form" placeholder="ユーザー名">
        <button type="submit" class="btn btn-search"><img src="images/search.png" ></button>
    </form>
    <!-- @foreach($users as $user) -->
        <!-- @if ($user->id !== Auth::id()) -->
        <!-- {{ $user -> username }} -->
    <!-- @endif -->
    <form action="{{ route('follows.follow') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <button class="follow-button">フォローする</button>
    </form>
    <!-- <button class="follow-cancel-button">フォロー解除</button> -->
    @endforeach
    <!-- FollowsControllerのフォロー処理メゾットにweb.phpを通って移動する -->
     <!-- FollowsControllerのフォロー解除処理メゾットにweb.phpを通って移動する -->
</div>
@endsection

@extends('layouts.login')

@section('content')
他ユーザーのプロフィール
<div class="users-profile">
    <ul class="details">
        <a><img src="{{ asset('images/' .$follower_icon->images) }}"></a><li>ユーザー名</li>
        <li><p>{{ Auth::users()->username }}</p></li>
    </ul>
</div>
@endsection
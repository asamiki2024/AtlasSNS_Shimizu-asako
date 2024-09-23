@extends('layouts.login')

@section('content')
<div id="search">
    <form action="{{ route('users.search') }}" method="get">
        <input type="text" name="keyword" class="search-form" placeholder="ユーザー名">
        <button type="submit" class="btn btn-search"><img src="images/search.png" ></button>
    </form>
    @foreach($data as $data)
        @if ($data->id !== Auth::id())
        {{ $data -> username }}
    @endif
    <form action="{{ route('follows.follow') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ $data->id }}">
        <button type="submit" class="btn">
            @if ($data->is_followed)
                フォロー解除
            @else
                フォローする
            @endif
        </button>
    </form>
    @endforeach
    <!-- <button class="follow-button">フォローする</button> -->
    <!-- <button class="follow-cancel-button">フォロー解除</button> -->
</div>
@endsection
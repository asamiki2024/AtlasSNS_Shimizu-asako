@extends('layouts.login')
@section('content')
<div class="followList">フォローリスト</div>
    @foreach($follow_icon as $follow_icon)
        <p><img src="{{ $follow_icon->user_images }}"></p>
    @endforeach
@endsection
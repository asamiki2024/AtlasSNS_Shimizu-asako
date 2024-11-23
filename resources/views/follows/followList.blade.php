@extends('layouts.login')
@section('content')
<div class="followList">フォローリスト</div>
    @foreach($follow_icons as $follow_icon)
    <p><img src="{{ asset('images/' . $follow_icon->user->images) }}"></p>
    
    @endforeach
@endsection
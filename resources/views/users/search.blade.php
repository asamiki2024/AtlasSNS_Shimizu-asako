@extends('layouts.login')

@section('content')
<div id="search">
    <form action="/search" method="post">
    @csrf
    <input type="text" name="keyword" class="search-form" placeholder="ユーザー名">
    <button type="submit" class="btn btn-search"><img src="images/search.png" ></button>
    </form>
</div>


@endsection
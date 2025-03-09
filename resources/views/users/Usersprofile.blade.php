@extends('layouts.login')
@section('content')
@foreach($updates as $update)
<div class= "users-profile">
    ユーザーのプロフィール
    <a href="/followDate"></a>
    <ul class= "datalist">
            <li>{{ }}</li>
            <li>{{ $update->username }}ユーザー名</li>
            <li>{{ }}自己紹介</li>
    </ul>
    </div>
    @endforeach
@endsection
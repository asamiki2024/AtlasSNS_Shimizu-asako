@extends('layouts.login')

@section('content')
プロフィール編集
<a><img src="{{ asset('images/' . Auth::user()->images ) }}" /></a>

@endsection
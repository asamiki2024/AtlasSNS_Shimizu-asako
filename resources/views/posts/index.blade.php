@extends('layouts.login')

@section('content')
<div class="form">
    <!--投稿フォーム  -->
    {!! Form::open(['url' => "/top", 'class' => "post-form"]) !!}
    {{ Form::token() }}
    <div class="form-group">
        {{ Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) }}
        <!-- <textarea name="request-about" id="request-about" placeholder="投稿内容を入力してください。"></textarea> -->
    </div>
        <!-- 送信ボタン -->
        <button class="form-button"><img src="images/post.png" /></button>
    {!! Form::close() !!}
</div>
@endsection
@extends('layouts.login')

@section('content')
<h2>投稿内容を入力してください。</h2>
<div class="container">
    <!--投稿フォーム  -->
    <div class="form-group">
        <textarea name="request-about" id="request-about" placeholder="投稿内容を入力してください。"></textarea>
        <!-- 送信ボタン -->
        <button class="form-button"><img src="images/post.png" /></button>
    </div>
</div>
@endsection
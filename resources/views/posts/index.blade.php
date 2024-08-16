@extends('layouts.login')

@section('content')
<div class="form">
    <!--投稿フォーム  -->
    {!! Form::open(['url' => "/top", 'class' => "post-form"]) !!}
    {{ Form::token() }}
    <div class="form-group">
        {{ Form::input('text', 'newPost', null, ['class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) }}
        <!-- <textarea name="request-about" id="request-about" placeholder="投稿内容を入力してください。"></textarea> -->
    </div>
        <!-- 送信ボタン -->
        <button class="form-button"><img src="images/post.png" /></button>
        {!! Form::close() !!}
        <!-- エラーメッセージ表示させる -->
        @if($errors->any())
            <div class="index-errors">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <!-- 投稿者のIDとアイコン、投稿内容を表示させる。 -->
    @foreach($users as $user)
    <tr>
        <td><img src="{{ asset('images/' . $user->user->images ) }}" /> {{ $user->post }}</td>
    </tr>
    <button class="update-button" href="/post/ {{ $user->id }}/top"><img src="images/edit.png" /></button>
    @endforeach
</div>
@endsection
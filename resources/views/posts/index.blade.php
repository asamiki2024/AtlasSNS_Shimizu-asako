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
        <td><img src="{{ asset('images/' . $user->user->images ) }}" />{{ $user->user->username }} {{ $user->post }} {{ $user->created_at }} </td>
    </tr>
    <div class="content">
        <!-- 投稿の編集ボタン -->
        <button class="js-modal-open" href="" post="{{ $user->post }}" post_id="{{ $user->id }}"><img src="images/edit.png" /></button>
        <!-- 削除ボタン -->
         <!-- buttonタグだとhrefは機能しない。aタグに変更 -->
        <a class="delete-button" href="/post/{{$user->id}}/delete" onclick="return confirm('こちらの投稿を削除します。よろしいでしょうか？')" ><img src="images/trash.png" alt="" /><img src="images/trash-h.png" alt="" /></a>
    </div>
    @endforeach
    
    <!-- モーダル機能を使用し、投稿内容を編集 -->
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
            <form action="/post/update" method="get">
                <textarea name="upPost" class="modal_post"></textarea>
                <input type="hidden" name="id" class="modal_id" value="">
                <button class="update-button" type="submit"><img src="images/edit.png" /></button>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</div>
@endsection
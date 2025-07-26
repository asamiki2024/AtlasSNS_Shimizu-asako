@extends('layouts.login')

@section('content')
<div class="form">
    <!--投稿フォーム  -->
    <div class="Form-group">
        {!! Form::open(['url' => "/top", 'class' => "post-form"]) !!}
        {{ Form::token() }}
            <div class="Post">
                @if (!empty(Auth::user()->images) && file_exists(public_path( 'storage/' . Auth::user()->images)))
                    <figure><img src="{{ asset('storage/' . Auth::user()->images ) }}" /></figure>
                @elseif (!empty(Auth::user()->images) && file_exists(public_path('images/' . Auth::user()->images)))
                    <p><img src="{{ asset('images/' . Auth::user()->images ) }}" /></p>
                @endif
                <!-- {{ Form::input('text', 'newPost', null, ['class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) }} -->
                <textarea name="newPost" class="form-control" rows="5" cols="100" placeholder="投稿内容を入力してください。"></textarea>
                <!-- rows=行数,cols=文字数の意味 -->
            <!-- 送信ボタン -->
                <button class="form-button"><img src="images/post.png" /></button>
            </div>
        {!! Form::close() !!}
        <!-- エラーメッセージ表示させる -->
        <div class="index-errors">
            <ul>
                @if($errors->has('newPost'))
                <li>{{ $errors ->first('newPost')}}</li>
                @endif
            </ul>
        </div>
    </div>
        <!-- 投稿編集のエラーメッセージ表示させる -->
        <div class="modal-errors">
            <ul>
        @if($errors->has('upPost'))
            <li>{{ $errors ->first('upPost')}}</li>
        @endif
            </ul>
        </div>
    <!-- 投稿者のIDとアイコン、投稿内容を表示させる。 -->
    @foreach($users as $user)
    <div class="content">
        <div class="content-block">
            <div class="post-box">
                <div class="post-top">
                    <!-- アイコン画像エラー防止に条件分岐をつける。写真のアップロード後もユーザーは、アップロードした写真を表示。アップロードしていない人は、初期のデフォルトのまま表示。 -->
                    @if (!empty($user->user->images) && file_exists(public_path( 'storage/' . $user->user->images)))
                    <figure><img src="{{ asset('storage/' . $user->user->images ) }}" /></figure>
                    @elseif (!empty($user->user->images) && file_exists(public_path('images/' . $user->user->images)))
                    <figure><img src="{{ asset('images/' . $user->user->images ) }}" /></figure>
                    @endif
                    <div class="post-name"> {{ $user->user->username }}</div>
                    <div class="post-created_at">{{ substr($user->created_at, 0, 16) }}</div>
                    <!-- substr($変数, 0, 表示させたい文字数を入力)投稿日時までを表示　表示する文字数を指定　秒数は文字数制限で非表示にする -->
                </div>
                <div class="post-post">{!! nl2br(htmlspecialchars($user->post)) !!}</div>
                <!-- 投稿内容を改行した状態で表示　｛!! nl2br(htmlspecialchars($変数->カラム名))!!｝ -->
            </div>
            <!-- 投稿の編集ボタン -->
            <div class="post-btn">
            @if (Auth::id()  === $user->user_id)
                    <button class="js-modal-open" href="" post="{{ $user->post }}" post_id="{{ $user->id }}"></button>
                @endif
                <!-- ifで自分以外が編集機能を使えない様にする。Auth::id()でログインしているユーザー全て。$user->user_idで自分以外。　===は完全一致すれば自分以外には編集機能が出ない表示になる。 -->
                <!-- 削除ボタン -->
                @if (Auth::id()  === $user->user_id)
                <!-- buttonタグだとhrefは機能しない。aタグに変更 -->
                    <a class="delete-button" href="/post/{{$user->id}}/delete" onclick="return confirm('こちらの投稿を削除します。よろしいでしょうか？')" ></a>
                @endif
            </div>
        </div>
    </div>
        @endforeach
    
    <!-- モーダル機能を使用し、投稿内容を編集 -->
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
            <form action="/post/update" method="get">
                <textarea name="upPost" class="modal_post"></textarea>
                <input type="hidden" name="id" class="modal_id" value="">
                <!-- {{ csrf_field() }} -->
                <div class="modal-btn">
                    <button class="update-button" type="submit"><img src="images/edit.png" /></button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
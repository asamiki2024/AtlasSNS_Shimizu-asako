<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\post;
class PostsController extends Controller
{

    public function index(){
        return view('posts.index');
        // return view('フォルダ名.ブレイド名');
    }

    //ログイン閲覧制限　ミドルウェア
    public function __construct(){
        $this->middleware('auth');
    }

    //投稿内容のデータを送る
    public function postCreate(Request $request){
        // j投稿フォームに書かれた内容を受け取る
        $post = $request->input('newPost');
        $user_id = Auth::user()->id;
        // dd($user_id);
        //投稿の登録
        Post::create([
            'user_id' => $user_id,
            'post' => $post
        ]);
        return redirect('/top');
    }
}

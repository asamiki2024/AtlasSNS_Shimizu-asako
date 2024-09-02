<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\post; //postがどこの位置にあるのかを記述
class PostsController extends Controller
{
    //ログイン閲覧制限　ミドルウェア
    public function __construct(){
        $this->middleware('auth');
    }
    
    // postテーブルのデータを$usersで受け取る。
    public function index(){
        $users = Post::get();
        return view('posts.index',['users'=>$users]);
        // return view('フォルダ名.ブレイド名');
    }


    //投稿内容のデータを送る
    public function postCreate(Request $request){
        //投稿のバリテーション機能
        $request->validate([
            'newPost' => 'required|min:1|max:150',
        ]);
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
    //投稿内容を編集し、更新する
    public function update(Request $request){
        //1つめの処理
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        // 2つめの処理
        Post::where('id', $id)->update([
            'post' => $up_post
        ]);
        //3つめの処理
        return redirect('/top');
    }
    //投稿削除機能
    public function delete($id){
        Post::where('id', $id)->delete();
        return redirect('/top');
    }
}

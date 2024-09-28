<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;  //userがどこにあるのかを記述
use App\follow;  //フォロワーを取得
class FollowsController extends Controller
{
    //フォローリスト
    public function followList(){
        return view('follows.followList');
    }
    //フォロワーリスト
    public function followerList(){
        return view('follows.followerList');
    }

    //フォローするユーザーがログインしているかどうか確認
    // user $userの引数
   public function follow(User $user,$id)
   {
    if(Auth::check()){
        //ログインしているユーザーが確認
    $following = auth()->user();
    //現在ログインしているユーザーの情報の取得
    $following->follow($id);
    //$idを利用してフォローする
    }
    return redirect('/search');
   }

    //フォロー解除
   public function unfollow(User $user,$id)
   {
    if(Auth::check()){
        //ログインしているユーザーの確認
    $following = auth()->user();
    //現在ログインしているユーザーの情報の取得
    $following->unfollow($id);
    //フォローしているユーザー解除する
    }
    return redirect('/search');
   }
}

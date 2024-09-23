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

    //フォロー機能
    public function follow(User $user){
        $follower = Auth::user();
        $is_following = $follower->is_Following($user->id);
        //フォローしているか判断
        //フォローしていなければフォローする
        if($is_following) {
            $follower ->follow($user->id);
            return back();
        }
    }
    //フォロー解除機能
    public function nofollow(User $user){
        $follower = Auth::user();
        $is_following = $follower->is_Following($user->id);
        //フォローしているか判断
        //フォローしていたらフォロー解除する
        if($is_following){
            $follower->nofollow($user->id);
            return back();
        }

    }
}

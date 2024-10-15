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
   public function follow($userId)
   {
    // if(Auth::check()){
        //ログインしているユーザーが確認
    // $following = auth()->user();
    //現在ログインしているユーザーの情報の取得
    // $following->follow($id);
    //$idを利用してフォローする

    $follower = auth()->user();
    $is_following = $follower->isFollowing($userId);
    //フォローしているか

        if (!$is_following)
        {
        //フォローしていない場合フォロー処理実行
        $loggedInUserID = auth()->user()->id;
        //自分のユーザーIDの取得
        $followedUser = User::find($userId);
        $followedUserId = $followedUser->id;
        //フォローしたい人のユーザーIDを元にユーザーを取得
    
        Follow::create([
            'following_id' => $loggedInUserID,
            'followed_id' => $followedUserId,
        ]);
        return redirect('/search');
        }
    }
    //FollowsControllerで記述した条件をブレードに表示させる為、メゾットを$変数に変換し、search.bladeで表示させる。

    //フォロー解除
   public function unfollow($userId)
   {
    // if(Auth::check()){
        //ログインしているユーザーの確認
    // $following = auth()->user();
    //現在ログインしているユーザーの情報の取得
    // $following->unfollow($id);
    //フォローしているユーザー解除する

    $follower = auth()->user();
    $is_following = $follower->isFollowing($userId);
    //フォローしているか

        if ($is_following)
        {
            $loggedInUserID = auth()->user()->id;
            Follow::where([
                ['followed_id', '=', $userId],
                ['following_id', '=', $loggedInUserID],
                ])
                ->delete();
        }
        return redirect('/search',['follow_switch'=>$follow_switch]);
        //FollowsControllerで記述した条件をブレードに表示させる為、メゾットを$変数に変換し、search.bladeで表示させる。    }
    }
}

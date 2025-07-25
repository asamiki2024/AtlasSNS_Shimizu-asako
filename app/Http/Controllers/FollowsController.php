<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //Authのuse宣言
use App\User;  //userがどこにあるのかを記述
use App\follow;  //フォロワーを取得
use App\Post; //Postのuse宣言
class FollowsController extends Controller
{
    //フォローリスト
    //フォローしているユーザーの投稿を表示
    public function followList(){
        $follow_posts = Post::orderBy('created_at', 'desc')->
        whereIn('user_id', Auth::user()->follows()->pluck('followed_id'))
        ->get();
        //15行目　$follow_iconsでPostテーブルの情報を取得
        //15行目　Post::orderBy('created_at', 'desc')は、投稿を降順にする。orderBy=並び替え created_at=投稿日時 desc=降順を意味する。(asc=昇順を意味する。)
        //16行目　Postテーブルのuser_idカラムを取得、その中からフォローしている人のidを取得

    //フォローしているユーザーのアイコンを表示
        $follow_icons = User::
        WhereIn('id' , Auth::user()->follows()->pluck('followed_id'))
        ->get();
        //23行目　$follow_iconsでUserテーブルの情報を取得
        //16行目　Userテーブルのidカラムを取得、その中からフォローしている人のidを取得
        return view('follows.followList', compact('follow_posts' , 'follow_icons'));
    }

    
    //18行目　コントローラー→web.phpを通ってfollows.followListへ表示させる。変数はfollow_icons(複数形にする)
    //フォロワーリスト
    public function followerList(){
        $follower_icons = User::
        WhereIn('id' , Auth::user()->followers()->pluck('following_id'))
        ->get();

        $follower_posts = Post::orderBy('created_at', 'desc')->
        whereIn('user_id', Auth::user()->followers()->pluck('following_id'))
        ->get();
        //39行目 Post::orderBy('created_at', 'desc')は、投稿を降順にする。orderBy=並び替え created_at=投稿日時 desc=降順を意味する。(asc=昇順を意味する。)
        return view('follows.followerList', compact('follower_icons', 'follower_posts'));
    }

    //フォロー機能
    //フォローリスト、フォロワーリストのフォロー機能も動く。
    //フォローするユーザーがログインしているかどうか確認
    // user $userの引数
   public function follow($userId)
//web.phpからメゾットの場所にデータが運ばれる
//$userIDはseach.bladeで書いたuser_>idのこと。
   {
    $follower = auth()->user();
    //auth()->user はuserテーブルからログインしているユーザーの情報を取得する
    //ログインしているユーザーの情報を全て(ID,name,mailなど)取得する
    $is_following = $follower->isFollowing($userId);
    //フォローしているか
    //ログインしているユーザーがフォローしているかどうかを確認している。isFollowingのメソッドを書いたUser.phpに移動　データ取得後　true(Yes)かNo(false)で戻ってくる。
    //$userId=色んなフォローしたいユーザーのID

        if (!$is_following)
        //！フォローしてなかったら43行目～54行目が動く
        //フォローしていたら43行目～54行目は動かずにブレードに戻る
            {
            //フォローしていない場合フォロー処理実行
            $loggedInUserID = auth()->user()->id;
            //ログインしているユーザーIDの取得
            $followedUser = User::find($userId);
            $followedUserId = $followedUser->id;
            //フォローしたい人のユーザーIDを元にユーザーを取得
        
            Follow::create([
                'following_id' => $loggedInUserID,
                'followed_id' => $followedUserId,
                //フォローズテーブルのfollowing_idカラムとfollowed_idカラムにデータを入るように記述している
            ]);
        }
    return back();
    //return backにすると前のページに戻ることが出来る。
    }
    //FollowsControllerで記述した条件をブレードに表示させる為、メゾットを$変数に変換し、search.bladeで表示させる。

    //フォロー解除
    //フォローリスト、フォロワーリストのフォロー解除機能も動く。
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
                //whereで条件を二つ出して探している。
                ['followed_id', '=', $userId],
                ['following_id', '=', $loggedInUserID],
                ])
                ->delete();
                // 条件にあうものを消している。
        }
        return back();
        //FollowsControllerで記述した条件をブレードに表示させる為、メゾットを$変数に変換し、search.bladeで表示させる。    }
    }
}

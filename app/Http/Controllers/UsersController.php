<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(){
        return view('users.search');
    }
     //検索処理
   public function usersearch(Request $request)
   {
    //1つめの処理
    $keyword = $request->input('keyword');
    //ユーザーテーブルの情報を$user_searchで取得
    $user_search = Post::get();
    //2つめの処理
    if(!empty($keyword))
        {
            $search_user = User::where('username', 'like', '%'.$keyword.'%')->get();
        }else{
            $search_user = User::all();
        }
    //3つめの処理
        return view('users.search')->with('users, $users');
   }
}

//次回やること
// 自分で自分が新規で作ったユーザーを検索する。
// 検索処理を記述する。
//　検索してフォローする。それの繰り返し。
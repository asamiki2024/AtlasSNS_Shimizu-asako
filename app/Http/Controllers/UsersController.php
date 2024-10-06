<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
//use宣言をしてappの中にあるusersテーブルからデータを受け取る。

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
    //キーワードに文字が入ると検索処理がされる。
    
    //2つめの処理
    if(!empty($keyword))
    //ユーザー検索欄がどう入力されているかでどうなるのかを条件分岐している。
        {
            $search_user = User::where('username', 'like', '%'.$keyword.'%')->get();
            //キーワードが入っていたら、ユーザー名、曖昧検索でもヒットさせる。
        }else{
            $search_user = User::all();
            //何もキーワードが入っていなければユーザー全て表示させる。
        }
    //3つめの処理
        return view('users.search',['search_user'=>$search_user , 'keyword'=>$keyword]);
        //UsersControllerで記述した条件を表示させる為、メゾットを$変数に変換し、search.bladeで表示させる。キーワードワードも同じく。
    }
}
//次回やること
// 自分で自分が新規で作ったユーザーを検索する。
// 検索処理を記述する。
//　検索してフォローする。それの繰り返し。
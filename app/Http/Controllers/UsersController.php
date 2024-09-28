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
}

//次回やること
// 自分で自分が新規で作ったユーザーを検索する。
// 検索処理を記述する。
//　検索してフォローする。それの繰り返し。
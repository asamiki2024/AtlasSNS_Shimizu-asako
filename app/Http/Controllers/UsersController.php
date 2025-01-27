<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
//use宣言をしてappの中にあるusersテーブルからデータを受け取る。

class UsersController extends Controller
{
    
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
    //UsersControllerで記述した条件をブレードに表示させる為、メゾットを$変数に変換し、search.bladeで表示させる。キーワードワードも同じく。
    }

//プロフィール編集画面を表示させるメゾット
public function profile(){
    return view('users.profile');
}

// プロフィール編集のメゾット
public function Update_profile(Request $request){
    // データを受け取り表示させる
    $id = Auth::user()->id;
    $up_username = $request->input('up_username');
    $up_mail = $request->input('up_mail');
    $up_password = $request->input('up_password');
    $up_password_confirmation = $request->input('up_password_confirmation');
    $up_bio = $request->input('up_bio');
    $up_images = $request->input('up_images');

    // データを編集
    User::where('id', $id)->update([
        'username' => $up_username,
        'mail' => $up_mail,
        'password' => $up_password,
        'password_confirmation' =>$up_password_confirmation,
        'bio' => $up_bio,
        'images' => $up_images
    ]);
    //プロフィール編集ページのバリテーション機能
        //バリデーション　required=入力必須 min=最小の文字数 max=最大の文字数 alpha_num=英数字のみ unique=登録済みメールアドレスがないかをusersのmailカラムから探すことが出来る。
        //confirmed=パスワードが同じものが入力されているか確認処理している email=メールアドレス形式になっているかの処理
        $request->validate([
            'username' => 'required|min:2|max:12',
            'mail' => 'required|email|unique:users,mail|min:5|max:40',
            'password' => 'required|alpha_num|min:8|max:20|confirmed',
            'password_confirmation' => 'required|alpha_num|min:8|max:20',
            'bio' => 'max:150',
            'images' => 'file|image|mimes:jpg,png,bmp,gif,svg'
        ]);
    return redirect('/top');
}


//フォロワーさんたちのページを表示させるメゾット
public function Usersprofile(){
    return view('users.Usersprofile');
}
}

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
    public function profile()
    {
        return view('users.profile');
    }

// プロフィール編集のメゾット
    public function update_profile(Request $request){
        //1つめの処理情報の受け渡し
        $up_id = $request->input('up_id');
        $up_username = $request->input('up_username');
        $up_mail = $request->input('up_mail');
        $up_password = $request->input('up_password');
        // $up_password_confirmation = $request->input('up_password_confirmation');
        $up_bio = $request->input('up_bio');
        $up_images = $request->input('up_images');
        //2つめの処理　データを編集
        User::where('id', $up_id)->update([
        'username' => $up_username,
        'mail' => $up_mail,
        'password' => $up_password,
        // 'password_confirmation' =>$up_password,
        'bio' => $up_bio,
        'images' => $up_images
        ]);
        //2つめの処理バリテーション
        $request->validate([
            'username' => 'required|min:2|max:12',
            'mail' => 'required|email|unique:users,mail|min:5|max:40',
            'password' => 'required|alpha_num|min:8|max:20|confirmed',
            'bio' => 'max:150',
            'images' => 'file|image|mimes:jpg,png,bmp,gif,svg'
        ]);

        //3つめの処理
        return redirect('/top');
    }


//フォロワーさんたちのページを表示させるメゾット
public function Usersprofile(){
    return view('users.Usersprofile');
}
}

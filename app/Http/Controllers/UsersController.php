<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Hash;
//use宣言をしてプロフィール編集のパスワードのハッシュ化させる。
use Illuminate\Support\Facades\Storage;
//use宣言をして写真を保存させる。
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
        // dd($request);
        // $user = Auth::user();
        //1つめの処理バリテーション
        $request->validate([
            'username' => 'required|min:2|max:12',
            'mail' => 'required|email|unique:users,mail|min:5|max:40',
            'password' => 'required|alpha_num|min:8|max:20|confirmed',
            'password_confirmation' => 'required|alpha_num|min:8|max:20|string',
            'bio' => 'max:150',
            // 'images' => 'file|image|mimes:jpg,png,bmp,gif,svg'
        ]);
        //1つめの処理情報の受け渡し
        $id = $request->input('id');
        $username = $request->input('username');
        $mail = $request->input('mail');
        $password = bcrypt($request->input('password'));
        //bcryptでパスワードのハッシュ化される。
        // $password_confirmation = Hash::make($password);
        //パスワードをハッシュ化させてデータベースでも分からない様に暗号化させる。
        $bio = $request->input('bio');

        //2つめの処理　データを編集
        $update = [
        'username' => $username,
        'mail' => $mail,
        'password' => $password,
        // 'password_confirmation' => Hash::make([$password]),
        'bio' => $bio,
        // 'images' => 'icon'
        ];
        //3つめの処理
        User::where('id', $id)->update(['username' =>$username, 'mail' =>$mail, 'password' =>$password,  'bio' =>$bio]);
        return redirect('/top');
    }

        //パスワードのハッシュ化使わなかったもの
        // public function save(UserRequest $request, User $user){
            // $user->fill(array_merge($request->all(), ['password' => Hash::make($request->password)]) -> save();
            // return redirect('/top')
        // }

        //画像の保存
        // public function store(Request $request){
        // $filename = $request->file('icons')->getClientOriginalName();
        //ファイルに名前を付けて保存
        // $imag_up = $request->imgpath->store('image-icon');
        // $icons_up = Storage('/public/images');
        // $user->images = besename($imagesup);
        // $user->save();
        // return redirect('/top');
        // }

        //
        // public function upimages(){
            // $user = User::all();
            // return view('i')
        // }
    // }


//フォロワーさんたちのページを表示させるメゾット
public function Usersprofile(){
    return view('users.Usersprofile');
}
}

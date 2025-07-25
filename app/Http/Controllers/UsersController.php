<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//ログインしているユーザーの情報を取得
use Illuminate\Validation\Rule;
//複雑なバリデーションルールを使う為に記述
use Illuminate\support\Facades\Hash;
//use宣言をしてプロフィール編集のパスワードのハッシュ化させる。
use Illuminate\Support\Facades\Storage;
//use宣言をして写真を保存させる。
use App\User;
use App\Post; //Postのuse宣言
use App\follow;
//フォロワーを取得
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
        //ユーザー検索欄がどう入力されているかでどうなるのかを条件分岐している。
        $search_user = User::where('username', 'like', '%'.$keyword.'%')->orderBy('created_at', 'desc')->
        //キーワードが入っていたら、ユーザー名、曖昧検索でもヒットさせる。
         where('id', '<>', Auth::id())->get();
        //何もキーワードが入っていなければユーザー全て表示させる。
        //自分のアカウントは除外する。

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
            'mail' => 'required', 'email', 'min:5', 'max:40', Rule::unique('users', 'mail')->ignore(Auth::id()),
            //Rule::unique('users', 'mail')　意味:usersテーブルのmailカラムを対象に指定　->ignore(Auth::id())　意味:自分のレコードは除外する
            //Rule::を使用するのは配列形式に書く必要がある為。 'mail'=>[]のように書く必要がある為。
            'password' => 'required|alpha_num|min:8|max:20|confirmed',
            'password_confirmation' => 'required|alpha_num|min:8|max:20|string',
            'bio' => 'max:150',
            'images' => 'file|image|mimes:jpg,png,bmp,gif,svg'
            //file=フィールドがアップロード成功したファイルである事を証明すること。
            //image=指定されたファイルの画像が(jpg,png,bmp,git,svg)であると証明すること。
            //mimes=フィールドで指定したファイルが拡張子のリストの中にMIMEタイプのどれかに一致する事を証明すること。

        ]);
        //1つめの処理情報の受け渡し
        $id = $request->input('id');
        $username = $request->input('username');
        $mail = $request->input('mail');
        $password = bcrypt($request->input('password'));
        // null;
        //     if($request->filled('password')){
        //         $password = Hash::make($request->input('password'));
        //     }
        //bcryptでパスワードのハッシュ化される。
        // $password_confirmation = Hash::make($password);
        //パスワードをハッシュ化させてデータベースでも分からない様に暗号化させる。
        $bio = $request->input('bio');
        $icons = $request->input('icons');
        //2つめの処理　データを編集
        $update = [
            'username' => $username,
            'mail' => $mail,
            'password' => $password,
            // 'password_confirmation' => Hash::make([$password]),
            'bio' => $bio,
            // 'images' => $icons
        ];
        //画像の保存
        $icons = $request->file('icons')->getClientOriginalName();
        //getClientOriginalName=アップロードされたファイルの名前を付けて保存
        $iconsPhoto = $request->file('icons')->store('/public');
        // storeで名前を変更して保存している。
        $filename = basename($iconsPhoto);
            \DB::table('users')
            ->where('id', $id)
            ->update([
                'images' => $filename
            ]);
            //3つめの処理
            User::where('id', $id)->update(['username' =>$username, 'mail' =>$mail, 'password' =>$password,  'bio' =>$bio , 'images' =>$filename]);
                return redirect('/top');
            }
        //写真を保存するファイル名とどこのディレクトリに保存するのかを指定
        // $icons_up = store('/public/images');
        // $user->images = besename($imagesup);
        // $user->save();

        //パスワードのハッシュ化使わなかったもの
        // public function save(UserRequest $request, User $user){
            // $user->fill(array_merge($request->all(), ['password' => Hash::make($request->password)]) -> save();
            // return redirect('/top')
        // }

        //
        // public function upimages(){
            // $user = User::all();
            // return view('i')
        // }
    // }
    //アイコンユーザーのプロフィールを取得
    public function followDate($id){
        $followUser = User::where('id', $id)->first();
        // dd($followUser);

        //フォロワーの投稿表示
        $followPost = Post::orderBy('created_at', 'desc')->with('user')->where('user_id',$id)->get();
        //PostテーブルとUserテーブルの両方の情報を取得。その中から該当のユーザーのID(postテーブルのカラム名user_id)と変数の$idで情報を取得し、getでその人が投稿した全てを取得して表示している。
        //Post::orderBy('created_at', 'desc')は、投稿を降順にする。orderBy=並び替え created_at=投稿日時 desc=降順を意味する。(asc=昇順を意味する。)
        return view('users.Usersprofile', ['followUser'=>$followUser, 'followPost'=>$followPost]);
    }
    

}
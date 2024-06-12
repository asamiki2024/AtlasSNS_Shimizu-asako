<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request){
        if($request->isMethod('post')){
            //バリデーション　required=入力必須 min=最小の文字数 max=最大の文字数 alpha_num=英数字のみ unique=登録済みメールアドレスがないかをusersのmailカラムから探すことが出来る。
            //confirmed=パスワードが同じものが入力されているか確認処理している email=メールアドレス形式になっているかの処理
            $request->validate([
                'username' => 'required|min:2|max:12',
                'mail' => 'required|email|unique:users,mail|min:5|max:40',
                'password' => 'required|alpha_num|min:8|max:20|confirmed',
                'password_confirmation' => 'required|alpha_num|min:8|max:20'
            ]);



            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');

            User::create([
                'username' => $username,
                'mail' => $mail,
                'password' => bcrypt($password),
            ]);
            $request->session()->put('username', $username);    //自分で入力。セッションでユーザーの名前を一時保存し、データを受け渡し。
            return redirect('added')->with('username', $username); //->から自分で入力。
        }
        return view('auth.register');
    }

    public function added(){
        return view('auth.added');
    }
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'password' => HashMake::class,
    ];
    
    // リレーション定義を追加（1対多の多）
    public function post(){
        return $this->hasMany('App\Post');
    }

    // フォロー機能の実装(followsテーブルへの登録と削除)
    // (フォローをおこなった人のリレーション)
    public function follows(){
        return $this->belongsToMany('App\User', 'follows', 'following_id', 'followed_id');
    }
    //Userのデータベースの中のfollowsテーブルを利用して多対多のリレーションをする。

    // フォロー機能の実装(followsテーブルへの登録と削除)(フォローをされた人のリレーション)
    //ユーザーをフォローしている人数取得
    public function followers(){
        return $this->belongsToMany('App\User', 'follows', 'followed_id', 'following_id');
    }


    //フォロー機能
    public function follow(Int $user_id){
        return $this->follows()->attach($user_id);
    }

    //フォロー解除
    public function unfollow(Int $user_id){
        return $this->follows()->attach($user_id);
    }

    //フォローしているか
    public function isFollowing(Int $user_id){
        return(bool) $this->follows()->where('followed_id', $user_id)->first();
        //return前の場所に戻る(bool Yes or No を送る) $this->follows()->where('followed_id', $user_id)->first();
        //boolで $this->follows()->where('followed_id', $user_id)->first()の処理をはいかいいえで送る
        //$this=このファイル Uer.php ->follows()　37行目:フォローテーブルにアクセス
        //where　MYSQLの条件つきデータ抽出引用('followed_id', $user_id)followed_idカラムに$user_idがあるか調べている
        //->first() 最初の1件を取得する。true(Yes)　取得出来なかったら、false(No) return boolで自動でYesかNoで返される。
    }
//

    //フォローされているか
    public function isFollowed(Int $user_id){
        return(bool) $this->followers()->where('following_id', $user_id)->first();
    }
}
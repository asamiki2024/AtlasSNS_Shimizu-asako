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

    // リレーション定義を追加（1対多の多）
    public function post(){
        return $this->hasMany('App\Post');
    }

    // フォロー機能の実装(followsテーブルへの登録と削除)(フォローをおこなった人のリレーション)
    public function follows(){
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'followed_id');
    }

    // フォロー機能の実装(followsテーブルへの登録と削除)(フォローをされた人のリレーション)
    public function followers(){
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'following_id');
    }
}

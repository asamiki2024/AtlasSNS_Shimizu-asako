<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    public function user(){
        return $this->hasMany('App\User');
    }

    //フォロワーしているユーザーの取得
    public function followings(){
        return $this->belongsToMany('App\Follow', 'follows', 'following_id', 'followed_id');
    }

    //フォローされているユーザーの取得
    public function followers(){
        return $this->belongsToMany('App\Follow', 'follows', 'followed_id', 'following_id');
    }

    //フォローする
    public function follow(User $user){
        $this->followings()->attach($user->id);
    }
    
}

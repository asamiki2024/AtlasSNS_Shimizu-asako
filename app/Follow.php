<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Follow extends Model
{
    protected $fillable = [
        'id', 'following_id', 'followed_id',
    ];
//fillableとはテーブルのカラムを指定し、カラムの登録や更新が出来る。上記は、ユーザーIDの登録とフォローしているID、フォローのIDが登録、更新出来る。これによりフォロー、フォロー解除が出来るようになる。
    public function user(){
        return $this->hasMany('App\User');
    }
}
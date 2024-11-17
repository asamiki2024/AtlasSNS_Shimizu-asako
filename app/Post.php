<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // 投稿フォームで投稿した内容とユーザーIDがPOSTテーブルで受け取れるように許可する記述。
    protected $fillable = [
        'user_id', 'post'
    ];
    //リレーション定義（1対多の1）投稿者の名前とユーザーアイコンのデータをリレーションするため。
    public function user(){
        return $this->belongsTo('App\User');
    }
    
}

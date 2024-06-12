<?php

use Illuminate\Database\Seeder;
use App\User;  //Userクラスがどこにあるのかを記述する

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //レコードの生成
        //モデルに直接やり取りしデータを受け取る方法、危険なコードを書き込めないので脆弱性対策になる
       User::create([
            
            'username' => 'さとう',
            'mail' => 'sato@atlas.com',
            'password' => bcrypt('sato2024')
            
        ]);
    }
    //public function up()
    //{
        //Schema::create('users', function (Blueprint $table){
            //$table->string('username');
        //});
    //}
}
//データベースを通じてやり取りし、データを受け取る方法、フォームの中を誰でも操作出来てしまうので脆弱性は弱い
//DB::table('users')->insert([
            //[
            //'username' => 'さとう',
            //'mail' => 'sato@atlas.com',
            //'password' => bcrypt('sato2024')
            //],
        //]);
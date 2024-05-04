<?php

use Illuminate\Database\Seeder;

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
        DB::table('users')->insert([
            [
            'name' => 'さとう',
            'mail' => 'sato@atlas.com',
            'password' => bcrypt('sato2024')
            ],
        ]);
    }
}

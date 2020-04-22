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
        DB::table('users')->truncate();
        // 初期データ用意（列名をキーとする連想配列）
        $users = [[
            'name' => '東 哲志',
            'email' => "user@example.com",
            'password' => Hash::make("password")
        ],[
            'name' => '東 哲志',
            'email' => "user2@example.com",
            'password' => Hash::make("password")
        ]];
        // 登録
        foreach($users as $user) {
            \App\User::create($user);
        }
    }
}

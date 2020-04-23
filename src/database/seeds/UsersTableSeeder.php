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
        $users = [[
            'name' => '東 哲志',
            'email' => "user@example.com",
            'password' => Hash::make("password")
        ],[
            'name' => '東 哲志',
            'email' => "user2@example.com",
            'password' => Hash::make("password")
        ]];
        foreach($users as $user) {
            \App\User::create($user);
        }
    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    DB::table('articles')->truncate();
    DB::table('blogs')->truncate();
    DB::table('users')->truncate();
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    $this->call(UsersTableSeeder::class);
    $this->call(BlogsTableSeeder::class);
    $this->call(ArticlesTableSeeder::class);
  }
}

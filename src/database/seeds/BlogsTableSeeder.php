<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class BlogsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('blogs')->truncate();
    $user = \App\User::find(1);
    $blogs = [
      ['name' => 'PHP Blog', 'user_id' => $user->id,
        'subtitle' => "PHPでブログを作りました"],
      ['name' => 'Laravel Blog', 'user_id' => $user->id,
        'subtitle' => "Laravelでブログを作りました"],
      ['name' => 'Ruby Blog', 'user_id' => $user->id,
        'subtitle' => "Rubyでブログを作りました"]
      ];
    // 登録
    foreach($blogs as $blog) {
      $blog['last_posted_at'] = Carbon::now();
      \App\Blog::create($blog);
    }
  }
}

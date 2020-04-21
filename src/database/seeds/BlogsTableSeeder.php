<?php

use Illuminate\Database\Seeder;

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

    // 初期データ用意（列名をキーとする連想配列）
    $blogs = [
      ['name' => 'PHP Blog',
        'subtitle' => "PHPでブログを作りました"],
      ['name' => 'Laravel Blog',
        'subtitle' => "Laravelでブログを作りました"],
      ['name' => 'Ruby Blog',
        'subtitle' => "Rubyでブログを作りました"]
      ];
    // 登録
    foreach($blogs as $blog) {
      \App\Blog::create($blog);
    }
  }
}

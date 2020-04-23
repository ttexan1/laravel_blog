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
    $users = \App\User::all();
    $blogs = [
      ['name' => 'PHP Blog',
        'subtitle' => "PHPでブログを作りました"],
      ['name' => 'Laravel Blog',
        'subtitle' => "Laravelでブログを作りました"],
      ['name' => 'Ruby Blog',
        'subtitle' => "Rubyでブログを作りました"]
    ];
    $i = 1;
    foreach($users as $user) {
      foreach($blogs as $blog) {
        $filename = \File::copy("database/seeds/pictures/sample$i.jpeg", "/work/public/storage/avatar/sample$i.jpeg");
        $blog['header_image_url'] = "sample$i.jpeg";
        // basename($filename);
        $blog['user_id'] = $user->id;
        $blog['last_posted_at'] = Carbon::now();
        \App\Blog::create($blog);
        $i += 1;
      }
    }
  }
}

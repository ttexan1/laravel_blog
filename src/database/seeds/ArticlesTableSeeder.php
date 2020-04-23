<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogs = \App\Blog::all();
        $articles = [
        ['title' => 'PHP Blog', 'status' => 'published', 'published_at' => Carbon::now(),
            'body' => "PHPでブログを作りました"],
        ['title' => 'Laravel Blog', 'status' => 'published', 'published_at' => Carbon::now(),
            'body' => "Laravelでブログを作りました"],
        ['title' => 'Ruby Blog', 'status' => 'draft',
            'body' => "Rubyでブログを作りました"]
        ];
        foreach($blogs as $blog) {
            $i = 1;
            foreach($articles as $article) {
                $article['body'] = \File::get("database/seeds/article_samples/sample$i.txt");
                $article['blog_id'] = $blog->id;
                \App\Article::create($article);
                $i = $i + 1;
            }
        }
    }
}

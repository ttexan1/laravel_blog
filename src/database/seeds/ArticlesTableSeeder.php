<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->truncate();
        $blogs = \App\Blog::find([1,2,3]);
        $articles = [
        ['title' => 'PHP Blog', 'status' => 'publised',
            'body' => "PHPでブログを作りました"],
        ['title' => 'Laravel Blog', 'status' => 'draft',
            'body' => "Laravelでブログを作りました"],
        ['title' => 'Ruby Blog', 'status' => 'draft',
            'body' => "Rubyでブログを作りました"]
        ];
        // 登録
        foreach($blogs as $blog) {
            foreach($articles as $article) {
                $article['blog_id'] = $blog->id;
                \App\Article::create($article);
            }
        }
    }
}

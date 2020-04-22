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
        $blogs = \App\Blog::all();
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

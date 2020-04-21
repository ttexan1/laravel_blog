<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Article;

class ArticlesController extends Controller
{
    public function show($id) {
        $article = Article::findOrFail($id);
        return view('articles/show', compact('article'));
    }

    public function create() {
    // 空の$articleを渡す
        $article = new Article();
        return view('articles/create', compact('article'));
    }

    public function store(ArticleRequest $request) {
        $article = new Article();
        $article->name = $request->name;
        $article->title = $request->title;
        $article->body = $request->body;
        $article->published_at = $request->published_at;
        $article->status = $request->status;
        $article->save();
        return redirect("/articles");
    }

    public function edit($id) {
        $article = Article::findOrFail($id);
        return view('articles/edit', compact('article'));
    }

    public function update(ArticleRequest $request, $id) {
        $article = Article::findOrFail($id);
        $article->name = $request->name;
        $article->title = $request->title;
        $article->body = $request->body;
        $article->published_at = $request->published_at;
        $article->status = $request->status;
        $article->save();

        return redirect("/articles");
    }

    public function destroy($id) {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect("/articles");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;
use App\Blog;
use App\Article;

class ArticlesController extends Controller
{
    public function index($blog_id) {
        $user = Auth::user();
        if(!$user) {
            abort('404');
        }
        $blog = $user->blogs->find($blog_id);
        if(!$blog) {
            abort('404');
        }
        $articles = $blog->articles;
        return view('articles/index', compact('blog', 'articles'));
    }
    public function show($blog_id, $id) {
        $blog = Blog::findOrFail($blog_id);
        $articles = Article::where('blog_id', $blog->id)->
            where('status', 'published')->orderBy('published_at', 'desc')->get();
        $article = $articles->find($id);
        if (!$blog || !$article) {
            abort('404');
        }
        
        return view('articles/show', compact('blog', 'articles', 'article'));
    }

    public function create($blog_id) {
        $blog = Auth::user()->blogs->find($blog_id);
        if (!$blog) {
            abort('404');
        }
        $article = new Article();
        return view("/articles/create", compact('blog', 'article'));
    }

    public function store($blog_id, ArticleRequest $request) {
        $blog = Auth::user()->blogs->find($blog_id);
        if (!$blog) {
            abort('404');
        }
        $article = new Article();
        $article->blog_id = $blog->id;
        $article->title = $request->title;
        $article->body = $request->body;
        $article->status = $request->status;
        if ($request->status == 'published') {
            $article->published_at = Carbon::now();
            $blog->last_posted_at = Carbon::now();
            $blog->save();
        }
        $article->save();
        return redirect("/blogs/$blog->id/articles/$article->id");
    }

    public function edit($blog_id, $id) {
        $blog = Auth::user()->blogs->find($blog_id);
        if (!$blog) {
            abort('404');
        }
        $article = $blog->articles->find($id);
        return view("/articles/edit", compact('blog', 'article'));
    }

    public function update(ArticleRequest $request, $blog_id, $id) {
        $blog = Auth::user()->blogs->find($blog_id);
        if (!$blog) {
            abort('404');
        }
        $article = $blog->articles->find($id);
        $article->title = $request->title;
        $article->body = $request->body;
        $article->published_at = $request->published_at;
        if ($request->status == 'published' && $article->status == 'draft') {
            $article->published_at = Carbon::now();
            $blog->last_posted_at = Carbon::now();
            $blog->save();
        }
        $article->status = $request->status;
        $article->save();

        return redirect("/blogs/$blog->id/articles/$article->id");
    }

    public function destroy($blog_id, $id) {
        $blog = Auth::user()->blogs->find($blog_id);
        if (!$blog) {
            abort('404');
        }
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect("/blogs/$blog->id/articles");
    }
}

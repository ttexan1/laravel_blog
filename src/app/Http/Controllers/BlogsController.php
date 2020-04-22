<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Blog;
use App\Article;

class BlogsController extends Controller
{
  public function index() {
    $blogs = Blog::all();
    return view('blogs/index', compact('blogs'));
  }

  public function show($id) {
    $blog = Blog::findOrFail($id);
    $articles = Article::where('blog_id', $blog->id)->orderBy('published_at', 'desc')->get();
    // $articles = $blog->articles->sortByDesc('published_at');
    return view('blogs/show', compact('blog', 'articles'));
  }

  public function create() {
    // Log::debug(Auth::user()->name);
    if (!Auth::user()) {
      abort('404');
    }
    $blog = new Blog();
    return view('blogs/create', compact('blog'));
  }

  public function store(BlogRequest $request) {
    $blog = new Blog();
    $blog->name = $request->name;
    $blog->subtitle = $request->subtitle;
    $blog->user_id = Auth::user()->id;
    $blog->save();
    $filename = $request->header_image->store('public/avatar');
    $blog->header_image_url = basename($filename);
    $blog->save();
    return redirect("/blogs/$blog->id");
  }

  public function edit($id) {
    $blog = Auth::user()->blogs->find($id);
    if (!$blog) {
      abort('404');
    }
    return view('blogs/edit', compact('blog'));
  }

  public function update(BlogRequest $request, $id) {
    $blog = Auth::user()->blogs->find($id);
    if (!$blog) {
      abort('404');
    }

    $blog->name = $request->name;
    $blog->subtitle = $request->subtitle;
    $blog->header_image_url = $request->header_image_url;
    $blog->save();

    return redirect("/blogs/$blog->id");
  }

  public function destroy($id) {
    $blog = Auth::user()->blogs->find($id);
    if (!$blog) {
      abort('404');
    }
    $blog->delete();
    return redirect("/blogs");
  }
}

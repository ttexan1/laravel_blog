<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Facades\DB;
use PDO;
use App\Blog;
use App\Article;

class BlogsController extends Controller
{
  public function index() {
    $blogs = Blog::all();
    return view('blogs/index', compact('blogs'));
  }

  public function show($id) {
    // 一応一箇所だけPDOを使ってデータベースアクセスした痕跡を残しておく。

    // blog
    $stmt = DB::connection()->getPdo()->prepare("select * from `blogs` where id=:id");
    $stmt->bindParam( ":id", $id );
    $stmt->execute();
    $blog = (object)($stmt->fetch(PDO::FETCH_ASSOC));
    // blog->user
    $stmt = DB::connection()->getPdo()->prepare("select * from `users` where id=:user_id");
    $stmt->bindParam( ":user_id", $blog->user_id );
    $stmt->execute();
    $blog->user = (object)($stmt->fetch(PDO::FETCH_ASSOC));
    // articles
    $stmt = DB::connection()->getPdo()->prepare("select * from articles where status = 'published' and blog_id=:blog_id order by published_at desc");
    $stmt->bindParam( ":blog_id", $blog->id );
    $stmt->execute();
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    for ($i = 0; $i < count($articles); $i++) {
      $articles[$i] = (object)$articles[$i];
    }

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

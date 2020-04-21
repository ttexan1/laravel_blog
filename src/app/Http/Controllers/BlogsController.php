<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Blog;

class BlogsController extends Controller
{
  public function index() {
    $blogs = Blog::all();
    return view('blogs/index', compact('blogs'));
  }

  public function show($id) {
    $blog = Blog::findOrFail($id);
    return view('blogs/show', compact('blog'));
  }

  public function create() {
    // 空の$blogを渡す
    $blog = new Blog();
    return view('blogs/create', compact('blog'));
  }

  public function store(BlogRequest $request) {
    $blog = new Blog();
    $blog->name = $request->name;
    $blog->subtitle = $request->subtitle;
    $blog->header_image_url = $request->header_image_url;
    $blog->save();

    return redirect("/blogs");
  }

  public function edit($id) {
    $blog = Blog::findOrFail($id);
    return view('blogs/edit', compact('blog'));
  }

  public function update(BlogRequest $request, $id) {
    $blog = Blog::findOrFail($id);
    $blog->name = $request->name;
    $blog->subtitle = $request->subtitle;
    $blog->header_image_url = $request->header_image_url;
    $blog->save();

    return redirect("/blogs");
  }

  public function destroy($id) {
    $blog = Blog::findOrFail($id);
    $blog->delete();

    return redirect("/blogs");
  }
}

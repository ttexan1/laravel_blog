@extends('blogs/layout')
@section('content')
<div class="container ops-main">
<div class="row">
  <div class="col-md-12">
    <h3 class="ops-title">ブログ一覧</h3>
  </div>
</div>
<div class="row">
  <div class="col-md-11 col-md-offset-1">
    <table class="table text-center">
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">書籍名</th>
        <th class="text-center">サブタイトル</th>
        <th class="text-center">著者</th>
        <th class="text-center">削除</th>
      </tr>
      @foreach($blogs as $blog)
      <tr>
        <td>
          <a href="/blogs/{{ $blog->id }}">{{ $blog->id }}</a>
        </td>
        <td>{{ $blog->name }}</td>
        <td>{{ $blog->subtitle }}</td>
        <td>{{ $blog->author }}</td>
        <td>
          <form action="/blog/{{ $blog->id }}" method="post">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash"></span></button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
    <div><a href="/blogs/create" class="btn btn-default">新規作成</a></div>
  </div>

  <div>
    <p>使い方</p>
    <p>php artisan tinker</p>
    <p>use \App\Blog;</p>
    <p>$blogs = Blog::all();</p>
    <p>$blogs->count();</p>
    <p>======FIND======</p>
    <p>Blog::where('price', '>=', 2500)->get();</p>
    <p>$blog = Blog::find(2);</p>
    <p>======NEW======</p>
    <p>$newBlog = new Blog();</p>
    <p>$newBlog->name = 'Python Blog';</p>
    <p>$newBlog->save();</p>
    <p>======DELETE======</p>
    <p>$blog->delete();</p>
  </div>
</div>
@endsection
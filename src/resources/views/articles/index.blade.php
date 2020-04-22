@extends('layouts.app')
@section('content')

<!-- <section class="jumbotron text-center"> -->
  <div class="container text-center">
    <div class="image" style="height: 300px; overflow: hidden; position: relative;">
      <img class="card-img-top" alt="Thumbnail [100%x225]" style="width: 100%; display: block; position: absolute; top: -200px;" src="https://www.tabikobo.com/special/zekkei/images/main.jpg" data-holder-rendered="true">
      <div>
        <h1 class="jumbotron-heading">{{$blog->name}}</h1>
        <p class="lead text-muted">{{$blog->subtitle}}</p>
      </div>
    </div>
  <!-- </div> -->
<!-- </section> -->

@if (count($articles) != 0)
<div class="container ops-main">
<div class="row">
  <div class="col-md-12">
    <h3 class="ops-title m-5">作成記事一覧</h3>
  </div>
</div>
<div class="row m-0">
  <div class="col-md-12 col-md-offset-1 p-0">
    <table class="table text-center">
      <tr>
        <th class="text-left">ID</th>
        <th class="text-left">記事タイトル</th>
        <th class="text-left" width="400px">内容</th>
        <th class="text-left">ステータス</th>
        <th class="text-left"></th>
        <th class="text-left"></th>
      </tr>
      @foreach($articles as $article)
      <tr>
        <td class="text-left">
          <a href="/articles/{{ $blog->id }}">{{ $article->id }}</a>
        </td>
        <td class="text-left">{{ $article->title }}</td>
        <td class="text-left">{{ str_limit($article->body, $limit = 50, $end = '...') }}</td>
        @if ($article->status=='draft')
          <td class="text-left">下書き</td>
        @else
          <td class="text-left">公開中</td>
        @endif
        <td class="text-left"><a href="/blogs/{{ $blog->id }}/articles/{{$article->id}}/edit" class="btn btn-xs btn-primary edit mr-2" style="height: 37px">編集</a></td>
        <td class="text-left">
          <form action="/blogs/{{ $blog->id }}/articles/{{$article->id}}" method="post">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align">
              <span>削除</span>
            </button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
@endif
  <div class="text-center" style="width:100%">
    <a href="/articles/create" class="btn btn-default">新規記事作成</a>
  </div>
@endsection
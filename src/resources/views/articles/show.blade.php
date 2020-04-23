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

<div class="album py-5 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-8 p-0">
        <div class="mb-4 box-shadow">
          <div class="title d-flex justify-content-between">
            <h1>{{$article->title}}</h1>
            <div class="edit d-flex justify-content-between align-items-center">
              @if (Auth::user()->blogs->find($blog->id) != null)
                <!-- <p>{{$articles[0]->published_at}}</p> -->
                <a href="/blogs/{{ $blog->id }}/articles/{{$article->id}}/edit" class="btn btn-xs btn-primary edit mr-2" style="height: 37px">編集</a>
                <style>
                </style>
              @else
                <p>{{$article->published_at}}</p>
              @endif
            </div>
          </div>
        </div>
        <div class="card mb-4 box-shadow p-4 text-left">
        {!! nl2br(e($article->body)) !!}
        </div>
      </div>

      <div class="col-md-4">
        <div class="mb-4 box-shadow" style="height: 51px"></div>
        <div class="card mb-4 box-shadow">
        <h3 class="title">ブログ運営者</h3>
          <div class="profile d-flex justify-content-between align-items-center">
            <div class="thumbnail rounded-circle"></div>
            <p>{{$blog->user->name}}</p>
          </div>
        </div>
        <div class="card mb-4 box-shadow">
          <h3 class="title">その他の記事</h3>
          <div class="articles text-left pl-3">
            @foreach($articles as $article)
              <p><a href="/blogs/{{$blog->id}}/articles/{{$article->id}}">{{$article->title}}</a></p>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
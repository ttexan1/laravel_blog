@extends('layouts.app')
@section('content')

<main role="main">
  @if (Auth::user() != null && count(Auth::user()->blogs) == 0)
  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">ブログへようこそ</h1>
      <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
      <p>
        <a href="https://getbootstrap.com/docs/4.0/examples/album/#" class="btn btn-primary my-2">早速ブログを開始する</a>
        <a href="https://getbootstrap.com/docs/4.0/examples/album/#" class="btn btn-secondary my-2">あとで</a>
      </p>
    </div>
  </section>
  @endif

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
      @foreach($blogs as $blog)
        <div class="col-md-4">
          <div class="card mb-4 box-shadow">
            <div class="image" style="height: 200px; overflow: hidden;">
            @if ($blog->header_image_url)
              <img src="{{ asset('storage/avatar/' . $blog->header_image_url) }}" alt="avatar" />
            @else
              <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22208%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20208%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1719fc649d0%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A11pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1719fc649d0%22%3E%3Crect%20width%3D%22208%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2266.9296875%22%20y%3D%22117.45%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
            @endif
            </div>
            <div class="card-body">
              <a href="/blogs/{{ $blog->id }}">
                <h2>{{$blog->name}}</h2>
                <p class="card-text">{{$blog->subtitle}}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <small class="text-muted">{{$blog->last_posted_at}}</small>
                </div>
              </a>
            </div>
          </div>
        </div>
      @endforeach
      </div>
    </div>
  </div>

</main>

<footer class="text-muted">
  <div class="container">
    <p class="float-right"></p>
    <p>Album example is © Bootstrap, but please download and customize it for yourself!</p>
    <p>New to Bootstrap? <a href="https://getbootstrap.com/docs/4.0/">Visit the homepage</a> or read our <a href="https://getbootstrap.com/docs/4.0/getting-started/">getting started guide</a>.</p>
  </div>
</footer>
@endsection
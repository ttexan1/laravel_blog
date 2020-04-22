<div class="container ops-main">
  <div class="row">
    <div class="col-md-6">
      <h2>記事投稿</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8 col-md-offset-1">
      <div class="row">
        <div class="col-md-12">
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        </div>
      </div>
      @if($target == 'store')
      <form action="/blogs/{{$blog->id}}/articles" method="post">
      @elseif($target == 'update')
      <form action="/blogs/{{$blog->id}}/articles/{{ $article->id }}" method="post">
          <input type="hidden" name="_method" value="PUT">
      @endif
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <label for="name">記事タイトル</label>
          <input type="text" class="form-control" name="title" value="{{ $article->title }}">
        </div>
        <div class="form-group">
          <label for="subtitle">内容</label>
          <textarea type="text" class="form-control" name="body" value="{{ $article->body }}" rows=10></textarea>
        </div>
        <div class="form-group">
          <p><label for="header_image_url">公開設定</label></p>
          <input type="radio" name="status" value="draft" checked="checked">下書き
          <input type="radio" name="status" value="published">公開
        </div>
        <div class="d-flex justify-content-between align-items-center">
          <button type="submit" class="btn btn-primary">保存</button>
          <p><a href="/article">戻る</a></p>
        </div>
      </form>
    </div>
  </div>
</div>

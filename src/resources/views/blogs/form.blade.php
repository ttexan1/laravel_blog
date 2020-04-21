<div class="container ops-main">
  <div class="row">
    <div class="col-md-6">
      <h2>書籍登録</h2>
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
      <form action="/blogs" method="post">
      @elseif($target == 'update')
      <form action="/blogs/{{ $blog->id }}" method="post">
          <input type="hidden" name="_method" value="PUT">
      @endif
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <label for="name">ブログタイトル</label>
          <input type="text" class="form-control" name="name" value="{{ $blog->name }}">
        </div>
        <div class="form-group">
          <label for="subtitle">サブタイトル</label>
          <input type="text" class="form-control" name="subtitle" value="{{ $blog->subtitle }}">
        </div>
        <div class="form-group">
          <label for="header_image_url">ヘッダー画像</label>
          <input type="text" class="form-control" name="header_image_url" value="{{ $blog->header_image_url }}">
        </div>
        <button type="submit" class="btn btn-default">登録</button>
        <a href="/blog">戻る</a>
      </form>
    </div>
  </div>
</div>

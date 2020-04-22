<div class="container ops-main">
  <div class="row">
    <div class="col-md-6">
      <h2>ブログ作成</h2>
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
      <form action="/blogs" method="post" enctype="multipart/form-data" >
      @elseif($target == 'update')
      <form action="/blogs/{{ $blog->id }}" method="post" enctype="multipart/form-data" >
          <input type="hidden" name="_method" value="PUT">
      @endif
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <label for="name">タイトル</label>
          <input type="text" class="form-control" name="name" value="{{ $blog->name }}">
        </div>
        <div class="form-group">
          <label for="subtitle">サブタイトル</label>
          <input type="text" class="form-control" name="subtitle" value="{{ $blog->subtitle }}">
        </div>
        <div class="form-group">
          <p><label for="file">ヘッダーイメージ画像</label></p>
          <input type="file" name="header_image">
        </div>
        <div class="d-flex justify-content-between">
          <button type="submit" class="btn btn-default">登録</button>
          <a href="/blog">戻る</a>
        </div>
      </form>
    </div>
  </div>
</div>

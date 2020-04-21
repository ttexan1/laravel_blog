@extends('blogs/layout')
@section('content')
<div class="container ops-main">
<div class="row">
  <div class="col-md-12">
    <h3 class="ops-title">ブログ</h3>
  </div>
</div>
<div class="row">
  <div class="col-md-11 col-md-offset-1">
    <table class="table text-center">
      <tr>
        <th class="text-center">ブログ名</th>
        <th class="text-center">サブタイトル</th>
        <th class="text-center"></th>
        <th class="text-center"></th>
        <th class="text-center">削除</th>
      </tr>
      <tr>
        <td>{{ $blog->name }}</td>
        <td>{{ $blog->subtitle }}</td>
        <td>{{ $blog->author }}</td>
        <td><a href="/blogs/{{ $blog->id }}/edit">編集</a></td>
        <td>
          <form action="/blog/{{ $blog->id }}" method="post">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash"></span></button>
          </form>
        </td>
      </tr>
    </table>
    <div><a href="/blogs/create" class="btn btn-default">新規作成</a></div>
  </div>
@endsection
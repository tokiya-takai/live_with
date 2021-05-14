@extends('layouts.app')

@section('content')
  <div id="show-shoe">
    <a href=" {{ route('posts.edit', ['id'=>$item->id]) }}" class="new-post-btn"><button>Edit</button></a>
    <div class="show-shoe-header">
      <h1>{{ $item->title }}</h1>
    </div>
    <div class="show-shoe-body">
      <div class="delete-btn">
        <form action="{{ route('posts.delete', ['id'=>$item->id]) }}" method="post" id="delete">
          @csrf
          <input type="submit" value="削除">
        </form>
      </div>
      <div class="show-shoe-body-header">
        <figure>
          @if ($item->file_path == null)
            <img src="{{ asset('images/no-image.jpg') }}" alt="no image">
          @else
            <img src="{{ $item->file_path }}" alt="shoe">
          @endif
        </figure>
        <figcaption>
          <p class="last-maintenance">最後のメンテンナンス</p><p>{{ $item->created_at->format('Y/m/d') }}</p>
        </figcaption>
      </div>
      <div class="show-shoe-content">
        <div class="show-purchase-date show-group">
          <p>購入日</p>
          <p>{{ $item->purchase_date }}</p>
        </div>
        <div class="show-title show-group">
          <p>ブランド名</p>
          <p>{{ $item->title }}</p>
        </div>
        <div class="show-details show-group">
          <p>詳細情報</p>
          <p>{{ $item->details }}</p>
        </div>
        <div class="show-maintenance show-group">
          <p>メンテナンス内容</p>
          <p>{{ $item->maintenance }}</p>
        </div>
        <div class="show-remarks show-group">
          <p>備考</p>
          <p>{{ $item->remarks }}</p>
        </div>
      </div>
    </div>
  </div>
@endsection
@extends('layouts.app')

@section('content')
  <div id="show-shoe">
    @if($item->id == Auth::id())
      <a href=" {{ route('posts.edit', ['id'=>$item->id]) }}" class="new-post-btn"><button>Edit</button></a>
    @endif
    <div class="show-shoe-header">
      <h1>{{ $item->title }}</h1>
    </div>
    <div class="show-shoe-body">
      <div class="delete-btn">
        @if($item->id == Auth::id())
          <form action="{{ route('posts.delete', ['id'=>$item->id]) }}" method="post" id="delete">
            @csrf
            <input type="submit" value="削除">
          </form>
        @endif
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
          <p class="last-maintenance">最後のメンテンナンス</p><p>{{ $item->update_date->format('Y/m/d') }}</p>
        </figcaption>
      </div>
      <div class="show-shoe-content">
        <div class="show-purchase-date show-group">
          <p class="label">購入日</p>
          <p>{{ $item->purchase_date }}</p>
        </div>
        <div class="show-title show-group">
          <p class="label">ブランド名</p>
          <p>{{ $item->title }}</p>
        </div>
        <div class="show-details show-group">
          <p class="label">詳細情報</p>
          <p>{{ $item->details }}</p>
        </div>
        <div class="show-maintenance show-group">
          <p class="label">メンテナンス内容</p>
          <p>{{ $item->maintenance }}</p>
        </div>
        <div class="show-remarks show-group">
          <p class="label">備考</p>
          <p>{{ $item->remarks }}</p>
        </div>
      </div>
    </div>
  </div>
@endsection
@extends('layouts.app')

@section('content')
  <div id="show-shoe">
    <a href=" {{ route('posts.edit', ['id'=>$item->id]) }}" class="new-post-btn"><button>Edit</button></a>
    <div class="show-shoe-header">
      <h1>{{ $item->title }}</h1>
    </div>
    <div class="show-shoe-body">
      <div class="delete-btn">
        <form action="/posts/delete" method="delete" id="delete">
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
        <p>{{ $item->content }}</p>
      </div>
    </div>
  </div>
@endsection
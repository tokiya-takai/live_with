@extends('layouts.app')

@section('content')
  <div id="show-shoe">
    <a href=" {{ route('posts.edit', ['id'=>$item->id]) }}" class="new-post-btn"><button>Edit</button></a>
    <div class="show-shoe-header">
      <h1>{{ $item->title }}</h1>
    </div>
    <div class="show-shoe-body">
      <div class="show-shoe-body-header">
        <figure>
          <img src="{{ asset('storage/image/'.$item->file_path) }}" alt="shoe">
        </figure>
        <figcaption>
          <p class="last-maintenance">最後のメンテンナンス</p><p>{{ $item->created_at }}</p>
        </figcaption>
      </div>
      <div class="show-shoe-content">
        <p>
          {{ $item->content }}
        </p>
      </div>
    </div>
  </div>
@endsection
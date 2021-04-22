@extends('layouts.app')

@section('content')
  <div id="show-shoe">
    <a href="#" class="new-post-btn"><button>Edit</button></a>
    <div class="show-shoe-header">
      <h1>チャーチ　バーウッド</h1>
    </div>
    <div class="show-shoe-body">
      <div class="show-shoe-body-header">
        <figure>
          <img src="{{ asset('images/test-image.jpeg') }}" alt="shoe">
        </figure>
        <figcaption>
          <p class="last-maintenance">最後のメンテンナンス</p><p>2020/01/01</p>
        </figcaption>
      </div>
      <div class="show-shoe-content">
        <p>
          作業内容：
          
        </p>
      </div>
    </div>
  </div>
@endsection
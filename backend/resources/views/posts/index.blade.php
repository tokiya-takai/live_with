@extends('layouts.app')

@section('content')
    <div id="my-list">
        <a href="{{ route('posts.new') }}" class="new-post-btn"><button>New</button></a>
        <div class="my-list-header">
            <h1>MyShoes</h1>
            <button class="filter">Filter</button>
        </div>
        <div class="shoes-list">
            <ul>
                <li>
                    <a href="{{ route('posts.show') }}"><button>
                        <figure>
                            <img src="{{ asset('images/test-image.jpeg') }}" alt="shoe">
                        </figure>
                        <figcaption>
                            <p class="shoe-name">チャーチ　バーウッド</p>
                            <p class="last-maintenance">最後のメンテンナンス 2021/01/01</p>
                        </figcaption>
                    </button></a>
                </li>
            </ul>
        </div>
    </div>
@endsection
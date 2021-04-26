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
                @foreach ($items as $item)
                    <li>
                        <a href="{{ route('posts.show', ['id'=>$item->id]) }}"><button>
                            <figure>
                                @if ($item->file_path == "")
                                    <img src="{{ asset('images/no-image.jpg') }}" alt="no image">
                                @else
                                    <img src="{{ asset('storage/image/'.$item->file_path) }}" alt="shoe">
                                @endif
                            </figure>
                            <figcaption>
                                <p class="shoe-name">{{ $item->title }}</p>
                                <p class="last-maintenance">最後のメンテンナンス {{ $item->created_at->format('Y/m/d') }}</p>
                            </figcaption>
                        </button></a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
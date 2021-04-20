@extends('layouts.app')

@section('content')
    <div id="my-list">
        <div class="my-list-header">
            <h1>MyShoes</h1>
            <button class="filter">Filter</button>
        </div>
        <div class="shoes-list">
            <ul>
                <button>
                    <li>
                        <figure>
                            <img src="images/test-image.jpeg" alt="shoe">
                        </figure>
                        <figcaption>
                            <p class="shoe-name">チャーチ　バーウッド</p>
                            <p class="last-maintenance">最後のメンテンナンス 2021/01/01</p>
                        </figcaption>
                    </li>
                </button>
            </ul>
        </div>
    </div>
@endsection
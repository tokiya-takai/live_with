<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="/css/destyle.css" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
      @guest
        <!-- Not login -->
        <hamburger-component :user="{{ -1 }}"></hamburger-component>
      @else
        <!-- Logged in -->
        <hamburger-component :user="{{ Auth::id() }}"></hamburger-component>
      @endguest
      <header class="header">
        <div class="header-logo"><a href="/"><img src="{{ asset('images/header-logo.png') }}?<?php echo date("YmdHis");?>" alt="LiveWith"></a></div>
        <nav class="header-nav">
            <ul class="header-nav-list">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li>
                            <a href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    
                    @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li>
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('user.show', ['id' => Auth::id()]) }}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}</a>
                    </li>
                    <li>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}</a>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </nav>
      </header>

      <div class="social">
        <div class="social-content">
          <ul class="social-list">
            @foreach ($users as $user)
                <a href="{{ route('posts.show',['id'=>$user->post_id]) }}" class="like-button-parent">
                  <li>
                    <div class="social-img-container">
                      <div class="social-img-frame">
                        @if($user->file_path)
                          <img src="{{ $user->file_path }}" alt="{{ $user->title }}">
                        @else
                          <div class="no-image">NO IMAGE</div>
                        @endif
                      </div>
                    </div>
                    <div class="social-post-content">
                      <div class="title">{{ $user->title }}</div>
                      <div class="others">
                        <p>{{ $user->name }}さんが更新しました。</p>
                        <div class="likes">
                          @if (DB::table('likes')->where('user_id', Auth::id())->where('post_id', $user->post_id)->exists())
                            <form action="{{ route('unlike', ['id'=>$user->post_id]) }}" method="POST">
                              @csrf
                              <button class="like-btn">
                                <img src="/images/like-on.png" alt="liked" class="like-mark">
                                <input type="hidden" name="source" value="social">
                                <input type="submit">
                              </button>
                            </form>
                          @else
                            <form action="{{ route('like', ['id'=>$user->post_id]) }}" method="POST">
                              @csrf
                              <button class="like-btn">
                                <img src="/images/like-off.png" alt="unlike" class="like-mark">
                                <input type="hidden" name="source" value="social">
                                <input type="submit">
                              </button>
                            </form>
                          @endif
                          <span class="count">{{ DB::table('likes')->where('post_id', $user->post_id)->count() }}</span>
                        </div>
                      </div>
                    </div>
                  </li>
                </a>
            @endforeach
            <div class="list-margin"></div>
          </ul>
        </div>
      </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script> 
</body>
</html>
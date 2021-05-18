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
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('user.index', ['id' => Auth::id()]) }}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
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
          <div style="height: 200px;">test</div>
          <div style="height: 200px;">test2</div>
          <div style="height: 200px;">test3</div>
          <div style="height: 200px;">test4</div>
          <div style="height: 200px;">test5</div>
          <div style="height: 200px;">test6</div>
          <div style="height: 200px;">test7</div>
        </div>
      </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script> 
</body>
</html>
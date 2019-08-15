<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('libs/mdi/css/materialdesignicons.min.css') }}">

    <!-- including jquery 3.4.7 and bootstrap 4 -->
    <script src="{{ asset('libs/jquery-3.4.1.min.js') }}" ></script>
    <link href="{{ asset('libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('libs/bootstrap/js/bootstrap.min.js') }}"></script>
    @stack('styles')
    @stack('top_scripts')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('formSignup') }}">{{ __('Sign Up') }}</a>
                                </li>
                            @endif
                        @else
                        @if (Auth()->user()->profile_image)
                          <li class="nav-item">
                              <img src="{{ asset(Auth()->user()->profile_image) }}" style="width: 40px; height: 40px; border-radius: 50%;">
                          </li>
                        @endif

                            <li class="nav-item">
                              <a class="nav-link" href="#" >
                                {{ Auth::user()->name }}
                              </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('changePassword') }}">{{ __('Change Password') }}</a>
                            </li>

                            <li class="nav-item">
                              <a class="nav-link" href="{{ route('profile') }}" >
                                {{ __('Profile') }}
                              </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @stack('bottom_scripts')
</body>
</html>

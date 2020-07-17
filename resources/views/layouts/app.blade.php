<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @yield('map_links')
    @yield('map_scripts')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/c46e0100b8.js" crossorigin="anonymous"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    @yield('styles')

</head>
<body>
    <div id="my_app">
        @if (!(Request::is('login')) && !(Request::is('register')))
        <nav class="navbar fixed-top navbar-expand-md shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img id="site_icon" src="{{ asset('uploads/img/logo.png') }}" alt="" srcset="" width="160" height="160" style="transition: 300ms ease;">
                    <span class="font-x-large">Colocation</span>
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
                                <a class="nav-link font-large" href="/offres">Offres</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-large" href="/demandes">Demandes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-large" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link font-large" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            @else
                                <li class="nav-item">
                                    <a class="nav-link font-large" href="/offres">Offres</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font-large" href="/demandes">Demandes</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link font-large dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->login }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @endif

        <main>
            @yield('content')
        </main>
        @if (!(Request::is('login')) && !(Request::is('register')))
            <footer id="fh5co-footer" class="fh5co-bg" role="contentinfo">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row row-pb-md">
                        <div class="col-md-4 fh5co-widget">
                            <h3>A Little About Stamina.</h3>
                            <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
                            <p><a class="btn btn-primary" href="#">Become A Member</a></p>
                        </div>
                        <div class="col-md-8">
                            <h3>Classes</h3>
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <ul class="fh5co-footer-links">
                                    <li><a href="#">Cardio</a></li>
                                    <li><a href="#">Body Building</a></li>
                                    <li><a href="#">Yoga</a></li>
                                    <li><a href="#">Boxing</a></li>
                                    <li><a href="#">Running</a></li>
                                </ul>
                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <ul class="fh5co-footer-links">
                                    <li><a href="#">Boxing</a></li>
                                    <li><a href="#">Martial Arts</a></li>
                                    <li><a href="#">Karate</a></li>
                                    <li><a href="#">Kungfu</a></li>
                                    <li><a href="#">Basketball</a></li>
                                </ul>
                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <ul class="fh5co-footer-links">
                                    <li><a href="#">Badminton</a></li>
                                    <li><a href="#">Body Building</a></li>
                                    <li><a href="#">Teams</a></li>
                                    <li><a href="#">Advertise</a></li>
                                    <li><a href="#">API</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row copyright">
                        <div class="col-md-12 text-center">
                            <p>
                                <small class="block">&copy; 2017 | All Rights Reserved.</small>
                                <small class="block">Powered by  siteName.com</small>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        @endif
    </div>
    @yield('scripts')
    <script>
        $(document).ready(function() {
            var $window = $(window);
            $('nav').toggleClass('scrolled', $window.scrollTop() > 100);
            $('#site_icon').toggleClass('iconResize', $window.scrollTop() > 100);
            $('.nav-link').toggleClass('font-medim', $window.scrollTop() > 100);
            $('.navbar-brand > span').toggleClass('font-logo-large', $window.scrollTop() > 100);
            $window.scroll(function(){
                console.log('hello');
                $('nav').toggleClass('scrolled', $window.scrollTop() > 100);
                $('#site_icon').toggleClass('iconResize', $window.scrollTop() > 100);
                $('.nav-link').toggleClass('font-small', $window.scrollTop() > 100);
                $('.navbar-brand > span').toggleClass('font-logo-large', $window.scrollTop() > 100);
            });
        });
    </script>
</body>
</html>

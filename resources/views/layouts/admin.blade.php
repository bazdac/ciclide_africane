<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="icon" type="image/png" href="images/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>{{ config('app.name', 'Exotic fish') }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Stylesheets & Fonts -->
    <link href="{{asset('css/plugins.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
</head>
<body >
<div class="body-inner">
    <div id="topbar" class="d-none d-xl-block d-lg-block topbar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul class="top-menu">
                        <li><a href="#">Bine ai venit @auth {{auth()->user()->email}} @endauth</a></li>
                    </ul>
                </div>
                <div class="col-md-6 d-none d-sm-block text-right">
                    <ul class="top-menu float-right">
                        @auth
                            @if(auth()->user()->rol == 'admin')
                                <li><a href="{{route('home')}}">Vezi site</a></li>
                                <li><a href="{{route('panou-administrare')}}">Panou administrare</a></li>
                            @endif

                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ __('Iesire') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}">Autentificare</a></li>
                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">Inregistrare</a></li>
                            @endif

                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section id="page-title" class="page-title-classic">
        <div class="container">
            <div class="page-title">
                <h1>Tablou administrare</h1>
            </div>
        </div>
    </section>


    <section id="page-content">
        <div class="container">
            <div class="row">
                <div class="content col-lg-9">
                    @yield('content')
                </div>
                <!-- Sidebar-->
                <div class="sidebar col-lg-3">
                    <div class="sidebar-menu">
                        <ul>
                            <label>Meniu</label>
                            <li>
{{--                                <a href="{{route('categorii')}}">Categorii produse</a>--}}
                                <a href="{{route('produse')}}">Produse</a>
                                <a href="{{route('utilizatori')}}">Utilizatori</a>
                                <a href="{{route('comenzi')}}">Comenzi</a>
                                <a href="{{route('lista-poze')}}">Lista poze</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- end: sidebar-->
            </div>
        </div>
    </section>

    <footer id="footer">
        <div class="copyright-content">
            <div class="container">
                <div class="copyright-text text-center">&copy; 2020 Zafiu Alin</div>
            </div>
        </div>
    </footer>
</div>
<!-- Scroll top -->
<a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
<!--Plugins-->
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/plugins.js')}}"></script>
</body>
</html>

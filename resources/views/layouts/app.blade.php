<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="icon" type="image/png" href="{{asset('favicon.ico')}}">
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
                            <li> @auth Bine ai venit {{auth()->user()->email}} @endauth</li>
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
        <header id="header">
            <div class="header-inner">
                <div class="container">
                    <!--Logo-->
                    <div id="logo"> <a href="{{route('home')}}"><span class="logo-default"><img src="{{asset('images/poze_utile/logo.png')}}" alt=""></span><span class="logo-dark">Exotic Fish</span></a> </div>
                    <!--End: Logo-->

                    <!--Navigation Resposnive Trigger-->
                    <div id="mainMenu-trigger"> <a class="lines-button x"><span class="lines"></span></a> </div>
                    <!--end: Navigation Resposnive Trigger-->
                    <!--Navigation-->
                    <div id="mainMenu">
                        <div class="container">
                            <nav>
                                <ul>
                                    <li><a href="{{route('home')}}">Acasa</a></li>
                                    <li class=""><a href="{{route('apa-dulce')}}">Apa dulce</a></li>
                                    <li class=""><a href="{{route('apa-sarata')}}">Apa sarata</a></li>
                                    <li class=""><a href="{{route('hrana-pesti')}}">Hrana pesti</a></li>
                                    <li class=""><a href="{{route('contact')}}">Contact</a></li>
                                    @auth
                                    <li class=""><a href="{{route('lista-cumparaturi')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Vezi lista
                                            cumparaturi</a></li>
                                    @endauth
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!--end: Navigation-->
                </div>
            </div>
        </header>


        @yield('content')



        <section class="background-grey p-t-40 p-b-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="icon-box effect small clean">
                            <div class="icon">
                                <a href="#"><i class="fa fa-gift"></i></a>
                            </div>
                            <h3>Discount 10% la comenzi cu valoare peste 600</h3>
                            <p>Comanda minima de 100 ron.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="icon-box effect small clean">
                            <div class="icon">
                                <a href="#"><i class="fa fa-plane"></i></a>
                            </div>
                            <h3>Livrare in toata tara 1-3 zie lucratoare</h3>
                            <p>Taxa transport plata in avans 15 ron , 25 ron la plata ramburs.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="icon-box effect small clean">
                            <div class="icon">
                                <a href="#"><i class="fa fa-history"></i></a>
                            </div>
                            <h3>30 zile retur gratuit!</h3>
                            <p>Doar la hrana.</p>
                        </div>
                    </div>
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

    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/plugins.js')}}"></script>
    <script src="{{asset('js/functions.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>

</body>
</html>

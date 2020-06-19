@extends('layouts.app')

@section('content')
    <section id="page-title">
        <div class="container">
            <div class="page-title">
                <h1>Comanda finalizata</h1>
                <span>Felicitari comanda dumneavostra a fost finalizata</span>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{route('home')}}">Acasa</a>
                    </li>
                    <li class="active"><a href="#">Comanda finalizata</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section id="shop-checkout-completed">
        <div class="container">
            <div class="p-t-10 m-b-20 text-center">
                <div class="text-center">
                    <h3>Felicitari comanda dumneavostra a fost finalizata!</h3>
                    <p>Numarul comenzii dumneavosta este <mark>{{$comanda -> comanda_numar_inregistrare}}</mark>
                </div>
                <a class="btn icon-left" href="{{route('home')}}"><span>Intoarcete la magazin</span></a>
            </div>
        </div>
    </section>
@endsection

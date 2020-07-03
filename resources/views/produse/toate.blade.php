@extends('layouts.app')

@section('content')
    <!-- Promotie de vara -->
    <section class="section-pattern p-t-60 p-b-30 text-center" style="background: url(images/pattern/pattern22.png)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    {!!(new \App\TextePromotii())->textPromotie()!!}
                </div>
            </div>
        </div>
    </section>
    <!-- Sfarsit Promotie de vara -->

    <section>
        <div class="container">
            <div class="row">
                @if (session('mesaj'))
                    <div class="col-sm-12">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ session('mesaj') }}
                        </div>
                    </div>
                @endif
                @foreach($produse as $produs)
                    <div class="col-sm-12 col-md-6 col-lg-4 mt-4">
                        <form action="{{route('adauga-la-lista-cumparaturi')}}">
                            <div class="product">
                                <div class="product-image">
                                    <a href="{{route('detalii-produs',$produs->id)}}"><img alt="" src="{{$produs->link_poza}}">
                                    </a>
                                </div>
                                <div class="product-description">
                                    <div class="product-title">
                                        <h3><a href="{{route('detalii-produs',$produs->id)}}">{{$produs->nume}}</a></h3>
                                        <h5><a href="{{$linkuriCategorii[$produs->id_categorie]}}">{{$categorii[$produs->id_categorie-1]['nume']}}</a></h5>
                                    </div>
                                    <div class="product-price">
                                        <ins>{{$produs->pret}} RON</ins>
                                    </div>
                                </div>
                                @auth

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="cart-product-quantity">
                                            <div class="quantity m-l-5 parinte-cantitate">
                                                <button type="button" class="minus">-</button>
                                                <input type="text" class="qty hidden" name="id_produs" value="{{$produs->id}}">
                                                <input type="text" class="qty cantitate-produs" name="cantitate" value="1" data-stoc="{{$produs->cantitate_in_stoc}}">
                                                <button type="button" class="plus">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 text-right">
                                        <button class="btn " type="submit">Adauga</button>
                                    </div>
                                </div>
                                @endauth
                                @guest
                                    <div class="product-reviews"><a href="{{route('login')}}" type="button" class="btn btn-light btn-sm w-100">Autentifica-te pentru cumparare</a></div>
                                @endguest
                            </div>
                        </form>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

@endsection

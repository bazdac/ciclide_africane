@extends('layouts.app')

@section('content')
    <section id="page-title">
        <div class="container">
            <div class="page-title">
                <h1>{{$produs -> nume}}</h1>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{route('home')}}">Acasa</a>
                    </li>
                    <li class="active"><a href="#">{{$produs -> nume}}</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section id="product-page" class="product-page p-b-0">
        <div class="container">
            @if (session('mesaj'))
                <div class="col-sm-12">
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session('mesaj') }}
                    </div>
                </div>
            @endif
            @if (session('eroare'))
                <div class="col-sm-12">
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session('eroare') }}
                    </div>
                </div>
            @endif
            <form action="{{route('adauga-la-lista-cumparaturi')}}">
                <div class="product">
                    <div class="row m-b-40">
                        <div class="col-lg-5">
                            <div class="product-image">
                                <img  alt='' src="{{$produs->link_poza}}">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="product-description">
                                <div class="product-title">
                                    <h3><a href="#">{{$produs->nume}}</a></h3>
                                </div>
                                <div class="product-price"><ins>{{$produs->pret}} RON</ins>
                                </div>
                                <div class="seperator m-b-10"></div>
                                <p>{{$produs->descriere}}</p>
                                <div class="seperator m-t-20 m-b-10"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6>Cantitate</h6>
                                    <div class="cart-product-quantity">
                                        <div class="quantity m-l-5 parinte-cantitate">
                                            <button type="button" class="minus">-</button>
                                            <input type="text" class="qty hidden" name="id_produs" value="{{$produs->id}}">
                                            <input type="text" class="qty cantitate-produs" name="cantitate" value="1" data-stoc="{{$produs->cantitate_in_stoc}}">
                                            <button type="button" class="plus">+</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">

                                    <h6>Adauga la lista de cumparaturi</h6>
                                    <button class="btn " type="submit">Adauga</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection

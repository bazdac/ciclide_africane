@extends('layouts.app')

@section('content')
    <section id="page-title">
        <div class="container">
            <div class="page-title">
                <h1>Lista cumparaturi</h1>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{route('home')}}">Acasa</a>
                    </li>
                    <li class="active"><a href="#">Lista cumparaturi</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section id="shop-cart">
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
            <div class="shop-cart">
                <form action="{{route('actualizare-lista-cumparaturi')}}">
                    <div class="table table-sm table-striped table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="cart-product-remove"></th>
                                <th class="cart-product-thumbnail">Produs</th>
                                <th class="cart-product-price">Pret</th>
                                <th class="cart-product-quantity">Cantitate</th>
                                <th class="cart-product-subtotal">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $totalCos=0;
                            @endphp
                            @if(count($listaCumparaturi)==0)
                                <tr>
                                    <td class="text-center text-danger" colspan="5">
                                        Nu exista produse in lista de cumparaturi
                                    </td>
                                </tr>
                            @endif
                            @foreach($listaCumparaturi as $key => $elementListaCumparaturi)
                                @php
                                    $totalElementListaCumparaturi=$elementListaCumparaturi->cantitate*$elementListaCumparaturi->produs-> pret;
                                    $totalCos = $totalCos + $totalElementListaCumparaturi;
                                @endphp
                                <tr>
                                    <td class="cart-product-remove">
                                        <a href="{{route('sterge-produs-lista-cumparaturi',['id'=>$elementListaCumparaturi -> id])}}"
                                           onclick="return confirm('Sunteti sigur ca vreti sa stergeti produsul');">
                                            <i class="fa fa-times"></i></a>
                                    </td>
                                    <td class="cart-product-thumbnail">
                                        <a href="{{route('detalii-produs',$elementListaCumparaturi->produs->id)}}">
                                            <img src="{{$elementListaCumparaturi->produs-> link_poza}}" alt="">
                                        </a>
                                        <a href="{{route('detalii-produs',$elementListaCumparaturi->produs->id)}}">
                                            <div class="cart-product-thumbnail-name">{{$elementListaCumparaturi->produs-> nume}}</div>
                                        </a>
                                    </td>
                                    <td class="cart-product-price">
                                        <span class="amount">{{$elementListaCumparaturi->produs-> pret}} RON</span>
                                    </td>
                                    <td class="cart-product-quantity">
                                        <div class="cart-product-quantity">
                                            <div class="quantity m-l-5 parinte-cantitate">
                                                <button type="button" class="minus">-</button>
                                                <input type="text" class="qty cantitate-produs" name="id-{{$elementListaCumparaturi->id}}"
                                                       value="{{$elementListaCumparaturi->cantitate}}"
                                                       data-stoc="{{$elementListaCumparaturi->produs->cantitate_in_stoc}}">
                                                <button type="button" class="plus">+</button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart-product-subtotal">
                                        <span class="amount">{{$totalElementListaCumparaturi}} RON</span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                    <div class="col-lg-12 text-right">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td class="cart-product-name text-left">
                                        <strong>Total</strong>
                                    </td>
                                    <td class="cart-product-name text-right">
                                        <span class="amount color lead"><strong>{{$totalCos}} RON</strong></span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn icon-left float-left"><span>Actualizeaza</span></button>
                        <a href="{{route('start-comanda')}}" class=" btn icon-left float-right"><span>Plateste</span></a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>
@endsection

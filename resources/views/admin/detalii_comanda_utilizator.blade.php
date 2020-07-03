@extends('layouts.admin')

@section('content')
    <div class="col-12">
        @if (session('mesaj'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('mesaj') }}
            </div>
        @endif
    </div>
    <div class="col-lg-12 mb-3">
        <h4>Detalii comanda numarul {{$comanda->comanda_numar_inregistrare}}</h4>
        <p>Data comenzii: {{date('Y/m/d H:i',strtotime($comanda->created_at))}}</p>
    </div>
    <div class="col-lg-12">
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
            @if(count($produseComanda)==0)
                <tr>
                    <td class="text-center text-danger" colspan="5">
                        Nu exista produse in aceasta comanda
                    </td>
                </tr>
            @endif
            @foreach($produseComanda as $key => $elementListaCumparaturi)
                @php
                    $totalElementListaCumparaturi=$elementListaCumparaturi->cantitate*$elementListaCumparaturi->produs-> pret;
                    $totalCos = $totalCos + $totalElementListaCumparaturi;
                @endphp
                <tr>
                    <td class="cart-product-remove">

                    </td>
                    <td class="cart-product-thumbnail">
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
                                {{$elementListaCumparaturi->cantitate}}
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
        <div class="line"></div>
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
            </div>
        </div>
    </div>
@endsection

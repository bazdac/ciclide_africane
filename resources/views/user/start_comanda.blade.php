@extends('layouts.app')

@section('content')
    <section id="page-title">
        <div class="container">
            <div class="page-title">
                <h1>Finalizare comanda</h1>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{route('home')}}">Acasa</a>
                    </li>
                    <li class="active"><a href="#">Finalizare comanda</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section id="shop-checkout">
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
                <form  action="{{route('finalizare-comanda')}}" class="sep-top-md">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class="upper">Date facturare si livrare</h4>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label class="sr-only">Nume</label>
                                    <input type="text" class="form-control {{ $errors->has('nume') ? 'is-invalid' : ''}}" placeholder="Nume" value="{{  old('nume') }}" name="nume" >
                                    @if($errors->has('nume'))
                                        <div class="invalid-feedback">{{$errors->first('nume')}}</div>
                                    @endif
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label class="sr-only">Telefon</label>
                                    <input type="text" class="form-control {{ $errors->has('telefon') ? 'is-invalid' : ''}}" placeholder="Telefon" value="{{  old('telefon') }}"
                                           name="telefon" >
                                    @if($errors->has('telefon'))
                                        <div class="invalid-feedback">{{$errors->first('telefon')}}</div>
                                    @endif
                                </div>
                                <div class="col-lg-12 form-group">
                                    <label class="sr-only">Adresa</label>
                                    <textarea  class="form-control {{ $errors->has('adresa') ? 'is-invalid' : ''}}" placeholder="Adresa" name="adresa" >{{  old('adresa')
                                    }}</textarea>
                                    @if($errors->has('adresa'))
                                        <div class="invalid-feedback">{{$errors->first('adresa')}}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="shop-cart">
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
                                                    {{$key+1}}
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
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="seperator"><i class="fa fa-credit-card"></i>
                    </div>
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <h4>Total comanda</h4>
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td class="cart-product-name" colspan="2">
                                                <strong><i class="fa fa-exclamation-triangle fa-2x"></i> La suma facturata se adauga pretul transportului si discounturilor,
                                                    conform promotiilor
                                                    actuale</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cart-product-name">
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
                            <div class="col-lg-12">
                                <div class="form-group" >
                                    <h4>Metoda de plata</h4>
                                    <div class="input-group mb-3">
                                        <select class="form-control {{ $errors->has('tip_plata') ? 'is-invalid' : ''}}" id="type" name="tip_plata">
                                            <option value="" {{  old('tip_plata') ? '':'selected'  }}>Selectati o modalitate de plata</option>
                                            <option value="ramburs" {{old('tip_plata')== 'ramburs'?'selected':''}}>Ramburs</option>
                                            <option value="transfer bancar" {{old('tip_plata')== 'transfer bancar'?'selected':''}}>Transfer bancar</option>
                                        </select>
                                        @if($errors->has('tip_plata'))
                                            <div class="invalid-feedback">{{$errors->first('tip_plata')}}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button class="btn icon-left float-right mt-3" type="submit"><span>Plateste</span></button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>
@endsection

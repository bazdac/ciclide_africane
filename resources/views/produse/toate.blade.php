@extends('layouts.app')

@section('content')
    <!-- Promotie de vara -->
    <section class="section-pattern p-t-60 p-b-30 text-center" style="background: url(images/pattern/pattern22.png)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-medium">Promotie luna Iunie</h2>
                    <p>Transport gratuit la orice comanda peste 200 RON</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Sfarsit Promotie de vara -->

    <section>
        <div class="container">
            <div class="row">
                @foreach($produse as $produs)
                    <div class="col-sm-12 col-md-6 col-lg-4 mt-4">
                        <div class="product">
                            <div class="product-image">
                                <a href="{{route('detalii-produs',$produs->id)}}"><img alt="" src="images/pesti/peste1.jpg">
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
                            <div class="product-reviews"><button type="button" class="btn btn-light btn-sm w-100">Adauga la lista cumparaturi</button></div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection

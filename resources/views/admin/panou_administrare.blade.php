@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            @if (session('mesaj'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('mesaj') }}
                </div>
            @endif
        </div>
        <div class="col-12">
            <form action="{{route('salveaza-camp-promotie')}}">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Text promotie pagina acasa</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="promotie">{!!(new \App\TextePromotii())->textPromotie()!!}</textarea>
                </div>
                <button type="submit" class="btn m-t-20">Salveaza text promotie</button>
            </form>
            <div class="line"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{route('salveaza-camp-discount')}}">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Text discount</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="discount">{!!(new \App\TextePromotii())->textDiscount()!!}</textarea>
                </div>
                <button type="submit" class="btn m-t-20">Salveaza text discount</button>
            </form>
            <div class="line"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{route('salveaza-camp-livrare')}}">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Text livrare</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="livrare">{!!(new \App\TextePromotii())->textLivrare()!!}</textarea>
                </div>
                <button type="submit" class="btn m-t-20">Salveaza text livrare</button>
            </form>
            <div class="line"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{route('salveaza-camp-retur')}}">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Text retur</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="retur">{!!(new \App\TextePromotii())->textRetur()!!}</textarea>
                </div>
                <button type="submit" class="btn m-t-20">Salveaza text retur</button>
            </form>
            <div class="line"></div>
        </div>
    </div>
@endsection

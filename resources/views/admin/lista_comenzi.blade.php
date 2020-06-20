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
        <h4>Lista comenzi</h4>
    </div>
    <div class="col-lg-12">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nr. comanda</th>
                <th scope="col">Nume</th>
                <th scope="col">Adresa</th>
                <th scope="col">Telefon</th>
                <th scope="col">Tip plata</th>
                <th scope="col">Valoare</th>
                <th scope="col">Operatii</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comenziUtilizator as $index => $comanda)
                <tr>
                    <th scope="row">{{$index+1}}</th>
                    <td>{{$comanda->comanda_numar_inregistrare}}</td>
                    <td>{{$comanda->nume}}</td>
                    <td>{{$comanda->adresa}}</td>
                    <td>{{$comanda->telefon}}</td>
                    <td>{{$comanda->tip_plata}}</td>
                    <td>{{(new \App\Http\Controllers\AdminController)->valoareComanda($comanda->id)}}</td>
                    <td>
                        <a class="btn btn-info btn-xs" href="{{route('detalii-comanda',$comanda->id)}}">
                            {{__('Vezi produse comanda')}}
                        </a><a class="btn btn-warning btn-xs" href="{{route('comenzi-utilizator',$comanda->id_user)}}">
                            {{__('Comenzi utilizator')}}
                        </a>
                    </td>
                </tr>
            @endforeach


            </tbody>
        </table>
        <div class="line"></div>
    </div>
@endsection

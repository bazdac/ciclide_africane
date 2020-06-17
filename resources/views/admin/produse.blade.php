@extends('layouts.admin')

@section('content')
    <div class="col-lg-12 mb-3">
        <h4>Produse</h4>
    </div>
    <div class="col-lg-3">
        <a href="{{route('adauga-produs')}}" type="button" class="btn btn-sm">Adauga produs</a>
    </div>
    <div class="col-lg-12">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nume produs</th>
                <th scope="col">Categorie</th>
                <th scope="col">Pret</th>
                <th scope="col">Cantitate</th>
                <th scope="col">Operatii</th>
            </tr>
            </thead>
            <tbody>
            @foreach($produse as $index => $produs)
                <tr>
                    <th scope="row">{{$index+1}}</th>
                    <td>{{$produs->nume}}</td>
                    <td>{{$categorii[$produs->id_categorie-1]['nume']}}</td>
                    <td>{{$produs->pret}}</td>
                    <td>{{$produs->cantitate_in_stoc}}</td>
                    <td>
                        <a class="btn btn-info btn-xs" href="{{route('editeaza-produs',$produs->id)}}">
                            {{__('Editeaza')}}
                        </a>
                        <a class="btn btn-danger btn-xs" href="{{route('sterge-produs',$produs->id)}}">
                            {{__('Sterge')}}
                        </a>
                    </td>
                </tr>
            @endforeach


            </tbody>
        </table>
        <div class="line"></div>
    </div>
@endsection

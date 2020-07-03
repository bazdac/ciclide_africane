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
        <h4>Lista utilizatori inscrisi pe site</h4>
    </div>
    <div class="col-lg-12">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">Nume</th>
                <th scope="col">Adresa</th>
                <th scope="col">Telefon</th>
                <th scope="col">Operatii</th>
            </tr>
            </thead>
            <tbody>
            @foreach($utilizatori as $index => $utilizator)
                <tr>
                    <th scope="row">{{$index+1}}</th>
                    <td>{!!$utilizator->email??'<span class="text-danger"> necompletat </span>'!!}</td>
                    <td>{!!$utilizator->name??'<span class="text-danger"> necompletat </span>'!!}</td>
                    <td>{!!$utilizator->adresa??'<span class="text-danger"> necompletat </span>'!!}</td>
                    <td>{!!$utilizator->telefon??'<span class="text-danger"> necompletat </span>'!!}</td>
                    <td>
                        <a class="btn btn-info btn-xs" href="{{route('comenzi-utilizator',$utilizator->id)}}">
                            {{__('Vezi comenzi')}}
                        </a>
                    </td>
                </tr>
            @endforeach


            </tbody>
        </table>
        <div class="line"></div>
    </div>
@endsection

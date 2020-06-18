@extends('layouts.admin')

@section('content')
    <div class="row">
    @foreach($linkuriPoze as $nume => $link)
        <div class="col-12 col-md-4 col-lg-3">
            <img src="{{$link}}" alt="" class="embed-responsive">
            <p>Nume poza: {{$nume}}</p>
        </div>
    @endforeach
    </div>
@endsection

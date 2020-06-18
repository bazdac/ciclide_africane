@extends('layouts.admin')

@section('content')
    <div class="col-lg-12 mb-3">
        <h4>Adaugare produs</h4>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('creare-produs')}}" method="get">
                    @csrf
                    <div class="form-group">
                        <label for="nume">Nume produs</label>
                        <input type="text" id="nume" name="nume" class="form-control {{ $errors->has('nume') ? 'is-invalid' : 'is-valid'}}" value="{{  old('nume') }}">
                        @if($errors->has('nume'))
                            <div class="invalid-feedback">{{$errors->first('nume')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="categorie">Categorie</label>
                        <select id="categorie" class="form-control {{ $errors->has('categorie') ? 'is-invalid' : 'is-valid'}}" name="categorie">
                            <option {{  old('categorie') ? '':'selected'  }}>Alege categorie</option>
                            @foreach($categorii as $categorie)
                                <option value="{{$categorie->id}}" {{old('categorie')==$categorie->id?'selected':''}}>{{$categorie->nume}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('categorie'))
                            <div class="invalid-feedback">{{$errors->first('categorie')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="poza">Poza</label>
                        <select id="poza" class="form-control {{ $errors->has('poza') ? 'is-invalid' : 'is-valid'}}" name="poza">
                            <option value="" {{  old('poza') ? '':'selected'  }}>Alege poza produs</option>
                            @foreach($linkuriPoze as $numePoza => $linkPoza)
                                <option value="{{$linkPoza}}" {{old('poza')==$linkPoza?'selected':''}}>{{$numePoza}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('poza'))
                            <div class="invalid-feedback">{{$errors->first('poza')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="nume">Pret</label>
                        <input type="text" id="pret" name="pret" class="form-control {{ $errors->has('pret') ? 'is-invalid' : 'is-valid'}}" value="{{  old('pret') }}">
                        @if($errors->has('pret'))
                            <div class="invalid-feedback">{{$errors->first('pret')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="nume">Cantitate</label>
                        <input type="text" id="cantitate" name="cantitate" class="form-control {{ $errors->has('cantitate') ? 'is-invalid' : 'is-valid'}}" value="{{  old('cantitate') }}">
                        @if($errors->has('cantitate'))
                            <div class="invalid-feedback">{{$errors->first('cantitate')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="descriere">Descriere produs</label>
                        <textarea type="text" id="descriere" name="descriere" class="form-control {{ $errors->has('descriere') ?
                        'is-invalid' : 'is-valid'}}">{{  old('descriere') }}</textarea>
                        @if($errors->has('descriere'))
                            <div class="invalid-feedback">{{$errors->first('descriere')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Adauga produs" class="btn btn-success float-right">
                    </div>
                </form>
            </div>
        </div>
        <div class="line"></div>
    </div>
@endsection

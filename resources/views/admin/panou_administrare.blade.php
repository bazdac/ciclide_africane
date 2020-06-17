@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <form action="#">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Text promotie pagina acasa</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button type="submit" class="btn m-t-20">Salveaza text promotie</button>
            </form>
            <div class="line"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="#">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Text discount</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button type="submit" class="btn m-t-20">Salveaza text discount</button>
            </form>
            <div class="line"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="#">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Text livrare</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button type="submit" class="btn m-t-20">Salveaza text livrare</button>
            </form>
            <div class="line"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="#">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Text retur</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button type="submit" class="btn m-t-20">Salveaza text retur</button>
            </form>
            <div class="line"></div>
        </div>
    </div>
@endsection

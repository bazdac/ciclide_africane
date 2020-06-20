@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="text-uppercase">Contacteaza-ne</h3>
                    <div class="m-t-30">
                        <form class="contact-form" novalidate action="{{route('trimitere-mesaj')}}" role="form" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="nume">Nume</label>
                                    <input type="text" aria-required="true" name="nume" required class="form-control required name {{ $errors->has('nume') ? 'is-invalid' : ''}}" placeholder="Nume" value="{{  old('nume') }}">
                                    @if($errors->has('nume'))
                                        <div class="invalid-feedback">{{$errors->first('nume')}}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" aria-required="true" name="email" required class="form-control required email {{ $errors->has('email') ? 'is-invalid' : ''}}" placeholder="Email" value="{{  old('email') }}">
                                    @if($errors->has('email'))
                                        <div class="invalid-feedback">{{$errors->first('email')}}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="subject">Subiect</label>
                                    <input type="text" name="subiect" required class="form-control required {{ $errors->has('subiect') ? 'is-invalid' : ''}}" placeholder="Subiect" value="{{  old('subiect') }}">
                                    @if($errors->has('subiect'))
                                        <div class="invalid-feedback">{{$errors->first('subiect')}}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message">Mesaj</label>
                                <textarea type="text" name="mesaj" required rows="5" class="form-control required {{ $errors->has('mesaj') ? 'is-invalid' : ''}}" placeholder="Mesaj">{{  old('mesaj') }}</textarea>
                                @if($errors->has('mesaj'))
                                    <div class="invalid-feedback">{{$errors->first('mesaj')}}</div>
                                @endif
                            </div>
                            <button class="btn" type="submit" id="form-submit">&nbsp;Trimite mesaj</button>
                        </form>
                    </div>
                    @if (session('succes'))
                        <div class="alert alert-success alert-dismissible m-t-30">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ session('succes') }}
                        </div>
                    @endif
                    @if (session('eroare'))
                        <div class="alert alert-danger alert-dismissible m-t-30">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ session('eroare') }}
                        </div>
                    @endif
                </div>
                <div class="col-lg-6">
                    <h3 class="text-uppercase">Adresa si harta</h3>
                    <div class="row">
                        <div class="col-lg-6">
                            <address>
                                <strong>Sediu EXOTIC FISH </strong><br>
                                Strada Nicolae Bălcescu 211<br>
                                Mizil Romania<br>
                                <abbr title="Telefon">Tel: 0723 307 512

                            </address>
                        </div>
                    </div>
                    <!-- Google Map -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2821.273763075568!2d26.430346715755388!3d44.99906227237963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40b3d22bbfd9c7a9%3A0x7ba4598a82f49be6!2sStrada%20Nicolae%20B%C4%83lcescu%20211%2C%20Mizil%20105800!5e0!3m2!1sro!2sro!4v1592502450043!5m2!1sro!2sro" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    <!-- end: Google Map -->
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('content')
    <div id="hero_section" style="
            background-size: cover;
            width: 100%;
            height: 100vh;
            position: relative;
            background-image: url('{{ asset('uploads/img/appartment.jpeg') }}');">
            <div style="background-color: black; width: inherit; height: inherit; opacity: 50%"></div>
            @if (Session::has('success'))
                <div class="row">
                    <div class="col-sm-6 col-md-4 offset-md4 offset-sm-3">
                        <div id="charge-message" class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                    </div>
                </div>
            @endif
            <h1
                style="
                    position: absolute;
                    background-color: transparent;
                    top: 40%;
                    bottom: 40%;
                    left: 30%;
                    right: 30%;
                    color: white;
                    text-align: center;
                "
            >Tous less Offres</h1>
            <a href="/offres/create"
                class="btn "
                style="
                    position: absolute;
                    top: 50%;
                    left: 35%;
                    right: 35%;
                    background-color: #FC955B;
                "
            >Ajouter un offre</a>
    </div>
    <div id="contents"
        style="
            background-attachment: fixed;
            background-size: cover;
            width: 100%;
            display: flex;
            flex-flow: column;
            min-height: 100vh;
            padding-top: 30px">
        <div class="container" style="padding-top: 50px">
            <div class="row">
                @foreach ($offres as $offre)
                    <div class="col-md-4" style="margin-bottom: 120px">
                        <div class="card" style="background-color: white; border-radius: 15px; width: 300px; height: 370px;">
                            <div style="padding-top: 0px; height: 55%; border-radius: 15px; text-align: center; margin-bottom: 10px">
                                <img src="{{ asset('uploads/img/appartment.jpeg') }}" style="width: 100%; border-radius: 15px 15px 0px 0px; height: 100%;" alt="{{$offre->adresse}}">
                            </div>
                            <h3 style="text-align: center">{{$offre->adresse}}</h3>
                            <p style="text-align: center">${{$offre->prix}}</p>
                            <a class="btn" style="background-color: #FC955B; display: block; width: 70%; margin-left: auto; margin-right: auto; border-radius: 15px;" href="/offres/{{$offre->id}}">Details</a> <br>
                            <br>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.js') }}"></script>
@endsection

@section('styles')
    <link href="{{ asset('css/offre.css') }}" rel="stylesheet">
@endsection

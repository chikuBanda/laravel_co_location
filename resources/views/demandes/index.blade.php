@extends('layouts.app')

@section('content')
    <div id="hero_section" style="
            background-size: cover;
            width: 100%;
            height: 100vh;
            position: relative;
            background-image: url('{{ asset('uploads/img/appartment2.jpg') }}');">
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
            >Tous less Demandes</h1>
            <a href="/demandes/create"
                class="btn "
                style="
                    position: absolute;
                    top: 50%;
                    left: 35%;
                    right: 35%;
                    background-color: #FC955B;
                "
            >Ajouter une demande</a>
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
                <div class="col-md-6 offset-md-3">
                    <div class="row">
                        @foreach ($demandes as $demande)
                            <div class="col-md-4">
                                <img style="width: 150px; height: 150px; border-radius: 50%" src="{{ asset('uploads/img/appartment.jpeg') }}" alt="" srcset="">
                            </div>
                            <div class="col-md-8" style="padding-top: 17px; margin-bottom: 60px">
                                <h2>{{$demande->commentaire}}</h2>
                                <div style="margin-bottom: 20px; margin-top: 15px">
                                    <span style="color: grey">budget max: <b style="color: black; margin-right: 15px">{{$demande->budget_max}}</b></span>
                                    <span style="color: grey">publie le: <b style="color: black">{{$demande->created_at}}</b></span>
                                </div>
                                <div>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Eos accusamus eligendi odit
                                    </p>
                                </div>
                                <a href="/demandes/{{$demande->id}}">plus de details</a>
                            </div>
                        @endforeach
                    </div>
                </div>
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

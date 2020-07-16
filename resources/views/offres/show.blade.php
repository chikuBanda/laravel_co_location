@extends('layouts.app')

@section('content')
    <div style="
        background-size: cover;
        width: 100%;
        display: flex;
        flex-flow: column;
        min-height: 100vh;
        background-color: #e8dcd8;
    ">
        <div style="
            background-size: cover;
            width: 100%;
            height: 350px;
            background-image: url('{{ asset('uploads/img/appartment.jpeg') }}');
            position: relative;
        ">
            <div style="background-color: black; width: inherit; height: inherit; opacity: 50%">
            </div>
            <h1
                style="
                    position: absolute;
                    background-color: transparent;
                    top: 140px;
                    left: 30%;
                    right: 30%;
                    color: white;
                    text-align: center;

                "
                class="animate__animated animate__bounce"
            >Details de l'Offre</h1>
            <div style="
                background-size: cover;
                position: absolute;
                bottom: 0px;
                background-color: transparent;
                top: 280px;
                left: 90px;
                right: 90px;
            ">
                <div style="
                    background-size: cover;
                    height: 100%;
                    background-color: white;
                ">
                </div>
            </div>
        </div>
        <div style="
            margin-right: 90px;
            margin-left: 90px;
            display: flex;
            flex-flow: column;
            background-color: white;
            min-height: 70vh
        ">
            <div class="container" style="margin-top: 0px; margin-bottom: 100px; padding-left: 130px">
                <div class="row">
                    <div class="col-md-7">
                        <img
                            src="{{ asset('uploads/img/appartment.jpeg') }}"
                            alt=""
                            srcset=""
                            width="550"
                            height="350"
                            style="border-radius: 21px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s;"
                            >
                        <h2 style="margin-top: 20px; margin-bottom: 20px"><strong>{{$offre->adresse}}</strong></h2>
                    </div>
                    <div class="col-md-5" style="padding-left: 60px">
                        <div style="margin-bottom: 20px; width: 70%">
                            <p style="margin-bottom: 0px"><i>prix</i></p>
                            <h3>{{$offre->prix}}</h3>
                        </div>

                    </div>
                </div>
                <hr style="width: 77%; margin-left: 0px; margin-right: 0px;">


            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.js') }}"></script>
@endsection

@section('styles')

@endsection

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
            background-image: url('{{ asset('uploads/img/appartment3.jpg') }}');
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
                        <div class="row">
                            <div class="col-md-5">
                                <h4 style="margin-top: 20px;"><strong>{{$offre->adresse}}</strong></h4>
                            </div>
                            <div class="offset-md-3 col-md-4">
                                <h6 style="text-align: right; margin-top: 20px">lat:{{$offre->cordx}}</h6>
                                <h6 style="text-align: right;">lng:{{$offre->cordy}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5" style="padding-left: 60px">
                        <div style="margin-bottom: 20px; margin-top: 20px; width: 70%">
                            <p style="margin-bottom: 0px"><i>prix</i></p>
                            <h3>{{$offre->prix}}</h3>
                        </div>

                        <div style="margin-bottom: 20px; margin-top: 20px; width: 70%">
                            <p style="margin-bottom: 0px"><i>capacite</i></p>
                            <h3>{{$offre->capacite}} personnes</h3>
                        </div>

                        <div style="margin-bottom: 20px; margin-top: 20px; width: 70%">
                            <p style="margin-bottom: 0px"><i>superficie</i></p>
                            <h3>{{$offre->superficie}} m<sup>2</sup></h3>
                        </div>

                    </div>
                </div>
                <hr style="margin-top: 40px; margin-bottom: 60px; width: 77%; margin-left: 0px; margin-right: 0px;">


                <h4 style="margin-bottom: 30px">Accessoires</h4>

                <div class="container">
                    <div class="row">
                        @if ($offre->wifi)
                            <div class="col-md-3" style="margin-bottom: 40px; margin-right: 40px; text-align: center">
                                <img style="border-radius: 5px" src="{{ asset('uploads/img/wifi2.jpeg') }}" alt="wifi" width="150" height="100">
                                <h5 style="margin-top: 10px;">Wifi</h3>
                            </div>
                        @endif

                        @if ($offre->lavage_ligne)
                            <div class="col-md-3" style="margin-bottom: 40px; margin-right: 40px; text-align: center">
                                <img style="border-radius: 5px" src="{{ asset('uploads/img/lavage_ligne.jpeg') }}" alt="lavage ligne" width="150" height="100">
                                <h5 style="margin-top: 10px;">Lavage ligne</h3>
                            </div>
                        @endif

                        @if ($offre->climatisation)
                            <div class="col-md-3" style="margin-bottom: 40px; margin-right: 40px; text-align: center">
                                <img style="border-radius: 5px" src="{{ asset('uploads/img/climatisation.jpeg') }}" alt="Climatisation" width="150" height="100">
                                <h5 style="margin-top: 10px;">Climatisation</h3>
                            </div>
                        @endif
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

@endsection

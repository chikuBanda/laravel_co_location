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
            >Nouveau Offre</h1>
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
            <div class="container" style="margin-top: 0px; margin-bottom: 100px; padding-right: 200px; padding-left: 200px">
                <div>
                    <div class="row" style="margin-bottom: 20px">
                        <div class="col-md-5">
                            <h1>Ajouter un offre</h1>
                        </div>
                    </div>

                    <hr style="margin-bottom: 25px">
                </div>

                <div id="charge-error" class="alert alert-danger" {{ !Session::has('error') ? 'hidden': ''}}>
                    {{Session::get('error')}}
                </div>

                <form action="/offres" method="post" id="checkout-form">
                    @csrf

                    <input type="hidden" id="address_input" name="adresse">

                    <input type="hidden" id="cordx" name="cordx">

                    <input type="hidden" id="cordy" name="cordy">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-5"><h4 id="address"></h4></div>
                                <div class="col-md-3 offset-md-4">
                                    <h6 id="lat" style="font-style: italic; text-align: right"></h6>
                                    <h6 id="lng" style="font-style: italic; text-align: right"></h6>
                                </div>
                            </div>
                        </div>

                        <div
                            class="col-md-12"
                            id="mapid"
                            style="height: 400px; margin-bottom: 40px">
                        </div>

                        <div class="col-md-5 form-group" style="margin-bottom: 40px">
                            <div class="form-group">
                                <label for="superficie">Superficie</label>
                                <input type="number" id="superficie" class="form-control" name="superficie" required>
                            </div>
                        </div>

                        <div class="col-md-5 offset-md-2 form-group" style="margin-bottom: 40px">
                            <div class="form-group">
                                <label for="capacite">Capacite</label>
                                <input type="number" id="capacite" name="capacite" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-5 form-group" style="margin-bottom: 40px">
                            <div class="form-group">
                                <label for="prix">Prix</label>
                                <input type="number" id="prix" name="prix" class="form-control" required>
                            </div>
                        </div>


                        <div class="col-md-12 form-group" style="margin-bottom: 40px">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="wifi" id="wifi" value="option1">
                                        <label class="form-check-label" for="wifi">Wifi</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="lavage_ligne" id="lavage_ligne" value="option1">
                                        <label class="form-check-label" for="lavage_ligne">Lavage ligne</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="climatisation" id="climatisation" value="option1">
                                        <label class="form-check-label" for="climatisation">Climatisation</label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-3 offset-md-9">
                            <button type="submit" class="btn btn-success" style="width: 100%">Ajouter offre</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/map_add_offre.js')}}"></script>
@endsection

@section('styles')

@endsection

@section('map_links')
    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin=""
    />

    <link
        rel="stylesheet"
        href="https://unpkg.com/esri-leaflet-geocoder@2.3.3/dist/esri-leaflet-geocoder.css"
        integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g=="
        crossorigin=""
    >
@endsection

@section('map_scripts')
    <script
        src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
        integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
        crossorigin="">
    </script>

    <!-- Load Esri Leaflet Geocoder from CDN -->
    <!-- Geocoding Control -->

    <script
        src="https://unpkg.com/esri-leaflet@2.4.1/dist/esri-leaflet.js"
        integrity="sha512-xY2smLIHKirD03vHKDJ2u4pqeHA7OQZZ27EjtqmuhDguxiUvdsOuXMwkg16PQrm9cgTmXtoxA6kwr8KBy3cdcw=="
        crossorigin="">
    </script>

    <script
        src="https://unpkg.com/esri-leaflet-geocoder@2.3.3/dist/esri-leaflet-geocoder.js"
        integrity="sha512-HrFUyCEtIpxZloTgEKKMq4RFYhxjJkCiF5sDxuAokklOeZ68U2NPfh4MFtyIVWlsKtVbK5GD2/JzFyAfvT5ejA=="
        crossorigin="">
    </script>
@endsection

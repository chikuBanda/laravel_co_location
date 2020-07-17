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
            >Trouver les herbegments</h1>
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
                <div
                    class="col-md-12"
                    id="mapid"
                    style="height: 600px; margin-bottom: 40px">
                </div>
            </div>
        </div>
    </div>

    <script>


        var mymap = L.map('mapid', {
            scrollWheelZoom: false
        }).setView([32.343504,-6.3609538], 18);

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiY2hpa3ViYW5kYSIsImEiOiJja2JjdDUyaDkwNTh6MnFtMmkzYzd2azNlIn0.6pwyB-xj585ezi8p3L8Sfg', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 17,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'your.mapbox.access.token'
        }).addTo(mymap);

        var restaurantIcon = L.icon({
            iconUrl: '../uploads/img/restaurant_icon.png',

            iconSize:     [50, 60], // size of the icon
            iconAnchor:   [26, 58], // point of the icon which will correspond to marker's location
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });

        var offres = {!! json_encode($offres->toArray(), JSON_HEX_TAG) !!};
        console.log(offres);


        var markers = [];

        offres.forEach(function (offre, index) {
            markers[index] = L.marker([offre.cordx, offre.cordy], {
                draggable: false
            }).addTo(mymap);

            markers[index].bindPopup(
                "adresse: <b>" +
                offre.adresse + "</b><br>capacite: <b>" +
                offre.capacite + " personnes<br></b>prix: <b>" +
                offre.prix + " dh/mois</b><br>" +
                '<a href="http://127.0.0.1:8000/offres/' +
                offre.id + '">plus de details</a>'
            );
        });

    </script>
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/map.js')}}"></script>
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


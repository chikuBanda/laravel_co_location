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
                            <h1>Modifier offre</h1>
                        </div>
                    </div>

                    <hr style="margin-bottom: 25px">
                </div>

                <div id="charge-error" class="alert alert-danger" {{ !Session::has('error') ? 'hidden': ''}}>
                    {{Session::get('error')}}
                </div>

                <form enctype="multipart/form-data" action="/offres/{{$offre->id}}" method="post" id="checkout-form">
                    @csrf
                    @method('PUT')

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

                        <div class="col-md-5" style="margin-bottom: 40px">
                            <div class="form-group">
                                <label for="superficie">Superficie</label>
                                <input type="number" id="superficie" class="form-control" name="superficie" value="{{$offre->superficie}}" required>
                            </div>
                        </div>

                        <div class="col-md-5 offset-md-2" style="margin-bottom: 40px">
                            <div class="form-group">
                                <label for="capacite">Capacite</label>
                                <input type="number" id="capacite" name="capacite" class="form-control" value="{{$offre->capacite}}" required>
                            </div>
                        </div>

                        <div class="col-md-5" style="margin-bottom: 40px">
                            <div class="form-group">
                                <label for="prix">Prix</label>
                                <input type="number" id="prix" name="prix" class="form-control" value="{{$offre->prix}}" required>
                            </div>
                        </div>


                        <div class="col-md-12 form-group" style="margin-bottom: 40px">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" {{$offre->wifi ? 'checked' : ''}} name="wifi" id="wifi" value="option1">
                                        <label class="form-check-label" for="wifi">Wifi</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" {{$offre->lavage_ligne ? 'checked' : ''}} name="lavage_ligne" id="lavage_ligne" value="option1">
                                        <label class="form-check-label" for="lavage_ligne">Lavage ligne</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="climatisation" {{$offre->climatisation ? 'checked' : ''}} id="climatisation" value="option1">
                                        <label class="form-check-label" for="climatisation">Climatisation</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            @if ($offre->images->count() > 0)
                                @foreach ($offre->images as $image)
                                    <div class="col-md-3">
                                        <img
                                            src="/image_offre/{{$image->id}}"
                                            style="
                                                width: 100%;"
                                                alt="{{$offre->adresse}}"
                                            >
                                        <button type="button" onclick="delete_photo(this)">delete</button>
                                        <input
                                            type="hidden"
                                            name="photo_ids[]"
                                            id="input{{$image->id}}"
                                            value="{{$image->id}}"
                                        >
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <div class="col-md-12" style="margin-bottom: 40px">
                            <div class="form-group">
                                <label for="photo">Photos</label>
                                <input
                                    type="file"
                                    id="photo"
                                    name="photos[]"
                                    class="form-control"
                                    placeholder="photos"
                                    multiple>
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

    <script type="text/javascript">
        /*var photo_ids = {!! json_encode($photo_ids, JSON_HEX_TAG) !!};
        console.log(photo_ids);

        for(var i = 0; i < photo_ids.length; i++){
            console.log('i: ' + photo_ids[i]);
            console.log(document.getElementById("div_id" + photo_ids[i]).innerHTML);
            document.getElementById("button" + photo_ids[i]).onclick = function(){

            }
        }*/


        function delete_photo(e){
            e.parentNode.parentNode.removeChild(e.parentNode);
        }

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

        var geocodeService = L.esri.Geocoding.geocodeService();

        var restaurantIcon = L.icon({
            iconUrl: '../uploads/img/restaurant_icon.png',

            iconSize:     [50, 60], // size of the icon
            iconAnchor:   [26, 58], // point of the icon which will correspond to marker's location
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });

        var lt = {!! json_encode($lat) !!};
        var ln = {!! json_encode($lng) !!};

        var marker = L.marker([lt,ln], {
            draggable: true
        }).addTo(mymap);

        geocodeService.reverse().latlng(marker.getLatLng()).language("eng").run(function (error, result) {
            if (error) {
                return;
            }

            document.getElementById("address").innerHTML = result.address.Match_addr;
            document.getElementById("address_input").value = result.address.Match_addr;
        });

        document.getElementById("cordx").value = marker.getLatLng().lat;
        document.getElementById("cordy").value = marker.getLatLng().lng;
        document.getElementById("lat").innerHTML = "lat:" + marker.getLatLng().lat;
        document.getElementById("lng").innerHTML = "lng:" + marker.getLatLng().lng;

        marker.on('move', function(e){
            geocodeService.reverse().latlng(e.latlng).language("eng").run(function (error, result) {
                if (error) {
                    return;
                }

                document.getElementById("address").innerHTML = result.address.Match_addr;
                document.getElementById("address_input").value = result.address.Match_addr;
            });

            document.getElementById("cordx").value = marker.getLatLng().lat;
            document.getElementById("cordy").value = marker.getLatLng().lng;
            document.getElementById("lat").innerHTML = "lat:" + marker.getLatLng().lat;
            document.getElementById("lng").innerHTML = "lng:" + marker.getLatLng().lng;
        });

        mymap.on('click', function (e) {
            geocodeService.reverse().latlng(e.latlng).language("eng").run(function (error, result) {
                if (error) {
                    return;
                }

                //L.marker(result.latlng).addTo(mymap).bindPopup(result.address.Match_addr).openPopup();
                L.popup().setLatLng(result.latlng).setContent(result.address.Match_addr).openOn(mymap);
                console.log(result.address.Match_addr);
            });
        });
    </script>
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.js') }}"></script>
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

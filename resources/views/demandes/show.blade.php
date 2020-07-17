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
                <h2>Description</h2>
                <hr style="width: 80%; margin-left: 0px; margin-top: 30px; margin-bottom: 30px">
                <div style="margin-bottom: 100px">
                    <h4>
                        {{$demande->commentaire}}
                    </h4>
                    <p>
                        Lorem ipsum dolor sit
                        amet consectetur adipisicing elit. Ut itaque,
                        suscipit magnam ratione est quidem a dele
                    </p>
                </div>



                <h2>Budget</h2>
                <hr style="width: 80%; margin-left: 0px; margin-top: 30px; margin-bottom: 30px">
                <div style="margin-bottom: 100px">
                    <h4>
                        {{$demande->budget_max}}
                    </h4>
                </div>

                <h2>Publieur</h2>
                <hr style="width: 80%; margin-left: 0px; margin-top: 30px; margin-bottom: 30px">
                <div>
                    <div class="row">
                        <div class="col-md-4" style="text-align: center">
                            <img style="width: 150px; height: 150px; border-radius: 50%; margin-bottom: 20px" src="{{ asset('uploads/img/appartment.jpeg') }}" alt="" srcset=""><br>
                            <span style="width: 150px; text-align: center">{{$user->name}}</span><br>
                            <span style="width: 150px; text-align: center">{{$user->email}}</span>
                        </div>
                        <div class="col-md-8" style="padding-top: 30px">
                            <div>
                                <img src="{{ asset('uploads/img/whatsapp.jpeg') }}" alt="whatsapp" srcset="" width="25" height="25">
                                <img src="{{ asset('uploads/img/phone_call.jpeg') }}" alt="" srcset="" width="25" height="25">
                                <span style="margin-left: 15px">+212 628 928094</span>
                            </div>
                            <div style="margin-top: 15px">
                                <img src="{{ asset('uploads/img/facebook.jpeg') }}" alt="whatsapp" srcset="" width="25" height="25">
                                <a href="" style="margin-left: 15px">Contactez sur facebook</a>
                            </div>
                        </div>
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

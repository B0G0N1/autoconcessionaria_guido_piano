@extends('layouts.app')
@section('content')
    <div id="home">
        <div id="jumbo">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    </div>
                </div>
            </div>
        </div>
        <div id="jumbo-b">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    </div>
                </div>
            </div>
        </div>
        <div class="p-5 text-black">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center">Auto più vendute</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="false">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://www.ultimatecarpage.com/images/car/5744/Lamborghini-Huracan-LP610-4-36859.jpg"
                            class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="text-uppercase">Ferrari</h5>
                            <p>488 GTB</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://cdn.ferrari.com/cms/network/media/img/resize/5ea6cea901a4636006b49711-16_ferrari-410_superamerica_488_gtb_esterni?width=750&height=550"
                            class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="text-uppercase">Lamborghini</h5>
                            <p>Huracán LP610-4</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://cdn.motor1.com/images/mgl/nr6Jx/s3/porsche-911-carrera-992-2019.webp"
                            class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="text-uppercase">Porche</h5>
                            <p>911 Carrera S</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="p-5 text-black">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center">Gestionale auto sportive e di lusso</h1>
                    </div>
                </div>
            </div>
        </div>
        <div id="jumbo-c">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

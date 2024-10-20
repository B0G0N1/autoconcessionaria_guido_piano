@extends('layouts.app')

@section('content')
    <div id="guest-show">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-header d-flex align-items-center justify-content-between bg-dark text-warning p-4">
                        <h1>{{ $brand->name }}</h1>
                        <a href="{{ url()->previous() }}" class="btn btn-warning">Torna indietro</a>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-6">
                    <img src="{{ $brand->thumb ? $brand->thumb : 'https://via.placeholder.com/600x400' }}"
                        alt="{{ $brand->name }}" class="img-fluid shadow-lg">
                </div>
                <div class="col-md-6">
                    <div class="brand-details p-4 bg-light shadow-sm">
                        <h3 class="text-dark">Dettagli del Brand</h3>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-phone-alt text-warning"></i> <strong>Telefono: </strong>
                                {{ $brand->phone }}</li>
                            <li><i class="fas fa-map-marker-alt text-warning"></i> <strong>Indirizzo: </strong>
                                {{ $brand->address }}</li>
                            <li><i class="fas fa-flag text-warning"></i> <strong>Paese: </strong> {{ $brand->country }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

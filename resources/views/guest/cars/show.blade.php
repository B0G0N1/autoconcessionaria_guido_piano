@extends('layouts.app')

@section('content')
    <div id="guest-show">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="car-header d-flex align-items-center justify-content-between bg-dark text-warning p-4">
                        <h1>{{ $car->brand->name }} {{ $car->model }}</h1>
                        <a href="{{ url()->previous() }}" class="btn btn-warning">Torna indietro</a>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-6">
                    <img src="{{ $car->thumb ? $car->thumb : 'https://via.placeholder.com/600x400' }}"
                        alt="{{ $car->model }}" class="img-fluid shadow-lg">
                </div>
                <div class="col-md-6">
                    <div class="car-details p-4 bg-light shadow-sm">
                        <h3 class="text-dark">Dettagli della Macchina</h3>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-calendar-alt text-warning"></i> <strong>Anno: </strong> {{ $car->year }}
                            </li>
                            <li><i class="fas fa-palette text-warning"></i> <strong>Colore: </strong> {{ $car->color }}
                            </li>
                            <li><i class="fas fa-cogs text-warning"></i> <strong>Motore: </strong> {{ $car->engine }}</li>
                            <li><i class="fas fa-horse text-warning"></i> <strong>Cavalli: </strong> {{ $car->horsepower }}
                            </li>
                            <li><i class="fas fa-road text-warning"></i> <strong>Chilometri: </strong>
                                {{ number_format($car->km, 0, ',', '.') }} km</li>
                            <li><i class="fas fa-euro-sign text-warning"></i> <strong>Prezzo: </strong>
                                €{{ number_format($car->price, 2, ',', '.') }}</li>
                            <li><i class="fas fa-check-circle text-warning"></i> <strong>Usato: </strong>
                                {{ $car->used ? 'Sì' : 'No' }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

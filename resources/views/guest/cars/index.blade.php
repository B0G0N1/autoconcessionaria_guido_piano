@extends('layouts.app')

@section('content')
    <div id="guest-index">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <form class="search-bar d-flex justify-content-start align-items-end gap-2 py-4 flex-wrap">
                        <div class="form-group">
                            <label for="brand-filter" class="">Marca:</label>
                            <select id="brand-filter" class="form-control">
                                <option value="">Tutte le marche</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="year-filter">Anno:</label>
                            <select id="year-filter" class="form-control">
                                <option value="">Tutti gli anni</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="price-filter">Prezzo:</label>
                            <select id="price-filter" class="form-control">
                                <option value="">Tutti i prezzi</option>
                                <option value="low">Meno di €50,000</option>
                                <option value="medium">€50,000 - €150,000</option>
                                <option value="high">Più di €150,000</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="km-filter">Chilometri:</label>
                            <select id="km-filter" class="form-control">
                                <option value="">Tutti i KM</option>
                                <option value="low">Meno di 10,000 km</option>
                                <option value="medium">10,000 - 50,000 km</option>
                                <option value="high">Più di 50,000 km</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="engine-filter">Motore:</label>
                            <select id="engine-filter" class="form-control">
                                <option value="">Tutti i motori</option>
                                <option value="benzina">Benzina</option>
                                <option value="elettrico">Elettrico</option>
                                <option value="diesel">Diesel</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="horsepower-filter">Cavalli:</label>
                            <select id="horsepower-filter" class="form-control">
                                <option value="">Tutti i cavalli</option>
                                <option value="low">Meno di 500</option>
                                <option value="medium">500 - 700</option>
                                <option value="high">Più di 700</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-warning">Filtra</button>
                    </form>
                </div>
            </div>

            <div class="row">
                @foreach ($cars as $car)
                    <div class="col-md-4 mb-4 d-flex align-items-stretch">
                        <div class="card shadow-sm h-100">
                            <img src="{{ $car->thumb ? $car->thumb : 'https://via.placeholder.com/300x200' }}"
                                class="card-img-top" alt="{{ $car->model }}">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $car->brand->name }} {{ $car->model }}</h5>
                                <p class="card-text flex-grow-1">
                                    <strong>Anno:</strong> {{ $car->year }}<br>
                                    <strong>Colore:</strong> {{ $car->color }}<br>
                                    <strong>Motore:</strong> {{ $car->engine }}<br>
                                    <strong>KM:</strong> {{ number_format($car->km, 0, ',', '.') }} km<br>
                                    <strong>Cavalli:</strong> {{ $car->horsepower }}<br>
                                    <strong>Usato:</strong> {{ $car->used ? 'Sì' : 'No' }}
                                </p>
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center bg-dark">
                                <span class="text-warning fw-bold">€{{ number_format($car->price, 2, ',', '.') }}</span>
                                <a href="{{ route('guest.cars.show', $car->slug) }}" class="btn btn-warning">Dettagli</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

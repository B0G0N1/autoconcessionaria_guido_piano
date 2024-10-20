@extends('layouts.app')

@section('content')
    <div id="guest-show">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="optional-header d-flex align-items-center justify-content-between bg-dark text-warning p-4">
                        <h1>{{ $optional->name }}</h1>
                        <a href="{{ url()->previous() }}" class="btn btn-warning">Torna indietro</a>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-6">
                    <img src="{{ $optional->thumb ? $optional->thumb : 'https://via.placeholder.com/600x400' }}"
                        alt="{{ $optional->name }}" class="img-fluid shadow-lg">
                </div>
                <div class="col-md-6">
                    <div class="optional-details p-4 bg-light shadow-sm">
                        <h3 class="text-dark">Dettagli dell'Opzional</h3>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-tags text-warning"></i> <strong>Categoria: </strong>
                                {{ $optional->category }}</li>
                            <li><i class="fas fa-euro-sign text-warning"></i> <strong>Prezzo: </strong>
                                €{{ number_format($optional->price, 2, ',', '.') }}</li>
                            <li><i class="fas fa-check-circle text-warning"></i> <strong>Disponibile: </strong>
                                {{ $optional->available ? 'Sì' : 'No' }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

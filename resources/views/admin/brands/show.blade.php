@extends('layouts.app')

@section('content')
    <div id="show">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="m-2 display-4 text-primary">{{ $brand->name }}</h1>
                <div class="form-actions mt-4 text-right pr-3 pl-3">
                    <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Torna alla lista
                    </a>
                    <a href="{{ route('admin.brands.edit', $brand->id) }}" class="btn btn-warning text-dark">
                        <i class="fas fa-edit"></i> Modifica Brand
                    </a>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-4">
                    <div class="car-details p-4 bg-light rounded shadow-sm">
                        <p class="mb-3">
                            <i class="fas fa-building text-primary"></i>
                            <strong>Azienda:</strong>
                            <span class="text-muted mx-1">{{ $brand->name }}</span>
                        </p>
                        <p class="mb-3">
                            <i class="fas fa-phone text-success"></i>
                            <strong>Telefono:</strong>
                            <span class="text-muted mx-1">{{ $brand->phone }}</span>
                        </p>
                        <p class="mb-3">
                            <i class="fas fa-map-marker-alt text-danger"></i>
                            <strong>Indirizzo:</strong>
                            <span class="text-muted mx-1">{{ $brand->address }}</span>
                        </p>
                    </div>
                </div>
                <div class="col-md-8 d-flex justify-content-end align-items-center">
                    <img src="{{ $brand->thumb ?? 'https://placehold.co/600x400?text=Immagine+Mancante' }}"
                        alt="{{ $brand->name }}" class="img-fluid rounded shadow-sm">
                </div>
            </div>
        </div>
    </div>
@endsection

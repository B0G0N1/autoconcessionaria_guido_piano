@extends('layouts.app')

@section('content')
    <div id="admin-show">
        <div class="container-fluid">

            @if (session('success_update'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success_update') }}
                </div>
            @endif

            <div class="d-flex justify-content-between align-items-center">
                <h1 class="m-2 display-4 text-primary">{{ $optional->name }}</h1>
                <div class="form-actions mt-4 text-right pr-3 pl-3">
                    <a href="{{ route('admin.optionals.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Torna alla lista
                    </a>
                    <a href="{{ route('admin.optionals.edit', $optional->slug) }}" class="btn btn-warning text-dark">
                        <i class="fas fa-edit"></i> Modifica Optional
                    </a>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-4">
                    <div class="car-details p-3 bg-light rounded shadow-sm">
                        <p><strong>Nome:</strong> <span class="text-muted">{{ $optional->name }}</span></p>
                        <p><strong>Descrizione:</strong> <span
                                class="text-muted">{{ $optional->description ?? 'N/A' }}</span></p>
                        <p><strong>Prezzo (€):</strong> <span
                                class="text-success font-weight-bold">{{ number_format($optional->price, 2, ',', '.') }}</span>
                        </p>
                    </div>
                </div>
                <div class="col-md-8 d-flex justify-content-end align-items-center">
                    <img src="{{ $optional->thumb ?? 'https://placehold.co/600x400?text=Immagine+Mancante' }}"
                        alt="{{ $optional->name }}" class="img-fluid rounded shadow-sm">
                </div>
            </div>
        </div>
    </div>
@endsection

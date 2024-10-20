@extends('layouts.app')

@section('content')
    <div id="admin-edit" class="edit-container">
        <div class="edit-header">
            <h1 class="text-uppercase">Modifica Brand: {{ $brand->name }}</h1>
        </div>
        <div class="edit-body">
            <form action="{{ route('admin.brands.update', $brand->slug) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nome Azienda:</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $brand->name) }}"
                            class="form-control @error('name') is-invalid @enderror" required>
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="phone">Telefono:</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone', $brand->phone) }}"
                            class="form-control @error('phone') is-invalid @enderror" required>
                        @error('phone')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="address">Indirizzo:</label>
                        <input type="text" id="address" name="address" value="{{ old('address', $brand->address) }}"
                            class="form-control @error('address') is-invalid @enderror" required>
                        @error('address')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="thumb">Logo Azienda (URL Opzionale):</label>
                        <input type="text" id="thumb" name="thumb" value="{{ old('thumb', $brand->thumb) }}"
                            class="form-control @error('thumb') is-invalid @enderror" placeholder="Inserisci URL del logo">
                        @error('thumb')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-actions mt-4 text-right">
                    <button type="submit" class="btn btn-warning text-dark">Aggiorna Brand</button>
                    <a href="{{ route('admin.brands.show', ['brand' => $brand->slug]) }}"
                        class="btn btn-secondary">Annulla</a>
                </div>
            </form>
        </div>
    </div>
@endsection

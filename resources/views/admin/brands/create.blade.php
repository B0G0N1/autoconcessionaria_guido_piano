@extends('layouts.app')

@section('content')
    <div id="create" class="create-container">
        <div class="create-header">
            <h1 class="text-uppercase">Aggiungi un nuovo Brand</h1>
        </div>
        <div class="create-body">
            <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nome Azienda:</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                            class="form-control @error('name') is-invalid @enderror" required>
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="phone">Telefono:</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                            class="form-control @error('phone') is-invalid @enderror" required>
                        @error('phone')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="address">Indirizzo:</label>
                        <input type="text" id="address" name="address" value="{{ old('address') }}"
                            class="form-control @error('address') is-invalid @enderror" required>
                        @error('address')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="thumb">Logo Azienda (Opzionale):</label>
                        <input type="file" id="thumb" name="thumb"
                            class="form-control @error('thumb') is-invalid @enderror">
                        @error('thumb')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-actions mt-4 text-right">
                    <button type="submit" class="btn btn-success text-dark">Aggiungi Brand</button>
                    <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">Annulla</a>
                </div>
            </form>
        </div>
    </div>
@endsection

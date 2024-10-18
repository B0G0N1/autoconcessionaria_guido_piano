@extends('layouts.app')

@section('content')
    <div id="edit" class="edit-container">
        <div class="edit-header">
            <h1 class="text-uppercase">Modifica Optional: {{ $optional->name }}</h1>
        </div>
        <div class="edit-body">
            <form action="{{ route('admin.optionals.update', $optional->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nome Optional:</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $optional->name) }}"
                            class="form-control @error('name') is-invalid @enderror" required>
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="price">Prezzo (€):</label>
                        <input type="number" id="price" name="price" value="{{ old('price', $optional->price) }}"
                            step="0.01" class="form-control @error('price') is-invalid @enderror" required>
                        @error('price')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="description">Descrizione:</label>
                        <textarea id="description" name="description" rows="4"
                            class="form-control @error('description') is-invalid @enderror">{{ old('description', $optional->description) }}</textarea>
                        @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-actions mt-4 text-right">
                    <button type="submit" class="btn btn-warning text-dark">Aggiorna Optional</button>
                    <a href="{{ route('admin.optionals.show', ['optional' => $optional->id]) }}"
                        class="btn btn-secondary">Annulla</a>
                </div>
            </form>
        </div>
    </div>
@endsection

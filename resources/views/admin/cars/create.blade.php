@extends('layouts.app')

@section('content')
    <div id="create" class="create-container">
        <div class="create-header">
            <h1 class="text-uppercase">Aggiungi una nuova auto</h1>
        </div>
        <div class="create-body">
            <form action="{{ route('admin.cars.store') }}" method="POST">
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="brand">Marca:</label>
                        <input type="text" id="brand" name="brand" value="{{ old('brand') }}"
                            class="form-control @error('brand') is-invalid @enderror" required>
                        @error('brand')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="model">Modello:</label>
                        <input type="text" id="model" name="model" value="{{ old('model') }}"
                            class="form-control @error('model') is-invalid @enderror" required>
                        @error('model')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="year">Anno:</label>
                        <input type="number" id="year" name="year" value="{{ old('year') }}"
                            class="form-control @error('year') is-invalid @enderror" required>
                        @error('year')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="color">Colore:</label>
                        <input type="text" id="color" name="color" value="{{ old('color') }}"
                            class="form-control @error('color') is-invalid @enderror" required>
                        @error('color')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="price">Prezzo (€):</label>
                        <input type="number" id="price" name="price" value="{{ old('price') }}"
                            class="form-control @error('price') is-invalid @enderror" required>
                        @error('price')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="engine">Motore:</label>
                        <input type="text" id="engine" name="engine" value="{{ old('engine') }}"
                            class="form-control @error('engine') is-invalid @enderror" required>
                        @error('engine')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="horsepower">Cavalli (HP):</label>
                        <input type="number" id="horsepower" name="horsepower" value="{{ old('horsepower') }}"
                            class="form-control @error('horsepower') is-invalid @enderror" required>
                        @error('horsepower')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="doors">Porte:</label>
                        <input type="number" id="doors" name="doors" value="{{ old('doors') }}"
                            class="form-control @error('doors') is-invalid @enderror" required>
                        @error('doors')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="km">Chilometri:</label>
                        <input type="number" id="km" name="km" value="{{ old('km') }}"
                            class="form-control @error('km') is-invalid @enderror" required>
                        @error('km')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="used">Usato:</label>
                        <select id="used" name="used" class="form-control @error('used') is-invalid @enderror"
                            required>
                            <option value="1" {{ old('used') == 1 ? 'selected' : '' }}>Sì</option>
                            <option value="0" {{ old('used') == 0 ? 'selected' : '' }}>No</option>
                        </select>
                        @error('used')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-actions mt-4 text-right">
                    <button type="submit" class="btn btn-success text-dark">Aggiungi Auto</button>
                    <a href="{{ route('admin.cars.index') }}" class="btn btn-secondary">Annulla</a>
                </div>
            </form>
        </div>
    </div>
@endsection

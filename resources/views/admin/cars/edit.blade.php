@extends('layouts.app')

@section('content')
    <div id="admin-edit" class="edit-container">
        <div class="edit-header mb-4">
            <h1 class="text-uppercase">Modifica Auto: {{ $car->brand->name }} {{ $car->model }}</h1>
        </div>
        <div class="edit-body">
            <form action="{{ route('admin.cars.update', $car->slug) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="brand_id">Marca:</label>
                        <select id="brand_id" name="brand_id" class="form-control @error('brand_id') is-invalid @enderror"
                            required>
                            <option value="">Seleziona una marca</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}"
                                    {{ old('brand_id', $car->brand_id) == $brand->id ? 'selected' : '' }}>
                                    {{ $brand->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('brand_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="model">Modello:</label>
                        <input type="text" id="model" name="model" value="{{ old('model', $car->model) }}"
                            class="form-control @error('model') is-invalid @enderror" required>
                        @error('model')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="year">Anno:</label>
                        <input type="number" id="year" name="year" value="{{ old('year', $car->year) }}"
                            class="form-control @error('year') is-invalid @enderror" required>
                        @error('year')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Seleziona Colore (dropdown) --}}
                    <div class="form-group col-md-6">
                        <label for="color">Colore:</label>
                        <select id="color" name="color" class="form-control @error('color') is-invalid @enderror"
                            required>
                            <option value="">Seleziona un colore</option>
                            <option value="Bianco" {{ old('color', $car->color) == 'Bianco' ? 'selected' : '' }}>Bianco
                            </option>
                            <option value="Nero" {{ old('color', $car->color) == 'Nero' ? 'selected' : '' }}>Nero
                            </option>
                            <option value="Grigio" {{ old('color', $car->color) == 'Grigio' ? 'selected' : '' }}>Grigio
                            </option>
                            <option value="Blu" {{ old('color', $car->color) == 'Blu' ? 'selected' : '' }}>Blu</option>
                            <option value="Rosso" {{ old('color', $car->color) == 'Rosso' ? 'selected' : '' }}>Rosso
                            </option>
                            <option value="Argento" {{ old('color', $car->color) == 'Argento' ? 'selected' : '' }}>Argento
                            </option>
                            <option value="Verde" {{ old('color', $car->color) == 'Verde' ? 'selected' : '' }}>Verde
                            </option>
                            <option value="Giallo" {{ old('color', $car->color) == 'Giallo' ? 'selected' : '' }}>Giallo
                            </option>
                        </select>
                        @error('color')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="price">Prezzo (€):</label>
                        <input type="number" id="price" name="price" value="{{ old('price', $car->price) }}"
                            class="form-control @error('price') is-invalid @enderror" required>
                        @error('price')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="engine">Motore:</label>
                        <input type="text" id="engine" name="engine" value="{{ old('engine', $car->engine) }}"
                            class="form-control @error('engine') is-invalid @enderror" required>
                        @error('engine')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="horsepower">Cavalli (HP):</label>
                        <input type="number" id="horsepower" name="horsepower"
                            value="{{ old('horsepower', $car->horsepower) }}"
                            class="form-control @error('horsepower') is-invalid @enderror" required>
                        @error('horsepower')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="doors">Porte:</label>
                        <input type="number" id="doors" name="doors" value="{{ old('doors', $car->doors) }}"
                            class="form-control @error('doors') is-invalid @enderror" required>
                        @error('doors')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="km">Chilometri:</label>
                        <input type="number" id="km" name="km" value="{{ old('km', $car->km) }}"
                            class="form-control @error('km') is-invalid @enderror" required>
                        @error('km')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="used">Usato:</label>
                        <select id="used" name="used" class="form-control @error('used') is-invalid @enderror"
                            required>
                            <option value="1" {{ old('used', $car->used) == 1 ? 'selected' : '' }}>Sì</option>
                            <option value="0" {{ old('used', $car->used) == 0 ? 'selected' : '' }}>No</option>
                        </select>
                        @error('used')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="optionals">Optional:</label>
                        <div class="card p-3 bg-light">
                            <div class="row">
                                @foreach ($optionals as $optional)
                                    <div class="col-md-4 my-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="optionals[]"
                                                value="{{ $optional->id }}" id="optional-{{ $optional->id }}"
                                                {{ $car->optionals->contains($optional->id) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="optional-{{ $optional->id }}">
                                                <strong>{{ $optional->name }}</strong> <br>
                                                <small>{{ $optional->description }}</small> <br>
                                                <span
                                                    class="text-muted">€{{ number_format($optional->price, 2, ',', '.') }}</span>
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-actions mt-4 text-right">
                    <button type="submit" class="btn btn-warning text-dark">Aggiorna Auto</button>
                    <a href="{{ route('admin.cars.show', ['car' => $car->slug]) }}" class="btn btn-secondary">Annulla</a>
                </div>
            </form>
        </div>
    </div>
@endsection

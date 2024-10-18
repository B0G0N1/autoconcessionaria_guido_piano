@extends('layouts.app')

@section('content')
    <div id="show">
        <div class="container-fluid"> {{-- Allarga il contenitore --}}
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="m-2 display-4 text-primary">{{ $car->brand->name }} {{ $car->model }}</h1>
                <div class="form-actions mt-4 text-right pr-3 pl-3">
                    <a href="{{ route('admin.cars.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Torna alla lista
                    </a>
                    <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn btn-warning text-dark">
                        <i class="fas fa-edit"></i> Modifica Auto
                    </a>
                </div>
            </div>

            <hr>

            <div class="row">
                {{-- Colonna per i dettagli della macchina (più stretta) --}}
                <div class="col-md-3">
                    <div class="car-details p-3 bg-light rounded shadow-sm">
                        <p><strong>Marca:</strong> <span class="text-muted">{{ $car->brand->name }}</span></p>
                        <p><strong>Modello:</strong> <span class="text-muted">{{ $car->model }}</span></p>
                        <p><strong>Allestimento:</strong> <span class="text-muted">{{ $car->trim }}</span></p>
                        <p><strong>Anno:</strong> <span class="text-muted">{{ $car->year }}</span></p>
                        <p><strong>Colore:</strong> <span class="text-muted">{{ $car->color }}</span></p>
                        <p><strong>Chilometri:</strong> <span class="text-muted">{{ number_format($car->km, 0, ',', '.') }}
                                km</span></p>
                        <p><strong>Prezzo (€):</strong> <span
                                class="text-success font-weight-bold">{{ number_format($car->price, 2, ',', '.') }}</span>
                        </p>
                        <p><strong>Motore:</strong> <span class="text-muted">{{ $car->engine }}</span></p>
                        <p><strong>Cavalli (HP):</strong> <span class="text-muted">{{ $car->horsepower }}</span></p>
                        <p><strong>Porte:</strong> <span class="text-muted">{{ $car->doors }}</span></p>
                        <p><strong>Usato:</strong> <span
                                class="{{ $car->used ? 'text-danger' : 'text-success' }}">{{ $car->used ? 'Sì' : 'No' }}</span>
                        </p>
                        <p><strong>Posti:</strong> <span class="text-muted">{{ $car->seats }}</span></p>
                    </div>
                </div>

                {{-- Colonna per l'immagine della macchina (più larga) --}}
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <img src="{{ $car->thumb ?? 'https://placehold.co/600x400?text=Immagine+Mancante' }}"
                        alt="{{ $car->model }}" class="img-fluid rounded shadow-sm">
                </div>

                {{-- Colonna per gli optional (più stretta) --}}
                <div class="col-md-3">
                    <div class="optional-details p-3 bg-light rounded shadow-sm">
                        <h5 class="text-primary">Optional</h5>
                        @if ($car->optionals->isEmpty())
                            <p class="text-muted">Nessun optional disponibile per questa auto.</p>
                        @else
                            <ul class="list-unstyled">
                                @foreach ($car->optionals as $optional)
                                    <li>
                                        <strong>{{ $optional->name }}</strong> - {{ $optional->description }}
                                        <br>
                                        <span class="text-muted">Prezzo: €
                                            {{ number_format($optional->price, 2, ',', '.') }}</span>
                                    </li>
                                    <hr>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

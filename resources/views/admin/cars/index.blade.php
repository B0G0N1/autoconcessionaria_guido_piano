@extends('layouts.app')

@section('content')
    <div id="admin-index">
        <div class="container-fluid">
            <div class="row bg-giallo py-3 mb-1">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h2 class="mb-0 text-dark">Lista Automobili</h2>
                    <a href="{{ route('admin.cars.create') }}" class="btn btn-dark">
                        <i class="fas fa-plus"></i> Aggiungi Nuova Auto
                    </a>
                </div>
            </div>

            @if (session('success_create'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success_create') }}
                </div>
            @endif

            @if (session('success_delete'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('success_delete') }}
                </div>
            @endif

            <div class="row bg-light py-3">
                <div class="col-12">
                    <form action="{{ route('admin.cars.index') }}" method="GET"
                        class="d-flex gap-3 flex-wrap align-items-end search-form">
                        <!-- Marca -->
                        <div class="filter-group">
                            <label for="brand">Marca</label>
                            <select name="brand" id="brand" class="form-control">
                                <option value="">-- Seleziona Marca --</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}"
                                        {{ request('brand') == $brand->id ? 'selected' : '' }}>
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Anno -->
                        <div class="filter-group">
                            <label for="year">Anno</label>
                            <select name="year" id="year" class="form-control">
                                <option value="">-- Seleziona Anno --</option>
                                @foreach ($years as $year)
                                    <option value="{{ $year->year }}"
                                        {{ request('year') == $year->year ? 'selected' : '' }}>
                                        {{ $year->year }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Usato -->
                        <div class="filter-group">
                            <label for="used">Usato</label>
                            <select name="used" id="used" class="form-control">
                                <option value="">-- Seleziona --</option>
                                <option value="1" {{ request('used') == '1' ? 'selected' : '' }}>Sì</option>
                                <option value="0" {{ request('used') == '0' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <!-- Motore -->
                        <div class="filter-group">
                            <label for="engine">Motore</label>
                            <select name="engine" id="engine" class="form-control">
                                <option value="">-- Seleziona Motore --</option>
                                @foreach ($engines as $engine)
                                    <option value="{{ $engine->engine }}"
                                        {{ request('engine') == $engine->engine ? 'selected' : '' }}>
                                        {{ ucfirst($engine->engine) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Cavalli -->
                        <div class="filter-group">
                            <label for="horsepower">Cavalli</label>
                            <select name="horsepower" id="horsepower" class="form-control">
                                <option value="">-- Seleziona Cavalli --</option>
                                @foreach ($horsepowers as $horsepower)
                                    <option value="{{ $horsepower->horsepower }}"
                                        {{ request('horsepower') == $horsepower->horsepower ? 'selected' : '' }}>
                                        {{ $horsepower->horsepower }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Porte -->
                        <div class="filter-group">
                            <label for="doors">Porte</label>
                            <select name="doors" id="doors" class="form-control">
                                <option value="">-- Seleziona Porte --</option>
                                @for ($i = 2; $i <= 5; $i++)
                                    <option value="{{ $i }}" {{ request('doors') == $i ? 'selected' : '' }}>
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>

                        <!-- Pulsanti -->
                        <div class="filter-actions d-flex align-items-end">
                            <button type="submit" class="btn btn-giallo">Filtra</button>
                            <a href="{{ route('admin.cars.index') }}" class="btn btn-dark ms-2">Resetta</a>
                        </div>
                    </form>
                </div>
            </div>

            @if ($cars->isEmpty())
                <div class="alert alert-info mt-3">Nessuna auto trovata con i filtri selezionati.</div>
            @else
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive-custom">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Marca</th>
                                        <th>Modello</th>
                                        <th>Anno</th>
                                        <th>Colore</th>
                                        <th>Motore</th>
                                        <th>Cavalli</th>
                                        <th>Porte</th>
                                        <th>KM</th>
                                        <th>Usato</th>
                                        <th class="text-end pe-5">Azioni</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cars as $car)
                                        <tr>
                                            <td>{{ $car->id }}</td>
                                            <td>{{ $car->brand ? $car->brand->name : 'N/D' }}</td>
                                            <td>{{ $car->model }}</td>
                                            <td>{{ $car->year }}</td>
                                            <td>{{ $car->color }}</td>
                                            <td>{{ $car->engine }}</td>
                                            <td>{{ $car->horsepower }}</td>
                                            <td>{{ $car->doors }}</td>
                                            <td>{{ number_format($car->km, 0, ',', '.') }} km</td>
                                            <td>{{ $car->used ? 'Sì' : 'No' }}</td>
                                            <td class="pe-4">
                                                <div class="d-flex gap-1 justify-content-end">
                                                    <a href="{{ route('admin.cars.show', ['car' => $car->slug]) }}"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.cars.edit', ['car' => $car->slug]) }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.cars.destroy', ['car' => $car->slug]) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Sei sicuro di voler eliminare questa auto?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm delete-car">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

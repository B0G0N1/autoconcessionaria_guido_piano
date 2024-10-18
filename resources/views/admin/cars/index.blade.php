@extends('layouts.app')

@section('content')
    <div id="index">
        <div class="container-fluid">
            <div class="row bg-giallo py-3 mb-3">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h2 class="mb-0 text-dark">Lista Automobili</h2>
                    <a href="{{ route('admin.cars.create') }}" class="btn btn-dark">
                        <i class="fas fa-plus"></i> Aggiungi Nuova Auto
                    </a>
                </div>
            </div>
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
                                                <a href="{{ route('admin.cars.show', ['car' => $car->id]) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.cars.edit', ['car' => $car->id]) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.cars.destroy', ['car' => $car->id]) }}"
                                                    method="POST" class="mb-0">
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
        </div>
    </div>
    @include('admin.cars.partials.modal_delete')
@endsection

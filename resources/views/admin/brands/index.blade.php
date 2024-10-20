@extends('layouts.app')

@section('content')
    <div id="admin-index">
        <div class="container-fluid">
            <div class="row bg-giallo py-3 mb-3">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h2 class="mb-0 text-dark">Lista Concessionarie</h2>
                    <a href="{{ route('admin.brands.create') }}" class="btn btn-dark">
                        <i class="fas fa-plus"></i> Aggiungi Nuovo Brand
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

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive-custom">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Telefono</th>
                                    <th>Indirizzo</th>
                                    <th>Azioni</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                    <tr>
                                        <td>{{ $brand->id }}</td>
                                        <td>{{ $brand->name }}</td>
                                        <td>{{ $brand->phone }}</td>
                                        <td>{{ $brand->address }}</td>
                                        <td>
                                            <div class="d-flex justify-content-end gap-1 me-3">
                                                <a href="{{ route('admin.brands.show', ['brand' => $brand->slug]) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.brands.edit', ['brand' => $brand->slug]) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form
                                                    action="{{ route('admin.brands.destroy', ['brand' => $brand->slug]) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Sei sicuro di voler eliminare questo brand?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
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
@endsection

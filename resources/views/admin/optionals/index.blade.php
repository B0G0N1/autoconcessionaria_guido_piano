@extends('layouts.app')

@section('content')
    <div id="admin-index">
        <div class="container-fluid">
            <div class="row bg-giallo py-3 mb-3">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h2 class="mb-0 text-dark">Lista Optional</h2>
                    <a href="{{ route('admin.optionals.create') }}" class="btn btn-dark">
                        <i class="fas fa-plus"></i> Aggiungi Nuovo Optional
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
                                    <th>Descrizione</th>
                                    <th>Prezzo</th>
                                    <th>Azioni</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($optionals as $optional)
                                    <tr>
                                        <td>{{ $optional->id }}</td>
                                        <td>{{ $optional->name }}</td>
                                        <td>{{ $optional->description }}</td>
                                        <td>{{ number_format($optional->price, 2, ',', '.') }}</td>
                                        <td>
                                            <div class="d-flex gap-1 justify-content-end">
                                                <a href="{{ route('admin.optionals.show', ['optional' => $optional->slug]) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.optionals.edit', ['optional' => $optional->slug]) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form
                                                    action="{{ route('admin.optionals.destroy', ['optional' => $optional->slug]) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Sei sicuro di voler eliminare questo optional?');">
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

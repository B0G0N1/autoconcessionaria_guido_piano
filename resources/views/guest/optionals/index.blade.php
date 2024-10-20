@extends('layouts.app')

@section('content')
    <div id="guest-index">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <form class="search-bar d-flex justify-content-start align-items-end gap-2 py-4 flex-wrap">
                        <div class="form-group">
                            <label for="optional-filter">Opzional:</label>
                            <select id="optional-filter" class="form-control">
                                <option value="">Tutti gli opzionali</option>
                                @foreach ($optionals as $optional)
                                    <option value="{{ $optional->id }}">{{ $optional->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="category-filter">Categoria:</label>
                            <select id="category-filter" class="form-control">
                                <option value="">Tutte le categorie</option>
                                <option value="comfort">Comfort</option>
                                <option value="sicurezza">Sicurezza</option>
                                <option value="tecnologia">Tecnologia</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-warning">Filtra</button>
                    </form>
                </div>
            </div>

            <div class="row">
                @foreach ($optionals as $optional)
                    <div class="col-md-4 mb-4 d-flex align-items-stretch">
                        <div class="card shadow-sm h-100">
                            <img src="{{ $optional->thumb ? $optional->thumb : 'https://via.placeholder.com/300x200' }}"
                                class="card-img-top" alt="{{ $optional->name }}">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $optional->name }}</h5>
                                <p class="card-text flex-grow-1">
                                    <strong>Categoria:</strong> {{ $optional->category }}<br>
                                    <strong>Descrizione:</strong> {{ $optional->description }}<br>
                                </p>
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center bg-dark">
                                <a href="{{ route('guest.optionals.show', $optional->slug) }}"
                                    class="btn btn-warning">Dettagli</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

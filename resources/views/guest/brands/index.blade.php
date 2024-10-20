@extends('layouts.app')

@section('content')
    <div id="guest-index">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <form class="search-bar d-flex justify-content-start align-items-end gap-2 py-4 flex-wrap">
                        <div class="form-group">
                            <label for="name-filter">Nome del Brand:</label>
                            <select id="name-filter" class="form-control">
                                <option value="">Tutti i brand</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="country-filter">Paese:</label>
                            <select id="country-filter" class="form-control">
                                <option value="">Tutti i paesi</option>
                                <option value="Italy">Italia</option>
                                <option value="Germany">Germania</option>
                                <option value="USA">USA</option>
                                <option value="UK">UK</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-warning">Filtra</button>
                    </form>
                </div>
            </div>

            <div class="row">
                @foreach ($brands as $brand)
                    <div class="col-md-4 mb-4 d-flex align-items-stretch">
                        <div class="card shadow-sm h-100">
                            <img src="{{ $brand->thumb ? $brand->thumb : 'https://via.placeholder.com/300x200' }}"
                                class="card-img-top" alt="{{ $brand->name }}">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $brand->name }}</h5>
                                <p class="card-text flex-grow-1">
                                    <strong>Telefono:</strong> {{ $brand->phone }}<br>
                                    <strong>Indirizzo:</strong> {{ $brand->address }}<br>
                                </p>
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center bg-dark">
                                <span class="text-warning fw-bold">{{ $brand->name }}</span>
                                <a href="{{ route('guest.brands.show', $brand->slug) }}"
                                    class="btn btn-warning">Dettagli</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

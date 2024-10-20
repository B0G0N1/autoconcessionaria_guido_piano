@extends('layouts.app')

@section('content')
    <div id="dashboard-options" class="container mt-3">

        <div class="row">

            <div class="col-6">
                <div class="section">
                    <h2>Auto</h2>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <a href="{{ route('admin.cars.index') }}">
                                    <img src="{{ Vite::asset('resources/img/cars_list.jpg') }}" alt="Visualizza Auto">
                                    <p>Visualizza Auto</p>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <a href="{{ route('admin.cars.create') }}">
                                    <img src="{{ Vite::asset('resources/img/cars_add.jpg') }}" alt="Aggiungi Auto">
                                    <p>Aggiungi Auto</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="section">
                    <h2>Case Automobilistiche</h2>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <a href="{{ route('admin.brands.index') }}">
                                    <img src="{{ Vite::asset('resources/img/brands_list.png') }}" alt="Visualizza Case">
                                    <p>Visualizza Brand</p>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <a href="{{ route('admin.brands.create') }}">
                                    <img src="{{ Vite::asset('resources/img/brands_add.png') }}" alt="Aggiungi Casa">
                                    <p>Aggiungi Brand</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="section">
                    <h2>Optional</h2>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <a href="{{ route('admin.optionals.index') }}">
                                    <img src="{{ Vite::asset('resources/img/optionals_list.png') }}"
                                        alt="Visualizza Optional">
                                    <p>Visualizza Optional</p>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <a href="{{ route('admin.optionals.create') }}">
                                    <img src="{{ Vite::asset('resources/img/optionals_add.png') }}"
                                        alt="Aggiungi Optional">
                                    <p>Aggiungi Optional</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6"></div>
        </div>

    </div>
@endsection

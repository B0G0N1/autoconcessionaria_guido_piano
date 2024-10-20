<header id="header" class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <span class="logo-text"><span class="logo-highlight">Guido</span>Piano</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ms-3" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">{{ __('Home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('guest.cars.index') }}">Auto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('guest.brands.index') }}">Concessionarie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('guest.optionals.index') }}">Optional</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Cerca" aria-label="Cerca">
                <button class="btn btn-outline-light me-3" type="submit">Cerca</button>
            </form>
            <div class="d-flex align-items-center ms-2">
                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right bg-dark text-light"
                                aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-light"
                                    href="{{ url('dashboard') }}">{{ __('Dashboard') }}</a>
                                <a class="dropdown-item text-light" href="{{ url('profile') }}">{{ __('Profile') }}</a>
                                <a class="dropdown-item text-light" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
                <img src="https://flagcdn.com/16x12/it.png" alt="Bandiera Italiana" class="me-2">
            </div>
        </div>
    </div>
</header>

<nav class="navbar navbar-expand-md navbar-light bg-white lead">
    <div class="container-xxl">
        <a class="navbar-brand" href="{{ url('/') }}">
            <span class="h2 fw-bold">
                <span class="badge bg-light text-muted">
                    <i class="fas fa-globe"></i>
                    {{ config('app.name') }}
                </span>
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                {{-- Begin events --}}
                @if( Route::current()->getName() == 'events.index' )
                    <li class="nav-item">
                        <a class="nav-link fw-bold active" href="{{ route('events.index') }}" title="Каталог">
                            @lang('Каталог')
                        </a>
                    </li>
                @else
                    <li class="nav-item fw-normal">
                        <a class="nav-link" href="{{ route('events.index') }}" title="Каталог">
                            @lang('Каталог')
                        </a>
                    </li>
                @endif
                {{-- End events --}}

                {{-- Begin --}}
                <li class="nav-item fw-normal">
                    <a class="nav-link" href="#" title="@lang('Гиды')">
                        @lang('Гиды')
                    </a>
                </li>
                {{-- End --}}

            </ul>

            @if(session('events.events_seen'))
                <div class="btn-group me-3" role="group" aria-label="Basic example">
                    <a class="btn btn-primary" href="{{ route('logout') }}" role="button"
                       data-bs-toggle="modal" data-bs-target="#eventsSeen">
                        @lang('Просмотрено')
                        <span class="badge bg-light text-muted">{{ count(session('events.events_seen')) }}</span>
                    </a>
                </div>
            @endif

            <div class="dropdown me-3 ms-1">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                    {{ App::isLocale('ru') ? 'Ru' : 'En' }}
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton"
                    style="min-width: 10px !important;">
                    <li>
                        <a class="dropdown-item {{ App::isLocale('ru') ? 'active' : '' }}"
                           href="{{ route('set.locale', ['locale' => 'ru']) }}">Ru</a>
                    </li>
                    <li>
                        <a class="dropdown-item {{ App::isLocale('en') ? 'active' : '' }}"
                           href="{{ route('set.locale', ['locale' => 'en']) }}">En</a>
                    </li>
                </ul>
            </div>
            @guest
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a class="btn btn-primary" href="{{ route('login') }}" role="button">
                        @lang('Вход')
                    </a>
                    @if(Route::has('register'))
                        <a class="btn btn-light" href="{{ route('register') }}" role="button">
                            @lang('Регистрация')
                        </a>
                    @endif
                </div>
            @else
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a class="btn btn-primary" href="{{ route('logout') }}" role="button">
                        @lang('Выход')
                    </a>
                </div>
            @endguest

        </div>
    </div>
</nav>

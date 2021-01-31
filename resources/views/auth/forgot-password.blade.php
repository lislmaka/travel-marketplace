@extends('layouts.services')

@section('content')
    <div class="container-xxl">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="row d-flex justify-content-center">

                {{--                <div class="col-md-4 vh-100 d-flex align-items-center ">--}}
                <div class="col-md-4 mt-5 d-flex align-items-center ">

                    <div class="d-flex flex-column w-100">
                        <a class="text-center mb-3" href="{{ url('/') }}">
                            <span class="h1 fw-bold">
                                <span class="badge bg-transparent text-muted">
                                    <i class="fas fa-globe"></i>
                                    {{ config('app.name') }}
                                </span>
                            </span>
                        </a>

                        <div class="card border-light">
                            <div class="card-header fw-bold lead text-center">
                                @lang('Восстановление пароля')
                            </div>
                            <div class="card-body">
                                <div class="card-text">
                                    @lang('Для восстановления пароля вам необходимо ввести e-mail адрес, который вы указывали при регистрации')
                                </div>
                                <div class="form-floating my-3">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" required autocomplete="email"
                                           placeholder="name@example.com">
                                    <label for="email">@lang('Электронная почта')</label>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-center">
                                <button type="submit" class="btn btn-lg btn-primary">
                                    @lang('Восстановить пароль')
                                </button>
                            </div>
                        </div>
                        <div class="card bg-transparent border-0">
                            <div class="card-body">
                                <ul class="nav d-flex justify-content-evenly small">
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">
                                                @lang('Войти в систему')
                                            </a>
                                        </li>
                                    @endif
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">@lang('Регистрация')</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection

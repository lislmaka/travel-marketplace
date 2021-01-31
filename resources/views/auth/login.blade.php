@extends('layouts.services')

@section('content')
    <div class="container-xxl">
        <form method="POST" action="{{ route('login') }}">
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



                        <div class="card">
                            <div class="card-header fw-bold lead text-center">
                                @lang('Вход в систему бронирования')
                            </div>
                            <div class="card-body">
                                <div class="form-floating mb-3">
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
                                <div class="form-floating mb-3">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required
                                           autocomplete="current-password" placeholder="Password">
                                    <label for="password">@lang('Пароль')</label>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{--                                <div class="form-check">--}}
                                {{--                                    <input class="form-check-input" type="checkbox" name="remember"--}}
                                {{--                                           id="remember" {{ old('remember') ? 'checked' : '' }}>--}}
                                {{--                                    <label class="form-check-label" for="remember">--}}
                                {{--                                        {{ __('Remember Me') }}--}}
                                {{--                                    </label>--}}
                                {{--                                </div>--}}
                            </div>
                            <div class="card-header d-flex justify-content-evenly border-bottom-0 border-top">
                                <a href="#"><i class="fab fa-vk h2 text-primary"></i></a>
                                <a href="#"><i class="fab fa-facebook h2 text-primary"></i></a>
                                <a href="#"><i class="fab fa-instagram h2 text-primary"></i></a>
                                <a href="#"><i class="fab fa-telegram-plane h2 text-primary"></i></a>
                            </div>
                            <div class="card-footer d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">
                                    @lang('Войти в систему')
                                </button>
                            </div>
                        </div>
                        <div class="card bg-transparent border-0">
                            <div class="card-body">
                                <ul class="nav d-flex justify-content-evenly small">
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">@lang('Регистрация')</a>
                                        </li>
                                    @endif
                                    @if (Route::has('password.request'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('password.request') }}">
                                                @lang('Забыли пароль?')
                                            </a>
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

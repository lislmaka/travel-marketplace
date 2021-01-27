@extends('layouts.app')

@section('title', __('Not Found'))
@section('content')
    <div class="my-3">&nbsp;</div>
    <div class="row d-flex justify-content-center">
{{--        <div class="col-md-4 vh-100 d-flex align-items-center ">--}}
        <div class="col-md-6 my-5 d-flex align-items-center">
            <div class="d-flex flex-column w-100">
                <div class="card bg-transparent border-0">
                    <div class="card-body text-center lead">
                        <div class="card-title fw-bold h2 text-center my-3">
                            &#128533; @lang('Упс... Нет такой страницы')
                        </div>

                        @lang('Запрашиваемой страницы')
                        <div class="fw-bold">{{ Request::url() }}</div>
                        @lang('не найдено на нашем сайте')
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="my-3">&nbsp;</div>
@endsection


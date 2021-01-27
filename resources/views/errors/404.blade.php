@extends('layouts.app')

@section('title', __('Not Found'))
@section('content')
    <div class="text-center my-5">&nbsp;</div>
    <div class="h2 text-center fw-bold">&#128533; Упс... Нет такой страницы</div>
    <div class="lead text-dark text-center pt-3 px-5">
        Запрашиваемой страницы
        <br><span class="fw-bold">{{ Request::url() }}</span><br>
        не найдено на нашем сайте
    </div>
    <div class="text-center my-5">&nbsp;</div>
@endsection


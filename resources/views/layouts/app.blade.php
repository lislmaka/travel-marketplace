<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--  favicon  --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/favicon/site.webmanifest') }}">

    {{--  CSRF Token  --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="{{ $description ?? '' }}">

    <title>{{ $title ?? '' }}</title>


    {{--  Scripts  --}}
    <script src="{{ asset(mix('js/app.js')) }}" defer></script>

    {{--  Styles  --}}
    <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">

    @stack('scripts')
</head>

<body>
<div id="app">
    <div class="shadow-sm sticky-top">
        @section('sidebar')
            @includeIf('site.def.navbar')
        @show
    </div>

    @yield('main_page')

    @yield('content')

    @includeIf('site.def.footer')
    @includeIf('site.def.company')
    @includeIf('site.def.modals.modal_events_seen')
    @includeIf('site.def.modals.modal_events_compare')
    @includeIf('site.def.modals.modal_help')
</div>
</body>

</html>

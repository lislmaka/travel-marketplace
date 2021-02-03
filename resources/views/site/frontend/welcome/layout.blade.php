@extends('layouts.app')

@section('main_page')
    {{-- Begin Desktop --}}
    @if ($agent->isDesktop())
        <div class="d-none d-md-block">
            @includeIf('site.frontend.welcome.desktop.blocks.main-banner')
            @includeIf('site.frontend.welcome.desktop.blocks.discount')
            @includeIf('site.frontend.welcome.desktop.blocks.benefits')
            @includeIf('site.frontend.welcome.desktop.blocks.popular-countries')
            @includeIf('site.frontend.welcome.desktop.blocks.popular-cities')
            @includeIf('site.frontend.welcome.desktop.blocks.popular-categories')
            @includeIf('site.frontend.welcome.desktop.blocks.reviews')
            @includeIf('site.frontend.welcome.desktop.blocks.map')
        </div>
    @endif
    {{-- End Desktop --}}

    {{-- Begin Mobile --}}
    @if ($agent->isMobile())
        <div class="d-block d-md-none">
            @includeIf('site.frontend.welcome.mobile.blocks.main_banner')
        </div>
    @endif
    {{-- End Mobile --}}
@endsection

@push('scripts')
    <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript" defer></script>
    <script src="{{ asset(mix('js/yandex_map.js')) }}" defer></script>
    @livewireStyles
    @livewireScripts
@endpush

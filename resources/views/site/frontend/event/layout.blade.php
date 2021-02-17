@extends('layouts.app')

@section('sidebar')
    @parent
    @includeIf('site.frontend.event.desktop.navbar')
@endsection

@section('content')
    @if ($agent->isDesktop())
        {{-- Begin Desktop --}}
        <div class="container-xxl">
            <div class="d-none d-md-block">
                <div class="row">
                    <div class="col-md-12">
                        @includeIf('site.frontend.event.desktop.photos-header')
                    </div>
                </div>
                @includeIf('site.def.breadcrumb')

                <div class="row">
                    <div class="col-md-9">
                        @includeIf('site.frontend.event.desktop.event-info')
                        @includeIf('site.frontend.event.desktop.roadmap-description')
                        @includeIf('site.frontend.event.desktop.author')
                    </div>
                    <div class="col-md-3">
                        <div class="sticky-top sticky-offset mb-3">
                            @includeIf('site.frontend.event.desktop.roadmap-map')
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-9">
                        @includeIf('site.frontend.event.desktop.order')
                        @includeIf('site.frontend.event.desktop.photos')
                        @includeIf('site.frontend.event.desktop.city')
                        @includeIf('site.frontend.event.desktop.similar-author')
                        @includeIf('site.frontend.event.desktop.similar-city')
                        @includeIf('site.frontend.event.desktop.reviews')
                    </div>
                    <div class="col-md-3">
                        <div class="sticky-top sticky-offset">
                            @includeIf('site.frontend.event.desktop.price')
                        </div>
                    </div>
                </div>

            </div>
        </div>
        {{-- End Desktop --}}
    @endif

    @if ($agent->isMobile())
        {{-- Begin Mobile --}}
        <div class="d-block d-md-none">
            @includeIf('site.def.breadcrumb')

            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-9">

                </div>
            </div>
        </div>
        {{-- End Mobile --}}
    @endif
@endsection

@push('scripts')
{{--    <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript" defer></script>--}}
    <script src="{{ asset(mix('js/yandex_main.js')) }}" defer></script>
    <script src="{{ asset(mix('js/yandex_map.js')) }}" defer></script>
    <script src="{{ asset(mix('js/yandex_roadmap.js')) }}" defer></script>
    <script src="{{ asset(mix('js/vuejs.js')) }}" defer></script>
    @livewireStyles
    @livewireScripts
@endpush

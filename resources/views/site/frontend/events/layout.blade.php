@extends('layouts.app')

@section('sidebar')
    @parent
    @includeIf('site.frontend.events.desktop.navbar')
@endsection
@section('content')
    {{-- Begin Desktop --}}
    @if ($agent->isDesktop())
        @includeIf('site.frontend.events.desktop.search-horizontal')

        <div class="container-xxl">
            <div class="d-none d-md-block">
                @includeIf('site.def.breadcrumb')

                <div class="row">
                    <div class="col-md-9">
                        @includeIf('site.frontend.events.desktop.map')
                        @includeIf('site.frontend.events.desktop.catalog-'.$events_view_mode)
                    </div>
                    <div class="col-md-3">
                        {{--                    @includeIf('site.frontend.events.desktop.search')--}}
                        @includeIf('site.frontend.events.desktop.default')
                        @includeIf('site.frontend.events.desktop.geography')
{{--                        @includeIf('site.frontend.events.desktop.thematic')--}}
                        @includeIf('site.frontend.events.desktop.categories')

                    </div>
                </div>
            </div>
        </div>
        @includeIf('site.frontend.events.desktop.modal-countries')
        @includeIf('site.frontend.events.desktop.modal-cities')
    @endif
    {{-- End Desktop --}}

    {{-- Begin Mobile --}}
    @if ($agent->isMobile())
        <div class="d-block d-md-none">
            @includeIf('site.def.breadcrumb')

            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-9">

                </div>
            </div>
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

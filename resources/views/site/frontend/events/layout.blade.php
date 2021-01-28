@extends('layouts.app')

@section('sidebar')
    @parent
    @includeIf('site.frontend.events.desktop.blocks.navbar')
@endsection
@section('content')
    {{-- Begin Desktop --}}
    @if ($agent->isDesktop())
        <div class="container-xxl">
            <div class="d-none d-md-block">
                @includeIf('site.def.breadcrumb')

                <div class="row">
                    <div class="col-md-9">
                        @includeIf('site.frontend.events.desktop.blocks.map')
                        @includeIf('site.frontend.events.desktop.blocks.catalog_'.$events_view_mode)
                    </div>
                    <div class="col-md-3">
                        {{--                    @includeIf('site.frontend.events.desktop.blocks.search')--}}
                        @includeIf('site.frontend.events.desktop.blocks.geography')
{{--                        @includeIf('site.frontend.events.desktop.blocks.thematic')--}}
                        @includeIf('site.frontend.events.desktop.blocks.categories')
                        @includeIf('site.frontend.events.desktop.blocks.default')
                    </div>
                </div>
            </div>
        </div>
        @includeIf('site.frontend.events.desktop.blocks.modal_countries')
        @includeIf('site.frontend.events.desktop.blocks.modal_cities')
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
@endpush

@extends('layouts.app')

@section('sidebar')
    @parent
    @includeIf('site.frontend.event.desktop.blocks.navbar')
@endsection

@section('content')
    @if ($agent->isDesktop())
        {{-- Begin Desktop --}}
        <div class="container-xxl">
            <div class="d-none d-md-block">
                <div class="row">
                    <div class="col-md-12">
                        @includeIf('site.frontend.event.desktop.blocks.photos_header')
                    </div>
                </div>
                @includeIf('site.def.breadcrumb')
                <div class="row">
                    <div class="col-md-9">
                        @includeIf('site.frontend.event.desktop.blocks.event_info')
                        @includeIf('site.frontend.event.desktop.blocks.order')
                        @includeIf('site.frontend.event.desktop.blocks.photos')
                        @includeIf('site.frontend.event.desktop.blocks.city')
                        @includeIf('site.frontend.event.desktop.blocks.similars')
                        @includeIf('site.frontend.event.desktop.blocks.reviews')
                    </div>
                    <div class="col-md-3">
                        <div class="sticky-top sticky-offset">
                            @includeIf('site.frontend.event.desktop.blocks.price')
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
    <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript" defer></script>
    <script src="{{ asset(mix('js/yandex_map.js')) }}" defer></script>
    <script src="{{ asset(mix('js/vuejs.js')) }}" defer></script>
@endpush

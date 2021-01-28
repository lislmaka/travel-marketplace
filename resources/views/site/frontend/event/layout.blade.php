@extends('layouts.app')

@section('sidebar')
    @parent
    @includeIf('site.frontend.event.desktop.blocks.navbar')
@endsection

@section('content')
    {{-- Begin Desktop --}}
    <div class="container-xxl">
        <div class="d-none d-md-block">
            @includeIf('def.breadcrumb')
            <div class="row">
                <div class="col-md-9">
                    @includeIf('site.frontend.event.desktop.blocks.event_info')
                    @includeIf('site.frontend.event.desktop.blocks.order')
                    @includeIf('site.frontend.event.desktop.blocks.photos')
                </div>
                <div class="col-md-3">
                    <div class="sticky-top sticky-offset">
                        @includeIf('site.frontend.event.desktop.blocks.price')
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    @includeIf('site.frontend.event.desktop.blocks.city')
                    @includeIf('site.frontend.event.desktop.blocks.similars')
                    @includeIf('site.frontend.event.desktop.blocks.reviews')
                </div>
            </div>
        </div>
    </div>
    {{-- End Desktop --}}

    {{-- Begin Mobile --}}
    <div class="d-block d-md-none">
        @includeIf('def.breadcrumb')

        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-9">

            </div>
        </div>
    </div>
    {{-- End Mobile --}}
@endsection


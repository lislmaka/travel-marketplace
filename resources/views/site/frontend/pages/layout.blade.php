@extends('layouts.app')

@section('content')
    {{-- Begin Desktop --}}
    <div class="container-xxl">
        <div class="d-none d-md-block">
            @includeIf('site.def.breadcrumb')

            <div class="row">
                <div class="col-md-9">
                    @includeIf('site.frontend.pages.desktop.blocks.page_info')
                </div>
                <div class="col-md-3">
                    @includeIf('site.frontend.pages.desktop.blocks.menu_pages')
                    @includeIf('site.frontend.pages.desktop.blocks.menu_categories')
                </div>
            </div>
        </div>
    </div>
    {{-- End Desktop --}}

    {{-- Begin Mobile --}}
    <div class="d-block d-md-none">
        @includeIf('site.def.breadcrumb')

        <div class="row">
            <div class="col-md-3">
                @includeIf('site.frontend.pages.mobile.blocks.menu_pages')
                @includeIf('site.frontend.pages.mobile.blocks.menu_categories')
            </div>
            <div class="col-md-9">
                @includeIf('site.frontend.pages.mobile.blocks.page_info')
            </div>
        </div>
    </div>
    {{-- End Mobile --}}
@endsection


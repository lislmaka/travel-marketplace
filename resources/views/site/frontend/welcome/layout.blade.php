@extends('layouts.app')

@section('main_page')
    {{-- Begin Desktop --}}
    @if ($agent->isDesktop())
        <div class="d-none d-md-block">
            @includeIf('site.frontend.welcome.desktop.blocks.main_banner')
            @includeIf('site.frontend.welcome.desktop.blocks.discount')
            @includeIf('site.frontend.welcome.desktop.blocks.benefits')
            @includeIf('site.frontend.welcome.desktop.blocks.popular_destinations')
            @includeIf('site.frontend.welcome.desktop.blocks.popular_variants')
            @includeIf('site.frontend.welcome.desktop.blocks.ideas')
{{--            @includeIf('frontend.welcome.desktop.blocks.reviews')--}}
{{--            @includeIf('frontend.welcome.desktop.blocks.map')--}}
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


@extends('layouts.app')

@section('main_page')
    {{-- Begin Desktop --}}
    @if ($agent->isDesktop())
        <div class="d-none d-md-block">
            @includeIf('site.frontend.welcome.desktop.blocks.main_banner')
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


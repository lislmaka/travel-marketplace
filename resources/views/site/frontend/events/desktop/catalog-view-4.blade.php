<div class="row row-cols-3 g-3 mb-3">
    @include('site.components.desktop.bock-events-vertically', ['events' => $events, 'hintPosition' => 'top', 'hintBtnPosition' => 0])
</div>

{{ $events->links() }}

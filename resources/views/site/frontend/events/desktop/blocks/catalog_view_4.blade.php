<div class="row row-cols-3 g-3 mb-3">
    @include('site.components.desktop.bock_events', ['events' => $events])
</div>

{{ $events->links() }}

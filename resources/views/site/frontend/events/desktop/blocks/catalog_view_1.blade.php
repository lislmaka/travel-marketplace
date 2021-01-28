@foreach($events as $event)
    <div class="card mb-3 my-border-left-info">
        <div class="card-header">
            <a href="{{ route('events.show', ['event' => $event->id]) }}"
               class="fw-bold text-decoration-none lead stretched-link"
               title="{{ $event->name }}">
                {{ Str::limit($event->name, rand(50, 200)) }}
            </a>
        </div>
    </div>
@endforeach

{{ $events->links() }}



<div>
    @if($show)
        <div class="btn-group me-3" role="group" aria-label="Basic example">
            <a class="btn btn-primary" href="#" role="button"
               data-bs-toggle="modal" data-bs-target="#eventsSeen">
                @lang('Избранное')
                <span class="badge bg-light text-muted">{{ count(session('events.events_seen')) }}</span>
            </a>
        </div>
    @endif
</div>


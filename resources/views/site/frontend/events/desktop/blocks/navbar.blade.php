<nav class="navbar navbar-expand-md navbar-light bg-light py-3 border-top">
    <div class="container-xxl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            {{-- Begin Event ViewMode --}}
            <div class="me-3">
                @lang('Режим каталога')
            </div>
            <div class="dropdown me-3">
                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    {!! Str::lower($events_views[$events_view_mode]['title']) !!}
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                    @foreach($events_views as $events_view)
                        <li>
                            <a class="dropdown-item {{ $events_view['active'] }}"
                               href="{{ route('events.view_mode', ['view' => $events_view['url']]) }}">
                                {!!  $events_view['title'] !!} {!!  $events_view['symbol'] !!}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            {{-- End Event ViewMode --}}

            {{-- Begin Event SortMode --}}
            <div class="me-3">
                @lang('Сортировка')
            </div>
            <div class="dropdown me-3">
                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    {!! Str::lower($events_sorts[$events_sort_mode]['title']) !!}
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                    @foreach($events_sorts as $events_sort)
                        <li>
                            <a class="dropdown-item {{ $events_sort['active'] }}"
                               href="{{ route('events.sort_mode', ['sort' => $events_sort['url']]) }}">
                                {!!  $events_sort['title'] !!} {!!  $events_sort['symbol'] !!}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            {{-- End Event SortMode --}}

        </div>
    </div>
</nav>

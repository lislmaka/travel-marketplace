<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent py-3 mt-3">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}" class="text-decoration-none">Главная</a>
        </li>
        @foreach($breadcrumbs as $breadcrumb)
            @if($loop->last)
                <li class="breadcrumb-item">
                    {{ Str::limit($breadcrumb['title'], 50) }}
                </li>
            @else
                @if($breadcrumb['url'])
                    <li class="breadcrumb-item">
                        <a href="{{ url($breadcrumb['url']) }}" class="text-decoration-none">
                            {{ Str::limit($breadcrumb['title'], 45) }}
                        </a>
                    </li>
                @else
                    <li class="breadcrumb-item">
                        {{ Str::limit($breadcrumb['title'], 45) }}
                    </li>
                @endif
            @endif
        @endforeach
    </ol>
</nav>

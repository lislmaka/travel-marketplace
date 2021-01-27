<div class="card border-light mb-3">
    <div class="card-header fw-bold lead">
        {{ $categoryInfo->name }}
    </div>
    <ul class="list-group list-group-flush">
        @foreach($categoryInfo->pages as $page)
            @if($pageInfo->slug == $page->slug)

                <a href="{{ route('pages.index', ['page_category' => $categoryInfo->url, 'page_info' => $page->slug]) }}"
                   class="list-group-item list-group-item-action active">
                    {{ Str::limit($page->title, 30) }}
                </a>
            @else
                <a href="{{ route('pages.index', ['page_category' => $categoryInfo->url, 'page_info' => $page->slug]) }}"
                   class="list-group-item list-group-item-action">
                    {{ Str::limit($page->title, 30) }}
                </a>
            @endif
        @endforeach
    </ul>
</div>

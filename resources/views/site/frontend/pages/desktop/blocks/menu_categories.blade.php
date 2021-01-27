<div class="card border-light mb-3">
    <div class="card-header fw-bold lead">
        @lang('Разделы')
    </div>
    <ul class="list-group list-group-flush">
        @foreach($categories as $category)
            @if($categoryInfo->url == $category->url)
                <a href="{{ route('pages.index', ['page_category' => $category->url]) }}"
                   class="list-group-item list-group-item-action active">
                    {{ Str::limit($category->name, 30) }}
                </a>
            @else
                <a href="{{ route('pages.index', ['page_category' => $category->url]) }}"
                   class="list-group-item list-group-item-action">
                    {{ Str::limit($category->name, 30) }}
                </a>
            @endif
        @endforeach
    </ul>
</div>

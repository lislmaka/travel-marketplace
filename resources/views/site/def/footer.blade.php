<div class="container-fluid bg-dark mt-5">
    <div class="container-xxl py-3">
        <div class="row">
            {{-- Сформировать массив категорий страниц с кол-вом станиц в каждой категории --}}
            {{-- Это нужно для формирования tooltip с кол-вом оставщихся страниц --}}
            {{-- Можно удалить за ненадобностью --}}
            @php
                $categoryPagesCount = array();
            @endphp
            @foreach($footerPageCategories as $pageCategory)
                @foreach($footerPages as $page)
                    @if($page->page_category_id == $pageCategory->id)
                        @if(array_key_exists($pageCategory->id, $categoryPagesCount))
                            @php
                                $categoryPagesCount[$pageCategory->id]++;
                            @endphp
                        @else
                            @php
                                $categoryPagesCount[$pageCategory->id] = 1;
                            @endphp
                        @endif
                    @endif
                @endforeach
            @endforeach
            {{-- --}}

            @php
                $maxShowPages = 5;
            @endphp

            @for ($columnNumber = 1; $columnNumber <= 3; $columnNumber++)
                <div class="col-md-4">
                    @foreach($footerPageCategories as $pageCategory)
                        @if($pageCategory->column != $columnNumber)
                            @continue
                        @endif

                        <div class="card bg-transparent border-0 text-white">
                            <div class="card-header h5 fw-bold bg-transparent">
                                <a href="{{ url($pageCategory->url) }}" class="text-white text-decoration-none"
                                   title="@lang($pageCategory->name)">
                                    {{Str::upper(__($pageCategory->name))}}
                                    @if($categoryPagesCount[$pageCategory->id] > $maxShowPages)
                                        @php
                                            $countShowPagesMore = $categoryPagesCount[$pageCategory->id] - $maxShowPages;
                                        @endphp
                                        <span class="badge bg-light fw-normal text-dark" data-toggle="tooltip"
                                              data-placement="top"
                                              title="@lang('Общее кол-во страниц :num', ['num' => $categoryPagesCount[$pageCategory->id]])">
                                            @lang('еще') {{ $countShowPagesMore }}
                                        </span>
                                    @endif
                                </a>
                            </div>
                            <ul class="list-group list-group-flush">
                                @php
                                    $countShowPages = 0;
                                @endphp
                                @foreach($footerPages as $page)
                                    @if($countShowPages >= $maxShowPages)
                                        @break
                                    @endif

                                    @if($page->page_category_id == $pageCategory->id)
                                        @php
                                            $countShowPages++;
                                        @endphp
                                        <li class="list-group-item bg-transparent">
                                            <a href="{{ url('/'.$pageCategory->slug.'/'.$page->slug) }}"
                                               class="text-white text-decoration-none" title="{{ $page->title }}">
                                                {{ Str::limit($page->title, 40) }}
                                            </a>
                                        </li>
                                    @endif

                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            @endfor
        </div>
    </div>
</div>

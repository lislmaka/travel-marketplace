<div class="container-fluid bg-dark mt-5">
    <div class="container-xxl py-3">
        <div class="row">
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
                                    @if($footerPagesInCategories[$pageCategory->id] > $maxShowPages)
                                        @php
                                            $countShowPagesMore = $footerPagesInCategories[$pageCategory->id] - $maxShowPages;
                                        @endphp
                                        <span class="badge bg-light fw-normal text-dark" data-toggle="tooltip"
                                              data-placement="top"
                                              title="@lang('Общее кол-во страниц :num', ['num' => $footerPagesInCategories[$pageCategory->id]])">
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
{{--                                            <a href="{{ url('/'.$pageCategory->url.'/'.$page->slug) }}"--}}
                                            <a href="{{ route('pages.index', ['page_category' => $pageCategory->url, 'page_info' => $page->slug]) }}"
                                               class="text-white text-decoration-none" title="{{ $page->title }}">
                                                {{ Str::limit($page->title, 35) }}
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

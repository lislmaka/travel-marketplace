<div class="mt-5">&nbsp;</div>

<div class="container-fluid">
    <div class="container-xl">
        <div class="my-5 d-flex justify-content-between align-items-center">
            <div class="w-100">
                <h2 class="h2 fw-bold">
                    @lang($header)

                    <div wire:loading>
                        <div class="spinner-grow text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>

                </h2>

                {{$slot}}
            </div>
            <div class="w-100">
                <ul class="nav nav-pills justify-content-end" id="myTab" role="tablist">
                    @if($topNames)
                        @foreach($topNames as $value)

                            @if($blockType == 'popular_countries')
                                @php
                                    $id = $value->country_id;
                                    $name = $value->country->name;
                                @endphp
                            @elseif($blockType == 'popular_cities')
                                @php
                                    $id = $value->city_id;
                                    $name = $value->city->name;
                                @endphp
                            @elseif($blockType == 'popular_categories')
                                @php
                                    $id = $value->category_id;
                                    $name = $value->category->name;
                                @endphp
                            @endif

                            @php
                                $active = '';
                                $class = 'badge bg-light text-muted';
                            @endphp
                            @if($id == $selectedItem)
                                @php
                                    $active = 'active';
                                    $class = 'badge bg-light text-muted';
                                @endphp
                            @endif

                            <li class="nav-item fw-bold" role="presentation">
                                <a class="nav-link {{ $active }}" id="home-tab"
                                   data-bs-toggle="tab" href="#home" role="tab"
                                   aria-controls="home" aria-selected="true"
                                   wire:click="selectTopEventsName({{ $id }})">
                                    {{ $name }}
                                    <span class="badge bg-light text-muted">
                                        {{ number_format($value->count, 0, '', ',') }}
                                    </span>
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>

@component('site.frontend.event.desktop.parts.bock-header',['header' => 'Карта маршрута', 'id' => 'roadmap'])
    <div class="mt-3 text-muted">
        @lang('Карта маршрута с описанием событий')
    </div>
@endcomponent


<div class="accordion" id="accordionExample">
    @foreach($roadmaps as $roadmap)
        @php($collapsed = 'collapsed')
        @php($show = '')

        @if($loop->first)
            @php($collapsed = '')
            @php($show = 'show')
        @endif

    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button {{ $collapsed }} fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $roadmap->section }}" aria-expanded="true" aria-controls="collapse{{ $roadmap->section }}">
                <span class="badge bg-primary me-3 rounded-pill">{{ $roadmap->section }}</span>
                {{ Str::limit($roadmap->title, 50) }}
            </button>
        </h2>
        <div id="collapse{{ $roadmap->section }}" class="accordion-collapse collapse {{ $show }}" aria-labelledby="heading{{ $roadmap->section }}" data-bs-parent="#accordionExample">
            <div class="accordion-body bg-white">
                {!! $roadmap->description !!}

                <div class="row row-cols-md-6 g-3 mt-3">
                    @php(shuffle($demo_images))
                    @foreach($demo_images as $demo_image)
                        @php($randCountOfImages = rand(3, 6))
                        @if($loop->index > $randCountOfImages)
                            @break
                        @endif
                        <div class="col">
                            <a href="{{ asset('images/demo/demo1/'.$demo_image->getBaseName()) }}" data-lightbox="roadmap_{{ $roadmap->section }}">
                                <img src="{{ asset('images/demo/demo1/'.$demo_image->getBaseName()) }}" class="img-thumbnail" alt="...">
                            </a>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    @endforeach
</div>

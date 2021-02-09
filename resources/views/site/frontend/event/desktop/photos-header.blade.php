<div class="row row-cols-md-2 g-1 ">
    @php(shuffle($demo_images))
    <div class="col-md-8 m-0 position-relative">
        @php($randImage = rand(1, count($demo_images) - 1))
        <a href="{{ asset('images/demo/demo1/'.$demo_images[$randImage]->getBaseName()) }}" data-lightbox="roadtrip">
            <img src="{{ asset('images/demo/demo1/'.$demo_images[$randImage]->getBaseName()) }}" class="img-fluid"
                 alt="...">
        </a>

        <div class="position-absolute bottom-0 start-0">
            <h1 class="card-header h2 fw-bold py-3 bg-light d-flex justify-content-start">
                <div class="me-3">
                    <img src="{{ $demo_faces[rand(1, count($demo_faces) - 1)] }}" class="img-thumbnail rounded-circle"
                         alt="..." width="{{ config('site.img-size-3') }}">
                </div>
                <div class="w-100">
                    {{ $event_info->name }}
                </div>
            </h1>
        </div>
    </div>
    <div class="col-md-4 m-0">
        <div class="row row-cols-md-1 g-1 m-0">
            @foreach($demo_images as $demo_image)
                @if($loop->index > 1)
                    @break
                @endif

                <div class="col">
                    <a href="{{ asset('images/demo/demo1/'.$demo_image->getBaseName()) }}"
                       data-lightbox="roadtrip">
                        <img src="{{ asset('images/demo/demo1/'.$demo_image->getBaseName()) }}" class="img-fluid"
                             alt="...">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>

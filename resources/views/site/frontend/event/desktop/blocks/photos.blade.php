@component('site.frontend.event.desktop.parts.bock_header',['header' => 'Фотографии', 'id' => 'photos'])
    <div class="mt-3 text-muted">
        @lang('Фотографии сделанные нашими клиентами')
    </div>
@endcomponent

<div class="row row-cols-md-4 g-3">
    @php(shuffle($demo_images))
    @foreach($demo_images as $demo_image)
        @if($loop->index > 7)
            @break
        @endif
    <div class="col"><img src="{{ asset('images/demo/demo1/'.$demo_image->getBaseName()) }}" class="img-thumbnail" alt="..."></div>
    @endforeach
</div>

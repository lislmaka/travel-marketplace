<div class="row row-cols-md-4 g-1 mt-0">
    @php(shuffle($demo_images))
    @foreach($demo_images as $demo_image)
        @if($loop->index > 7)
            @break
        @endif
    <div class="col"><img src="{{ asset('images/demo/demo1/'.$demo_image->getBaseName()) }}" class="img-fluid" alt="..."></div>
    @endforeach
</div>

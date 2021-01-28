<div class="container-fluid">
    <div class="container-xxl">
        <div class="my-5">
            <h2 class="h2 fw-bold" id="{{ $id }}" data-bs-offset="400">
                @lang($header)
            </h2>

            {{$slot}}
        </div>
    </div>
</div>

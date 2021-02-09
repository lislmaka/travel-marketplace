@component('frontend.event.desktop.parts.bock_header',['header' => 'Заказ тура', 'id' => 'order'])
    <div class="mt-3 text-muted">
        @lang('Выберите необходимые опции для заказа тура')
    </div>
@endcomponent

<input type="hidden" id="event_options" value="{{ $event_options_json }}">

<div class="card border-light">
    <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="fw-bold lead">
                @lang('Опция')
            </div>
            <div class="fw-bold lead">
                @lang('Цена')
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div class="fw-bold">
                @lang('Кол-во человек')
            </div>
            <div class="w-25">
                <input type="text" class="form-control" aria-label="" aria-describedby="" value="1" v-model="quantity">
            </div>
        </li>
        @foreach($event_options as $event_option)
            <label class="list-group-item d-flex justify-content-between align-items-start">
                <div>
                    <div class="fw-bold">
                        <input class="form-check-input me-1" type="checkbox" value="">
                        {{ $event_option->option->name }}
                    </div>
                    <div class="small text-muted">
                        {{ Str::limit($event_option->option->description, 150) }}
                    </div>
                </div>
                <span class="badge bg-primary rounded-pill">
                    {{ $event_option->price }}
                </span>
            </label>
        @endforeach
    </ul>
</div>

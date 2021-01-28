@component('site.frontend.event.desktop.parts.bock_header',['header' => 'Заказ тура', 'id' => 'order'])
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

        <label class="list-group-item d-flex justify-content-between align-items-start"
               v-for="event_option in event_options">
            <div>
                <div class="fw-bold">
                    <input class="form-check-input me-1" type="checkbox" v-bind:value="event_option.price" v-model="event_options_checked">
                    @{{ event_option.name }}
                </div>
                <div class="small text-muted">
                    @{{ event_option.description | truncate(100) }}
                </div>
            </div>
            <span class="badge bg-primary rounded-pill">
                <i class="fas fa-ruble-sign"></i>
                @{{ formatPrice(event_option.price) }}
            </span>
        </label>

    </ul>
</div>

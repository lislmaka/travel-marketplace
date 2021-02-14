@component('site.frontend.event.desktop.parts.bock-header',['header' => 'Заказ тура', 'id' => 'order'])
    <div class="mt-3 text-muted">
        @lang('Выберите необходимые опции для заказа тура')
    </div>
@endcomponent

<input type="hidden" id="event_options_price" value="{{ $event_options_price }}">
<input type="hidden" id="event_options_free" value="{{ $event_options_free }}">

<div class="card border-light mb-3">
    <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex justify-content-between align-items-start list-group-item-secondary">
            <div class="fw-bold lead">
                @lang('Основные данные')
                @livewire('btn-show-help',['helpId' => '1'])
            </div>

            <div class="fw-bold lead">

            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div class="fw-bold">
                @lang('Кол-во человек')
            </div>
            <div class="row d-flex justify-content-end align-items-center">
                <div class="col-md-6">
                    <div class="input-group">
                        <button class="btn btn-secondary" type="button" v-on:click="downCount">-</button>
                        <input type="text" class="form-control text-center" v-model="quantity" disabled>
                        <button class="btn btn-secondary" type="button" v-on:click="upCount">+</button>
                    </div>
                </div>
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="fw-bold">
                @lang('Дата')
                <div class="small text-muted fw-normal">
                    @lang('Выберите интересующую вас дату проведения мероприятия')
                    <br>
                    @lang('Диапазон дат на этот тур с '.now()->format('Y-m-d').' по '.now()->addDays(rand(5, 10))->format('Y-m-d'))
                </div>
            </div>
            <div class="row d-flex justify-content-end align-items-center">
                <div class="col-md-12">
                    <input type="date" value="{{ now()->format('Y-m-d') }}" min="{{ now()->format('Y-m-d') }}"
                           max="{{ now()->addDays(30)->format('Y-m-d') }}">
                </div>
            </div>
        </li>
        {{-- Begin optin with free --}}
        <label class="list-group-item d-flex justify-content-between align-items-start"
               v-for="(event_option_free, index) in event_options_free"
               v-bind:class="[event_option_free.active ? 'list-group-item-primary' : '']"
               v-if="event_option_free.free">
            <div>
                <div class="fw-bold">
                    <input class="form-check-input me-1" type="checkbox" v-bind:value="index"
                           v-model="event_options_checked_free">
                    @{{ event_option_free.name }}
                </div>
                <div class="small text-muted">
                    @{{ event_option_free.description | truncate(100) }}
                </div>
            </div>

            <div v-if="event_option_free.free">
                <span class="badge bg-success rounded-pill">
                    @lang('Бесплатно')
                </span>
            </div>
        </label>
        {{-- End optin with free --}}
    </ul>
</div>

<div class="card border-light"
     v-if="event_options_price.length > 0">
    <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex justify-content-between align-items-start list-group-item-secondary">
            <div class="fw-bold lead">
                @lang('Опция')
                @livewire('btn-show-help',['helpId' => '1'])
            </div>
            <div class="fw-bold lead">
                @lang('Цена')
            </div>
        </li>

        {{-- Begin optin with price --}}
        <label class="list-group-item d-flex justify-content-between align-items-start"
               v-for="(event_option_price, index) in event_options_price"
               v-bind:class="[event_option_price.active ? 'list-group-item-primary' : '']">
            <div>
                <div class="fw-bold">
                    <input class="form-check-input me-1" type="checkbox" v-bind:value="index"
                           v-model="event_options_checked_price">
                    @{{ event_option_price.name }}
                </div>
                <div class="small text-muted">
                    @{{ event_option_price.description | truncate(100) }}
                </div>
            </div>

            <div v-if="event_option_price.price">
                <span class="badge rounded-pill"
                      v-bind:class="[event_option_price.active ? 'bg-primary' : 'bg-light text-muted']">
                    @{{ formatPrice(event_option_price.price) }}
                    <i class="fas fa-ruble-sign"></i>
                </span>
            </div>
        </label>
        {{-- End optin with price --}}
    </ul>
</div>

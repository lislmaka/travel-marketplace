<form method="POST" action="#">
    @csrf
    <div class="card border-light mb-3">
        <div class="card-header fw-bold lead">
            @lang('Поиск')
        </div>
        <div class="card-body">

            <div class="mb-3">

                <select class="form-select" name="projects_view_mode">
                    <option value="">Что-то ищем</option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
            </div>

            <div class="">
                <select class="form-select" name="projects_sort_mode">
                    <option value="">Что-то ищем</option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>

                </select>
            </div>

        </div>

        {{-- Begin Тематические подборки --}}
{{--        <div class="card-body pb-1 fw-bold">--}}
{{--            @lang('Тематические подборки')--}}
{{--        </div>--}}
{{--        <div class="list-group list-group-flush">--}}
{{--            <label class="list-group-item d-flex justify-content-between align-items-center">--}}
{{--                <div>--}}
{{--                    <input class="form-check-input me-1" type="checkbox" value="">--}}
{{--                    @lang('Популярные направления')--}}
{{--                </div>--}}
{{--                <span class="badge bg-primary rounded-pill">{{ number_format(rand(100, 1000), 0, '', ',') }}</span>--}}
{{--            </label>--}}
{{--            <label class="list-group-item d-flex justify-content-between align-items-center">--}}
{{--                <div>--}}
{{--                    <input class="form-check-input me-1" type="checkbox" value="">--}}
{{--                    @lang('Популярные варианты отдыха')--}}
{{--                </div>--}}
{{--                <span class="badge bg-primary rounded-pill">{{ number_format(rand(100, 1000), 0, '', ',') }}</span>--}}
{{--            </label>--}}
{{--            <label class="list-group-item d-flex justify-content-between align-items-center">--}}
{{--                <div>--}}
{{--                    <input class="form-check-input me-1" type="checkbox" value="">--}}
{{--                    @lang('Идеи для новых открытий')--}}
{{--                </div>--}}
{{--                <span class="badge bg-primary rounded-pill ms-3">{{ number_format(rand(100, 1000), 0, '', ',') }}</span>--}}
{{--            </label>--}}
{{--        </div>--}}
        {{-- End Тематические подборки --}}



        <div class="card-footer text-center bg-transparent border-0">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i>
                @lang('Поиск туров')
            </button>
            <button type="submit" class="btn btn-sm btn-link">
                @lang('Настойки по умолчанию')
            </button>
        </div>

    </div>
</form>


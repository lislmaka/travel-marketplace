<nav class="navbar navbar-expand-md navbar-light bg-light py-2 border-top" id="navbar-event">
    <div class="container-xxl">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="#description" onclick="gotoHref(this)">@lang('Описание')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#roadmap" onclick="gotoHref(this)">@lang('Карта маршрута')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#author" onclick="gotoHref(this)">@lang('Автор')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#order" onclick="gotoHref(this)">@lang('Заказ')</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#photos" onclick="gotoHref(this)">@lang('Фотографии')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#city" onclick="gotoHref(this)">
                    {{ $event_info->city->name }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#similar_author" onclick="gotoHref(this)">@lang('Другие туры автора')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#similar_city" onclick="gotoHref(this)">@lang('Похожие туры')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#reviews" onclick="gotoHref(this)">@lang('Отзывы')</a>
            </li>
        </ul>
    </div>
</nav>

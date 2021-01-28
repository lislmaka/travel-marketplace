<nav class="navbar navbar-expand-md navbar-light bg-light py-2 border-top" id="navbar-event">
    <div class="container-xxl">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="#description" onclick="gotoHref(this)">Описание</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#order" onclick="gotoHref(this)">Заказ тура</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#photos" onclick="gotoHref(this)">Фотографии тура</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#city" onclick="gotoHref(this)">
                    {{ $event_info->city->name }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#similars" onclick="gotoHref(this)">Похожие туры</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#reviews" onclick="gotoHref(this)">Отзывы</a>
            </li>
        </ul>
    </div>
</nav>

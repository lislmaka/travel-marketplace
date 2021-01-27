<div class="card border-light">
    <h1 class="card-header h2 fw-bold py-3">
        {{ $pageInfo->title }}
    </h1>

    <ul class="list-group list-group-horizontal d-flex">
        <li class="list-group-item flex-fill rounded-0 border-start-0 border-top-0 border-bottom">
            <span class="fw-bold">
                @lang('Дата создания')
            </span>

            <span class="badge bg-light fw-normal text-dark" data-toggle="tooltip" data-placement="top"
                  title="{{$pageInfo->created_at}}">
                {{ $pageInfo->created_at->diffForHumans() }}
            </span>
        </li>
        <li class="list-group-item flex-fill rounded-0 border-left-0 border-top-0 border-bottom">
            <span class="fw-bold">
                @lang('Дата обновления')
            </span>

            <span class="badge bg-light fw-normal text-dark" data-toggle="tooltip" data-placement="top"
                  title="{{$pageInfo->updated_at}}">
                {{ $pageInfo->updated_at->diffForHumans() }}
            </span>
        </li>
        <li class="list-group-item flex-fill rounded-0 border-end-0 border-top-0 border-start-0 border-bottom">
            <div class="ya-share2" data-curtain data-color-scheme="whiteblack"
                 data-services="vkontakte,facebook,telegram,twitter,viber,whatsapp"></div>
        </li>
    </ul>

    <div class="card-body">
        <p class="card-text">{!! $pageInfo->text !!} </p>
    </div>
</div>

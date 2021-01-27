<div class="mt-5">&nbsp;</div>

<div class="container-fluid">
    <div class="container-xl">
        <div class="my-5 d-flex justify-content-between align-items-center">
            <div>
                <h2 class="h2 fw-bold">
                    @lang($header)
                </h2>

                {{$slot}}
            </div>
            <div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item fw-bold" role="presentation">
                        <a class="nav-link active" id="home-tab"
                           data-bs-toggle="tab" href="#home" role="tab"
                           aria-controls="home" aria-selected="true">
                            Мир
                            <span class="badge bg-transparent text-muted">
                                {{ number_format(rand(10, 1000), 0, '', ',') }}
                            </span>
                        </a>
                    </li>
                    <li class="nav-item fw-bold" role="presentation">
                        <a class="nav-link" id="profile-tab"
                           data-bs-toggle="tab" href="#profile" role="tab"
                           aria-controls="profile" aria-selected="false">
                            Россия
                            <span class="badge bg-transparent text-muted">
                                {{ number_format(rand(10, 1000), 0, '', ',') }}
                            </span>
                        </a>
                    </li>
                    <li class="nav-item fw-bold" role="presentation">
                        <a class="nav-link" id="contact-tab"
                           data-bs-toggle="tab" href="#contact" role="tab"
                           aria-controls="contact" aria-selected="false">
                            Москва
                            <span class="badge bg-transparent text-muted">
                                {{ number_format(rand(10, 1000), 0, '', ',') }}
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

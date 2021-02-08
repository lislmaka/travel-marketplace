<table class="table table-hover">
    <tbody>

        <tr>
            <td class="fw-bold">
                @lang('Название тура')
            </td>
            @foreach($events['name'] as $key => $value)
                <td>
                    <a href="{{ route('events.show', ['event' => $events['id'][$key]]) }}"
                       class="fw-bold text-decoration-none"
                       title="{{ $value }}">
                        {{ Str::limit($value, 40) }}
                    </a>
                </td>
            @endforeach
        </tr>

    </tbody>
</table>

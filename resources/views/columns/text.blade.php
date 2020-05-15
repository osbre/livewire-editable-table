<td class="p-0">
    @isset($render)
        {!! $render !!}
    @else
        <input type="text"
               x-model="{{ $key }}"
               x-on:change="update({{ $eloquentKey }}, '{{ $column }}')"
               value="{{ $value }}"
               class="form-control mw-100 border-0 no-resize">
    @endisset
</td>

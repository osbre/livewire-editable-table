<td class="p-0">
    <input type="text"
           x-model="{{ $key }}"
           x-on:change="update({{ $eloquentKey }}, '{{ $column }}')"
           value="{{ $value }}"
           class="form-control mw-100 border-0 no-resize">
</td>

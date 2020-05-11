<td class="p-0">
    <input type="text"
           x-model="{{ $key }}"
           x-on:change="update({{ $eloquentKey }}, '{{ $column }}')"
           value="{{ $value }}"
           class="form-control border-0 no-resize">
</td>

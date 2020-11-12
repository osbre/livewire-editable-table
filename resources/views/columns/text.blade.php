<td class="p-0">
    @isset($render)
        {!! $render($value) !!}
    @else
        <input type="text"
               wire:change="update('{{ $key }}', $event.target.value)"
               value="{{ $value }}"
               class="form-control mw-100 border-0 no-resize">
    @endisset
</td>

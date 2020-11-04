<td class="p-0">
    <select class="form-control mw-100 border-0 no-resize"
            wire:model="{{ $key }}">
        @empty($options)
            <option selected></option>
        @endif
        @foreach($options as $key => $title)
            <option
                @if($value === $key) selected="selected"@endif
                value="{{ $key }}">
                {{ $title }}
            </option>
        @endforeach
    </select>
</td>

<td class="p-0">
    <select class="form-control mw-100 border-0 no-resize"
            x-model="{{ $key }}"
            x-on:change="update({{ $eloquentKey }}, '{{ $column }}')">
        @foreach($options as $key => $title)
            <option @if($value === $key) selected="selected"@endif value="{{ $key }}">{{ $title }}</option>
        @endforeach
    </select>
</td>

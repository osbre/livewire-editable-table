<table class="table table-bordered border-right-0">
    <thead>
    <tr>
        @foreach($columns as $column)
            <th scope="col" class="text-capitalize">
                {{ $column->attribute }}
            </th>
        @endforeach
    </tr>
    </thead>
    <tbody>
        @foreach($rows as $row)
            <tr>
                @foreach($columns as $column)
                    <td class="p-0">
                        <input type="text"
                               wire:model="items.{{ $row->id }}.{{ $column->attribute }}"
                               wire:keydown.enter="update"
                               value="{{ $row->{$column->attribute} }}"
                               class="form-control border-0 no-resize">
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>

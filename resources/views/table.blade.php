<div>
    <table class="table table-bordered border-right-0">
        <thead>
        <tr>
            @foreach($columns as $column)
                {!! $column->renderTh() !!}
            @endforeach
        </tr>
        </thead>
        <tbody x-data='editableTable()'>
        @foreach($rows as $row)
            <tr>
                @foreach($columns as $column)
                    {!! $column->renderTd($row) !!}
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
    <script>
        function editableTable() {
            return {
                rows: @json($rows),
                update(index, column) {
                    let eloquentKey = this.rows[index].eloquentKey,
                        data = {
                            [column]: this.rows[index][column],
                            'model': '{{ $model }}'
                        };

                    fetch(`{{ url('/api/editable-table') }}/${eloquentKey}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(data),
                    });
                }
            }
        }
    </script>

    @if($paginator)
        {{ $paginator->links() }}
    @endif
</div>

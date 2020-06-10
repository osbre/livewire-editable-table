<div>
    <table class="table table-bordered border-right-0">
        <thead>
        <tr>
            @foreach($columns as $column)
                {!! $column->renderTh() !!}
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach($rows as $row)
            <tr>
                @foreach($columns as $column)
                    {!! $column->renderTd($row, $loop->parent) !!}
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

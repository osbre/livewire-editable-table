<?php

namespace Ostap\EditableTable\Test;

use Illuminate\Database\Eloquent\Builder;
use Ostap\EditableTable\Columns\Text;
use Ostap\EditableTable\EditableTable;

class TestTableComponent extends EditableTable
{
    public function query(): Builder
    {
        return TestModel::query();
    }

    public function columns(): array
    {
        return [
            Text::make('Name'),
        ];
    }
}

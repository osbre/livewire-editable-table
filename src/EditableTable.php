<?php

namespace Ostap\EditableTable;

use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

abstract class EditableTable extends Component
{
    public function getRowsProperty(): array
    {
        return $this->query()
            ->get()
            ->map(fn($model) => $model->toArray())
            ->toArray();
    }

    public function getColumnsProperty(): array
    {
        return $this->columns();
    }

    public abstract function query(): Builder;

    public abstract function columns(): array;

    public function updated(string $key, string $value)
    {
        [$variable, $index, $property] = explode('.', $key);

        $primaryKeyName = $this->query()->getModel()->getKeyName();
        $primaryKeyValue = $this->rows[$index][$primaryKeyName];

        $this->query()->where($primaryKeyName, $primaryKeyValue)->update([$property => $value]);
    }

    public function render()
    {
        return view('editable-table::table');
    }
}

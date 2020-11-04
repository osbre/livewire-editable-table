<?php

namespace Ostap\EditableTable;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

abstract class EditableTable extends Component
{
    public function getRowsProperty(): array
    {
        return $this->query()
            ->get()
            ->toArray();
    }

    public function getColumnsProperty(): array
    {
        return $this->columns();
    }

    public function getStylesProperty(): array
    {
        return $this->styles();
    }

    public abstract function query(): Builder;

    public abstract function columns(): array;

    public function styles(): array
    {
        return [
            'table' => 'table table-bordered border-right-0',
            'wrapper' => null,
        ];
    }

    public function updated(string $key, string $value)
    {
        [$variable, $index, $property] = explode('.', $key);

        $primaryKeyName = $this->query()->getModel()->getKeyName();
        $primaryKeyValue = $this->rows[$index][$primaryKeyName];

        $this->query()->where($primaryKeyName, $primaryKeyValue)->update([$property => $value]);
    }

    public function render(): Renderable
    {
        return view('editable-table::table');
    }
}

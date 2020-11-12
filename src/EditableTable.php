<?php

namespace Ostap\EditableTable;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

abstract class EditableTable extends Component
{
    use WithRowsUpdates;

    public abstract function query(): Builder;

    public abstract function columns(): array;

    public function getColumnsProperty(): array
    {
        return $this->columns();
    }

    public function getStylesProperty(): array
    {
        return $this->styles();
    }

    public function styles(): array
    {
        return [
            'table' => 'table table-bordered border-right-0',
            'wrapper' => null,
        ];
    }

    public function render(): Renderable
    {
        return view('editable-table::table');
    }
}

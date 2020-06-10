<?php

namespace Ostap\EditableTable;

use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

abstract class EditableTable extends Component
{
    public array $rows;

    /**
     * We need it to leave mount() method empty.
     */
    public function __construct($id)
    {
        parent::__construct($id);

        $this->rows = $this->query()
            ->get()
            ->map(fn($model) => $model->toArray())
            ->toArray();
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
        return view('editable-table::table', [
            'columns' => $this->columns(),
            'rows' => $this->rows,
        ]);
    }
}

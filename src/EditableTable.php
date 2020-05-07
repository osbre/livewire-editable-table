<?php

namespace Ostap\LivewireEditableTable;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

abstract class EditableTable extends Component
{
    public ?array $items;

    public function update()
    {
        $this->query()->find(array_keys($this->items))->each(function (Model $model) {
            $model->update($this->items[$model->id]);
        });
    }

    public abstract function query(): Builder;

    /** @return Column[] */
    public abstract function columns(): array;

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('editable-table::table', [
            'columns' => $this->columns(),
            'rows' => $this->query()->latest()->get(),
        ]);
    }
}

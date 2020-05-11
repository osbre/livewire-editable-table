<?php

namespace Ostap\EditableTable;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\View\Component;

abstract class EditableTable extends Component
{
    public string $orderBy = 'created_at';

    public bool $paginate = false;

    public int $perPage = 15;

    protected LengthAwarePaginator $paginator;

    public abstract function query(): Builder;

    public abstract function columns(): array;

    public function render()
    {
        return view('editable-table::table', [
            'columns' => $this->columns(),
            'rows' => $this->getRows(),
            'paginator' => $this->paginator,
            'model' => Crypt::encrypt(get_class($this->query()->getModel())),
        ]);
    }

    protected function getRows(): array
    {
        $query = $this->query()->orderBy('created_at', 'desc');

        if ($this->paginate) {
            $rows = $this->paginator = $query->paginate($this->perPage);
        } else {
            $rows = $query->get();
        }

        return $rows->mapWithKeys(function (Model $model) {
            $data = array_merge($model->toArray(), [
                'eloquentKey' => $model->getKey(),
            ]);
            return [$model->id => $data];
        })->toArray();
    }
}

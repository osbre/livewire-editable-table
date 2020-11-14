<?php

namespace Ostap\EditableTable;

trait WithRowsUpdates
{
    public array $rows;

    public function mountWithRowsUpdates()
    {
        $this->rows = $this->query()->get()->toArray();
    }

    public function update($key, $value)
    {
        [$variable, $index, $property] = explode('.', $key);

        $primaryKeyName = $this->query()->getModel()->getKeyName();
        $primaryKeyValue = $this->rows[$index][$primaryKeyName];

        $this->query()->where($primaryKeyName, $primaryKeyValue)->update([$property => $value]);

        $this->mountWithRowsUpdates();

        $this->dispatchBrowserEvent('row-updated');
    }
}

<?php

namespace Ostap\EditableTable\Columns;

class Select extends Column
{
    public string $view = 'editable-table::columns.select';

    public function options(array $options): self
    {
        $this->variables['options'] = $options;

        return $this;
    }
}

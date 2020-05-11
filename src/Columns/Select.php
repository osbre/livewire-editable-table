<?php

namespace Ostap\EditableTable\Columns;

class Select extends Column
{
    public array $options;

    public static string $view = 'editable-table::columns.select';

    public function options(array $options): self
    {
        $this->options = $options;

        return $this;
    }

    public function tdData(array $model): array
    {
        return array_merge([
            'options' => $this->options,
        ], parent::tdData($model));
    }
}

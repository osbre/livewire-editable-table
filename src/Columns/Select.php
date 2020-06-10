<?php

namespace Ostap\EditableTable\Columns;

class Select extends Column
{
    public array $options = [];

    public static string $view = 'editable-table::columns.select';

    public function options(array $options): self
    {
        $this->options = $options;

        return $this;
    }

    public function tdData(array $attributes, object $loop): array
    {
        $data = parent::tdData($attributes, $loop);

        $data['options'] = $this->options;
        $data['empty'] = !array_key_exists($data['value'], $this->options);

        return $data;
    }
}

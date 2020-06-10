<?php

namespace Ostap\EditableTable\Columns;

use Closure;
use Illuminate\Support\Arr;

class Text extends Column
{
    public static string $view = 'editable-table::columns.text';

    protected ?Closure $render = null;

    public function render(Closure $render)
    {
        $this->render = $render;
        return $this;
    }

    public function tdData(array $attributes, $loop): array
    {
        $data = parent::tdData($attributes, $loop);

        if ($this->render) {
            $render = with($data['value'], $this->render);

            return Arr::add($data, 'render', $render);
        }

        return $data;
    }
}

<?php

namespace Ostap\EditableTable\Columns;

use Closure;

class Text extends Column
{
    public static string $view = 'editable-table::columns.text';

    protected ?Closure $render = null;

    public function render(Closure $render)
    {
        $this->render = $render;
        return $this;
    }

    public function tdData(array $model): array
    {
        $data = parent::tdData($model);

        return array_merge($data, [
            'render' => $this->render
                ? with($data['value'], $this->render)
                : null,
        ]);
    }
}

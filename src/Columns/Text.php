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
        return array_merge(parent::tdData($model), [
            'render' => $this->render
                ? with(parent::tdData($model), $this->render)
                : null,
        ]);
    }
}

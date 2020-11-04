<?php

namespace Ostap\EditableTable\Columns;

class Text extends Column
{
    public string $view = 'editable-table::columns.text';

    public function render(\Closure $render)
    {
        $this->variables['render'] = $render;

        return $this;
    }
}

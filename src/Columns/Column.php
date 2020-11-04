<?php

namespace Ostap\EditableTable\Columns;

use Illuminate\Support\Str;
use Ostap\EditableTable\Makeable;

abstract class Column
{
    use Makeable;

    /**
     * Blade view path
     * @var string
     */
    public string $view;

    /**
     * Appears in the table header
     * @var string
     */
    public string $title;

    /**
     * Used in updates
     * @var string
     */
    public string $name;

    /**
     * Data what passes to view
     * @var array
     */
    public array $variables = [];

    public function __construct(string $title, string $name = null)
    {
        $this->title = $title;
        $this->name = $name ?? Str::of($title)->snake()->lower();
    }

    public function renderTh(): string
    {
        return view('editable-table::columns.head', [
            'name' => $this->title,
        ]);
    }

    public function renderTd(array $model, object $loop)
    {
        $data = array_merge([
            'value' => $model[$this->name] ?? '',
            'loop'  => $loop,
            'key'   => "rows.{$loop->index}.{$this->name}",
            'model' => $model,
        ], $this->variables);

        return view($this->view, $data);
    }
}

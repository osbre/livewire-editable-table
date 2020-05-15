<?php

namespace Ostap\EditableTable\Columns;

use Illuminate\Support\Str;
use Ostap\EditableTable\Makeable;

abstract class Column
{
    use Makeable;

    /**
     * Template path to render with Blade
     * @var string
     */
    public static string $view;

    /**
     * The title will appear in the table header
     * @var string
     */
    public string $title;

    /**
     * Model property name, will be used in updates
     * @var string
     */
    public string $name;

    public function __construct(string $title, string $name = null)
    {
        $this->title = $title;
        $this->name = $name ?? Str::lower(Str::snake($title));
    }

    public function thData(): array
    {
        return [
            'name' => $this->title,
        ];
    }

    public function tdData(array $model): array
    {
        return [
            'value' => $model[$this->name] ?? '',
            'key' => "rows[{$model['eloquentKey']}].{$this->name}",
            'column' => $this->name,
            'eloquentKey' => $model['eloquentKey'],
        ];
    }

    public function renderTh(): string
    {
        return view('editable-table::columns.head', $this->thData());
    }

    public function renderTd(array $model)
    {
        return view(static::$view, $this->tdData($model));
    }
}

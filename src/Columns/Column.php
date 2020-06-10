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
     * Column name, will be used in updates
     * @var string
     */
    public string $name;

    public function __construct(string $title, string $name = null)
    {
        $this->title = $title;
        $this->name = $name ?? Str::of($title)->snake()->lower();
    }

    public function thData(): array
    {
        return [
            'name' => $this->title,
        ];
    }

    public function tdData(array $attributes, object $loop): array
    {
        return [
            'value' => $attributes[$this->name] ?? '',
            'loop' => $loop,
            'key' => "rows.{$loop->index}.{$this->name}",
            'attributes' => $attributes,
        ];
    }

    public function renderTh(): string
    {
        return view('editable-table::columns.head', $this->thData());
    }

    public function renderTd(array $model, object $loop)
    {
        return view(static::$view, $this->tdData($model, $loop));
    }
}

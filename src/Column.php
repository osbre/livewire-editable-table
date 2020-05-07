<?php

namespace Ostap\LivewireEditableTable;

use Illuminate\Support\Str;

class Column
{
    use Makeable;

    public string $name;

    public string $attribute;

    public function __construct(string $name, string $attribute = null)
    {
        $this->name = $name;
        $this->attribute = $attribute ?? Str::lower(Str::snake($name));
    }
}

<?php

namespace Ostap\EditableTable;

trait Makeable
{
    public static function make(...$parameters)
    {
        return new static(...$parameters);
    }
}

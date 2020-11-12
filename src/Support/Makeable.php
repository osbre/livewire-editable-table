<?php

namespace Ostap\EditableTable\Support;

trait Makeable
{
    public static function make(...$parameters)
    {
        return new static(...$parameters);
    }
}

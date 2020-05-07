<?php

namespace Ostap\LivewireEditableTable;

trait Makeable
{
    public static function make(...$parameters)
    {
        return new static(...$parameters);
    }
}

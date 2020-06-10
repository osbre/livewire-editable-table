<?php

namespace Ostap\EditableTable;

use Illuminate\Support\ServiceProvider as Provider;

class EditableTableServiceProvider extends Provider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'editable-table');
    }
}

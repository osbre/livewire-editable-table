<?php

namespace Ostap\EditableTable;

use Illuminate\Support\ServiceProvider as Provider;

class ServiceProvider extends Provider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'editable-table');
        $this->loadRoutesFrom(__DIR__.'/Http/routes.php');
    }
}

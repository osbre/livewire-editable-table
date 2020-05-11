<?php

use Illuminate\Routing\Router;

Route::group([
    'namespace' => 'Ostap\EditableTable\Http\Controllers',
    'prefix' => 'api',
], function (Router $router) {
    $router->put('editable-table/{resource}', UpdateModel::class)->name('editable-table.update');
});

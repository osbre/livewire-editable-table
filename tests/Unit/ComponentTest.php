<?php

use Livewire\Livewire;
use Ostap\EditableTable\Test\{
    TestCase,
    TestModel,
    TestTableComponent,
};

uses(TestCase::class);

it('update model', function () {
    Livewire::test(TestTableComponent::class)->set('rows.1.name', 'new value');

    assert(TestModel::first()->name, 'new value');
});

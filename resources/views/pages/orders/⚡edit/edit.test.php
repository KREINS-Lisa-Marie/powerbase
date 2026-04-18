<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::orders.edit')
        ->assertStatus(200);
});



it('verifies that the orders edit page is showing content elements in the right order', function () {
    Livewire::test('pages::orders.edit')
        ->assertStatus(200)
        ->assertSee(['Informations générales', 'Pour qui', 'Nom du projet', 'Produits commandés', 'Enregistrer']);
});

<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::orders.create')
        ->assertStatus(200);
});


it('verifies that the orders create page is showing content elements in the right order', function () {
    Livewire::test('pages::orders.create')
        ->assertStatus(200)
        ->assertSee(['Informations générales', 'Pour qui', 'Nom du projet', 'Produits à commander', 'Créer la commande']);
});

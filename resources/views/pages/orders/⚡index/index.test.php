<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::orders.index')
        ->assertStatus(200);
});


it('verifies that the orders index page is showing content elements in the right order', function () {
    Livewire::test('pages::orders.index')
        ->assertStatus(200)
        ->assertSee(['Créer une commande', 'Trier', 'Rechercher', 'Commandé par', 'Nombre', 'Commandé le', 'Statut']);
});

<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::products.index')
        ->assertStatus(200);
});




it('verifies that the products index page is showing content elements in the right order', function () {
    Livewire::test('pages::products.index')
        ->assertStatus(200)
        ->assertSee(['Créer un produit', 'Trier', 'Rechercher', 'Nom du produit', 'Stock', 'En stock depuis', 'Mise à jour']);
});

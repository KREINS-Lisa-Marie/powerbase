<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::products.show')
        ->assertStatus(200);
});





it('verifies that the products show page is showing content elements in the right order', function () {
    Livewire::test('pages::products.show')
        ->assertStatus(200)
        ->assertSee(['Informations générales', 'Nom du produit', 'img', 'Modifier le produit', 'Supprimer le produit']);
});

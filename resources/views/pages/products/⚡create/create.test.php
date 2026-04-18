<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::products.create')
        ->assertStatus(200);
});


it('verifies that the products edit page is showing content elements in the right order', function () {
    Livewire::test('pages::products.edit')
        ->assertStatus(200)
        ->assertSee(['Informations générales', 'Nom du produit', 'Image', 'Enregistrer']);
});

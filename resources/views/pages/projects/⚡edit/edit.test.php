<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::projects.edit')
        ->assertStatus(200);
});


it('verifies that the projects edit page is showing content elements in the right order', function () {
    Livewire::test('pages::projects.edit')
        ->assertStatus(200)
        ->assertSee(['Informations générales', 'Nom projet', 'Type projet', 'Description', 'Produits utilisés', 'Ajouter',  'Enregistrer']);
});

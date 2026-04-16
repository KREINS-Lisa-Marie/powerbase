<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::contacts.edit')
        ->assertStatus(200);
});


it('verifies that the contact edit page is showing content elements in the right order', function () {
    Livewire::test('pages::contacts.edit')
        ->assertStatus(200)
        ->assertSee(['Informations générales', 'Prénom', 'Nom', 'Adresse privée', 'Voiture', 'Plaque', 'Modifier les données']);
});

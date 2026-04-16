<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::contacts.create')
        ->assertStatus(200);
});


it('verifies that the contact create page is showing content elements in the right order', function () {
    Livewire::test('pages::contacts.create')
        ->assertStatus(200)
        ->assertSee(['Informations générales', 'Prénom', 'Nom', 'Adresse privée', 'Voiture', 'Plaque', 'Créer le contact']);
});

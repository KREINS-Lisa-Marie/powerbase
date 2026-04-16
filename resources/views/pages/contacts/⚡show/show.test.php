<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::contacts.show')
        ->assertStatus(200);
});


it('verifies that the contact show page is showing content elements in the right order', function () {
    Livewire::test('pages::contacts.show')
        ->assertStatus(200)
        ->assertSee(['Informations générales', 'Nom complèt', 'Adresse privée', 'Voiture', 'Plaque', 'Modifier les données', 'Supprimer la personne' ]);
});

<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::contacts.index')
        ->assertStatus(200);
});



it('verifies that the contact index page is showing content elements in the right order', function () {
    Livewire::test('pages::contacts.index')
        ->assertStatus(200)
        ->assertSee(['Créer un contact', 'Trier', 'Rechercher', 'Nom complèt', 'E-mail', 'Téléphone', 'Job']);
});

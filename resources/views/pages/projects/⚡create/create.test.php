<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::projects.create')
        ->assertStatus(200);
});



it('verifies that the projects create page is showing content elements in the right order', function () {
    Livewire::test('pages::projects.create')
        ->assertStatus(200)
        ->assertSee(['Informations générales', 'Nom projet', 'Type projet', 'Description', 'Créer le projet']);
});

<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::projects.index')
        ->assertStatus(200);
});




it('verifies that the projects index page is showing content elements in the right order', function () {
    Livewire::test('pages::projects.index')
        ->assertStatus(200)
        ->assertSee(['Créer un projet', 'Trier', 'Rechercher', 'Nom projet', 'Adresse', 'Crée le', 'Cloturé le']);
});

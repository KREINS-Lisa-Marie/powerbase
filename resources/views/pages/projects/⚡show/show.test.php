<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::projects.show')
        ->assertStatus(200);
});



it('verifies that the projects show page is showing content elements in the right order', function () {
    Livewire::test('pages::projects.show')
        ->assertStatus(200)
        ->assertSee(['Informations générales', 'Nom projet', 'Type projet', 'Description', 'Trier', 'Produits commandés',  'Modifier', 'Supprimer', 'Imprimer']);
});

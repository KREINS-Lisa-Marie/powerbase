<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::dashboard.index')
        ->assertStatus(200);
});


it('verifies that the dashboard page is showing content elements in the right order', function () {
    Livewire::test('pages::dashboard.index')
        ->assertStatus(200)
        ->assertSee(['Accueil', 'Bonjour', 'Créer un projet', 'Commandes à traiter', 'Les 5 dernières commandes', 'Commandé par', 'statistiques du jour', 'Commandes envoyés' ]);
});

<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::orders.show')
        ->assertStatus(200);
});




it('verifies that the orders show page is showing content elements in the right order', function () {
    Livewire::test('pages::orders.show')
        ->assertStatus(200)
        ->assertSee(['Informations générales', 'Pour qui', 'Nom du projet', 'Produits commandés', 'Modifier', 'Supprimer', 'Imprimer']);
});

<?php

use App\Models\User;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);


beforeEach(function(){
    $this-> user = User::factory()-> create();
    \Pest\Laravel\actingAs($this-> user);});


it('renders successfully', function () {
    Livewire::test('pages::orders.create')
        ->assertStatus(200);
});


it('verifies that the orders create page is showing content elements in the right order', function () {
    Livewire::test('pages::orders.create')
        ->assertStatus(200)
        ->assertSee(['Informations générales', 'Pour qui', 'Nom du projet', 'Produits à commander', 'Créer la commande']);
});

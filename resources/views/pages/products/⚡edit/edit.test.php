<?php

use App\Models\User;
use Livewire\Livewire;


beforeEach(function(){
    $this-> user = User::factory()-> create();
    \Pest\Laravel\actingAs($this-> user);});


it('renders successfully', function () {

    $product = \App\Models\Product::factory()->create();

    Livewire::test('pages::products.edit', ['product'=>$product])
        ->assertStatus(200);
});

it('verifies that the products edit page is showing content elements in the right order', function () {

    $product = \App\Models\Product::factory()->create();

    Livewire::test('pages::products.edit', ['product'=>$product])
        ->assertStatus(200)
        ->assertSee(['Informations générales', 'Nom du produit', 'Image', 'Enregistrer']);
});

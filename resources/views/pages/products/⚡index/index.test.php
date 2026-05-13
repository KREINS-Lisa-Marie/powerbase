<?php

use App\Models\User;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\actingAs;

uses(RefreshDatabase::class);

beforeEach(function(){
    $this-> user = User::factory()-> create();
    \Pest\Laravel\actingAs($this-> user);});



it('renders successfully', function () {
    Livewire::test('pages::products.index')
        ->assertStatus(200);
});




it('verifies that the products index page is showing content elements in the right order', function () {
    Livewire::test('pages::products.index')
        ->assertStatus(200)
        ->assertSeeInOrder(['Créer un produit', 'Trier', 'Rechercher', 'Nom du produit', 'Stock', 'En stock depuis', 'Mise à jour']);
});


it('displays a list of Products on the product index page', function () {

    //Event::fake();
    $products = \App\Models\Product::factory(3)->create();

    Livewire::test('pages::products.index')
        ->assertSee($products[0]->product_name)
        ->assertSee($products[1]->product_name)
        ->assertSee($products[2]->product_name);

}
);

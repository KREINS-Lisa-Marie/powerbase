<?php

use App\Models\Product;
use App\Models\User;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\actingAs;

uses(RefreshDatabase::class);

beforeEach(function(){
    $this-> user = User::factory()-> create();
    \Pest\Laravel\actingAs($this-> user);});



it('renders successfully', function () {

    $product = Product::factory()->create();

    Livewire::test('pages::products.show',
        [
            'product' => $product->id,
        ])
        ->assertStatus(200);
});


it('verifies that the products show page is showing content elements in the right order', function () {

    $product = Product::factory()->create();

    Livewire::test('pages::products.show',
        [
            'product' => $product->id,
        ])
        ->assertStatus(200)
        ->assertSee(['Informations générales', 'Nom du produit', 'img', 'Modifier le produit', 'Supprimer le produit']);
});


it('displays a detail page of a product and verifies if there is data', function () {

    //Event::fake();
    $product = Product::factory()->create();

    Livewire::test('pages::products.show', [
        'product' => $product->id,
    ])
        ->assertSee($product->product_name)
        ->assertSee($product->product_description)
        ->assertSee($product->product_notes)
        ->assertSee($product->quantity)
        ->assertSee($product->product_image);
});

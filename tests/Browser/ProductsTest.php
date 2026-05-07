<?php

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

uses(RefreshDatabase::class);


// Products

it('can click a product card and go to the show page', function () {
    //Event::fake();

    $user = User::factory()->create();
    $product = \App\Models\Product::factory()->create();
    $locale = app()->getLocale();
    actingAs($user);

    $route = route('pages::products.index',['locale' => $locale]);

    visit($route)
        ->click(".card-link")
        ->assertUrlIs(route('pages::products.show', [
            'product' => $product->id,
            'locale' => $locale
        ]));
});

it('can click on create a product and go to the create page', function () {
    //Event::fake();

    $user = User::factory()->create();
    $locale = app()->getLocale();
    actingAs($user);

    $route = route('pages::products.index',['locale' => $locale]);

    visit($route)
        ->click(".admin-primary-button")
        ->assertUrlIs(route('pages::products.create', [
            'locale' => $locale
        ]));
});

it('can click the edit button of a product and go to the edit page', function () {
    //Event::fake();

    $user = User::factory()->create();

    $product = \App\Models\Product::factory()->create();
    $locale = app()->getLocale();
    actingAs($user);

    $route = route('pages::products.show',[
        'locale' => $locale,
        'product' => $product->id,
    ]);

    visit($route)
        ->click(".admin-primary-button")
        ->assertUrlIs(route('pages::products.edit', [
            'product' => $product->id,
            'locale' => $locale
        ]));
});

it('can click on the delete button, delete the product and go back to the index page', function () {
    //Event::fake();

    $user = User::factory()->create();

    $product = \App\Models\Product::factory()->create();
    $locale = app()->getLocale();
    actingAs($user);

    $route = route('pages::products.show',[
        'locale' => $locale,
        'product' => $product->id,
    ]);

    visit($route)
        ->click("#delete-element")
        ->assertUrlIs(route('pages::products.index', [
            'locale' => $locale
        ]));

    assertDatabaseMissing('products', [
        'id' => $product->id,
    ]);
});



it('can create a product and redirect to the show page', function () {
    //Event::fake();

    $user = User::factory()->create();
    $locale = app()->getLocale();
    actingAs($user);

    $route = route('pages::products.create',['locale' => $locale]);

    visit($route)
        ->assertSee('Créer un produit')
        ->fill('product_name', 'Vis')
        ->fill('brand', 'Marque')
        ->fill('ref_article', 'DHDH9384')
        ->fill('gtin', 'DHDH9384fho42')
        ->fill('product_description', 'Une vis')
        ->fill('product_notes', 'note')
        ->fill('quantity', '23')
        ->click('Créer le produit')
        ->assertSee('Vis');

    assertDatabaseHas('products', [
        'ref_article' => 'DHDH9384',
    ]);
});

it('can edit a product and redirect to the show page', function () {
    //Event::fake();

    $user = User::factory()->create();
    $locale = app()->getLocale();
    actingAs($user);

    $product = \App\Models\Product::factory()->create();

    $route = route('pages::products.edit',[
        'locale' => $locale,
        'product' => $product->id
    ]);

    visit($route)
        ->assertSee('Modifier')
        ->fill('product_description', 'nouvelle description')
        ->fill('brand', 'amax')
        ->click('Enregistrer')
        ->assertSee($product->product_name)
        ->assertUrlIs(route('pages::products.show', [
            'locale' => $locale,
            'product' => $product->id
        ]));

    assertDatabaseHas('products', [
        'brand' => 'amax',
    ]);
});

<?php

use App\Models\User;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function(){
    $this-> user = User::factory()-> create();
    \Pest\Laravel\actingAs($this-> user);});



it('renders successfully', function () {
    Livewire::test('pages::products.create')
        ->assertStatus(200);
});


it('verifies that the products create page is showing content elements in the right order', function () {
    Livewire::test('pages::products.create')
        ->assertStatus(200)
        ->assertSeeInOrder(['Informations générales', 'Nom du produit', 'Image', 'Créer le produit']);
});


it('redirects to the products index route after the successfull creation of a product',
    function () {

        Livewire::test('pages::products.create')
            ->set('product_name', 'Vis')
            ->set('product_description', 'Description')
            ->set('product_notes', 'Notes')
            ->set('quantity', '23')
            ->set('brand', 'Amax')
            ->set('ref_article', 'AF23DJE87')
            ->set('gtin', '2387738402832')
            ->set('product_image', 'image.jpeg')
            ->call('store')
            ->assertHasNoErrors()
            ->assertRedirect(route('pages::products.index', ['locale' => __('general.currentLocale')]));
    }
);


it(
    'verifies that the products.create route displays a form to create a product',
    function (string $locale, string $main_heading, string $button_text) {

        \Illuminate\Support\Facades\App::setLocale($locale);

        Livewire::test('pages::products.create')
            ->assertSee("$main_heading", false)
            ->assertSeeHtml('<form wire:submit.prevent="store"')
            ->assertSee($button_text, false);
    }
)->with(
    [
        ['fr', 'Créer un produit', 'Créer le produit'],
        ['en', 'Create a product', 'Create the product'],
    ]
);

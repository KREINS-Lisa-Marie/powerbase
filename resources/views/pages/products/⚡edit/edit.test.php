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


it('redirects to the products show route after the successfull edit of a product',
    function () {

        $user = User::factory()->create();

        $product = \App\Models\Product::factory()->create([
            'product_name'=>'Bouteille',
        ]);

        Livewire::test('pages::products.edit', [
            'product' => $product,
        ])
            ->set('product_name', 'verre')
            ->set('brand', $product->brand)
            ->set('ref_article', $product->ref_article)
            ->set('gtin', $product->gtin)
            ->set('product_description', $product->product_description)
            ->set('product_notes', $product->product_notes)
            ->set('product_image', $product->product_image)
            ->set('quantity', $product->quantity)
            ->call('save')
            ->assertHasNoErrors()
            ->assertRedirect(route('pages::products.show', [
                'product' => $product->id,
                'locale' => __('general.currentLocale')]));
    }
);

it(
    'verifies that the products.edit route displays a form to edit a product',
    function (string $locale, string $main_heading, string $button_text) {

        \Illuminate\Support\Facades\App::setLocale($locale);
        $user = User::factory()->create();

        $product = \App\Models\Product::factory()->create();

        Livewire::test('pages::products.edit',  [
            'product' => $product,
        ])
            ->assertSee("$main_heading", false)
            ->assertSeeHtml('wire:submit.prevent="save"')
            ->assertSee($button_text, false);
    }
)->with(
    [
        ['fr', 'Modifier', 'Enregistrer'],
        ['en', 'Modify', 'Save'],
    ]
);

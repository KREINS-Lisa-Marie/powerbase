<?php

use App\Models\User;
use function Pest\Laravel\actingAs;

test('the application returns a successful response', function () {
    $user = User::factory()->create(['job'=>'worker']);
    $contact = $user;
    $locale = app()->getLocale();
    actingAs($user);

    $products = \App\Models\Product::factory(5)->create();

    $response = $this->get('/fr');

    $response->assertStatus(200);
});

it('verifies that the product page is showing it’s contents', function () {

    $user = User::factory()->create(['job'=>'worker']);
    $contact = $user;
    $locale = app()->getLocale();
    actingAs($user);

    $product = \App\Models\Product::factory()->create();

    $response = $this->get(route('worker::product', ['locale' => __('general.currentLocale'), 'product' => 1]));

    $response->assertStatus(200)
        ->assertSeeInOrder(["$product->product_name", "<img", "Mettre dans le panier", "Description", "Notes", "Stock restant"]);

});

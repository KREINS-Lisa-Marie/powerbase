<?php

use App\Models\User;
use function Pest\Laravel\actingAs;

test('the application returns a successful response', function () {

    $user = User::factory()->create();
    $locale = app()->getLocale();
    actingAs($user);

    $products = \App\Models\Product::factory(5)->create();

    $response = $this->get('/fr');

    $response->assertStatus(200);
});

it('verifies that the products page is showing it’s contents', function () {

    $user = User::factory()->create();
    $locale = app()->getLocale();
    actingAs($user);

    $products = \App\Models\Product::factory(5)->create();

    $response = $this->get(route('worker.products', ['locale' => __('general.currentLocale')]));

    $response->assertStatus(200)
        ->assertSeeInOrder(["Produits", "<input", "card-productname", ]);

});

<?php

use App\Models\Product;
use App\Models\User;
use function Pest\Laravel\actingAs;

test('the application returns a successful response', function () {

    $user = User::factory()->create(['job'=>'worker']);
    $locale = app()->getLocale();
    actingAs($user);
    $products = \App\Models\Product::factory(5)->create();

    $response = $this->get('/fr');

    $response->assertStatus(200);
});


it('verifies that the homepage is showing it’s main title and two other titles', function () {

    $user = User::factory()->create(['job'=>'worker']);
    $locale = app()->getLocale();
    actingAs($user);

    $products = \App\Models\Product::factory(5)->create();

    $response = $this->get(route('worker.homepage', ['locale' =>$locale,]));

    $response->assertStatus(200)
        ->assertSeeInOrder(["Bonjour", "Nouveaux produits", "Produits populaires"]);

});

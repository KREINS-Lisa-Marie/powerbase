<?php

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

it('verifies that the order page is showing it’s contents', function () {

    $user = User::factory()->create(['job'=>'worker']);
    $locale = app()->getLocale();
    actingAs($user);

    $response = $this->get(route('worker::order', ['locale' => __('general.currentLocale')]));

    $response->assertStatus(200)
        ->assertSeeInOrder(["Commande", "Nom du projet", "Confirmer la commande", "Toutes mes commandes"]);

});

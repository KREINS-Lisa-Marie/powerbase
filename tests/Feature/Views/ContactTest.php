<?php

use App\Models\User;
use function Pest\Laravel\actingAs;

test('the application returns a successful response', function () {


    $user = User::factory()->create(['job'=>'worker']);
    $locale = app()->getLocale();
    actingAs($user);

    $products = \App\Models\Product::factory(5)->create();

    $response = $this->get("/$locale");

    $response->assertStatus(200);
});


it('verifies that the contact page is showing it’s contents', function () {


    $user = User::factory()->create(['job'=>'worker']);
    $locale = app()->getLocale();
    actingAs($user);

    $response = $this->get(route('worker.contact', ['locale' => $locale]));

    $response->assertStatus(200)
        ->assertSeeInOrder(["Contact", "Magasin", "Email"]);

});

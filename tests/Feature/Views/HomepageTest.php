<?php

test('the application returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});


it('verifies that the homepage is showing it’s main title and two other titles', function () {


    $response = $this->get(route('worker.homepage', ['locale' => __('general.currentLocale')]));

    $response->assertStatus(200)
        ->assertSeeInOrder(["Bonjour", "Nouveaux produits", "Produits populaires"]);

});

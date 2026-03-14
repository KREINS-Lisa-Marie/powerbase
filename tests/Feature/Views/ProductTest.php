<?php

test('the application returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});


it('verifies that the product page is showing it’s contents', function () {


    $response = $this->get(route('worker.product', ['locale' => __('general.currentLocale'), 'product' => 1]));

    $response->assertStatus(200)
        ->assertSeeInOrder(["SPAX visses 4,5x70mm – 500 pièces", "<img", "Mettre dans le panier", "Description", "Notes", "Stock restant"]);

});

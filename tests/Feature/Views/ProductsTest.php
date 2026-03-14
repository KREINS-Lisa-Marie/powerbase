<?php

test('the application returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});


it('verifies that the products page is showing it’s contents', function () {


    $response = $this->get(route('worker.products', ['locale' => __('general.currentLocale')]));

    $response->assertStatus(200)
        ->assertSeeInOrder(["Produits", "<input", "Nom produit", ]);

});

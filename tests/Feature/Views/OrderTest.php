<?php

test('the application returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});


it('verifies that the order page is showing it’s contents', function () {


    $response = $this->get(route('worker.order', ['locale' => __('general.currentLocale')]));

    $response->assertStatus(200)
        ->assertSeeInOrder(["Commande", "Nom du projet", "Nom produit", "Toutes mes commandes", "Nombre de produits"]);

});

<?php

test('the application returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});


it('verifies that the contact page is showing it’s contents', function () {


    $response = $this->get(route('worker.contact', ['locale' => __('general.currentLocale')]));

    $response->assertStatus(200)
        ->assertSeeInOrder(["Contact", "Magasin", "Email"]);

});

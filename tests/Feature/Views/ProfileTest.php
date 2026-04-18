<?php

test('the application returns a successful response', function () {
    $response = $this->get('/fr');

    $response->assertStatus(200);
});


it('verifies that the profile page is showing it’s contents', function () {


    $response = $this->get(route('worker.profile', ['locale' => __('general.currentLocale')]));

    $response->assertStatus(200)
        ->assertSeeInOrder(["Profil", "Déconnecter", "Changer la langue"]);

});

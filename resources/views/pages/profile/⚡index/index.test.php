<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::profile.index')
        ->assertStatus(200);
});

it('verifies that the profile index page is showing content elements in the right order', function () {
    Livewire::test('pages::profile.index')
        ->assertStatus(200)
        ->assertSee([ 'Profil', 'Changer la langue', 'Déconnexion']);
});


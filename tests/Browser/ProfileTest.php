<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseMissing;

uses(RefreshDatabase::class);


// Profile

it('can click the edit password button of the profile and go to the edit page', function () {
    //Event::fake();

    $user = User::factory()->create();


    $locale = app()->getLocale();
    actingAs($user);

    $route = route('pages::profile.index',[
        'locale' => $locale,
    ]);

    visit($route)
        ->click("a:has-text('Changer mot de passe')")
        ->assertUrlIs(route('pages::profile.edit', [
            'profile' => $user->id,
            'locale' => $locale
        ]));
});

it('will disconnect the user when clicking on the disconnect button and redirect to the login page', function () {
    //Event::fake();

    $user = User::factory()->create();

    $locale = app()->getLocale();
    actingAs($user);

    $route = route('pages::profile.index',[
        'locale' => $locale,
    ]);

    visit($route)
        ->click('.admin-logout-button')
        ->assertUrlIs(route('auth.login', [
            'locale' => $locale
        ]));

    expect(auth()->guest())->toBeTrue();
});

<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

uses(RefreshDatabase::class);

// Contacts

it('can click a contact card and go to the show page', function () {

    $user = User::factory()->create(['job'=>'storekeeper']);
    $contact = $user;
    $locale = app()->getLocale();
    actingAs($user);

    $route = route('pages::contacts.index',['locale' => $locale]);

    visit($route)
        ->click(".card-link")
        ->assertUrlIs(route('pages::contacts.show', [
            'contact' => $contact->id,
            'locale' => $locale
        ]));
});

it('can click on create a contact and go to the create page', function () {

    $user = User::factory()->create(['job'=>'admin']);
    $locale = app()->getLocale();
    actingAs($user);

    $route = route('pages::contacts.index',['locale' => $locale]);

    visit($route)
        ->click(".admin-primary-button")
        ->assertUrlIs(route('pages::contacts.create', [
            'locale' => $locale
        ]));
});

it('can click the edit button and go to the edit page', function () {

    $user = User::factory()->create(['job'=>'admin']);
    $contact = $user;
    $locale = app()->getLocale();
    actingAs($user);

    $route = route('pages::contacts.show',[
        'locale' => $locale,
        'contact' => $contact->id,
        ]);

    visit($route)
        ->click(".admin-primary-button")
        ->assertUrlIs(route('pages::contacts.edit', [
            'contact' => $contact->id,
            'locale' => $locale
        ]));
});

it('can click on the delete button, delete the contact and go back to the index page', function () {

    $user = User::factory()->create(['job'=>'admin']);
    $contact = $user;
    $locale = app()->getLocale();
    actingAs($user);

    $route = route('pages::contacts.show',[
        'locale' => $locale,
        'contact' => $contact->id,
    ]);

    visit($route)
        ->click(".admin-secondary-button")
        ->assertUrlIs(route('pages::contacts.index', [
            'locale' => $locale
        ]));

    assertDatabaseMissing('users', [
        'id' => $contact->id,
    ]);
});


it('can create a contact and redirect to the show page', function () {

    $user = User::factory()->create(['job'=>'admin']);
    $locale = app()->getLocale();
    actingAs($user);

    $route = route('pages::contacts.create',['locale' => $locale]);

    visit($route)
        ->assertSee('Créer un contact')
        ->fill('first_name', 'Kevin')
        ->fill('last_name', 'Meunier')
        ->fill('email', 'kevin@mail.com')
        ->fill('phone', '5269436529')
        ->select('job', 'admin')
        ->fill('password', 'password')
        ->fill('password_confirmation', 'password')
        ->fill('private_phone', '5269436529')
        ->fill('private_address', '5269436529')
        ->select('car_type', '1')
        ->fill('car_plate', 'ecbd843')
        ->click('Créer le contact')
        ->assertSee('Kevin');

    assertDatabaseHas('users', [
        'email' => 'kevin@mail.com',
    ]);
});

it('can edit a contact and redirect to the show page', function () {

    $user = User::factory()->create(['job'=>'admin']);
    $locale = app()->getLocale();
    actingAs($user);

    $contact = User::factory()->create();

    $route = route('pages::contacts.edit',[
        'locale' => $locale,
        'contact' => $contact->id
    ]);

    visit($route)
        ->assertSee('Modifier les données')
        ->fill('first_name', $contact->first_name)
        ->fill('last_name', $contact->last_name)
        ->fill('email', $contact->email)
        ->fill('phone', '5269436529')
        ->fill('private_phone', $contact->private_phone)
        ->fill('private_address', $contact->private_address)
        ->select('job', 'admin')
        ->select('car_type', '1')
        ->fill('car_plate', 'ecbd84333')
        ->click('Enregistrer')
        ->assertSee($contact->first_name)
        ->assertUrlIs(route('pages::contacts.show', [
            'locale' => $locale,
            'contact' => $contact->id
        ]));

    assertDatabaseHas('users', [
        'car_plate' => 'ecbd84333',
    ]);
});

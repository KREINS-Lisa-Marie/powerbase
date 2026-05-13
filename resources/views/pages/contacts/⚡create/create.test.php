<?php

use App\Models\User;
use Livewire\Livewire;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function(){
    $this-> user = User::factory()-> create();
    \Pest\Laravel\actingAs($this-> user);});


it('renders successfully', function () {
    Livewire::test('pages::contacts.create')
        ->assertStatus(200);
});


it('verifies that the contact create page is showing content elements in the right order', function () {
    Livewire::test('pages::contacts.create')
        ->assertStatus(200)
        ->assertSeeInOrder(['Informations générales', 'Prénom', 'Nom', 'Adresse privée', 'Voiture', 'Plaque', 'Créer le contact']);
});


it('redirects to the contacts index route after the successfull creation of a contact',
    function () {

        Livewire::test('pages::contacts.create')
            ->set('first_name', 'John')
            ->set('last_name', 'Doe')
            ->set('email', 'john@example.com')
            ->set('phone', '0123456789')
            ->set('private_phone', '987654321')
            ->set('job', 'admin')
            ->set('private_address', '123 Main Street')
            ->set('car_type', 'Camionette')
            ->set('car_plate', 'ABC-123')
            ->set('password', '12345678')
            ->set('password_confirmation', '12345678')
            ->call('store')
            ->assertHasNoErrors()
            ->assertRedirect(route('pages::contacts.index', ['locale' => __('general.currentLocale')]));
    }
);


it(
    'verifies that the contacts.create route displays a form to create a contact',
    function (string $locale, string $main_heading, string $button_text) {

        \Illuminate\Support\Facades\App::setLocale($locale);

        Livewire::test('pages::contacts.create')
            ->assertSee("$main_heading", false)
            ->assertSeeHtml('<form wire:submit.prevent="store"')
        ->assertSee($button_text, false);
    }
)->with(
    [
        ['fr', 'Créer un contact', 'Créer le contact'],
        ['en', 'Create a contact', 'Create contact'],
    ]
);

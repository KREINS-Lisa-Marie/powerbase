<?php

use App\Models\User;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function(){
    $this-> user = User::factory()-> create();
    \Pest\Laravel\actingAs($this-> user);});


it('renders successfully', function () {
    $contact = User::factory()->create();

    Livewire::test('pages::contacts.edit', [
        'contact' => $contact,
    ])
        ->assertStatus(200);
});


it('verifies that the contact edit page is showing content elements in the right order', function () {

    $contact = User::factory()->create();

    Livewire::test('pages::contacts.edit', [
        'contact' => $contact,
    ])
        ->assertStatus(200)
        ->assertSee(['Informations générales', 'Prénom', 'Nom', 'Adresse privée', 'Voiture', 'Plaque', 'Modifier les données']);
});


it('redirects to the contacts show route after the successfull edit of a contact',
    function () {

        $contact = User::factory()->create();

        Livewire::test('pages::contacts.edit', [
            'contact' => $contact,
        ])
            ->set('first_name', 'John')
            ->set('last_name', 'Doe')
            ->set('email', 'john@example.com')
            ->set('phone', '0123456789')
            ->set('private_phone', '987654321')
            ->set('job', 'admin')
            ->set('private_address', '123 Main Street')
            ->set('car_type', 'Camionette')
            ->set('car_plate', 'ABC-123')
            ->call('save')
            ->assertHasNoErrors()
            ->assertRedirect(route('pages::contacts.show', [
                'contact' => $contact->id,
            'locale' => __('general.currentLocale')]));
    }
);


it(
    'verifies that the contacts.edit route displays a form to edit a contact',
    function (string $locale, string $main_heading, string $button_text) {

        \Illuminate\Support\Facades\App::setLocale($locale);
        $contact = User::factory()->create();

        Livewire::test('pages::contacts.edit',  [
            'contact' => $contact,
        ])
            ->assertSee("$main_heading", false)
            ->assertSeeHtml('<form wire:submit="save"')
            ->assertSee($button_text, false);
    }
)->with(
    [
        ['fr', 'Modifier les données', 'Enregistrer'],
        ['en', 'Edit details', 'Save'],
    ]
);

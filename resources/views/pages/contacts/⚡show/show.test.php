<?php

use App\Models\User;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\actingAs;

uses(RefreshDatabase::class);

beforeEach(function(){
    $this-> user = User::factory()-> create();
    \Pest\Laravel\actingAs($this-> user);});



it('renders successfully', function () {
    $contact = User::factory()->create();
    Livewire::test('pages::contacts.show', [
        'contact' => $contact->id,
    ])
        ->assertStatus(200);
});


it('verifies that the contact show page is showing content elements in the right order', function () {
    $contact = User::factory()->create();
    Livewire::test('pages::contacts.show', [
        'contact' => $contact->id,
    ])
        ->assertStatus(200)
        ->assertSeeInOrder(['Informations générales', 'Nom complèt', 'Adresse privée', 'véhicule', 'Plaque', 'Modifier les données', 'Supprimer la personne' ]);
});


it('displays a detail page of a contact and verifies if there is data', function () {

    //Event::fake();
    $contact = User::factory()->create(
        [
            'job' => 'admin',
        ]
    );

    Livewire::test('pages::contacts.show', [
        'contact' => $contact->id,
    ])
        ->assertSee($contact->first_name)
        ->assertSee($contact->last_name)
        ->assertSee($contact->phone)
        ->assertSee('Admin')
        ->assertSee($contact->car_type)
        ->assertSee($contact->car_plate);
});

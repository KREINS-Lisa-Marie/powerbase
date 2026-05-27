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
    Livewire::test('pages::contacts.index')
        ->assertStatus(200);
});


it('verifies that the contact index page is showing content elements in the right order', function () {
    Livewire::test('pages::contacts.index')
        ->assertStatus(200)
        ->assertSeeInOrder(['Créer un contact', 'Rechercher', 'Nom complèt', 'E-mail', 'Téléphone', 'Job']);
});


it('displays a list of Contacts on the contact index page', function () {

    //Event::fake();
    $contacts = User::factory(3)->create();

    Livewire::test('pages::contacts.index')
        ->assertSee($contacts[0]->first_name)
        ->assertSee($contacts[1]->first_name)
        ->assertSee($contacts[2]->first_name);
}
);


/* Kann nie gehen weil immer ein user eingeloggt ist

it('verifies if there are no contacts and displays an error message if there are none', function () {

    User::truncate();

    $user = User::factory()->create();
    actingAs($user);

    User::where('id', '!=', $user->id)->delete(); // supprime tous sauf user qui est loggé

    Livewire::test('pages::contacts.index')
        ->assertSee('Pas de résultat');
}
);*/

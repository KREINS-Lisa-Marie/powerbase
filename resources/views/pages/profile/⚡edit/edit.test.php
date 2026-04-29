<?php

use App\Models\User;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function(){
    $this-> user = User::factory()-> create();
    \Pest\Laravel\actingAs($this-> user);});


it('renders successfully', function () {
    Livewire::test('pages::profile.edit')
        ->assertStatus(200);
});



it('verifies that the profile edit page is showing content elements in the right order', function () {
    Livewire::test('pages::profile.edit')
        ->assertStatus(200)
        ->assertSee(['Changer mon mot de passe', 'Mot de passe', 'Retapez', 'Enregistrer']);
});



it('redirects to the profile index route after the successfull edit of a contact',
    function () {

        $user = User::factory()->create();

        Livewire::test('pages::profile.edit', [
            'contact' => $user,
        ])
            ->set('password', '12345678')
            ->set('password_confirmation', '12345678')
            ->call('save')
            ->assertHasNoErrors()
            ->assertRedirect(route('pages::profile.index', [
                'contact' => $this->user->id,
                'locale' => __('general.currentLocale')]));
    }
);


it(
    'verifies that the profile.edit route displays a form to edit a contact',
    function (string $locale, string $main_heading, string $button_text) {

        \Illuminate\Support\Facades\App::setLocale($locale);
        $contact = User::factory()->create();

        Livewire::test('pages::profile.edit',  [
            'contact' => $contact,
        ])
            ->assertSee("$main_heading", false)
            ->assertSeeHtml('<form wire:submit.prevent="save"')
            ->assertSee($button_text, false);
    }
)->with(
    [
        ['fr', 'Changer mon mot de passe', 'Enregistrer'],
        ['en', 'Change my password', 'Save'],
    ]
);

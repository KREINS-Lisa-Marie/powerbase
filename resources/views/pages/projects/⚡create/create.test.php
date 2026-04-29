<?php

use App\Enums\ProjectTypes;
use App\Models\User;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;
uses(RefreshDatabase::class);

beforeEach(function(){
    $this-> user = User::factory()-> create();
    \Pest\Laravel\actingAs($this-> user);});


it('renders successfully', function () {
    Livewire::test('pages::projects.create')
        ->assertStatus(200);
});



it('verifies that the projects create page is showing content elements in the right order', function () {
    Livewire::test('pages::projects.create')
        ->assertStatus(200)
        ->assertSee(['Informations générales', 'Nom projet', 'Type projet', 'Description', 'Créer le projet']);
});



it('redirects to the projects index route after the successfull creation of a project',
    function () {

        $user = User::factory()->create();
        $random_project_state = rand(0, 1) ? ProjectTypes::Private->value : ProjectTypes::Corporate->value;

        Livewire::test('pages::projects.create')
            ->set('project_name', 'Project1')
            ->set('person_in_charge', $user->id)
            ->set('phone_in_charge', $user->phone)
            ->set('project_type', '$random_project_state')
            ->set('client_name', 'Mr. Muller')
            ->set('project_address', 'Rue de l’école 2')
            ->set('project_description', 'Travail à faire')
            ->call('store')
            ->assertHasNoErrors()
            ->assertRedirect(route('pages::projects.index', ['locale' => __('general.currentLocale')]));
    }
);


it(
    'verifies that the projects.create route displays a form to create a project',
    function (string $locale, string $main_heading, string $button_text) {

        \Illuminate\Support\Facades\App::setLocale($locale);

        Livewire::test('pages::projects.create')
            ->assertSee("$main_heading", false)
            ->assertSeeHtml('<form wire:submit.prevent="store"')
            ->assertSee($button_text, false);
    }
)->with(
    [
        ['fr', 'Créer un projet', 'Créer le projet'],
        ['en', 'Create a project', 'Create project'],
    ]
);

<?php

use App\Models\User;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);


beforeEach(function(){
    $this-> user = User::factory()-> create();
    \Pest\Laravel\actingAs($this-> user);});


it('renders successfully', function () {
    Livewire::test('pages::orders.create')
        ->assertStatus(200);
});

it('verifies that the orders create page is showing content elements in the right order', function () {
    Livewire::test('pages::orders.create')
        ->assertStatus(200)
        ->assertSeeInOrder(['Informations générales', 'Pour qui', 'Nom du projet', 'Produits à commander', 'Créer la commande']);
});

it('redirects to the orders index route after the successfull creation of an order',
    function () {

        $user = User::factory()->create();
        $random_order_state = rand(0, 1) ? \App\Enums\OrderStates::Completed->value : \App\Enums\OrderStates::Pending->value;

        $project = \App\Models\Project::factory()->create([
            'user_id'=> $user->id,
        ]);

        Livewire::test('pages::orders.create')
            ->set('user_id', $user->id)
            ->set('order_state', $random_order_state)
            ->set('project_id', $project->id)
            ->call('store')
            ->assertHasNoErrors()
            ->assertRedirect(route('pages::orders.index', ['locale' => __('general.currentLocale')]));
    }
);

it(
    'verifies that the orders.create route displays a form to create an order',
    function (string $locale, string $main_heading, string $button_text) {

        \Illuminate\Support\Facades\App::setLocale($locale);

        Livewire::test('pages::orders.create')
            ->assertSee("$main_heading", false)
            ->assertSeeHtml('<form wire:submit.prevent="store"')
            ->assertSee($button_text, false);
    }
)->with(
    [
        ['fr', 'Créer une commande', 'Créer la commande'],
        ['en', 'Create an order', 'Create the order'],
    ]
);

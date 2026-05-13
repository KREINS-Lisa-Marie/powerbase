<?php

use App\Models\Project;
use App\Models\User;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\actingAs;

uses(RefreshDatabase::class);

beforeEach(function(){
    $this-> user = User::factory()-> create();
    \Pest\Laravel\actingAs($this-> user);});


it('renders successfully', function () {
    Livewire::test('pages::orders.index')
        ->assertStatus(200);
});


it('verifies that the orders index page is showing content elements in the right order', function () {
    Livewire::test('pages::orders.index')
        ->assertStatus(200)
        ->assertSee(['Créer une commande', 'Trier', 'Rechercher', 'Commandé par', 'Nombre', 'Commandé le', 'Statut']);
});



it('displays a list of orders on the orders index page', function () {

    //Event::fake();

    $user = User::factory()->create();
    $project = Project::factory()->create();

    $orders = \App\Models\Order::factory(3)->create([
        'user_id'=>$user->id,
        'project_id'=>$project->id
    ]);

    Livewire::test('pages::orders.index')
        ->assertSee($orders[0]->id)
        ->assertSee($orders[1]->id)
        ->assertSee($orders[2]->id);

    /*    \Pest\Laravel\assertDatabaseHas('projects',
        ['name'=>'Projet Client',
        ]);*/
}
);

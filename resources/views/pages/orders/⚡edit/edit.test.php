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

    $user = User::factory()->create();
    $project = \App\Models\Project::factory()->create([
        'user_id'=>$user->id,
    ]);

    $order = \App\Models\Order::factory()->create([
        'user_id'=> $user->id,
        'project_id'=> $project->id,
    ]);


    Livewire::test('pages::orders.edit', ['order' => $order])
        ->assertStatus(200);
});



it('verifies that the orders edit page is showing content elements in the right order', function () {

    $user = User::factory()->create();
    $project = \App\Models\Project::factory()->create([
        'user_id'=>$user->id,
    ]);

    $order = \App\Models\Order::factory()->create([
        'user_id'=> $user->id,
        'project_id'=> $project->id,
    ]);

    Livewire::test('pages::orders.edit', ['order' => $order])
        ->assertStatus(200)
        ->assertSee(['Informations générales', 'Pour qui', 'Nom du projet', /*'Produits commandés',*/ 'Enregistrer']);
});

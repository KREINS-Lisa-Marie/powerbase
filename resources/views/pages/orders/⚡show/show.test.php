<?php

use App\Models\Order;
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

    $random_project_state = 'Particulier';

    $worker = User::factory()->create([
        'job' => 'worker',
    ]);
    $project = Project::factory()->create([
        'user_id' => $worker->id,
        'project_type' => $random_project_state,
]);

    $order = Order::factory()->create([
        'user_id'=>$worker->id,
        'project_id'=>$project->id
    ]);

    Livewire::test('pages::orders.show',
        [
            'order' => $order->id,
        ])
        ->assertStatus(200);
});


it('verifies that the orders show page is showing content elements in the right order', function () {

    $random_project_state = 'Particulier';

    $worker = User::factory()->create([
        'job' => 'worker',
    ]);
    $project = Project::factory()->create([
        'user_id' => $worker->id,
        'project_type' => $random_project_state,
    ]);

    $order = Order::factory()->create([
        'user_id'=>$worker->id,
        'project_id'=>$project->id,
    ]);

    Livewire::test('pages::orders.show', [
        'order' => $order->id,
    ])
        ->assertStatus(200)
        ->assertSeeInOrder(['Informations générales', 'Pour qui', 'Nom du projet', 'Produits commandés', 'Modifier', 'Imprimer']);
});


it('displays a detail page of a orders and verifies if there is data', function () {

    $random_project_state = 'Particulier';

    $worker = User::factory()->create([
        'job' => 'worker',
    ]);
    $project = Project::factory()->create([
        'user_id' => $worker->id,
        'project_type' => $random_project_state,
    ]);
    $order = Order::factory()->create(
        [
            'user_id'=>$worker->id,
            'project_id'=>$project->id,
        ]
    );

    Livewire::test('pages::orders.show', [
        'order' => $order->id,
    ])
        ->assertSee($order->for_who)
        ->assertSee($worker->phone)
        ->assertSee($order->project_name)
        ->assertSee($order->order_state);
});

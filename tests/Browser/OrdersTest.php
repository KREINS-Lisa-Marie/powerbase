<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

uses(RefreshDatabase::class);


// Orders

it('can click an order card and go to the show page',
    function () {

        $user = User::factory()->create(['job'=>'storekeeper']);

        $worker = User::factory()->create([
            'job' => 'worker',
        ]);
        $random_project_state = 'Particulier';

        $project = \App\Models\Project::factory()->create([
            'user_id' => $user->id,
            'project_type' => $random_project_state,
        ]);
        $order = \App\Models\Order::factory()->create([
            'user_id'=>$user->id,
            'project_id'=>$project->id
        ]);
        $locale = app()->getLocale();
        actingAs($user);

        $route = route('pages::orders.index',['locale' => $locale]);

        visit($route)
            ->click(".card-link")
            ->assertUrlIs(route('pages::orders.show', [
                'order' => $order->id,
                'locale' => $locale
            ]));
    });

it('can click on create an order and go to the create page', function () {

    $user = User::factory()->create();
    $locale = app()->getLocale();
    actingAs($user);

    $route = route('pages::orders.index',['locale' => $locale]);

    visit($route)
        ->click(".admin-primary-button")
        ->assertUrlIs(route('pages::orders.create', [
            'locale' => $locale
        ]));
});

it('can click the edit button of a order and go to the edit page', function () {

    $user = User::factory()->create(['job'=>'storekeeper']);


    $worker = User::factory()->create([
        'job' => 'worker',
    ]);
    $random_project_state = 'Particulier';

    $project = \App\Models\Project::factory()->create([
        'user_id' => $user->id,
        'project_type' => $random_project_state,
    ]);

    $order = \App\Models\Order::factory()->create([
        'user_id'=>$user->id,
        'project_id'=>$project->id
    ]);
    $locale = app()->getLocale();
    actingAs($user);

    $route = route('pages::orders.show',[
        'locale' => $locale,
        'order' => $order->id,
    ]);

    visit($route)
        ->click(".admin-primary-button")
        ->assertUrlIs(route('pages::orders.edit', [
            'order' => $order->id,
            'locale' => $locale
        ]));
});


it('can create a order and redirect to the show page', function () {

    $user = User::factory()->create();
    $locale = app()->getLocale();
    actingAs($user);

    $worker = User::factory()->create([
        'job' => 'worker',
    ]);
    $random_project_state = 'private';
    $random_order_state = 'completed';

    $project = \App\Models\Project::factory()->create([
        'user_id' => $worker->id,
        'project_type' => $random_project_state,
    ]);


    $route = route('pages::orders.create',['locale' => $locale]);


    visit($route)
        ->assertSee('Créer une commande')
        ->select('user_id', $worker->id)
        ->select('project_id', $project->id)
        ->select('order_state', $random_order_state)
        ->click('Créer la commande')
        ->assertSee('Commandes');
});

it('can edit a order and redirect to the show page', function () {

    $user = User::factory()->create(['job'=>'storekeeper']);
    $locale = app()->getLocale();
    actingAs($user);


    $worker = User::factory()->create([
        'job' => 'worker',
    ]);
    $random_project_state = 'private';


    $project = \App\Models\Project::factory()->create([
        'user_id' => $user->id,
        'project_type' => $random_project_state,
    ]);

    $order= \App\Models\Order::factory()->create([
        'user_id'=>$user->id,
        'project_id'=>$project->id,
    ]);

    $route = route('pages::orders.edit',[
        'locale' => $locale,
        'order' => $order->id
    ]);

    $person_in_charge = User::where('id', $project->user_id)->first();
    $name_person_in_charge = "$person_in_charge->first_name $person_in_charge->last_name";
    $new_order_state = 'completed';

    visit($route)
        ->assertSee('Modifier')
        ->select('project_id', $project->id)
        ->select('user_id', $person_in_charge->id)
        ->select('order_state', $new_order_state)
        ->click('Enregistrer')
        ->assertSee("Numéro de commande $order->id")
        ->assertUrlIs(route('pages::orders.show', [
            'locale' => $locale,
            'order' => $order->id
        ]));

    assertDatabaseHas('orders', [
        'id' => $order->id,
    ]);
});

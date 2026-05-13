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
        ->assertSeeInOrder(['Informations générales', 'Pour qui', 'Nom du projet', /*'Produits commandés',*/ 'Enregistrer']);
});

it('redirects to the orders show route after the successfull edit of an order',
    function () {

        $user = User::factory()->create();
        $user2 = User::factory()->create();

        $project = \App\Models\Project::factory()->create([
            'user_id'=>$user->id,
        ]);
        $project2 = \App\Models\Project::factory()->create([
            'user_id'=>$user2->id,
        ]);

        $order = \App\Models\Order::factory()->create([
            'user_id'=> $user->id,
            'project_id'=> $project->id,
        ]);

        Livewire::test('pages::orders.edit', [
            'order' => $order,
        ])
            ->set('user_id', $order->user_id)
            ->set('project_id', $project2->id)
            ->set('ordered_at', $order->ordered_at)
            ->set('order_state', 'completed')
            ->call('save')
            ->assertHasNoErrors()
            ->assertRedirect(route('pages::orders.show', [
                'order' => $order->id,
                'locale' => __('general.currentLocale')]));
    }
);

it(
    'verifies that the orders.edit route displays a form to edit an order',
    function (string $locale, string $main_heading, string $button_text) {

        \Illuminate\Support\Facades\App::setLocale($locale);
        $user = User::factory()->create();

        $project = \App\Models\Project::factory()->create([
            'user_id'=>$user->id,
        ]);
        $order = \App\Models\Order::factory()->create([
            'user_id'=> $user->id,
            'project_id'=> $project->id,
        ]);

        Livewire::test('pages::orders.edit',  [
            'order' => $order,
        ])
            ->assertSee("$main_heading", false)
            ->assertSeeHtml('<form wire:submit.prevent="save"')
            ->assertSee($button_text, false);
    }
)->with(
    [
        ['fr', 'Modifier les données', 'Enregistrer'],
        ['en', 'Modify data', 'Save'],
    ]
);

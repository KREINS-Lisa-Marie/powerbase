<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseMissing;

uses(RefreshDatabase::class);

// Dashboard

it('can click on the create project link on the dashboard and go to the create project page', function () {
    //Event::fake();

    $user = User::factory()->create(['job'=>'storekeeper']);

    $locale = app()->getLocale();
    actingAs($user);

    $route = route('pages::dashboard.index',['locale' => $locale]);

    visit($route)
        ->click("Créer un projet")
        ->assertUrlIs(route('pages::projects.create', [
            'locale' => $locale
        ]));
});

it('can click on the create product link on the dashboard and go to the create product page', function () {
    //Event::fake();

    $user = User::factory()->create(['job'=>'storekeeper']);

    $locale = app()->getLocale();
    actingAs($user);

    $route = route('pages::dashboard.index',['locale' => $locale]);

    visit($route)
        ->click("Créer un produit")
        ->assertUrlIs(route('pages::products.create', [
            'locale' => $locale
        ]));
});

it('can click on the see orders link on the dashboard and go to the orders index page', function () {
    //Event::fake();

    $user = User::factory()->create(['job'=>'storekeeper']);

    $locale = app()->getLocale();
    actingAs($user);

    $route = route('pages::dashboard.index',['locale' => $locale]);

    visit($route)
        ->click("Voir les commandes")
        ->assertUrlIs(route('pages::orders.index', [
            'locale' => $locale
        ]));
});

it('can click on the see contacts link on the dashboard and go to the contacts index page', function () {
    //Event::fake();

    $user = User::factory()->create(['job'=>'storekeeper']);

    $locale = app()->getLocale();
    actingAs($user);

    $route = route('pages::dashboard.index',['locale' => $locale]);

    visit($route)
        ->click("Voir les contacts")
        ->assertUrlIs(route('pages::contacts.index', [
            'locale' => $locale
        ]));
});



it('can click on one of the 5 last orders link on the dashboard and go to the order page', function () {
    //Event::fake();

    $user = User::factory()->create(['job'=>'storekeeper']);


    $random_project_state = 'Particulier';
    $worker = User::factory()->create([
        'job' => 'worker',
    ]);

    $project = \App\Models\Project::factory()->create([
        'user_id' => $worker->id,
        'project_type' => $random_project_state,
    ]);

    $orders = \App\Models\Order::factory(10)->create([
        'user_id'=>$user->id,
        'project_id'=>$project->id
    ]);

    $order = $orders->first();

    $locale = app()->getLocale();
    actingAs($user);

    $route = route('pages::dashboard.index',['locale' => $locale]);

    visit($route)
        ->click('tr.table-row:first-of-type a.card-link:first-of-type')
        ->assertUrlIs(route('pages::orders.show', [
            'order' => $order->id,
            'locale' => $locale
        ]));
});



it('shows the number of products in stock on the dashboard ', function () {
    //Event::fake();

    $user = User::factory()->create(['job'=>'storekeeper']);

    $products = \App\Models\Product::factory(15)->create();

    $locale = app()->getLocale();
    actingAs($user);

    $route = route('pages::dashboard.index',['locale' => $locale]);

    visit($route)
        ->assertSeeIn(
            '.dashboard-card:has-text("Produits en stock") .big-number',
            (string) $products->count()         //string car sinon compare int avec string
        );
});

it('shows the number of products <5 pieces in stock on the dashboard ', function () {
    //Event::fake();

    $user = User::factory()->create(['job'=>'storekeeper']);

    $products = \App\Models\Product::factory(15)->create([
        'quantity'=> 24
    ]);
    $products = \App\Models\Product::factory(15)->create([
        'quantity'=> 4
    ]);

    $low_stock_nb = \App\Models\Product::where('quantity', '<', 5)->count();

    $locale = app()->getLocale();
    actingAs($user);

    $route = route('pages::dashboard.index',['locale' => $locale]);

    visit($route)
        ->assertSeeIn(
            '.dashboard-card:has-text("Produits avec un stock <5") .big-number',
            (string) $low_stock_nb         //string car sinon compare int avec string
        );
});

it('shows the number of orders to complete on the dashboard ', function () {
    //Event::fake();

    $user = User::factory()->create(['job'=>'storekeeper']);

    $random_project_state = 'Particulier';
    $worker = User::factory()->create([
        'job' => 'worker',
    ]);

    $project = \App\Models\Project::factory()->create([
        'user_id' => $worker->id,
        'project_type' => $random_project_state,
    ]);

    $orders = \App\Models\Order::factory(10)->create([
        'user_id'=>$user->id,
        'project_id'=>$project->id,
        'order_state' => 'completed'
    ]);

    $orders = \App\Models\Order::factory(5)->create([
        'user_id'=>$user->id,
        'project_id'=>$project->id,
        'order_state' => 'pending'
    ]);


    $not_completed_orders = \App\Models\Order::where('order_state', '=','pending')->count();

    $locale = app()->getLocale();
    actingAs($user);

    $route = route('pages::dashboard.index',['locale' => $locale]);

    visit($route)
        ->assertSeeIn(
            '.dashboard-card:has-text("Commandes à traiter") .big-number',
            (string) $not_completed_orders         //string car sinon compare int avec string
        );
});




// Menu

it('can click on the dashboard link and go to the dashboard page', function () {
    //Event::fake();

    $user = User::factory()->create(['job'=>'storekeeper']);

    $contacts = User::factory(5)->create();

    $locale = app()->getLocale();
    actingAs($user);

    $route = route('pages::contacts.index',['locale' => $locale]);

    visit($route)
        ->click('[title="Aller vers la page Dashboard"]')
        ->assertUrlIs(route('pages::dashboard.index', [
            'locale' => $locale
        ]));
});

it('can click on the products link and go to the products page', function () {
    //Event::fake();

    $user = User::factory()->create(['job'=>'storekeeper']);

    $contacts = User::factory(5)->create();
    $products = \App\Models\Product::factory(5)->create();

    $locale = app()->getLocale();
    actingAs($user);

    $route = route('pages::contacts.index',['locale' => $locale]);

    visit($route)
        ->click('[title="Aller vers la page Produits"]')
        ->assertUrlIs(route('pages::products.index', [
            'locale' => $locale
        ]));
});

it('can click on the projects link and go to the projects page', function () {
    //Event::fake();

    $user = User::factory()->create(['job'=>'storekeeper']);

    $contacts = User::factory(5)->create();

    $worker = User::factory()->create([
        'job' => 'worker',
    ]);
    $random_project_state = 'Particulier';

    $project = \App\Models\Project::factory(5)->create([
        'user_id' => $user->id,
        'project_type' => $random_project_state,
    ]);

    $locale = app()->getLocale();
    actingAs($user);

    $route = route('pages::contacts.index',['locale' => $locale]);

    visit($route)
        ->click('[title="Aller vers la page Projets"]')
        ->assertUrlIs(route('pages::projects.index', [
            'locale' => $locale
        ]));
});

it('can click on the contacts link and go to the contacts page', function () {
    //Event::fake();

    $user = User::factory()->create(['job'=>'storekeeper']);

    $contacts = User::factory(5)->create();
    $products = \App\Models\Product::factory(5)->create();

    $locale = app()->getLocale();
    actingAs($user);

    $route = route('pages::products.index',['locale' => $locale]);

    visit($route)
        ->click('[title="Aller vers la page Contacts"]')
        ->assertUrlIs(route('pages::contacts.index', [
            'locale' => $locale
        ]));
});

it('can click on the orders link and go to the orders page', function () {
    //Event::fake();

    $user = User::factory()->create(['job'=>'storekeeper']);

    $contacts = User::factory(5)->create();

    $random_project_state = 'Particulier';
    $worker = User::factory()->create([
        'job' => 'worker',
    ]);

    $project = \App\Models\Project::factory()->create([
        'user_id' => $worker->id,
        'project_type' => $random_project_state,
    ]);

    $orders = \App\Models\Order::factory(10)->create([
        'user_id'=>$user->id,
        'project_id'=>$project->id
    ]);

    $locale = app()->getLocale();
    actingAs($user);

    $route = route('pages::contacts.index',['locale' => $locale]);

    visit($route)
        ->click('[title="Aller vers la page Commandes"]')
        ->assertUrlIs(route('pages::orders.index', [
            'locale' => $locale
        ]));
});

it('can click on the profile link and go to the profile page', function () {
    //Event::fake();

    $user = User::factory()->create(['job'=>'storekeeper']);

    $contacts = User::factory(5)->create();

    $locale = app()->getLocale();
    actingAs($user);

    $route = route('pages::contacts.index',['locale' => $locale]);

    visit($route)
        ->click('[title="Aller vers la page Profil"]')
        ->assertUrlIs(route('pages::profile.index', [
            'locale' => $locale
        ]));
});

it('can click on the disconnect link and disconnect the user and afterwards redirect to the login page', function () {
    //Event::fake();

    $user = User::factory()->create(['job'=>'storekeeper']);

    $locale = app()->getLocale();
    actingAs($user);

    $route = route('pages::contacts.index',['locale' => $locale]);

    visit($route)
        ->click('[type="submit"]')
        ->assertUrlIs(route('auth.login', [
            'locale' => $locale
        ]));

    expect(auth()->guest())->toBeTrue();
});

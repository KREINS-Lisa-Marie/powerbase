<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

uses(RefreshDatabase::class);

// Projects

it('can click a project card and go to the show page', function () {

    $user = User::factory()->create(['job'=>'storekeeper']);

    $worker = User::factory()->create([
        'job' => 'worker',
    ]);
    $random_project_state = 'Particulier';

    $project = \App\Models\Project::factory()->create([
        'user_id' => $user->id,
        'project_type' => $random_project_state,
    ]);

    $locale = app()->getLocale();
    actingAs($user);

    $route = route('pages::projects.index',['locale' => $locale]);

    visit($route)
        ->click(".card-link")
        ->assertUrlIs(route('pages::projects.show', [
            'project' => $project->id,
            'locale' => $locale
        ]));
});

it('can click on create a project and go to the create page', function () {

    $user = User::factory()->create(['job'=>'storekeeper']);
    $locale = app()->getLocale();
    actingAs($user);

    $route = route('pages::projects.index',['locale' => $locale]);

    visit($route)
        ->click(".admin-primary-button")
        ->assertUrlIs(route('pages::projects.create', [
            'locale' => $locale
        ]));
});

it('can click the edit button of a project and go to the edit page', function () {

    $user = User::factory()->create(['job'=>'storekeeper']);

    $worker = User::factory()->create([
        'job' => 'worker',
    ]);
    $random_project_state = 'Particulier';

    $project = \App\Models\Project::factory()->create([
        'user_id' => $user->id,
        'project_type' => $random_project_state,
    ]);
    $locale = app()->getLocale();
    actingAs($user);

    $route = route('pages::projects.show',[
        'locale' => $locale,
        'project' => $project->id,
    ]);

    visit($route)
        ->click(".admin-primary-button")
        ->assertUrlIs(route('pages::projects.edit', [
            'project' => $project->id,
            'locale' => $locale
        ]));
});

/*      No sense in deleting projects - if its wrong the user can still change via edit */



it('can create a project and redirect to the show page', function () {

    $user = User::factory()->create(['job'=>'storekeeper']);
    $locale = app()->getLocale();
    actingAs($user);

    $worker = User::factory()->create([
        'job' => 'worker',
    ]);
    $random_project_state = 'private';


    $route = route('pages::projects.create',['locale' => $locale]);

    visit($route)
        ->assertSee('Créer un projet')
        ->fill('project_name', 'Panneaux PV Colignon')
        ->select('user_id', $worker->id)
        ->select('project_state', 'open')
        ->select('project_type', $random_project_state)
        ->fill('client_name', 'Madame Colignon')
        ->fill('project_address', 'Rue de l’école 2')
        ->fill('project_description', 'Ajout de panneaux solaires')
        ->click('Créer le projet')
        ->assertSee('Panneaux PV Colignon');

    assertDatabaseHas('projects', [
        'project_name' => 'Panneaux PV Colignon',
    ]);
});

it('can edit a project and redirect to the show page', function () {

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

    $route = route('pages::projects.edit',[
        'locale' => $locale,
        'project' => $project->id
    ]);

    $person_in_charge = User::where('id', $project->user_id)->first();
    $name_person_in_charge = "$person_in_charge->first_name $person_in_charge->last_name";
    $new_project_state = 'corporate';

    visit($route)
        ->assertSee('Modifier')
        ->fill('project_name', $project->project_name)
        ->select('user_id', $name_person_in_charge)
        ->fill('project_address', $project->project_address)
        ->fill('project_description', $project->project_description)
        ->fill('client_name', 'Monsieur Bonhomme')
        ->select('project_type', $new_project_state)
        ->click('Enregistrer')
        ->assertSee($project->project_name)
        ->assertUrlIs(route('pages::projects.show', [
            'locale' => $locale,
            'project' => $project->id
        ]));

    assertDatabaseHas('projects', [
        'client_name' => 'Monsieur Bonhomme',
    ]);
});

<?php

use App\Enums\ProjectTypes;
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

    $worker = User::factory()->create([
        'job' => 'worker',
    ]);
    $random_project_state = 'Particulier';

    $project = Project::factory()->create([
        'user_id' => $worker->id,
        'project_type' => $random_project_state,

    ]);

    Livewire::test('pages::projects.show', [
        'project' => $project->id,
    ])
        ->assertStatus(200);
});



it('verifies that the projects show page is showing content elements in the right order', function () {


    $worker = User::factory()->create([
        'job' => 'worker',
    ]);
    $random_project_state = 'Particulier';

    $project = Project::factory()->create([
        'user_id' => $worker->id,
        'project_type' => $random_project_state,

    ]);

    Livewire::test('pages::projects.show', [
        'project' => $project->id,
    ])
        ->assertStatus(200)
        ->assertSeeInOrder(['Informations générales', 'Nom projet', 'Type projet', 'Description', 'Trier', /*'Produits commandés',*/  'Modifier', 'Supprimer', 'Imprimer']);
});


it('displays a detail page of a project and verifies if there is data', function () {

    //Event::fake();

    $worker = User::factory()->create([
        'job' => 'worker',
    ]);

    $random_project_state = 'Clôturé';
    $random_project_type = 'Privé';

    $project = Project::factory()->create([
        'user_id' => $worker->id,
        'project_type' => $random_project_type,
        'project_state' => $random_project_state,
        'client_name' => "Random name",
        'project_address' => "Nouvelle adresse",
        'project_description' => "Description",

    ]);

    Livewire::test('pages::projects.show', [
        'project' => $project,
    ])
        ->assertSee($project->project_name)
        ->assertSee($project->user_id)
        ->assertSee($project->project_type)
        ->assertSee($project->project_state)
        ->assertSee($project->client_name)
        ->assertSee($project->project_address)
        ->assertSee($project->project_description);
});

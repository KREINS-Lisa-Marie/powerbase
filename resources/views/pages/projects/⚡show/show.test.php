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
        'person_in_charge' => $worker->id,
        'phone_in_charge' => $worker->phone,
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
        'person_in_charge' => $worker->id,
        'phone_in_charge' => $worker->phone,
        'project_type' => $random_project_state,

    ]);

    Livewire::test('pages::projects.show', [
        'project' => $project->id,
    ])
        ->assertStatus(200)
        ->assertSee(['Informations générales', 'Nom projet', 'Type projet', 'Description', 'Trier', 'Produits commandés',  'Modifier', 'Supprimer', 'Imprimer']);
});


it('displays a detail page of a project and verifies if there is data', function () {

    //Event::fake();

    $worker = User::factory()->create([
        'job' => 'worker',
    ]);

    $random_project_state = 'Particulier';

    $project = Project::factory()->create([
        'person_in_charge' => $worker->id,
        'phone_in_charge' => $worker->phone,
        'project_type' => $random_project_state,

    ]);

    Livewire::test('pages::projects.show', [
        'project' => $project->id,
    ])
        ->assertSee($project->project_name)
        ->assertSee($project->person_in_charge)
        ->assertSee($project->phone_in_charge)
        ->assertSee('Particulier')
        ->assertSee($project->client_name)
        ->assertSee($project->project_address)
        ->assertSee($project->project_description);
});

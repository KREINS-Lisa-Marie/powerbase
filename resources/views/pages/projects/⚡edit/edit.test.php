<?php

use App\Enums\ProjectTypes;
use App\Models\Project;
use App\Models\User;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;

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

    Livewire::test('pages::projects.edit', [
        'project' => $project,
    ])
        ->assertStatus(200);
});


it('verifies that the projects edit page is showing content elements in the right order', function () {

    $worker = User::factory()->create([
        'job' => 'worker',
    ]);
    $random_project_state = 'Particulier';


    $project = Project::factory()->create([
        'user_id' => $worker->id,
        'project_type' => $random_project_state,

    ]);

    Livewire::test('pages::projects.edit', [
        'project' => $project,
    ])
        ->assertStatus(200)
        ->assertSee(['Informations générales', 'Nom projet', 'Type projet', 'Description', 'Produits utilisés', 'Ajouter',  'Enregistrer']);
});


it('redirects to the projects show route after the successfull edit of a project',
    function () {

        $worker = User::factory()->create([
            'job' => 'worker',
        ]);
        $random_project_state = 'Particulier';


        $project = Project::factory()->create([
            'user_id' => $worker->id,
            'project_type' => $random_project_state,

        ]);

        Livewire::test('pages::projects.edit', [
            'project' => $project,
        ])
            ->set('project_name', 'Project1')
            ->set('user_id', $worker->id)
            ->set('project_type', $random_project_state)
            ->set('client_name', 'Mr. Muller')
            ->set('project_address', 'Rue de l’école 2')
            ->set('project_description', 'Travail à faire')
            ->call('save')
            ->assertHasNoErrors()
            ->assertRedirect(route('pages::projects.show', [
                'project' => $project->id,
                'locale' => __('general.currentLocale')]));
    }
);


it(
    'verifies that the projects.edit route displays a form to edit a project',
    function (string $locale, string $main_heading, string $button_text) {

        $worker = User::factory()->create([
            'job' => 'worker',
        ]);
        $random_project_state = 'Particulier';

        \Illuminate\Support\Facades\App::setLocale($locale);
        $project = Project::factory()->create([
            'user_id' => $worker->id,
            'project_type' => $random_project_state,

        ]);

        Livewire::test('pages::projects.edit',  [
            'project' => $project,
        ])
            ->assertSee("$main_heading", false)
            ->assertSeeHtml('<form wire:submit.prevent="save"')
            ->assertSee($button_text, false);
    }
)->with(
    [
        ['fr', 'Modifier', 'Enregistrer'],
        ['en', 'Modify', 'Save'],
    ]
);

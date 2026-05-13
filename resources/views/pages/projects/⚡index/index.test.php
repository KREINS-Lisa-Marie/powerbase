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
    Livewire::test('pages::projects.index')
        ->assertStatus(200);
});




it('verifies that the projects index page is showing content elements in the right order', function () {
    Livewire::test('pages::projects.index')
        ->assertStatus(200)
        ->assertSeeInOrder(['Créer un projet', 'Trier', 'Rechercher', 'Nom projet', 'Adresse', 'Crée le', 'Cloturé le']);
});


it('displays a list of projects on the project index page', function () {

    //Event::fake();
    $users = User::factory(3)->create([
        'job' => 'worker',
    ]);
    $projects = Project::factory(3)->create();

    Livewire::test('pages::projects.index')
        ->assertSee($projects[0]->project_name)
        ->assertSee($projects[1]->project_name)
        ->assertSee($projects[2]->project_name);

}
);

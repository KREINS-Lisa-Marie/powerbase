<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
uses(RefreshDatabase::class);

//=good

// = User

it('can create contacts', function () {

    $contacts = [];
    $contacts = \App\Models\User::factory(5)->create();

    expect($contacts)->toHaveCount(5);
});

it('a user has many projects', function () {
    $user = \App\Models\User::factory()->create();

    $project = \App\Models\Project::factory(5)->create([
        'user_id'=>$user->id,
    ]);

    expect($user->projects)->toHaveCount(5);
});

it('has many orders who belong to a user', function () {

    $user = \App\Models\User::factory()->create();
    $project = \App\Models\Project::factory()->create([
        'user_id'=>$user->id,
    ]);

    $order = \App\Models\Order::factory(5)->create([
        'user_id'=>$user->id,
        'project_id'=>$project->id,
    ]);

    expect($user->orders)->toHaveCount(5);
});

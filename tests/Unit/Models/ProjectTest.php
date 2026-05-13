<?php

//good

it('can create many projects', function () {
    $user = \App\Models\User::factory()->create();

    $projects = \App\Models\Project::factory(5)->create([
        'user_id'=>$user->id,
    ]);

    expect($projects)->toHaveCount(5);
});

it('has many orders who belong to a project', function () {
    $user = \App\Models\User::factory()->create();

    $project = \App\Models\Project::factory()->create([
        'user_id'=>$user->id,
    ]);


    $order = \App\Models\Order::factory(5)->create([
        'user_id'=>$user->id,
        'project_id'=>$project->id,
    ]);

    expect($project->orders)->toHaveCount(5);
});

it('has a user who belongs to a project', function () {
    $user = \App\Models\User::factory()->create();

    $project = \App\Models\Project::factory()->create([
        'user_id'=>$user->id,
    ]);

    expect($project->user)->toBeInstanceOf(\App\Models\User::class);
    //=Belongsto
});

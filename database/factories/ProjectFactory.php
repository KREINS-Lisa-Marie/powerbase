<?php

namespace Database\Factories;

use App\Enums\ProjectTypes;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {

        $worker_id =  User::where('job', 'worker')->inRandomOrder()->first();
        //$random_worker = fake()->randomElement($worker_id);
        $random_project_state = rand(0, 1) ? ProjectTypes::Private->value : ProjectTypes::Corporate->value;

        return [
            'project_name'=>fake()->titleMale,
            'person_in_charge' => $worker_id->id,
            'phone_in_charge' => $worker_id->phone,
            'project_type'=> $random_project_state,
            'client_name'=>fake()->name(),
            'project_address'=>fake()->address(),
            'project_description'=>fake()->text(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

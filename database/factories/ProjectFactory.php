<?php

namespace Database\Factories;

use App\Enums\ProjectStates;
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

        $worker_id =  User::factory([
            'job'=>'worker'
        ])->create();
        //$random_worker = fake()->randomElement($worker_id);
        $random_project_type = rand(0, 1) ? ProjectTypes::Private->value : ProjectTypes::Corporate->value;
        $random_project_state = rand(0, 1) ? ProjectStates::Open->value : ProjectStates::Closed->value;

        return [
            'project_name'=>fake()->titleMale,
            /*'person_in_charge' => $worker_id->id,
            'phone_in_charge' => $worker_id->phone,*/
            'user_id'=>$worker_id->id,
            'project_type'=> $random_project_type,
            'project_state'=> $random_project_state,
            'client_name'=>fake()->name(),
            'project_address'=>fake()->address(),
            'project_description'=>fake()->text(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

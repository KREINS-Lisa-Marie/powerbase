<?php

namespace Database\Factories;

use App\Enums\ProjectStates;
use App\Enums\ProjectTypes;
use App\Models\Company;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {


        $random_project_type = rand(0, 1) ? ProjectTypes::Private->value : ProjectTypes::Corporate->value;
        $random_project_state = rand(0, 1) ? ProjectStates::Open->value : ProjectStates::Closed->value;
        $random_company = Company::exists() ? Company::all()->pluck('id')->random() : Company::factory()->create()->id;


        $worker =  User::where('company_id', $random_company)->where('job', 'worker')->inRandomOrder()->first() ??
            User::factory()->create([
                'job'=>'worker',
                'company_id'=> $random_company
            ]);

        return [
            'project_name'=>fake()->titleMale,
            'user_id'=>$worker->id,
            'company_id'=>$random_company,
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

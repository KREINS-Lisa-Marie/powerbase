<?php

namespace Database\Factories;

use App\Enums\OrderStates;
use App\Models\Company;
use App\Models\Order;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {

        $project = Project::inRandomOrder()->first() ?? Project::factory()->create();
        $worker = User::where('company_id', $project->company_id)->where('job', 'worker')->inRandomOrder()->first() ?? User::factory()->create(['company_id'=>$project->company_id,'job'=> 'worker' ]);
/*

        $worker_id =  User::where('job', 'worker')->pluck('id');
        $random_worker = fake()->randomElement($worker_id);*/

        $random_state = rand(0, 1) ? OrderStates::Pending->value : OrderStates::Completed->value;
        /*$random_company = Company::exists() ? Company::all()->pluck('id')->random() : Company::factory()->create()->id;*/

        return [
            'user_id' => $worker->id,
            'company_id' => $project->company_id,
            'project_id' => $project->id,
            'order_state' => $random_state,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

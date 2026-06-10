<?php

namespace Database\Factories;

use App\Enums\OrderStates;
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

        $worker_id =  User::where('job', 'worker')->pluck('id');
        $random_worker = fake()->randomElement($worker_id);
        $random_project = Project::all()->pluck('project_id');
        $random_state = rand(0, 1) ? OrderStates::Pending->value : OrderStates::Completed->value;

        return [
            'user_id' => $random_worker,
            'project_id' => fake()->randomElement($random_project),
            'order_state' => $random_state,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

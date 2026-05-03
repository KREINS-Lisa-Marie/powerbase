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
        $phone_worker = User::where('id', $random_worker)->pluck('users.phone');
        $random_project = Project::all()->pluck('project_name');
        $random_state = rand(0, 1) ? OrderStates::Pending->value : OrderStates::Completed->value;

        return [
            'for_who' => $random_worker,
            'phone' => $phone_worker,
            'project_name' => fake()->randomElement($random_project),
            'order_state' => $random_state,
            'ordered_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

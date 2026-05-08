<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'first_name' => 'Test User',
            'last_name' => 'User',
            'phone' => fake()->phoneNumber(),
            'job' => 'admin',
            'private_phone'=>fake()->phoneNumber(),
            'private_address'=>fake()->address(),
            'email' => 'test@example.com',
            'password' => Hash::make('test'),
        ]);

        $user = User::factory()->create([
            'first_name' => 'Anika',
            'last_name' => 'Ing',
            'phone' => fake()->phoneNumber(),
            'job' => 'worker',
            'private_phone'=>fake()->phoneNumber(),
            'private_address'=>fake()->address(),
            'email' => 'anika@gmail.com',
            'password' => Hash::make('test'),
        ]);

        $user2 = User::factory(15)->create();

        //$products = Product::factory(15)->create();
        //var_dump(User::where('job', 'worker')->pluck('id'));
        $this->call(ProductsSeeder::class);
        $projects = Project::factory(15)->create();
        $orders = Order::factory(15)->create();
    }
}

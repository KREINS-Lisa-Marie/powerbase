<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
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

        $this->call(ProductsSeeder::class);

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

        $users = User::factory(15)->create();
        $workers = User::factory(15)->create(['job'=>'worker']);



        $projects = Project::factory(15)->create([
            'user_id'=>$workers->random()->id,
        ]);
        $orders = Order::factory(15)->create([
            'user_id'=>$workers->random()->id,
            'project_id'=>$projects->random()->id,
        ]);

        $products = Product::all();

        $order_items = OrderItem::factory(15)->create([
            'order_id'=>$orders->random()->id,
            'product_id'=>$products->random()->id,
        ]);
    }
}


//$products = Product::factory(15)->create();
//var_dump(User::where('job', 'worker')->pluck('id'));

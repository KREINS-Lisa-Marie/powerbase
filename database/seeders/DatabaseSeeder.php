<?php

namespace Database\Seeders;

//use App\Models\Order;
//use App\Models\OrderItem;
//use App\Models\Product;
//use App\Models\Project;
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
//real data
        $this->call(ProductsSeeder::class);

        if (!User::where('email', 'marc.arimont@powerbase.com')->exists()){
            User::create([
                'first_name' => 'Marc',
                'last_name' => 'Arimont',
                'phone' => '0123456789',
                'job' => 'admin',
                'private_phone'=>'1234567890',
                'private_address'=>'Rue de la maison 2, 4000 Liège',
                'email' => 'marc.arimont@powerbase.com',
                'password' => Hash::make(config('admin.boss_password')),
            ]);
        }
        if (!User::where('email', 'lisa-marie.kreins@student.hepl.be')->exists()) {
            User::create([
                'first_name' => 'General',
                'last_name' => 'Admin',
                'phone' => '9876543210',
                'job' => 'admin',
                'private_phone' => '0987654321',
                'private_address' => 'Rue de l’église 7, 4000 Liège',
                'email' => 'lisa-marie.kreins@student.hepl.be',
                'password' => Hash::make(config('admin.password')),
            ]);
        }

//needed to do this because i dont want the passwords to be online so that everybody can see them.


  //Testing Data
        /*User::factory()->create([
            'first_name' => 'Test User',
            'last_name' => 'User',
            'phone' => fake()->e164PhoneNumber(),
            'job' => 'admin',
            'private_phone'=>fake()->e164PhoneNumber(),
            'private_address'=>fake()->address(),
            'email' => 'test@example.com',
            'password' => Hash::make('test'),
        ]);

        $user = User::factory()->create([
            'first_name' => 'Anika',
            'last_name' => 'Ing',
            'phone' => fake()->e164PhoneNumber(),
            'job' => 'worker',
            'private_phone'=>fake()->e164PhoneNumber(),
            'private_address'=>fake()->address(),
            'email' => 'anika@gmail.com',
            'password' => Hash::make('test'),
        ]);

        $users = User::factory(15)->create();
        $workers = User::factory(15)->create(['job'=>'worker']);

        $projects = Project::factory(15)->create([
            'user_id'=>$workers->random()->id,
        ]);

       //j'ai fait for i parce que sinon ça garde le même id pour tous
        for ($i = 0; $i<15; $i++){
             Order::factory()->create([
                'user_id'=>$workers->random()->id,
                'project_id'=>$projects->random()->id,
            ]);
        }

        for ($i = 0; $i<3; $i++) {
            $orders_anika = Order::factory()->create([
                'user_id' => $user->id,
                'project_id' => $projects->random()->id,
            ]);
        }

        $orders = Order::all();

        $products = Product::all();


        //Pour chaque commande -> 3 produits
        foreach ($orders as $order){
            $random_products = $products->random(3);

            //pour chaque produit, ajouter à la commande
            foreach ($random_products as $random_product){
                OrderItem::factory()->create([
                    'order_id'=>$order->id,
                    'product_id'=>$random_product->id,
                    'quantity'=>random_int(1, 15),
                ]);
            }
        }*/
    }
}

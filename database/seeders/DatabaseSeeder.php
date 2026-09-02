<?php

namespace Database\Seeders;

//use App\Models\Order;
//use App\Models\OrderItem;
//use App\Models\Product;
//use App\Models\Project;
use App\Models\Company;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductSetting;
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
//real data
        $this->call(ProductsSeeder::class);

        $company = \App\Models\Company::firstOrCreate(['name' => 'Electro Maes']);


        if (!User::where('email', 'marc.arimont@powerbase.com')->exists()){
            User::create([
                'first_name' => 'Marc',
                'last_name' => 'Arimont',
                'company_id' => $company->id,
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
                'company_id' => $company->id,
                'phone' => '9876543210',
                'job' => 'admin',
                'private_phone' => '0987654321',
                'private_address' => 'Rue de l’église 7, 4000 Liège',
                'email' => 'lisa-marie.kreins@student.hepl.be',
                'password' => Hash::make(config('admin.password')),
            ]);
        }
        if (!User::where('email', 'pierre@powerbase.com')->exists()) {
            User::create([
                'first_name' => 'Pierre',
                'last_name' => 'Simon',
                'company_id' => $company->id,
                'phone' => '03284380',
                'job' => 'worker',
                'private_phone' => '0987654321',
                'private_address' => 'Rue de l’église 2, 4000 Liège',
                'email' => 'pierre@powerbase.com',
                'password' => Hash::make(config('admin.password')),
            ]);
        }
        if (!User::where('email', 'kevin@powerbase.com')->exists()) {
            User::create([
                'first_name' => 'Kevin',
                'last_name' => 'Meunier',
                'company_id' => $company->id,
                'phone' => '02383042',
                'job' => 'storekeeper',
                'private_phone' => '0987654321',
                'private_address' => 'Rue de Seraing 5, 4000 Liège',
                'email' => 'kevin@powerbase.com',
                'password' => Hash::make(config('admin.password')),
            ]);
        }
        if (!User::where('email', 'alfredo@powerbase.com')->exists()) {
            User::create([
                'first_name' => 'Alfredo',
                'last_name' => 'Stivale',
                'company_id' => $company->id,
                'phone' => '0437943210',
                'job' => 'worker',
                'private_phone' => '0987654321',
                'private_address' => 'Rue de la main 7, 4000 Liège',
                'email' => 'alfredo@powerbase.com',
                'password' => Hash::make(config('admin.password')),
            ]);
        }
        if (!User::where('email', 'maxime@powerbase.com')->exists()) {
            User::create([
                'first_name' => 'Maxime',
                'last_name' => 'Lemaire',
                'company_id' => $company->id,
                'phone' => '03479324',
                'job' => 'worker',
                'private_phone' => '0987654321',
                'private_address' => 'Rue de la cerise 9, 4000 Liège',
                'email' => 'maxime@powerbase.com',
                'password' => Hash::make(config('admin.password')),
            ]);
        }
        if (!User::where('email', 'tom@powerbase.com')->exists()) {
            User::create([
                'first_name' => 'Tom',
                'last_name' => 'Bertrand',
                'company_id' => $company->id,
                'phone' => '032383042',
                'job' => 'storekeeper',
                'private_phone' => '0987654321',
                'private_address' => 'Rue de Liège 3, 4000 Liège',
                'email' => 'tom@powerbase.com',
                'password' => Hash::make(config('admin.password')),
            ]);
        }


        if (!User::where('email', 'martin@powerbase.com')->exists()) {
            User::create([
                'first_name' => 'Martin',
                'last_name' => 'Servais',
                'company_id' => $company->id,
                'phone' => '094449324',
                'job' => 'storekeeper',
                'private_phone' => '0987654321',
                'private_address' => 'Rue d’Eupen 24, 4000 Liège',
                'email' => 'martin@powerbase.com',
                'password' => Hash::make(config('admin.password')),
            ]);
        }

        if (!User::where('email', 'nico@powerbase.com')->exists()) {
            User::create([
                'first_name' => 'Nico',
                'last_name' => 'Servais',
                'company_id' => $company->id,
                'phone' => '094449324',
                'job' => 'worker',
                'private_phone' => '09876321',
                'private_address' => 'Rue de la ville 24, 4000 Liège',
                'email' => 'nico@powerbase.com',
                'password' => Hash::make(config('admin.password')),
            ]);
        }

        if (!User::where('email', 'bob@powerbase.com')->exists()) {
            User::create([
                'first_name' => 'Bob',
                'last_name' => 'Martin',
                'company_id' => $company->id,
                'phone' => '0432449324',
                'job' => 'worker',
                'private_phone' => '098948321',
                'private_address' => 'Rue d’Eupen 4, 4000 Liège',
                'email' => 'bob@powerbase.com',
                'password' => Hash::make(config('admin.password')),
            ]);
        }



        //company 2

        $company2 = \App\Models\Company::firstOrCreate(['name' => 'Electro Servais']);

        if (!User::where('email', 'aline@powerbase.com')->exists()) {
            User::create([
                'first_name' => 'Aline',
                'last_name' => 'Melot',
                'company_id' => $company2->id,
                'phone' => '9876233210',
                'job' => 'admin',
                'private_phone' => '0237654321',
                'private_address' => 'Rue de l’église 87, 4000 Liège',
                'email' => 'aline@powerbase.com',
                'password' => Hash::make(config('admin.password')),
            ]);
        }
        if (!User::where('email', 'michelle@powerbase.com')->exists()) {
            User::create([
                'first_name' => 'Michelle',
                'last_name' => 'Dosquet',
                'company_id' => $company2->id,
                'phone' => '03287380',
                'job' => 'worker',
                'private_phone' => '0956654321',
                'private_address' => 'Rue de l’église 27, 4000 Liège',
                'email' => 'michelle@powerbase.com',
                'password' => Hash::make(config('admin.password')),
            ]);
        }
        if (!User::where('email', 'julie@powerbase.com')->exists()) {
            User::create([
                'first_name' => 'Julie',
                'last_name' => 'Levin',
                'company_id' => $company2->id,
                'phone' => '043383042',
                'job' => 'storekeeper',
                'private_phone' => '0439654321',
                'private_address' => 'Rue de Seraing 45, 4000 Liège',
                'email' => 'julie@powerbase.com',
                'password' => Hash::make(config('admin.password')),
            ]);
        }


        //delete when production
        if (app()->environment('local')) {
            $projects = Project::factory(5)->create();

            $orders = Order::factory(20)->create();
            //$products = Product::inRandomOrder()->take(rand(1,5))->get();

            foreach (Order::all() as $order) {
                foreach (Product::inRandomOrder()->take(rand(1, 5))->get() as $product) {       //entre 1 et 5 produits
                    OrderItem::firstOrCreate(
                            ['order_id' => $order->id, 'product_id' => $product->id,],
                            ['quantity' => random_int(1, 10)],
                    );
                }
            }

            foreach (Company::all() as $company) {
                foreach (Product::inRandomOrder()->take(rand(1, 5))->get() as $product) {
                    ProductSetting::firstOrCreate(
                            ['company_id' => $company->id, 'product_id' => $product->id,],
                            ['quantity' => random_int(1, 50)],
                    );
                }
            }

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

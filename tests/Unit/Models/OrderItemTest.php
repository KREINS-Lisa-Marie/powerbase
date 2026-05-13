<?php
use Illuminate\Foundation\Testing\RefreshDatabase;
uses(RefreshDatabase::class);


//good

it('can create orders', function () {

    $user = \App\Models\User::factory()->create(['job'=>'worker']);
    $project = \App\Models\Project::factory()->create(['project_name'=>'leprojet']);
    $orders = [];
    $orders = \App\Models\Order::factory(5)->create([
        'user_id'=>$user->id,
        'project_id'=>$project->id
    ]);

    expect($orders)->toHaveCount(5);
});

it('can create orderItems', function () {

    $user = \App\Models\User::factory()->create(['job'=>'worker']);
    $products = \App\Models\Product::factory(10)->create();
    $random_product = fake()->randomElement($products);
    $project = \App\Models\Project::factory()->create(['project_name'=>'leprojet']);
    $order = \App\Models\Order::factory()->create([
        'user_id'=>$user->id,
        'project_id'=>$project->id
    ]);

    $orderitems = \App\Models\OrderItem::factory(5)->create([
        'order_id'=>$order->id,
        'product_id'=>$random_product->id
    ]);

    expect($orderitems)->toHaveCount(5);
});

it('belongs to an order', function () {

    $user = \App\Models\User::factory()->create(['job'=>'worker']);
    $products = \App\Models\Product::factory(10)->create();
    $random_product = $products->random();
    $project = \App\Models\Project::factory()->create(['project_name'=>'leprojet']);
    $order = \App\Models\Order::factory(5)->create([
        'user_id'=>$user->id,
        'project_id'=>$project->id
    ]);

    $random_order = $order->random();

    $orderItem = \App\Models\OrderItem::factory()->create([
        'order_id'=>$random_order->id,
        'product_id'=>$random_product->id
    ]);
    
    expect($orderItem->order)->toBeInstanceOf(\App\Models\Order::class);
});

it('belongs to a product', function () {


    $user = \App\Models\User::factory()->create(['job'=>'worker']);
    $product = \App\Models\Product::factory()->create();
    $project = \App\Models\Project::factory()->create(['project_name'=>'leprojet']);
    $order = \App\Models\Order::factory()->create([
        'user_id'=>$user->id,
        'project_id'=>$project->id
    ]);

    $orderItems = \App\Models\OrderItem::factory()->create([
        'order_id'=>$order->id,
        'product_id'=>$product->id
    ]);


    expect($orderItems->product)->toBeInstanceOf(\App\Models\Product::class);
});

<?php


use App\Models\Product;

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

it('belongs to one project', function () {

    $user = \App\Models\User::factory()->create();

    $product = Product::factory()->create();
    $project = \App\Models\Project::factory()->create([
        'user_id'=>$user->id,
    ]);

    $order = \App\Models\Order::factory()->create([
        'user_id'=>$user->id,
        'project_id'=>$project->id,
    ]);

    $order_item = \App\Models\OrderItem::factory()->create([
        'order_id'=> $order->id,
        'product_id'=>$product->id,
    ]);

    expect($order->project)->toBeInstanceOf(\App\Models\Project::class);
});

it('has many order_items who belong to an order', function () {
    $user = \App\Models\User::factory()->create();

    $products = \App\Models\Product::factory(5)->create();

    $project = \App\Models\Project::factory()->create([
        'user_id'=>$user->id,
    ]);

    $order = \App\Models\Order::factory()->create([
        'user_id'=>$user->id,
        'project_id'=>$project->id,
    ]);

    $orderitems = [];
    foreach ($products->random(5) as $product){
        $orderitems[]= \App\Models\OrderItem::factory()->create([
            'order_id'=>$order->id,
            'product_id'=>$product->id
        ]);
    }

    expect($order->orderItems)->toHaveCount(5);
});

it('belongs to one user', function () {
    $user = \App\Models\User::factory()->create();

    $product = \App\Models\Product::factory(5)->create();

    $project = \App\Models\Project::factory()->create([
        'user_id'=>$user->id,
    ]);

    $order = \App\Models\Order::factory()->create([
        'user_id'=>$user->id,
        'project_id'=>$project->id,
    ]);

    $order_item = \App\Models\OrderItem::factory()->create([
        'order_id'=> $order->id,
        'product_id'=>$product->pluck('id')->random(),
    ]);

    expect($order->user)->toBeInstanceOf(\App\Models\User::class);
});

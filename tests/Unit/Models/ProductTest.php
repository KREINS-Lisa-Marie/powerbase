<?php
use Illuminate\Foundation\Testing\RefreshDatabase;
uses(RefreshDatabase::class);


//good

it('can create products', function () {

    $products = [];
    $products = \App\Models\Product::factory(5)->create();

    expect($products)->toHaveCount(5);
});

it('has many order_items', function () {

    $user = \App\Models\User::factory()->create();
    $product = \App\Models\Product::factory()->create();
    $project = \App\Models\Project::factory()->create([
        'user_id'=>$user->id,
    ]);
    $order1 = \App\Models\Order::factory()->create([
        'user_id'=>$user->id,
        'project_id'=>$project->id
    ]);
    $order2 = \App\Models\Order::factory()->create([
        'user_id'=>$user->id,
        'project_id'=>$project->id
    ]);
    $order_items1 = \App\Models\OrderItem::factory()->create([
        'product_id' => $product->id,
        'order_id'=>$order1->id
    ]);
    $order_items2 = \App\Models\OrderItem::factory()->create([
        'product_id' => $product->id,
        'order_id'=>$order2->id
    ]);

    expect($product->orderItems)->toHaveCount(2);
});

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
    $order = \App\Models\Order::factory()->create([
        'user_id'=>$user->id,
        'project_id'=>$project->id
    ]);
    $order_items = \App\Models\OrderItem::factory(2)->create([
        'product_id' => $product->id,
        'order_id'=>$order->id
    ]);

    expect($product->orderItems)->toHaveCount(2);
});

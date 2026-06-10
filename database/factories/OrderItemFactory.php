<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    protected $model = OrderItem::class;

    public function definition(): array
    {
        $product_id =  Product::exists() ? Product::all()->pluck('id')->random() : Product::factory()->create()->id;
        $random_order = Order::exists() ? Order::all()->pluck('id')->random() : Order::factory()->create()->id;
        $quantity = rand(0, 150);

        return [
            'order_id' => $random_order,
            'product_id' => $product_id,
            'quantity' => $quantity,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'product_name' => $this->faker->name(),
            'product_description' => $this->faker->realText(),
            'product_notes' => $this->faker->text(),
            'quantity' => $this->faker->randomNumber(),
            'product_image' => $this->faker->image(),
            'brand'=>$this->faker->name(),
            'ref_article'=>$this->faker->randomAscii(),
            'gtin'=>$this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'deleted_at' => Carbon::now(),
        ];
    }
}

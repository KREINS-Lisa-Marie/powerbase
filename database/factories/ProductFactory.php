<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {

        $random_company = Company::exists() ? Company::all()->pluck('id')->random() : null;

        return [
            'product_name' => $this->faker->name(),
            'product_description' => $this->faker->realText(),
            'product_notes' => $this->faker->text(),
            /*'quantity' => $this->faker->numberBetween(0, 150),*/
            'product_image' => null,
            'brand'=>$this->faker->name(),
            'ref_article'=>$this->faker->regexify('[A-Z]{5}[0-4]{3}'),
            'gtin'=>$this->faker->randomNumber(),
            'company_id'=>$random_company,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

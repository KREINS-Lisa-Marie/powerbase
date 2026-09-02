<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Product;
use App\Models\ProductSetting;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductSettingFactory extends Factory
{
    protected $model = ProductSetting::class;

    public function definition(): array
    {
        $product_id =  Product::exists() ? Product::all()->pluck('id')->random() : Product::factory()->create()->id;
        $random_company = Company::exists() ? Company::all()->pluck('id')->random() : Company::factory()->create()->id;

        return [
            'quantity'=> $this->faker->numberBetween(0, 150),
            'comment' => $this->faker->text(),
            'company_id'=>$random_company,
            'product_id'=>$product_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

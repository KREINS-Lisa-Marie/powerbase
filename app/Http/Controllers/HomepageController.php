<?php

namespace App\Http\Controllers;

/*use App\Models\Products;*/

use App\Models\Product;

class HomepageController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $products = Product::where('quantity', '>', 0)->paginate(20);

        $newest_products = Product::orderBy('created_at', 'desc')
            ->limit(4)->get();

        $random_products = Product::inRandomOrder()->limit(4)->get();

        return view('worker.homepage', compact('products', 'newest_products', 'user', 'random_products'));
    }
}

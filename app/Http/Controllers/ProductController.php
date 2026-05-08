<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('quantity', '>', 0)->paginate(20);

        return view('worker.products', compact('products'));
    }
    public function show(  String $locale, Product $product)
    {
        return view('worker.product', compact('product'));
    }
}

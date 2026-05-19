<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $search = request('search', '');        //prend soit ce que je cherche dans search, soit affiche tous les produits

        $products = Product::where('quantity', '>', 0)->paginate(20);

        return view('worker.products', ['products' => Product::query()
        ->where('product_name', 'like', '%' . $search . '%')
        ->orWhere('quantity', 'like', '%' . $search . '%')
        ->orWhere('created_at', 'like', '%' . $search . '%')
        ->orWhere('updated_at', 'like', '%' . $search . '%')
        ->orWhere('brand', 'like', '%' . $search . '%')
        ->orWhere('gtin', 'like', '%' . $search . '%')
        ->orWhere('ref_article', 'like', '%' . $search . '%')
        ->orWhere('product_description', 'like', '%' . $search . '%')
        ->orWhere('product_notes', 'like', '%' . $search . '%')
        ->paginate(20),
        ]);
    }
    public function show(  String $locale, Product $product)
    {
        return view('worker.product', compact('product'));
    }
}

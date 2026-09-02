<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $search = request('search', '');        //prend soit ce que je cherche dans search, soit affiche tous les produits
        $companyId = auth()->user()->company_id;
        //$products = Product::where('quantity', '>', 0)->paginate(20);

        return view('worker.products', ['products' => Product::query()
            ->where(function ($query) use($companyId) {     //importer $companyId pour l'utiliser
                $query->whereNull('company_id')
                    ->orWhere('company_id', $companyId);
                    })
            ->where(function ($query) use($search) {        //sinon bug pour companyId
                $query->where('product_name', 'like', '%' . $search . '%')
                    //->orWhere('quantity', 'like', '%' . $search . '%')
                    ->orWhere('brand', 'like', '%' . $search . '%')
                    ->orWhere('gtin', 'like', '%' . $search . '%')
                    ->orWhere('ref_article', 'like', '%' . $search . '%')
                    ->orWhere('product_description', 'like', '%' . $search . '%')
                    ->orWhere('product_notes', 'like', '%' . $search . '%');
                })
                ->orderBy('product_name', 'asc')
                ->paginate(20)->onEachSide(0),
                'title' => __('general.worker_products')]);
    }
}

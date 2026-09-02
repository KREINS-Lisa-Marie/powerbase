<?php

namespace App\Http\Controllers;

/*use App\Models\Products;*/

use App\Models\Product;

class HomepageController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $companyId = $user->company_id;
        //$products = Product::where('quantity', '>', 0)->paginate(20);

        $newest_products = Product::where(function ($query) use ($companyId) {
                $query->whereNull('company_id')
                    ->orWhere('company_id', $companyId);
            })->orderBy('created_at', 'desc')
            ->limit(4)->get();

        $random_products = Product::where(function ($query) use ($companyId) {
            $query->whereNull('company_id')
                ->orWhere('company_id', $companyId);
        })->withCount('orderItems')
            ->orderBy('order_items_count', 'desc')
            ->limit(8)
            ->get();

        $title =__('general.homepage');

        return view('worker.homepage', compact( 'newest_products', 'user', 'random_products', 'title'));
    }
}

/*
 https://laraveldaily.com/post/eloquent-withcount-get-related-records-amount
https://laravel.com/docs/13.x/eloquent-relationships#counting-related-models
*/

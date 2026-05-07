<?php

use Illuminate\Validation\Rule;
use Livewire\Component;

new class extends Component
{

    public string $product_name = '';
    public string $brand = '';
    public string $product_notes= '' ;
    public string $ref_article ='';
    public string $gtin ='';
    public string $quantity = '';
    public string $product_description= '';
    public string $product_image = '';

    public function store(): void
    {
        $validated_data= $this->validate([
            'product_name'=>'required|string|max:255',
            'brand'=>'string|required|max:255',
            'product_notes'=>['string'],
            'ref_article'=>'string|required|max:255',
            'gtin'=>['required','string','max:255',Rule::unique('products')],
            'product_description'=>'string',
            'quantity'=>'required|int',
            'product_image'=>'string',
        ]);


        $product = \App\Models\Product::create([
            'product_name'=>$validated_data['product_name'],
            'brand'=>$validated_data['brand'],
            'product_notes'=>$validated_data['product_notes'],
            'ref_article'=>$validated_data['ref_article'],
            'gtin'=>$validated_data['gtin'],
            'product_description'=>$validated_data['product_description'],
            'quantity'=>$validated_data['quantity'],
            'product_image'=>$validated_data['product_image'],
        ]);

        $this->redirectRoute('pages::products.index', ['locale' => __('general.currentLocale')]);
    }
};

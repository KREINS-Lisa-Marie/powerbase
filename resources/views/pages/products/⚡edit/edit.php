<?php

use App\Models\Product;
use Illuminate\Validation\Rule;
use Livewire\Component;

new class extends Component
{
    //public $product_id;

    public Product $product;

    public string $product_name = '';
    public string $brand = '';
    public string $product_notes= '' ;
    public string $ref_article ='';
    public string $gtin ='';
    public string $quantity= '';
    public string $product_description= '';
    public string $product_image= '';


    public function mount(Product $product)         //avant de render ( 1x seulement)
    {
        $this->product = $product;
        $this->product_name = $product->product_name;
        $this->brand = $product->brand;
        $this->product_notes = $product->product_notes  ?? '';
        $this->ref_article = $product->ref_article ?? '';
        $this->gtin = $product->gtin ;
        $this->quantity = $product->quantity ?? 0;
        $this->product_description = $product->product_description ?? '';
        $this->product_image = $product->product_image ?? '';

        /*//$this->product_id = $product->id;*/
    }

/*    public function render()        //à chaque fois que qqch sur la page change
    {
        return view('pages.products.⚡edit.edit');
    }*/
    public function save(): void
    {
        $validated_data= $this->validate([
            'product_name'=>'required|string|max:255',
            'brand'=>'string|required|max:255',
            'product_notes'=>['string'],
            'ref_article'=>'string|required|max:255',
            'gtin' => ['required', 'string', 'max:255', Rule::unique('products')->ignore        ($this->product->id)],  //sinon fail
            'product_description'=>'string',
            'quantity'=>'required|integer',
            'product_image'=>'string',
        ]);

        $this->product->update([
            'product_name'=>$validated_data['product_name'],
            'brand'=>$validated_data['brand'],
            'product_notes' => $validated_data['product_notes'],
            'ref_article'=>$validated_data['ref_article'],
            'gtin'=>$validated_data['gtin'],
            'product_description'=>$validated_data['product_description'],
            'quantity'=>$validated_data['quantity'],
            'product_image'=>$validated_data['product_image'],
        ]);

        $this->redirect(route('pages::products.show', ['locale' => __('general.currentLocale'), 'product'=>$this->product]));
    }
};

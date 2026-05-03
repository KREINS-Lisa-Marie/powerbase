<?php

use App\Models\Product;
use Livewire\Component;

new class extends Component
{
    public $product_id;

    public function mount(Product $product)         //avant de render ( 1x seulement)
    {

        $this->product_id = $product->id;
    }

    public function render()        //à chaque fois que qqch sur la page change
    {
        return view('pages.products.⚡edit.edit');
    }
};

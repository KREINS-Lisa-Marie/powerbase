<?php

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component
{
    use WithPagination;
    //public $products;
/*    public function mount()         //avant de render ( 1x seulement)
    {
        $this->products = Product::get();
    }*/

    public $search = '';
    public function render()        //à chaque fois que qqch sur la page change
    {
        return view('pages.products.⚡index.index', [
            'products' => \App\Models\Product::query()
                ->where('product_name', 'like', '%' . $this->search . '%')
                ->orWhere('quantity', 'like', '%' . $this->search . '%')
                ->orWhere('created_at', 'like', '%' . $this->search . '%')
                ->orWhere('updated_at', 'like', '%' . $this->search . '%')
                ->orderBy('product_name', 'asc')
                ->paginate(10),
        ]);
    }





};

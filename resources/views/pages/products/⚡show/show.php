<?php

use App\Models\Product;
use Livewire\Component;

new class extends Component
{

    public $product_id;

    public function mount(Product $product)         //avant de render ( 1x seulement)
    {
        $this->authorize('view', $product);
        $this->product_id = $product->id;
    }

    public function render()        //à chaque fois que qqch sur la page change
    {
        $product = Product::findOrFail($this->product_id);
        $user = auth()->user();
        $productQuantity = \App\Models\ProductSetting::where('company_id', $user->company_id)
            ->where('product_id', $product->id)->first();

        return view('pages.products.⚡show.show',['product' => $product, 'user' => $user, 'productQuantity'=> $productQuantity] )->title(__('general.detail_product'));
    }

    public function destroy()
    {
        $product = Product::findOrFail($this->product_id);
        $product->delete();
        return redirect(route('pages::products.index', ['locale' => app()->getLocale()]));
    }
};

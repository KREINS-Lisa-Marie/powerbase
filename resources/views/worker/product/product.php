<?php

use App\Models\Product;
use Livewire\Component;

new class extends Component
{
    public \App\Models\Product $product;

    public int $quantity = 1;
    public string $successMessage = '';     //message pour dire à l'utilisateur qu'il a mis le produit en panier parce que sinon, on ne voit pas si ça a marché ou pas.
    public $cart = [];

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function addToOrder( int $productId)
    {
        $product = \App\Models\Product::findOrFail($productId);
        $cart = session()->get('cart', []); //valeurs de cart ou si il y en a pas alors vide
        //faut utiliser session parce que sinon je peux pas les passer de product à order

        if (!isset($cart[$productId])){
            $cart[$productId] = [
                'name' => $product->product_name,
                'quantity' => $this->quantity,
            ];
        }
        else{
            $cart[$productId]['quantity'] = $cart[$productId]['quantity'] +$this->quantity;
        }

        session()->put('cart', $cart);      //sauvegarder les données dans cart pour les avoir dans order
        //$request->session() ne marche pas parce que je suis dans livewire et pas dans un controlleur simple
        //https://laravel.com/docs/13.x/session#storing-data

        $this->successMessage = '';     // Réinitialise le message pour le réafficher si je remets un produit
        $this->successMessage = __('worker/product.added_to_cart');
    }

    public function render()
    {
        return view('worker::product.product')->layout('components.worker.app');
    }
};

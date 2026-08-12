<?php

use App\Models\OrderItem;
use App\Models\Product;
use Livewire\Component;

new class extends Component
{
    public Product $product;

    public int $quantity = 1;
    public string $successMessage = '';     //message pour dire à l'utilisateur qu'il a mis le produit en panier parce que sinon, on ne voit pas si ça a marché ou pas.
    public $cart = [];

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function addToOrder( int $productId)
    {
        $product = Product::findOrFail($productId);
        $cart = session()->get('cart', []); //valeurs de cart ou si il y en a pas alors vide
        //faut utiliser session parce que sinon je peux pas les passer de product à order

        if ($this->quantity>=1){
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
        }else{
            $this->addError('cart', __('worker/product.qt_must_be_one'));
            return;
        }
    }

    public function render()
    {

        $user= Auth::user();
        //commandes du user
        $user_orders =  \App\Models\Order::where('user_id', $user->id)->get();

        //id des commmandes du user
        $orders_ids = $user_orders->pluck('id');

        // reprend tous les orderitems ou l'id est orders_id (ceux du user)
        $user_order_items = OrderItem::whereIn('order_id', $orders_ids)->get();

        //reprend le nom et la qt totale des produits commandés
        $most_ordered = $user_order_items->groupBy('product_id')->map(function ($items) {       //grouper par product_id
            // map pour faire un array de chaque produit (chaque produit est un groupe)
            return [
                'product' => \App\Models\Product::findOrFail($items->first()->product_id),
                'total_quantity' => $items->sum('quantity'),//sum calcule la somme de l'addition des produits
            ];
        })
            ->sortByDesc('total_quantity')      // trie descandant pour la qt totale
            ->take(3);

        // 3 derniers produits que le user a commandé
        $last_ordered = OrderItem::whereIn('order_id', $orders_ids)->latest()->limit(3)->get();


        return view('worker::product.product', compact('most_ordered', 'last_ordered'))->layout('components.worker.app')->title(__('general.worker_product'));
    }
};

<?php

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;

new class extends Component
{
    public  $search = '';
    public $cart = [];
    public $searchedProduct = [];

    public Order $order;

    public string $user_id = '';
    public string $order_state = '' ;
    public string $project_id ='';


    public function mount(Order $order): void
    {
        //ça définit les trucs à afficher

        $this->order = $order;
        $this->user_id = $order->user_id;
        $this->order_state = $order->order_state;
        $this->project_id = $order->project_id;

        foreach ($order->orderItems as $orderItem){
            $this->cart[$orderItem->product_id] = [
              'name'=>   $orderItem->product->product_name,
              'quantity'=>   $orderItem->quantity,
              'originalquantity'=>   $orderItem->quantity,
            ];
        }
    }


    public function updatedSearch()         //ça actualise automatiquement via livewire la search
    {
        $this->searchedProduct =  Product::query()
            ->where('product_name', 'like', '%' . $this->search . '%')
            ->orWhere('gtin', 'like', '%' . $this->search . '%')
            ->orWhere('ref_article', 'like', '%' . $this->search . '%')
            ->orWhere('brand', 'like', '%' . $this->search . '%')
            ->limit(6)
            ->get();
    }

    public function addToOrder( int $productId)     //ça ajoute à la commande
    {
        $product = Product::findOrFail($productId);

        if (!isset($this->cart[$productId])){
            $this->cart[$productId] = [
                'name' => $product->product_name,
                'quantity' => 1,
                'originalquantity' => 0,
            ];
        }
        $this->search = '';
        $this->searchedProduct = [];
    }

    public function updateQuantity( int $new_quantity, int $productId)
    {
        $this->cart[$productId]['quantity'] = $new_quantity;
    }

    public function removeFromOrder( int $productId)            //supprimer de la commande
    {
        $product = Product::findOrFail($productId);
        $product->increment('quantity', $this->cart[$productId]['quantity']);       //augmente le stock du produit supprimé de la commande

        $order = $this->order;
        $order->orderItems()->where('product_id', $productId)->delete();        //supprime

        unset($this->cart[$productId]);
    }

    public function save(): void
    {
        //je dois faire ça parce que si je ne le fais pas, je peux max changer 1-2 commandes et puis ça ne sauvegarde plus rien parce que order_state etc sont vides

        if (empty($this->order_state)){
            $this->order_state = $this->order->order_state;
        }
        if (empty($this->user_id)){
            $this->user_id = $this->order->user_id;
        }
        if (empty($this->project_id)){
            $this->project_id = $this->order->project_id;
        }

//validation
        $validated_data= $this->validate([
            'user_id'=>'required|integer',
            'order_state'=>'string|required',
            'project_id'=>'required|integer',
        ]);

//update
        $this->order->update([
            'user_id'=>$validated_data['user_id'],
            'order_state'=>$validated_data['order_state'],
            'project_id'=>$validated_data['project_id'],
        ]);

        $order = $this->order;


        //update les qt des produits du panier
        foreach ($this->cart as $productId=>$item){
            $originalqt = $item['originalquantity'] ?? 0;
            $newqt = $item['quantity'];

            $qt_difference = $newqt - $originalqt;


            $order->orderItems()->upsert(
                [
                    [
                        'order_id'=> $order->id,
                        'product_id'=> $productId,
                        'quantity'=> $newqt,
                    ]
                ],
                [
                    'order_id',         //unique by
                    'product_id',
                ],
                [
                    'quantity'              //update
                ]
            );


            $product= Product::findOrFail( $productId);

            //changer la différence dans le stock
            if ($qt_difference>0){
                $product->decrement('quantity', $qt_difference);
            }elseif($qt_difference<0){
                $product->increment('quantity', $qt_difference);
            }
        }


        $this->cart= [];
        $this->redirect(route('pages::orders.show', ['locale' => __('general.currentLocale'), 'order'=>$this->order]));
    }
};

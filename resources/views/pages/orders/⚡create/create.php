<?php

use Livewire\Component;

new class extends Component
{
    public  $search = '';
    public $cart = [];
    public $searchedProduct = [];

    public string $user_id = '';
    public string $project_id = '';
    public string $order_state = '' ;


    public function updatedSearch()         //ça actualise automatiquement via livewire la search
    {
        $this->searchedProduct =  \App\Models\Product::query()
            ->where('product_name', 'like', '%' . $this->search . '%')
            ->orWhere('gtin', 'like', '%' . $this->search . '%')
            ->orWhere('ref_article', 'like', '%' . $this->search . '%')
            ->orWhere('brand', 'like', '%' . $this->search . '%')
            ->limit(6)
            ->get();
    }

    public function addToOrder( int $productId)
    {
    $product = \App\Models\Product::findOrFail($productId);

    if (!isset($this->cart[$productId])){
        $this->cart[$productId] = [
            'name' => $product->product_name,
            'quantity' => 1,
        ];
        }
          $this->search = '';
        $this->searchedProduct = [];
    }


    public function removeFromOrder( int $productId)
    {
        unset($this->cart[$productId]);
    }

    public function store(): void
    {
        $validated_data= $this->validate([
            'user_id'=>'required|integer',
            'order_state'=>'string|required|max:255',
            'project_id'=>'required|integer',
        ]);

        if (empty($this->cart)){
            $this->addError('cart', __('admin/orders.choose_product'));
            return;
        }

        $order = \App\Models\Order::create([
            'user_id'=>$validated_data['user_id'],
            'order_state'=>$validated_data['order_state'],
            'project_id'=>$validated_data['project_id'],
        ]);

        foreach ($this->cart as $productId=>$item){
            $order->orderItems()->create([
               'product_id'=> $productId,
                'quantity'=> $item['quantity'],
            ]);
            \App\Models\Product::findOrFail( $productId)
                ->decrement('quantity', $item['quantity']);
        }


        $this->redirectRoute('pages::orders.index', ['locale' => __('general.currentLocale')]);
    }
};

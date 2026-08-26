<?php

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component
{
    use WithPagination;

    public $search = '';
    public $user;

//tri
    public $sortField = 'user_id';
    public $sortDirection = 'asc';
    protected $queryString = ['sortField', 'sortDirection'];

    public $categoryFilters= [];
    public $categories = [];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }


    public function mount()         //avant de render ( 1x seulement)
    {
        $this->user = Auth::user();
        $orders = Order::where('user_id', $this->user->id);

        $this->authorize('viewAnyLimited', Order::class);

        $this->categories = \App\Models\Product::query()
            ->whereNotNull('product_notes')
            ->distinct()
            ->pluck('product_notes');

    }

    public function selectCategoryFilter($category)
    {
        if (in_array($category, $this->categoryFilters)){       //si coché alors décocher
            unset($this->categoryFilters[$category]);
        }else{
            $this->categoryFilters[$category] = $category;      //sinon cocher
        }
    }


    public function render(): View
    {
        $search = strtolower($this->search);

       /* return view('worker::orders.orders', [
            'orders' => Order::query()
                ->withCount('orderItems')       //pour savoir combien d'item il y a dans chaque commande
                ->where('user_id', $this->user->id)
                /*->join('order_items', 'orders.id', '=', 'order_items.order_id')      //join parce que sinon je ne peux pas acceder au nom du user
                ->select('orders.*', 'users.first_name', 'users.last_name')     //prend des commandes pour le prénom ou nom de.../
                ->where('orders.created_at', 'like', '%' . $search . '%')
                ->orWhere('orders.order_state', 'like', '%' . $search . '%')
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(10)->onEachSide(0)
        ])->layout('components.worker.app')->title(__('general.worker_orders'));*/

         $orders =  Order::query()
                 ->withCount('orderItems')       //pour savoir combien d'item il y a dans chaque commande
                 ->where('user_id', $this->user->id);

         if ($search){
             $productsIds = \App\Models\Product::query()
                 ->where('products.brand', 'like', '%' . $search . '%')
                 ->orWhere('products.ref_article', 'like', '%' . $search . '%')
                 ->orWhere('products.product_name', 'like', '%' . $search . '%')
                 ->orWhere('products.gtin', 'like', '%' . $search . '%')
                 ->pluck('id');

             $orderIds = OrderItem::whereIn('product_id', $productsIds)->pluck('order_id');
            $orders = $orders->whereIn('id', $orderIds);
         }



            if ($this->categoryFilters){
                $products = \App\Models\Product::whereIn('product_notes', $this->categoryFilters);
                $productsIds= $products->pluck('id');
                $categoryOrderItems = \App\Models\OrderItem::whereIn('product_id', $productsIds);
                $categoryOrderItemsIds= $categoryOrderItems->pluck('order_id');
                $orders = $orders->whereIn('id', $categoryOrderItemsIds);
            }

            $orders = $orders
                ->orderBy($this->sortField, $this->sortDirection)
                 ->paginate(10)->onEachSide(0);


        return view('worker::orders.orders', [
            'orders' => $orders,
            'categories'=>$this->categories,
        ])->layout('components.worker.app')->title(__('general.worker_orders'));



    }
};

<?php

use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Validation\Rule;
use Livewire\Component;

new class extends Component
{
    public $cart = [];

    public string $user_id = '';
    public string $project_id = '';
    public string $order_state = '' ;


    public function incrementQuantity(int $productId)
    {
        if (!isset($this->cart[$productId])){       //si le produit n'existe pas dans cart
            $this->cart[$productId]['quantity'] = 0;
        }
        $currentQt = $this->cart[$productId]['quantity'] ?? 0;
        $this->cart[$productId]['quantity'] = $currentQt + 1;
        session()->put('cart', $this->cart);
    }

    public function decrementQuantity(int $productId)
    {
        $currentQt = $this->cart[$productId]['quantity'] ?? 0;

        if ($currentQt >= 1){       //si qt>=1
            $this->cart[$productId]['quantity'] = $currentQt -1 ;
            session()->put('cart', $this->cart);
        }
    }


    public function mount()
    {
        $this->cart = session()->get('cart', []);       //recuperer mon cart
    }

    public function removeFromOrder( int $productId)
    {
        unset($this->cart[$productId]);
        session()->put('cart', $this->cart);        //je dois faire ça parce que sinon si je recharge, ça n'a pas supprimé le produit
    }

    public function updatedCart()       //https://livewire.laravel.com/docs/4.x/lifecycle-hooks
    {
       session()->put('cart', $this->cart); //je dois faire ça parce que sinon si je recharge, ça n'a pas actualisé la qt
    }

    public function store(): void
    {
        $companyId = auth()->user()->company_id;

        if (empty($this->cart) || $this->cart == null){
            $this->addError('no_product_chosen', __('worker/order.needs_product'));
            return;
        }
        foreach ($this->cart as $productId=>$item){
            if (empty($item['quantity']) || $item['quantity'] <1 ){
                $this->addError('qt_over_one', __('worker/order.increment_qt'));
                return;
            }
            //vérifier que l'on ne met pas produits d'une autre company
            $allowedProducts = Product::where('id', $productId)
                ->where(function ($query) use($companyId) {     //importer $companyId pour l'utiliser
                    $query->whereNull('company_id')
                        ->orWhere('company_id', $companyId);
                })->exists();
            if (!$allowedProducts){
                $this->addError('productNotAllowed', __('worker/order.product_not_allowed'));
                return;
            }
        }



        $validated_data= $this->validate([
            'project_id'=>['required','integer', Rule::exists('projects', 'id')->where('company_id', $companyId)]
        ]);

        $order = \App\Models\Order::create([
            'user_id'=> auth()->user()->id,
            'company_id'=> $companyId,
            'order_state'=>'pending',
            'project_id'=>$validated_data['project_id'],
        ]);

        foreach ($this->cart as $productId=>$item){
            $order->orderItems()->create([
                'product_id'=> $productId,
                'quantity'=> $item['quantity'],
            ]);
            \App\Models\ProductSetting::where('company_id', $companyId)
                ->where( 'product_id', $productId)
                ->decrement('quantity', $item['quantity']);
        }

        //réinitialiser tout après avoir créé la commande
        $this->cart=[];
        session()->put('cart', []);
        $this->project_id='';

        $this->redirectRoute('worker::cart', ['locale' => __('general.currentLocale')]);
    }

    public function render()
    {
        $companyId= auth()->user()->company_id;
        $projects = \App\Models\Project::where('company_id', $companyId)->get();

        $orders_project_options = [];
        foreach ($projects as $project){
            $orders_project_options[] =
                [
                    'name' => $project->project_name,
                    'value' => $project->id,
                ];
        }


/*  Possible content for the suggestions

     $newest_products = Product::orderBy('created_at', 'desc')
            ->limit(4)->get();

        $random_products = Product::withCount('orderItems')
            ->orderBy('order_items_count', 'desc')
            ->limit(8)
            ->get();
*/

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



/*        $users = \App\Models\User::all();

        $orders_users_options = [];
        foreach ($users as $user){
            $orders_users_options[] =
                [
                    'name' => "$user->first_name $user->last_name",
                    'value' => $user->id,
                ];
        }*/



        $user = auth()->user()->id;
        $old_orders = \App\Models\Order::where('user_id', '=', $user)->orderByDesc('id')->get();

        return view('worker::cart.cart', compact('old_orders', 'user', 'projects', 'most_ordered', 'last_ordered', 'orders_project_options'/*, 'orders_users_options'*/))->layout('components.worker.app')->title(__('general.worker_cart'));
    }
};

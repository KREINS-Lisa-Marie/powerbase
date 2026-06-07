<?php

use Livewire\Component;

new class extends Component
{
    public $cart = [];

    public string $user_id = '';
    public string $project_id = '';
    public string $order_state = '' ;


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
        $validated_data= $this->validate([
            'project_id'=>'required|integer',
        ]);

        $order = \App\Models\Order::create([
            'user_id'=> auth()->user()->id,
            'order_state'=>'pending',
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

        //réinitialiser tout après avoir créé la commande
        $this->cart=[];
        session()->put('cart', []);
        $this->project_id='';

        $this->redirectRoute('worker::order', ['locale' => __('general.currentLocale')]);
    }

    public function render()
    {
        $projects = \App\Models\Project::all();

        $orders_project_options = [];
        foreach ($projects as $project){
            $orders_project_options[] =
                [
                    'name' => $project->project_name,
                    'value' => $project->id,
                ];
        }


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

        return view('worker::order.order', compact('old_orders', 'user', 'projects', 'orders_project_options'/*, 'orders_users_options'*/))->layout('components.worker.app');
    }
};

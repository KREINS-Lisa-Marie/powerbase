<?php

use App\Models\Project;
use App\Models\User;
use Livewire\Component;

new class extends Component
{
    public  $search = '';
    public $cart = [];
    public $searchedProduct = [];

    public string $user_id = '';
    public string $project_id = '';
    public string $order_state = '' ;
    public string $project_name = '' ;
    public string $project_type = '' ;
    public string $project_state = '' ;
    public string $client_name = '' ;
    public string $project_address = '' ;
    public string $project_description = '' ;
    public string $project_user_id = '';

    public bool $isopenModal = false;
    public $users;


    public function mount()
    {
        $this->authorize('create', \App\Models\Order::class);
    }

    public function openModal( )
    {
        $this->users = User::get();

        $this->authorize('create', Project::class);   // ajouter car sinon policy ne marche pas

        $this->isopenModal = true;
    }

    //fermer modale
    public function closeModal():void
    {
        $this->isopenModal = false;
    }



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


        $this->redirectRoute('pages::orders.index', ['locale' => app()->getLocale()]);
    }

    public function storeProject(): void
    {
        $validated_data= $this->validate([
            'project_name'=>'required|string|max:255',
            'project_user_id'=>'int|required',
            'project_type'=>'required|string|max:255',
            'project_state'=>'required|string|max:255',
            'client_name'=>'required|string|max:255',
            'project_address'=>'required|string',
            'project_description'=>'required|string',
        ]);


        $project = Project::create([
            'project_name'=>$validated_data['project_name'],
            'user_id'=>$validated_data['project_user_id'],
            'project_type'=>$validated_data['project_type'],
            'project_state'=>$validated_data['project_state'],
            'client_name'=>$validated_data['client_name'],
            'project_address'=>$validated_data['project_address'],
            'project_description'=>$validated_data['project_description'],
        ]);

        $this->closeModal();
    }


    public function render()
    {
        return view('pages.orders.⚡create.create')->title(__('general.order_create'));
    }
};

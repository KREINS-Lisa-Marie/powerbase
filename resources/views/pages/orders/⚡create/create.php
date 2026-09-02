<?php

use App\Models\Order;
use App\Models\Project;
use App\Models\User;
use Illuminate\Validation\Rule;
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
        $this->authorize('create', Order::class);
    }

    public function openModal( )
    {
        $company = auth()->user()->company_id;
        $this->users = User::where('company_id', $company)->get();

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
        $company = auth()->user()->company_id;
        $search = $this->search;

        $this->searchedProduct =  \App\Models\Product::query()
            ->where(function ($query) use ($company){
                $query->where('company_id', $company)
                    ->orWhere('company_id', null);
            })->where(function ($query) use ($search){
                $query->where('product_name', 'like', '%' . $this->search . '%')
                    ->orWhere('gtin', 'like', '%' . $this->search . '%')
                    ->orWhere('ref_article', 'like', '%' . $this->search . '%')
                    ->orWhere('brand', 'like', '%' . $this->search . '%');
            })->limit(6)
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
        $this->authorize('create', \App\Models\Order::class);
        $company = auth()->user()->company_id;

        $validated_data= $this->validate([
            'user_id'=>['required','integer', \Illuminate\Validation\Rule::exists('users', 'id')->where('company_id', $company)],
            'order_state'=>'string|required|max:255',
            'project_id'=>['required','integer', \Illuminate\Validation\Rule::exists('projects', 'id')->where('company_id', $company)], //vérifie que le projet existe et qu'il appartient à la company
        ]);

        if (empty($this->cart)){
            $this->addError('cart', __('admin/orders.choose_product'));
            return;
        }

        $order = \App\Models\Order::create([
            'user_id'=>$validated_data['user_id'],
            'order_state'=>$validated_data['order_state'],
            'project_id'=>$validated_data['project_id'],
            'company_id'=>$company,
        ]);

        foreach ($this->cart as $productId=>$item){
            $order->orderItems()->create([
               'product_id'=> $productId,
                'quantity'=> $item['quantity'],
            ]);
            \App\Models\ProductSetting::where('company_id', $company)->where('product_id', $productId)
                ->decrement('quantity', $item['quantity']);
        }


        $this->redirectRoute('pages::orders.index', ['locale' => app()->getLocale()]);
    }

    public function storeProject(): void
    {
        $this->authorize('create', Project::class);
        $company = auth()->user()->company_id;

        $validated_data= $this->validate([
            'project_name'=>'required|string|max:255',
            'project_user_id'=>['integer','required', Rule::exists('users', 'id')->where('company_id', $company)],
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
            'company_id'=>$company,
        ]);

        $this->closeModal();
    }


    public function render()
    {
        $company = auth()->user()->company_id;

        $orders_state_options = [
            [
                'name' => __('admin/orders.pending'),
                'value' => 'pending',
            ],
            [
                'name' => __('admin/orders.completed'),
                'value' =>'completed',
            ],
        ];

        $projects = \App\Models\Project::where('company_id', $company)->get();
        $orders_project_options = [];
        foreach ($projects as $project){
            $orders_project_options[] =
                [
                    'name' => $project->project_name,
                    'value' => $project->id,
                ];
        }

        $users = \App\Models\User::where('company_id', $company)->get();

        $orders_users_options = [];
        foreach ($users as $user){
            $orders_users_options[] =
                [
                    'name' => "$user->first_name $user->last_name",
                    'value' => $user->id,
                ];
        }

        $project_options = [
            [
                'name' => __('admin/projects.private'),
                'value' => \App\Enums\ProjectTypes::Private->value,
            ],
            [
                'name' => __('admin/projects.corporate'),
                'value' => \App\Enums\ProjectTypes::Corporate->value,
            ],
        ];
        $project_state_options = [
            [
                'name' => __('admin/projects.closed'),
                'value' => \App\Enums\ProjectStates::Closed->value,
            ],
            [
                'name' => __('admin/projects.open'),
                'value' => \App\Enums\ProjectStates::Open->value,
            ],
        ];

        $in_charge_options = [];

        foreach ($users as $user) {
            $in_charge_options[] = [
                'name'  => "$user->first_name $user->last_name",
                'value' => $user->id,
            ];
        }




        return view('pages.orders.⚡create.create', compact(
            'in_charge_options',
            'project_state_options',
            'project_options',
            'orders_state_options',
            'orders_project_options',
            'orders_users_options',
        ))->title(__('general.order_create'));
    }
};

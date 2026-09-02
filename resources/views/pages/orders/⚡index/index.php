<?php

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component
{

    use WithPagination;

    public  $search = '';

//tri
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    protected $queryString =['sortField', 'sortDirection'];

    public function mount(): void
    {
        $this->authorize('viewAny', Order::class);        //sinon ça doit à chaque sort vérifier authorization        //tous les users peuvent voir tous les contacts
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field){
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        }else{
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function render()        //à chaque fois que qqch sur la page change
    {
        $search = strtolower($this->search);
        $companyId = auth()->user()->company_id;

        return view('pages.orders.⚡index.index', [
            'orders' => Order::query()
                ->where('orders.company_id', $companyId)
                ->withCount('orderItems')       //pour savoir combien d'item il y a dans chaque commande
                ->join('users', 'orders.user_id', '=', 'users.id')      //join parce que sinon je ne peux pas acceder au nom du user
                ->select('orders.*', 'users.first_name', 'users.last_name')     //prend des commandes pour le prénom ou nom de...
                    ->where(function ($query) use ($search){
                    $query->where('users.first_name', 'like', '%' . $search . '%')
                        ->orWhere('users.last_name', 'like', '%' . $search . '%')
                        ->orWhere('orders.created_at', 'like', '%' . $search . '%');
                })
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(10)->onEachSide(0),
            ])->title(__('general.orders'));
    }
};


// https://laravel.com/docs/13.x/eloquent-relationships#counting-related-models
// https://laravel.com/docs/13.x/queries#joins
// https://laravel.com/docs/13.x/queries#select-statements

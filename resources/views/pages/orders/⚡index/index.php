<?php

use App\Models\Order;
use Livewire\Component;

new class extends Component
{

    public  $search = '';

//tri
    public $sortField = 'user_id';
    public $sortDirection = 'asc';
    protected $queryString =['sortField', 'sortDirection'];


    public function sortBy($field)
    {
        if ($this->sortField === $field){
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        }else{
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }

    public function render()        //à chaque fois que qqch sur la page change
    {
        $search = strtolower($this->search);

        return view('pages.orders.⚡index.index', [
            'orders' => Order::query()
                ->withCount('orderItems')       //pour savoir combien d'item il y a dans chaque commande
                ->join('users', 'orders.user_id', '=', 'users.id')      //join parce que sinon je ne peux pas acceder au nom du user
                ->select('orders.*', 'users.first_name', 'users.last_name')     //prend des commandes pour le prénom ou nom de...
                ->orWhere('users.first_name', 'like', '%' . $search . '%')
                ->orWhere('users.last_name', 'like', '%' . $search . '%')
                ->orWhere('orders.created_at', 'like', '%' . $search . '%')
                ->orWhere('orders.order_state', 'like', '%' . $search . '%')
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(10),
            ]);
    }
};


// https://laravel.com/docs/13.x/eloquent-relationships#counting-related-models
// https://laravel.com/docs/13.x/queries#joins
// https://laravel.com/docs/13.x/queries#select-statements

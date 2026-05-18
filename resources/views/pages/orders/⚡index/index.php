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
        return view('pages.orders.⚡index.index', [
            'orders' => Order::query()
                ->where('user_id', 'like', '%' . $this->search . '%')
                ->orWhere('ordered_at', 'like', '%' . $this->search . '%')
                ->orWhere('order_state', 'like', '%' . $this->search . '%')
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(10),
        ]);
    }
};

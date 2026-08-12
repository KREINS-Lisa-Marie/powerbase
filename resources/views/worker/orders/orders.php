<?php

use App\Models\Order;
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

    }


    public function render(): View
    {
        $search = strtolower($this->search);

        return view('worker::orders.orders', [
            'orders' => Order::query()
                ->withCount('orderItems')       //pour savoir combien d'item il y a dans chaque commande
                ->join('users', 'orders.user_id', '=', 'users.id')      //join parce que sinon je ne peux pas acceder au nom du user
                ->select('orders.*', 'users.first_name', 'users.last_name')     //prend des commandes pour le prénom ou nom de...
                ->orWhere('orders.created_at', 'like', '%' . $search . '%')
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(10)->onEachSide(0)
        ])->layout('components.worker.app')->title(__('general.worker_orders'));
    }
};

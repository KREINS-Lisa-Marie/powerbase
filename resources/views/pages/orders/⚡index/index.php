<?php

use App\Models\Order;
use Livewire\Component;

new class extends Component
{
/*
    public $orders;
    public function mount()         //avant de render ( 1x seulement)
    {
        $this->orders = Order::get();
    }

    public function render()        //à chaque fois que qqch sur la page change
    {
        return view('pages.orders.⚡index.index');
    }*/

    public  $search = '';

    public function render()        //à chaque fois que qqch sur la page change
    {
        return view('pages.orders.⚡index.index', [
            'orders' => \App\Models\Order::query()
                ->where('for_who', 'like', '%' . $this->search . '%')
                ->orWhere('phone', 'like', '%' . $this->search . '%')
                ->orWhere('ordered_at', 'like', '%' . $this->search . '%')
                ->orWhere('order_state', 'like', '%' . $this->search . '%')
                ->orderBy('for_who', 'asc')
                ->paginate(10),
        ]);
    }
};

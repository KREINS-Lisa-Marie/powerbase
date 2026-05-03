<?php

use App\Models\Order;
use Livewire\Component;

new class extends Component
{

    public int $order_id;
    public function mount(Order $order)         //avant de render ( 1x seulement)
    {

        $this->order_id = $order->id;
    }

    public function render()        //à chaque fois que qqch sur la page change
    {
        return view('pages.orders.⚡show.show');
    }

    public function destroy()
    {
        $order = Order::findOrFail($this->order_id);
        $order->delete();
        return redirect(route('pages::orders.index', ['locale' => app()->getLocale()]));
    }
};

<?php

use App\Models\Order;
use Livewire\Component;

new class extends Component
{

    public $orderItems = [];

    public int $order_id;
    public function mount(Order $order)         //avant de render ( 1x seulement)
    {
        $this->orderItems = $order->orderItems;

        $this->order_id = $order->id;
    }

    public function render()        //à chaque fois que qqch sur la page change
    {
        $order = \App\Models\Order::findOrFail($this->order_id);
        $user = \App\Models\User::findOrFail($order->user_id);
        $project = \App\Models\Project::findOrFail($order->project_id);

        return view('pages.orders.⚡show.show', ['order' => $order, 'user' => $user, 'project' => $project]);
    }

    public function destroy()
    {
        $order = Order::findOrFail($this->order_id);
        $order->delete();
        return redirect(route('pages::orders.index', ['locale' => app()->getLocale()]));
    }
};

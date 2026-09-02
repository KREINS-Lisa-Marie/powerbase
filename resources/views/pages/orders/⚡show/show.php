<?php

use App\Models\Order;
use App\Models\ProductSetting;
use Livewire\Component;

new class extends Component
{

    public $orderItems = [];

    public bool $openModal = false ;

    public int $order_id;
    public function mount(Order $order)         //avant de render ( 1x seulement)
    {
        $this->authorize('view', $order);
        $this->orderItems = $order->orderItems;

        $this->order_id = $order->id;
    }

    public function confirmDelete()
    {
        $this->openModal = true;
    }

    public function cancelDelete()
    {
        $this->openModal = false;
    }

    public function render()        //à chaque fois que qqch sur la page change
    {
        $order = \App\Models\Order::findOrFail($this->order_id);
        $this->authorize('view', $order);
        $this->orderItems = $order->orderItems;
        $user = \App\Models\User::findOrFail($order->user_id);
        $project = \App\Models\Project::findOrFail($order->project_id);

        return view('pages.orders.⚡show.show', ['order' => $order, 'user' => $user, 'project' => $project])->title(__('general.show_order'));
    }

    public function destroy()       //si jamais nécessaire  pour le moment utilisé seulement sur worker
    {
        $order = Order::findOrFail($this->order_id);
        $this->authorize('delete', $order);

        foreach ($order->orderItems as $orderItem) {
            ProductSetting::where('company_id', $order->company_id)
                ->where('product_id', $orderItem->product_id)
                ->increment('quantity', $orderItem->quantity);
        }


        $order->delete();
        return redirect(route('pages::orders.index', ['locale' => app()->getLocale()]));
    }
};

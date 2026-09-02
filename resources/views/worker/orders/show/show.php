<?php

use App\Models\Order;
use App\Models\ProductSetting;
use Illuminate\Contracts\View\View;
use Livewire\Component;

new class extends Component
{

    public $orderItems = [];
    public \App\Models\User $user;
    public int $order_id;

    public bool $openModal = false ;

    public function mount(Order $order)         //avant de render ( 1x seulement)
    {
        $this->authorize('viewLimited', $order);
        $this->user = Auth::user();

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

    public function render(): View
    {
        $order = \App\Models\Order::findOrFail($this->order_id);
        $this->authorize('viewLimited', $order);

        $user = \App\Models\User::findOrFail($order->user_id);
        $project = \App\Models\Project::findOrFail($order->project_id);

        return view('worker.orders.show.show', [
            'order' => $order,
            'user' => $user,
            'project' => $project
        ])->layout('components.worker.app')->title(__('general.worker_order'));
    }

    public function destroy()
    {
        $order = Order::findOrFail($this->order_id);
        $this->authorize('delete', $order);


        foreach ($order->orderItems as $orderItem) {
            ProductSetting::where('company_id', $order->company_id)
                ->where('product_id', $orderItem->product_id)
                ->increment('quantity', $orderItem->quantity);
        }

        $order->delete();
        return redirect(route('worker::orders', ['locale' => app()->getLocale()]));
    }

};

<?php

use App\Models\Order;
use Livewire\Component;

new class extends Component
{

    public \App\Models\Order $order;


    public string $user_id = '';
    public string $order_state = '' ;
    public string $project_id ='';
    public string $ordered_at ='';


    public function mount(Order $order): void
    {
        $this->user_id = $order->user_id;
        $this->order_state = $order->order_state;
        $this->project_id = $order->project_id;
        $this->ordered_at = $order->ordered_at;
    }


    public function save(): void
    {
        $validated_data= $this->validate([
            'user_id'=>'required|integer|max:255',
            'order_state'=>'string|required|max:255',
            'project_id'=>'required|integer|max:255',
            'ordered_at'=>'required|date',
        ]);

        $this->order->update([
            'user_id'=>$validated_data['user_id'],
            'order_state'=>$validated_data['order_state'],
            'project_id'=>$validated_data['project_id'],
            'ordered_at'=>$validated_data['ordered_at'],
        ]);

        $this->redirect(route('pages::orders.show', ['locale' => __('general.currentLocale'), 'order'=>$this->order]));
    }
};

<?php

use Livewire\Component;

new class extends Component
{

    public string $user_id = '';
    public string $project_id = '';
    public string $order_state = '' ;
    public string $ordered_at ='';

    public function store(): void
    {
        $validated_data= $this->validate([
            'user_id'=>'required|integer',
            'order_state'=>'string|required|max:255',
            'project_id'=>'required|integer',
            'ordered_at'=>'required|date',
        ]);


        $order = \App\Models\Order::create([
            'user_id'=>$validated_data['user_id'],
            'order_state'=>$validated_data['order_state'],
            'project_id'=>$validated_data['project_id'],
            'ordered_at'=>\Carbon\Carbon::now()->format('Y-m-d'),
        ]);

        $this->redirectRoute('pages::orders.index', ['locale' => __('general.currentLocale')]);
    }
};

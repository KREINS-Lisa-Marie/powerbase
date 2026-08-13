@can('viewLimited', $order)
<section class=" worker-orders background-dark text-white section-end-128 admin orders-index-page orders-list">
    <h2 class="uppercase text-white fs-page-title bold page-title mb-64" aria-level="2" role="heading">
        {{__('worker/orders.order_details')}} {{__('worker/orders.order_number')}} {{$order->id}}
    </h2>
    <div class="d-flex  flex-c m-b-32">
        <p class="worker-sub m-b-16">
            {{__('worker/orders.ordered_at')}} {{$order->created_at->format('d-m-Y')}}
        </p>
        <p class="worker-sub "> {{__('admin/orders.order_state')}} : {{$order->order_state == 'pending'?__('worker/order.pending'): __('worker/order.completed')}}
        </p>
    </div>

    <table class="table max-w-admin-web worker-orders-table worker-order-detail-table">
        <thead class="max-w-admin-web">
        <tr class="max-w-admin-web">
            <x-admin.components.table.table-th scope="col" direction="" sortable="" class="uppercase">
                {{__('admin/orders.product_name')}}
            </x-admin.components.table.table-th>
            <x-admin.components.table.table-th scope="col" direction="" sortable="" class="uppercase">
                {{__('admin/orders.quantity')}}
            </x-admin.components.table.table-th>
            <x-admin.components.table.table-th scope="col" direction="" class=" uppercase" sortable="">
                {{__('worker/orders.link_to_product')}}
            </x-admin.components.table.table-th>
        </tr>
        </thead>
        <tbody class="max-w-admin-web">
        @if($order)
            @foreach($orderItems as $orderItem)
            @php
                $product = App\Models\Product::where('id', $orderItem->product_id)->first();
                $project_name = $project->project_name;

                $nb_products = \App\Models\OrderItem::where('order_id', $order->id )->get();
            @endphp
            <tr class="table-row  position-relative">
                <x-admin.components.table.table-td class="table-full_name">
                    <p><span class="show-web">{{__('worker/order.product_name')}}</span>
                        {{$product->product_name}}
                    </p>
                </x-admin.components.table.table-td>
                <x-admin.components.table.table-td class="table-full_name">
                    <p><span class="show-web">{{__('worker/order.quantity')}}</span>
                        {{$orderItem->quantity }}
                    </p>
                </x-admin.components.table.table-td>
                <x-admin.components.table.table-td class="table-name">
                    <a href="{{route('worker::product',  ['locale' => app()->getLocale(),  'product' => $product->id])}}"  title="{{__('admin/orders.go_to_product_page')}}" class="order-detail-btn">
                        {{__('worker/orders.see_the_product')}}
                    </a>
                </x-admin.components.table.table-td>
            </tr>
            @endforeach
        @else
            <tr class="table-row position-relative">
                <x-admin.components.table.table-td class="table-full_name">
                    {{__('worker/order.no_products_found')}}
                </x-admin.components.table.table-td>
            </tr>
        @endif
        </tbody>
    </table>
    @if($order->order_state == 'pending')
    <div class="m-t-64">
        <form wire:submit="destroy" method="post">
            @csrf
            <x-admin.components.delete-btn title="{{__('worker/order.delete_the_order')}}">
                {{__('worker/orders.delete_order')}}
            </x-admin.components.delete-btn>
        </form>
    </div>
    @endif
</section>
@endcan

{{--
take()
https://stackoverflow.com/questions/45120135/in-laravel-eloquent-what-is-the-difference-between-limit-vs-take
https://laravel.com/docs/13.x/collections#method-take
--}}

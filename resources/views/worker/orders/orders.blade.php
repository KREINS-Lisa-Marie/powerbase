 {{--<section class="background-dark text-white section-end-128 admin">
        <h2 class="uppercase text-white fs-page-title bold page-title mb-64" aria-level="2" role="heading">
            {{__('worker/order.orders')}}
        </h2>
        <table class="d-flex admin table max-w-admin-web worker-orders-table">
            <thead>
            <tr class="table-row">
                <x-admin.components.table.table-th scope="col" sortable wire:click="sortBy('id')" :direction="$sortField === 'id'? $sortDirection : null" class="{{$sortField === 'id'? 'active-sort': ''}}">
                    {{__('admin/orders.order_number')}}
                </x-admin.components.table.table-th>
                <x-admin.components.table.table-th scope="col" sortable wire:click="sortBy('first_name')" :direction="$sortField === 'first_name'? $sortDirection : null" class="{{$sortField === 'first_name'? 'active-sort': ''}}">
                    {{__('admin/contacts.full_name')}}
                </x-admin.components.table.table-th>
                <x-admin.components.table.table-th scope="col" sortable wire:click="sortBy('first_name')" :direction="$sortField === 'first_name'? $sortDirection : null" class="{{$sortField === 'first_name'? 'active-sort': ''}}">
                    {{__('admin/contacts.full_name')}}
                </x-admin.components.table.table-th>
                <x-admin.components.table.table-th scope="col" sortable wire:click="sortBy('first_name')" :direction="$sortField === 'first_name'? $sortDirection : null" class="{{$sortField === 'first_name'? 'active-sort': ''}}">
                    {{__('admin/contacts.full_name')}}
                </x-admin.components.table.table-th>
            </tr>
            </thead>
            <tbody>
            @forelse($orders as $old_order)
                @php
                    $project = App\Models\Project::where('id', $old_order->project_id)->first();
                    $project_name = $project->project_name;

                    $nb_products = \App\Models\OrderItem::where('order_id', $old_order->id )->get();
                @endphp

                <tr>
                    <td>
                        <p>
                            {{$old_order->order_state == 'pending'?__('worker/order.pending'): __('worker/order.completed')}}
                        </p>
                    </td>
                    <td>
                        {{$project_name}}
                    </td>
                    <td>
                        {{$nb_products->count()}} {{__('worker/order.products')}}
                    </td>
                    <td>
                        <a href="" class="order-detail-btn">
                            {{__('worker/order.see_the_order')}}
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    {{__('worker/order.no_order_found')}}
                </tr>
            @endforelse
            </tbody>
        </table>

        <div class="pagination-worker max-w-admin-web">
            {{ $orders->links() }}
        </div>
 </section>--}}

 <section class=" worker-orders background-dark text-white section-end-128 admin orders-index-page orders-list">
     <h2 class="uppercase text-white fs-page-title bold page-title mb-64" aria-level="2" role="heading">
         {{__('worker/order.orders')}}
     </h2>


     <!--d-flex admin table max-w-admin-web worker-orders-table-->
     <table class="table max-w-admin-web worker-orders-table">
         <thead class="max-w-admin-web">
         <tr class="max-w-admin-web">
             <x-admin.components.table.table-th scope="col" sortable wire:click="sortBy('id')" :direction="$sortField === 'id'? $sortDirection : null" class="{{$sortField === 'id'? 'active-sort': ''}} uppercase">
                 {{__('admin/orders.order_number')}}
             </x-admin.components.table.table-th>
             <x-admin.components.table.table-th scope="col" sortable wire:click="sortBy('id')" :direction="$sortField === 'id'? $sortDirection : null" class="{{$sortField === 'id'? 'active-sort': ''}} uppercase">
                 {{__('admin/orders.order_state')}}
             </x-admin.components.table.table-th>
             <x-admin.components.table.table-th scope="col" sortable wire:click="sortBy('first_name')" :direction="$sortField === 'first_name'? $sortDirection : null" class="{{$sortField === 'first_name'? 'active-sort': ''}} uppercase">
                 {{__('worker/orders.ordered_at')}}
             </x-admin.components.table.table-th>
             <x-admin.components.table.table-th scope="col" sortable wire:click="sortBy('first_name')" :direction="$sortField === 'first_name'? $sortDirection : null" class="{{$sortField === 'first_name'? 'active-sort': ''}} uppercase">
                 {{__('worker/orders.nb_products')}}
             </x-admin.components.table.table-th>
             <x-admin.components.table.table-th scope="col" direction="" class=" uppercase" sortable="">
                 {{__('worker/orders.link_to_order')}}
             </x-admin.components.table.table-th>
         </tr>
         </thead>
         <tbody class="max-w-admin-web">
         @forelse($orders as $old_order)
             @php
                 $project = App\Models\Project::where('id', $old_order->project_id)->first();
                 $project_name = $project->project_name;

                 $nb_products = \App\Models\OrderItem::where('order_id', $old_order->id )->get();
             @endphp

             <tr class="table-row  position-relative">
                 <x-admin.components.table.table-td class="table-full_name">
                     <p><span class="show-web">{{__('worker/order.order_state')}}</span>
                         {{$old_order->id}}
                     </p>
                 </x-admin.components.table.table-td>
                 <x-admin.components.table.table-td class="table-full_name">
                     <p><span class="show-web">{{__('worker/order.order_state')}}</span>
                         {{$old_order->order_state == 'pending'?__('worker/order.pending'): __('worker/order.completed')}}
                     </p>
                 </x-admin.components.table.table-td>
                 <x-admin.components.table.table-td class="table-name fw-medium">
                     <span class="show-web">{{__('worker/order.project_name')}}</span>
                     {{$old_order->created_at->format('d-m-Y')}}
                 </x-admin.components.table.table-td>
                 <x-admin.components.table.table-td class="table-state">
                     <span class="show-web">{{__('worker/order.product_number')}}</span>
                     {{$nb_products->count()}} {{__('worker/order.products')}}
                 </x-admin.components.table.table-td>
                 <x-admin.components.table.table-td class="table-species">
                     <a href="{{route('worker::orders.show',  ['locale' => app()->getLocale(),  'order' => $old_order->id])}}"  title="{{__('admin/orders.go_to_order_page')}}" class="order-detail-btn">
                         {{__('worker/orders.see_the_order')}}
                     </a>
                 </x-admin.components.table.table-td>
             </tr>
         @empty
             <tr class="table-row position-relative">
                 <x-admin.components.table.table-td class="table-full_name">
                     {{__('worker/order.no_order_found')}}
                 </x-admin.components.table.table-td>
             </tr>
         @endforelse
         </tbody>
     </table>

     <div class="pagination-worker max-w-admin-web">
         {{ $orders->links() }}
     </div>
 </section>

{{--
take()
https://stackoverflow.com/questions/45120135/in-laravel-eloquent-what-is-the-difference-between-limit-vs-take
https://laravel.com/docs/13.x/collections#method-take
--}}

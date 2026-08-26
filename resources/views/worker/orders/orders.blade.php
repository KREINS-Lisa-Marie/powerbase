@can('viewAnyLimited', \App\Models\Order::class)
<section class=" worker-orders background-dark text-white section-end-128 admin orders-index-page orders-list">
     <h2 class="uppercase text-white fs-page-title bold page-title mb-64" aria-level="2" role="heading">
         {{__('worker/order.orders')}}
     </h2>
    <div class="position-relative orders-filters-search">
        <div class="filters-container">

            <input type="checkbox" id="faq-1"
                   class="filters-container--input sro">
            <label class="filters-container--label" for="faq-1" itemprop="name">
                {{__('worker/order.filters')}} <span class="arrow">▼</span>
            </label>
            <div class="worker-orders-filter">
                @foreach($categories as $category)
                    <button type="button" wire:click="selectCategoryFilter('{{$category}}')" class="{{ in_array($category, $categoryFilters) ? 'active-sort': ''}} uppercase">
                        {{$category}}
                    </button>
                @endforeach
            </div>
        </div>
        <div class="worker-orders-search">
            <x-admin.components.fields.search/>
        </div>
    </div>
     <!--d-flex admin table max-w-admin-web worker-orders-table-->
     <table class="table max-w-admin-web worker-orders-table">
         <thead class="max-w-admin-web">
         <tr class="max-w-admin-web">
             <x-admin.components.table.table-th scope="col" sortable wire:click="sortBy('id')" :direction="$sortField === 'id'? $sortDirection : null" class="{{$sortField === 'id'? 'active-sort': ''}} uppercase">
                 {{__('admin/orders.order_number')}}
             </x-admin.components.table.table-th>
             <x-admin.components.table.table-th scope="col" sortable wire:click="sortBy('order_state')" :direction="$sortField === 'order_state'? $sortDirection : null" class="{{$sortField === 'order_state'? 'active-sort': ''}} uppercase">
                 {{__('admin/orders.order_state')}}
             </x-admin.components.table.table-th>
             <x-admin.components.table.table-th scope="col" sortable wire:click="sortBy('created_at')" :direction="$sortField === 'created_at'? $sortDirection : null" class="{{$sortField === 'created_at'? 'active-sort': ''}} uppercase">
                 {{__('worker/orders.ordered_at')}}
             </x-admin.components.table.table-th>
             <x-admin.components.table.table-th scope="col" sortable wire:click="sortBy('order_items_count')" :direction="$sortField === 'order_items_count'? $sortDirection : null" class="{{$sortField === 'order_items_count'? 'active-sort': ''}} uppercase">
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
@endcan
{{--
take()
https://stackoverflow.com/questions/45120135/in-laravel-eloquent-what-is-the-difference-between-limit-vs-take
https://laravel.com/docs/13.x/collections#method-take
--}}

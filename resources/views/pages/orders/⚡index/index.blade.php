@php
    $filter_options =[
           [
            'name' => 'ABC',
        'value' =>'abc',
        ],
                   [
            'name' => 'ZYX',
        'value' =>'zyx',
        ],
                   [
            'name' => __('admin/orders.latest'),
        'value' =>'most recent',
        ],
    ];
@endphp
<main class="admin orders-index-page" id="content">
    <x-admin.page-bar>
        {{__('admin/orders.orders')}}
    </x-admin.page-bar>
    <div class="main-container">
        <div class="admin-filters-buttons max-w-admin-web">
            <div class="top-row">
                <x-admin.components.admin-primary-button
                    href="{{route('pages::orders.create', ['locale' => __('general.currentLocale')])}}"
                    title="{{__('admin/orders.go_to_create_order')}}" class="">
                    {{__('admin/orders.create_an_order')}}
                </x-admin.components.admin-primary-button>
            </div>
            <div class="bottom-row">
                <x-admin.components.fields.select select_name="filtering" label="Trier" :options="$filter_options"
                                                  wire="filtering"/>
                <x-admin.components.fields.search/>
            </div>
        </div>

        <section class="orders-list">
            <h2 class="sro">
                {{__('admin/orders.orders_list')}}
            </h2>
            <table class="table max-w-admin-web">
                <thead>
                <tr>
                    <x-admin.components.table.table-th scope="col">
                        {{__('admin/orders.ordered_by')}}
                    </x-admin.components.table.table-th>
                    <x-admin.components.table.table-th scope="col">
                        {{__('admin/orders.product_quantity')}}
                    </x-admin.components.table.table-th>
                    <x-admin.components.table.table-th scope="col">
                        {{__('admin/orders.ordered_at')}}
                    </x-admin.components.table.table-th>
                    <x-admin.components.table.table-th scope="col">
                        {{__('admin/orders.state')}}
                    </x-admin.components.table.table-th>
                </tr>
                </thead>
                <tbody>

                    @forelse($orders as $order)
                        @php
                            $user = \App\Models\User::findOrFail($order->user_id)
                        @endphp
                    <tr class="table-row position-relative">
                        <x-admin.components.table.table-td class="table-full_name">
                            <span class="show-web">{{__('admin/orders.ordered_by')}}</span>
                            {{$user->first_name}} {{$user->last_name}}
                        </x-admin.components.table.table-td>
                        <x-admin.components.table.table-td class="table-name fw-medium">
                            <span
                                class="show-web">{{__('admin/orders.product_quantity')}}</span>{{--{!! $volunteer->last_name !!} {!! $volunteer->first_name !!}--}}
                            john@doe.com

                        </x-admin.components.table.table-td>
                        <x-admin.components.table.table-td class="table-state">
                            <span
                                class="show-web">{{__('admin/orders.ordered_at')}}</span>
                            {{ date('d/m/Y', strtotime($order->ordered_at)) }}
                        </x-admin.components.table.table-td>
                        <x-admin.components.table.table-td class="table-species">
                            <span
                                class="show-web">{{__('admin/orders.state')}}</span>
                            {{$order->order_state == 'completed' ? __('admin/orders.completed') : __('admin/orders.pending')}}
                            <a href="{{route('pages::orders.show',  ['locale' => __('general.currentLocale'),  'order' => $order->id])}}"
                               title="{{__('admin/orders.go_to_order_page')}}" class="card-link">
                            </a>
                        </x-admin.components.table.table-td>
                    </tr>
                        @empty
                            <tr class="table-row position-relative">
                                <x-admin.components.table.table-td class="table-full_name">
                                    {{__('admin/projects.no_result')}}
                                </x-admin.components.table.table-td>
                            </tr>
                        @endforelse
                </tbody>
            </table>
        </section>
        <div class="pagination max-w-admin-web">
            {{ $orders->links() }}
        </div>
    </div>

</main>

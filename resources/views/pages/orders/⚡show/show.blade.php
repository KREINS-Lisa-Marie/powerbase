@php
    $order = \App\Models\Order::findOrFail($order_id);
    $user = \App\Models\User::findOrFail($order->user_id);
    $project = \App\Models\Project::findOrFail($order->project_id);
@endphp

<main class="admin project-show" id="content">
    <x-admin.page-bar>
        {{__('admin/orders.order_number_title')}} {{$order->id}}
    </x-admin.page-bar>
    <div class="main-container">
        <section class="project-information max-w-admin-web big-section">

            <x-admin.components.subtitle>
                {{__('admin/projects.general_information')}}
            </x-admin.components.subtitle>
            <div class="project-information-list">
                <dl>
                    <div>
                        <x-admin.components.definition-term>
                            {{__('admin/orders.order_number')}}
                        </x-admin.components.definition-term>
                        <x-admin.components.definition>
                            {{$order->id}}
                        </x-admin.components.definition>
                    </div>
                    <div>
                        <x-admin.components.definition-term>
                            {{__('admin/orders.for_who')}}
                        </x-admin.components.definition-term>
                        <x-admin.components.definition>
                            {{$user->first_name}} {{$user->last_name}}
                        </x-admin.components.definition>
                    </div>

                </dl>
                <dl>
                    <div>
                        <x-admin.components.definition-term>
                            {{__('admin/orders.phone_person_order')}}
                        </x-admin.components.definition-term>
                        <x-admin.components.definition>
                            {{$user->phone}}
                        </x-admin.components.definition>
                    </div>
                    <div>
                        <x-admin.components.definition-term>
                            {{__('admin/orders.project_name')}}
                        </x-admin.components.definition-term>
                        <x-admin.components.definition>
                            {{$project->project_name}}
                        </x-admin.components.definition>
                    </div>
                </dl>
                <dl>
                    <div>
                        <x-admin.components.definition-term>
                            {{__('admin/orders.order_state')}}
                        </x-admin.components.definition-term>
                        <x-admin.components.definition>
                            {{$order->order_state}}
                        </x-admin.components.definition>
                    </div>
                    <div>
                        <x-admin.components.definition-term>
                            {{__('admin/orders.ordered_at')}}
                        </x-admin.components.definition-term>
                        <x-admin.components.definition>
                            {{ date('d/m/Y', strtotime($order->created_at)) }}
                        </x-admin.components.definition>
                    </div>
                </dl>
            </div>

        </section>

        <div class="split-row">
            <section class="small-section projects-products-list">
                <x-admin.components.subtitle>
                    {{__('admin/orders.ordered_products')}}
                </x-admin.components.subtitle>

                <section class="orders-list">
                    <h2 class="sro">

                    </h2>
                    <table class="table max-w-admin-web split-table">
                        <thead>
                        <tr>
                            <x-admin.components.table.table-th scope="col" direction="asc">
                                {{__('admin/orders.product_name')}}
                            </x-admin.components.table.table-th>
                            <x-admin.components.table.table-th scope="col" direction="asc">
                                {{__('admin/orders.quantity')}}
                            </x-admin.components.table.table-th>
                        </tr>
                        </thead>
                        <tbody>

                        @if($this->orderItems->isNotEmpty())
                            @foreach($this->orderItems as $orderItem)
                                @php
                                    $product = \App\Models\Product::findOrFail($orderItem->product_id);
                                @endphp
                                <tr class="table-row position-relative">
                                    <x-admin.components.table.table-td class="table-species">
                                    <span class="show-web">{{__('admin/orders.product_name')}}
                                    </span>
                                        <span>{{$product->product_name}}</span>
                                        <a href="{{route('pages::products.show',  ['locale' => __('general.currentLocale'),  'product' => $product->id])}}" title="{{__('admin/products.got_to_product_page')}}" class="card-link">
                                        </a>
                                    </x-admin.components.table.table-td>

                                    <x-admin.components.table.table-td class="table-full_name">
                                    <span class="show-web">{{__('admin/orders.quantity')}}
                                    </span>
                                        <span>{{$orderItem->quantity}}</span>
                                    </x-admin.components.table.table-td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="table-row position-relative">
                                <x-admin.components.table.table-td class="">
                                    {{__('admin/orders.no_product_chosen')}}
                                </x-admin.components.table.table-td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </section>

            </section>
            <div class="admin-information-buttons">
                <x-admin.components.admin-primary-button href="{{route('pages::orders.edit', ['locale' => __('general.currentLocale'), 'order' => $order])}}" title="{{__('admin/orders.modify_order')}}"  class="">
                    {{__('admin/orders.modify_order')}}
                </x-admin.components.admin-primary-button>
                <button onclick="window.print()" class="text-white border-radius-16 admin-secondary-button bold t-a-center">
                    {{__('admin/orders.print_order')}}
                </button>
            </div>
        </div>
    </div>
</main>

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
            'name' => __('admin/products.most_recent'),
        'value' =>'latest',
        ],
    ]
@endphp
<main class="admin products-index-page" id="content">
    <x-admin.page-bar>
        {{__('admin/products.products')}}
    </x-admin.page-bar>
    <div class="main-container">
        <div class="admin-filters-buttons max-w-admin-web">
            <div class="top-row">
                <x-admin.components.admin-primary-button href="{{route('pages::products.create', ['locale' => __('general.currentLocale')])}}" title="{{__('admin/products.got_to_create_product')}}" class="">
                    {{__('admin/products.create_a_product')}}
                </x-admin.components.admin-primary-button>
            </div>
            <div class="bottom-row">
                <x-admin.components.fields.select select_name="filtering" label="Trier" :options="$filter_options" wire="filtering"/>
                <x-admin.components.fields.search/>
            </div>
        </div>
        <section class="products-list">
            <h2 class="sro">
                {{__('admin/products.products_list')}}
            </h2>
            <table class="table max-w-admin-web">
                <thead>
                <tr>
                    <x-admin.components.table.table-th scope="col">
                        {{__('admin/products.product_name')}}
                    </x-admin.components.table.table-th>
                    <x-admin.components.table.table-th scope="col">
                        {{__('admin/products.stock_number')}}
                    </x-admin.components.table.table-th>
                    <x-admin.components.table.table-th scope="col">
                        {{__('admin/products.in_stock_since')}}
                    </x-admin.components.table.table-th>
                    <x-admin.components.table.table-th scope="col">
                        {{__('admin/products.updated_at')}}
                    </x-admin.components.table.table-th>
                </tr>
                </thead>
                <tbody>

                    @forelse($products as $product)
                    <tr class="table-row position-relative">
                        <x-admin.components.table.table-td class="table-full_name">
                            <span class="show-web">{{__('admin/products.product_name')}}</span>
                            {{$product->product_name}}
                        </x-admin.components.table.table-td>
                        <x-admin.components.table.table-td class="table-name fw-medium">
                            <span class="show-web">{{__('admin/products.stock_number')}}</span>
                            {{$product->quantity}}
                        </x-admin.components.table.table-td>
                        <x-admin.components.table.table-td class="table-state">
                            <span class="show-web">{{__('admin/products.in_stock_since')}}</span>
                            {{ date('d/m/Y', strtotime($product->created_at)) }}
                        </x-admin.components.table.table-td>
                        <x-admin.components.table.table-td class="table-species">
                            <span class="show-web">{{__('admin/products.updated_at')}}</span>
                            {{ date('d/m/Y', strtotime($product->updated_at)) }}
                            <a href="{{route('pages::products.show',  ['locale' => __('general.currentLocale'),  'product' => $product->id])}}" title="{{__('admin/products.got_to_product_page')}}" class="card-link">
                            </a>
                        </x-admin.components.table.table-td>
                    </tr>
                    @empty
                        <tr class="table-row position-relative">
                            <x-admin.components.table.table-td class="table-full_name">
                                {{__('admin/products.no_result')}}
                            </x-admin.components.table.table-td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </section>
        <div class="pagination max-w-admin-web">
            {{ $products->links() }}
        </div>
    </div>
</main>

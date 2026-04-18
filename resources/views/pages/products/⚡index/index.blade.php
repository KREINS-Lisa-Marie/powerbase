@php
    $filter_options =[
           [
            'name' => 'ABC',
        'value' =>'ABC',
        ],
                   [
            'name' => 'ZYX',
        'value' =>'ZYX',
        ],
                   [
            'name' => 'latest',
        'value' =>'plus récents',
        ],
    ]
@endphp
<main class="admin products-index-page" id="content">
    <x-admin.page-bar>
        Accueil{{--{{__('admin/dashboard.dashboard')}}--}}
    </x-admin.page-bar>
    <div class="main-container">
        <div class="admin-filters-buttons max-w-admin-web">
            <div class="top-row">
                <x-admin.components.admin-primary-button href="{{route('pages::products.create', ['locale' => __('general.currentLocale')])}}" title="Aller sur la page 'Créer un produit'" class="">
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

                @for($i=0; $i<10; $i++)
                    {{--@foreach($this->searchedUsers() as $volunteer)--}}
                    <tr class="table-row position-relative">
                        <x-admin.components.table.table-td class="table-full_name">
                            <span class="show-web">{{__('admin/products.product_name')}}</span>
                            Black Jack
                            {{--<img src="{!! asset('assets/img/border-collie.jpg') !!}" alt="image du chien" class="border-r-big">--}}
                        </x-admin.components.table.table-td>
                        <x-admin.components.table.table-td class="table-name fw-medium">
                            <span class="show-web">{{__('admin/products.stock_number')}}</span>{{--{!! $volunteer->last_name !!} {!! $volunteer->first_name !!}--}}
                            john@doe.com
                        </x-admin.components.table.table-td>
                        <x-admin.components.table.table-td class="table-state">
                            <span class="show-web">{{__('admin/products.in_stock_since')}}</span>{{--{!! $volunteer->phone !!}--}} 2943473207
                        </x-admin.components.table.table-td>
                        <x-admin.components.table.table-td class="table-species">
                            <span class="show-web">{{__('admin/products.updated_at')}}</span>{{--{!! $volunteer->is_admin?   __('admin/volunteers.admin'): __('admin/volunteers.volunteer') !!}--}}Electricien
                            <a href="{{--{{route('pages::volunteers.show',  ['locale' => __('general.currentLocale'),  'volunteer' => $volunteer->id])}}--}}" title="aller vers la page de l’animal" class="card-link">
                            </a>
                        </x-admin.components.table.table-td>
                    </tr>
                    {{--@endforeach--}}
                @endfor
                </tbody>
            </table>
        </section>
    </div>
</main>

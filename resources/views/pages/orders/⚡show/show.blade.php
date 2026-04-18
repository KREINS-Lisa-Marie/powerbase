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

<main class="admin project-show" id="content">
    {{--    <x-admin.page-bar>
            Thomas Fortin   --}}{{--{!! $volunteer->first_name !!}  {!! $volunteer->last_name !!}--}}{{--
        </x-admin.page-bar>--}}
    <x-admin.page-bar>
        Order name or number
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
                            {{--{!! $volunteer->first_name !!}--}}{{--{!! $volunteer->last_name !!}--}}
                            Maison Piette Mulhausen
                        </x-admin.components.definition>
                    </div>
                    <div>
                        <x-admin.components.definition-term>
                            {{__('admin/orders.for_who')}}
                        </x-admin.components.definition-term>
                        <x-admin.components.definition>
                            {{--{!! $volunteer->email !!}--}}
                            Michel Berro
                        </x-admin.components.definition>
                    </div>
                    <div>
                        <x-admin.components.definition-term>
                            {{__('admin/orders.phone_person_order')}}
                        </x-admin.components.definition-term>
                        <x-admin.components.definition>
                            {{--{!! $volunteer->phone !!}--}}
                            Michel Berro
                        </x-admin.components.definition>
                    </div>
                </dl>
                <dl>


                    <div>
                        <x-admin.components.definition-term>
                            {{__('admin/orders.project_name')}}
                        </x-admin.components.definition-term>
                        <x-admin.components.definition>
                            {{--{!! $volunteer->is_admin? __('admin/volunteers.admin'): __('admin/volunteers.volunteer') !!}--}}
                            Particulier
                        </x-admin.components.definition>
                    </div>

                    <div>
                        <x-admin.components.definition-term>
                            {{__('admin/orders.order_state')}}
                        </x-admin.components.definition-term>
                        <x-admin.components.definition>
                            {{--{!! $volunteer->is_admin? __('admin/volunteers.admin'): __('admin/volunteers.volunteer') !!}--}}
                            Angèle Marteau
                        </x-admin.components.definition>
                    </div>
                    <div>
                        <x-admin.components.definition-term>
                            {{__('admin/orders.ordered_at')}}
                        </x-admin.components.definition-term>
                        <x-admin.components.definition>
                            {{--{!! $volunteer->is_admin? __('admin/volunteers.admin'): __('admin/volunteers.volunteer') !!}--}}
                            Rue de l’école 3, 4000 Liège
                        </x-admin.components.definition>
                    </div>
                </dl>
                <dl>

                </dl>
            </div>

        </section>

        <div class="split-row">
            <section class="small-section projects-products-list">
                <x-admin.components.subtitle>
                    {{__('admin/orders.ordered_products')}}
                </x-admin.components.subtitle>


                <div class="bottom-row">
                    <x-admin.components.fields.select select_name="filtering" label="Trier" :options="$filter_options"
                                                      wire="filtering"/>
                </div>

                <section class="orders-list">
                    <h2 class="sro">

                    </h2>
                    <table class="table max-w-admin-web">
                        <thead>
                        <tr>
                            <x-admin.components.table.table-th scope="col">
                                {{__('admin/orders.product_name')}}
                            </x-admin.components.table.table-th>
                            <x-admin.components.table.table-th scope="col">
                                {{__('admin/orders.quantity')}}
                            </x-admin.components.table.table-th>
                        </tr>
                        </thead>
                        <tbody>

                        @for($i=0; $i<10; $i++)
                            {{--@foreach($this->searchedUsers() as $volunteer)--}}
                            <tr class="table-row position-relative">
                                <x-admin.components.table.table-td class="table-species">
                                    <span
                                        class="show-web">{{__('admin/orders.product_name')}}</span>{{--{!! $volunteer->is_admin?   __('admin/volunteers.admin'): __('admin/volunteers.volunteer') !!}--}}
                                    Vis 100
                                    <a href="{{--{{route('pages::volunteers.show',  ['locale' => __('general.currentLocale'),  'volunteer' => $volunteer->id])}}--}}"
                                       title="aller vers la fiche du produit" class="card-link">
                                    </a>
                                </x-admin.components.table.table-td>
                                <x-admin.components.table.table-td class="table-full_name">
                                    <span class="show-web">{{__('admin/orders.quantity')}}</span>
                                    2
                                    {{--<img src="{!! asset('assets/img/border-collie.jpg') !!}" alt="image du chien" class="border-r-big">--}}
                                </x-admin.components.table.table-td>
                            </tr>
                            {{--@endforeach--}}
                        @endfor
                        </tbody>
                    </table>
                </section>

            </section>
            <div class="admin-information-buttons">
                <x-admin.components.admin-primary-button href="" title="" href="" class="">
                    {{__('admin/orders.modify_order')}}
                </x-admin.components.admin-primary-button>

                <x-admin.components.admin-secondary-button href="" title="" href="" class="">
                    {{__('admin/orders.delete_order')}}
                </x-admin.components.admin-secondary-button>

                <x-admin.components.admin-secondary-button href="" title="" href="" class="">
                    {{__('admin/orders.print_order')}}
                </x-admin.components.admin-secondary-button>
            </div>
        </div>
    </div>
</main>

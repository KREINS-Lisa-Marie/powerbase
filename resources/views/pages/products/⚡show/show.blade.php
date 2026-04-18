<main class="admin product" id="content">
    {{--    <x-admin.page-bar>
            Thomas Fortin   --}}{{--{!! $volunteer->first_name !!}  {!! $volunteer->last_name !!}--}}{{--
        </x-admin.page-bar>--}}
    <x-admin.page-bar>
        Produit 1{{--{{__('admin/dashboard.dashboard')}}--}}
    </x-admin.page-bar>
    <div class="main-container">
        <section class="product-information max-w-admin-web big-section">

            <x-admin.components.subtitle>
                {{__('admin/products.general_information')}}
            </x-admin.components.subtitle>
            <div class="product-information-list">
                <dl>
                    <div>
                        <x-admin.components.definition-term>
                            {{__('admin/products.product_name')}}
                        </x-admin.components.definition-term>
                        <x-admin.components.definition>
                            {{--{!! $volunteer->first_name !!}--}}{{--{!! $volunteer->last_name !!}--}}
                            Vis 100
                        </x-admin.components.definition>
                    </div>
                    <div>
                        <x-admin.components.definition-term>
                            {{__('admin/products.description')}}
                        </x-admin.components.definition-term>
                        <x-admin.components.definition>
                            {{--{!! $volunteer->email !!}--}}
                            email@gmail.com
                        </x-admin.components.definition>
                    </div>
                </dl>
                <dl>
                    <div>
                        <x-admin.components.definition-term>
                            {{__('admin/products.notes')}}
                        </x-admin.components.definition-term>
                        <x-admin.components.definition>
                            {{--{!! $volunteer->phone !!}--}}
                            Petite note
                        </x-admin.components.definition>
                    </div>

                    <div>
                        <x-admin.components.definition-term>
                            {{__('admin/products.stock_number')}}
                        </x-admin.components.definition-term>
                        <x-admin.components.definition>
                            {{--{!! $volunteer->is_admin? __('admin/volunteers.admin'): __('admin/volunteers.volunteer') !!}--}}
                            4
                        </x-admin.components.definition>
                    </div>
                </dl>
                <dl class="product-image">
                    <x-admin.components.definition-term>
                        {{__('admin/products.image')}}
                    </x-admin.components.definition-term>
                    <x-admin.components.definition>
                        <img src="{!! asset('assets/img/spax.jpg') !!}" alt="Image du produit"
                             class="border-radius-16 product-img">
                    </x-admin.components.definition>
                </dl>
            </div>

        </section>
        <div class="split-row">
            <div class="admin-information-buttons">
                <x-admin.components.admin-primary-button href="" title="" href="" class="">
                    {{__('admin/products.modify_product')}}
                </x-admin.components.admin-primary-button>

                <x-admin.components.admin-secondary-button href="" title="" href="" class="">
                    {{__('admin/products.delete_product')}}
                </x-admin.components.admin-secondary-button>
            </div>
        </div>
    </div>
</main>

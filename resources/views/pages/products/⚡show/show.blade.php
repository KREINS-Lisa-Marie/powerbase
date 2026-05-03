@php
    $product = \App\Models\Product::findOrFail($product_id);
    @endphp
<main class="admin product" id="content">
    <x-admin.page-bar>
        {{$product->product_name}}
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
                            {{$product->product_name}}
                        </x-admin.components.definition>
                    </div>
                    <div>
                        <x-admin.components.definition-term>
                            {{__('admin/products.description')}}
                        </x-admin.components.definition-term>
                        <x-admin.components.definition>
                            {{$product->product_description}}
                        </x-admin.components.definition>
                    </div>
                </dl>
                <dl>
                    <div>
                        <x-admin.components.definition-term>
                            {{__('admin/products.notes')}}
                        </x-admin.components.definition-term>
                        <x-admin.components.definition>
                            {{$product->product_notes}}
                        </x-admin.components.definition>
                    </div>

                    <div>
                        <x-admin.components.definition-term>
                            {{__('admin/products.stock_number')}}
                        </x-admin.components.definition-term>
                        <x-admin.components.definition>
                            {{$product->quantity}}
                        </x-admin.components.definition>
                    </div>
                </dl>
                <dl class="product-image">
                    <x-admin.components.definition-term>
                        {{__('admin/products.image')}}
                    </x-admin.components.definition-term>
                    <x-admin.components.definition>
                        <img src="{!! asset('assets/img/spax.jpg') !!}" alt="{{__('admin/products.the_product_image')}}"
                             class="border-radius-16 product-img">
                    </x-admin.components.definition>
                </dl>
            </div>

        </section>
        <div class="split-row">
            <div class="admin-information-buttons">
                <x-admin.components.admin-primary-button href="{{route('pages::products.edit', ['locale' => __('general.currentLocale'), 'product' => $product])}}" title="{{__('admin/products.modify_product')}}"  class="">
                    {{__('admin/products.modify_product')}}
                </x-admin.components.admin-primary-button>

                <form wire:submit="destroy" method="post">
                    @csrf
                    <x-admin.components.delete-btn title="{{__('admin/products.delete_product')}}">
                        {{__('admin/products.delete_product')}}
                    </x-admin.components.delete-btn>
                </form>
            </div>
        </div>
    </div>
</main>

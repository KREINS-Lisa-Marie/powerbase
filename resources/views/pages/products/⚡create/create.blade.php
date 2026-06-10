@php
    $vehicle_options = [
        [
            'name' => 'Camionette',
        'value' => '1',
        ],
        [
            'name' => 'Voiture',
            'value' =>'0',
        ],
];


    $job_options = [
        [
            'name' => 'Electricien',
        'value' => 'electricien',
        ],
        [
            'name' => 'Magasinier',
            'value' =>'magasinier',
        ],
            [
            'name' => 'Admin',
            'value' =>'admin',
        ],
];
@endphp



<main class="admin product" id="content">
    <x-admin.page-bar>
        {{__('admin/products.create_a_product')}}
    </x-admin.page-bar>
    <div class="main-container">
        <form wire:submit.prevent="store" class="profile-form volunteers-edit" enctype="multipart/form-data">
            @csrf
            <fieldset class="contact-information max-w-admin-web big-section">

                <x-admin.components.subtitle>
                    {{__('admin/products.general_information')}}
                </x-admin.components.subtitle>
                <div class="contact-information-list">
                    <dl>
                        <div>
                            <x-admin.components.fields.text name="product_name" value="" placeholder="John" wire="product_name"
                                                            id="product_name">
                                {{__('admin/products.product_name')}}
                            </x-admin.components.fields.text>
                        </div>
                        <div>
                            <x-admin.components.fields.text name="brand" value="" placeholder="Johnson" wire="brand"
                                                            id="brand">
                                {{__('admin/products.brand')}}
                            </x-admin.components.fields.text>
                        </div>
                        <div>
                            <x-admin.components.fields.textarea wire="product_description" id="product_description"
                                                                name="product_description"
                                                                placeholder="{{__('admin/products.placeholder_description')}}">
                                {{__('admin/products.description')}}
                            </x-admin.components.fields.textarea>
                        </div>
                    </dl>


                    <dl>
                        <div>
                            <x-admin.components.fields.textarea wire="product_notes" name="product_notes" id="product_notes" value=""
                                                                placeholder="{{__('admin/products.placeholder_note')}}">
                                {{__('admin/products.notes')}}
                            </x-admin.components.fields.textarea>
                        </div>

                        <div>
                            <x-admin.components.fields.text wire="ref_article" name="ref_article"
                                                              id="ref_article"
                                                              value="" placeholder="22">
                                {{__('admin/products.ref_article')}}
                            </x-admin.components.fields.text>
                        </div>
                        <div>
                            <x-admin.components.fields.number wire="quantity" name="quantity"
                                                              id="quantity"
                                                              value="" placeholder="22">
                                {{__('admin/products.stock_number')}}
                            </x-admin.components.fields.number>
                        </div>
                    </dl>

                    <div>
                        <div>
                            <x-admin.components.fields.text name="gtin" value="" placeholder="DHH34HK43BF2" wire="gtin"
                                                            id="gtin">
                                {{__('admin/products.gtin')}}
                            </x-admin.components.fields.text>
                        </div>
                        <div>
                            <x-admin.components.fields.file name_id="product_image" wire="product_image"
                                                            name="product_image">
                                {{__('admin/products.product_image')}}
                            </x-admin.components.fields.file>
                        </div>
                    </div>
                </div>

            </fieldset>

            <div class="split-row">
                <div class="admin-information-buttons">
                    <x-admin.components.form-button>
                        {{__('admin/products.create_product')}}
                    </x-admin.components.form-button>
                </div>
            </div>
        </form>
    </div>
</main>

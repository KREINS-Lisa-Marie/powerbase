@php
    $vehicle_options = [
        [
            'name' => __('admin/contacts.van'),
        'value' => '1',
        ],
        [
            'name' => __('admin/contacts.car'),
            'value' =>'0',
        ],
];


    $job_options = [
        [
            'name' => __('admin/contacts.electrician'),
        'value' => 'electricien',
        ],
        [
            'name' => __('admin/contacts.storekeeper'),
            'value' =>'magasinier',
        ],
            [
            'name' => __('admin/contacts.admin'),
            'value' =>'admin',
        ],
];
@endphp



<main class="admin" id="content">
    <x-admin.page-bar>
        {{__('admin/contacts.modify_contact')}}
    </x-admin.page-bar>
    <div class="main-container">
        <form wire:submit="save" class="">
            @csrf
            <fieldset class="contact-information max-w-admin-web big-section">
                <x-admin.components.subtitle>
                    {{__('admin/contacts.general_information')}}
                </x-admin.components.subtitle>
                <div class="contact-information-list">
                    <div>
                        <x-admin.components.fields.text name="first_name" value="{!! $contact->first_name !!}" placeholder="John" wire="first_name"
                                                        id="first_name">
                            {{__('admin/contacts.firstname')}}
                        </x-admin.components.fields.text>
                    </div>
                    <div>
                        <x-admin.components.fields.text name="last_name" value="{!! $contact->last_name !!}" placeholder="John" wire="last_name"
                                                        id="last_name">
                            {{__('admin/contacts.lastname')}}
                        </x-admin.components.fields.text>
                    </div>

                    <div>
                        <x-admin.components.fields.email value="{!! $contact->email !!}" wire="email">
                            {{__('admin/contacts.email')}}
                        </x-admin.components.fields.email>
                    </div>

                    <div>
                        <x-admin.components.fields.phone wire="phone" name="general_phone" id="general_phone" value="{!! $contact->phone !!}"
                                                         placeholder="048383903">
                            {{__('admin/contacts.phone')}}
                        </x-admin.components.fields.phone>
                    </div>

                    <div>
                        <x-admin.components.fields.select select_name="job_type"
                                                          label="{{__('admin/contacts.job_type')}}"
                                                          :options="$job_options" wire="job">
                        </x-admin.components.fields.select>
                    </div>


                    <div>
                        <x-admin.components.fields.phone wire="private_phone" name="private_phone" id="private_phone" value="{!! $contact->private_phone !!}"
                                                         placeholder="048383903">
                            {{__('admin/contacts.phone')}}
                        </x-admin.components.fields.phone>
                    </div>


                    <div>
                        <x-admin.components.fields.text name="adress" value="{!! $contact->private_address !!}"
                                                        placeholder="{{__('admin/contacts.address_example')}}" wire="private_address" id="adress">
                            {{__('admin/contacts.private_adress')}}
                        </x-admin.components.fields.text>
                    </div>
                </div>

            </fieldset>

            <div class="split-row">
                <fieldset class="small-section">
                    <x-admin.components.subtitle>
                        {{__('admin/contacts.car')}}
                    </x-admin.components.subtitle>
                    <div>
                        <x-admin.components.fields.select select_name="vehicle_type"
                                                          label="{{__('admin/contacts.vehicle_type')}}"
                                                          :options="$vehicle_options" wire="car_type">
                        </x-admin.components.fields.select>
                    </div>
                    <div>
                        <x-admin.components.fields.text name="license_plate" value="{!! $contact->car_plate !!}" placeholder="79327HD" wire="car_plate"
                                                        id="license_plate">
                            {{__('admin/contacts.license_plate')}}
                        </x-admin.components.fields.text>
                    </div>
                </fieldset>
                <div class="admin-information-buttons">
                    <x-admin.components.submit-button class="">
                        {{__('admin/contacts.save')}}
                    </x-admin.components.submit-button>
                </div>
            </div>
        </form>
    </div>
</main>

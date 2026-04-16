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



<main class="admin" id="content">
    <x-admin.page-bar>
        {{__('admin/contacts.create_a_contact')}}
    </x-admin.page-bar>
    <div class="main-container">
        <form wire:submit.prevent="store" class="profile-form volunteers-edit">
            @csrf
            <fieldset class="contact-information max-w-admin-web big-section">
                <x-admin.components.subtitle>
                    {{__('admin/contacts.general_information')}}
                </x-admin.components.subtitle>
                <div class="contact-information-list">
                    <div>
                        <x-admin.components.fields.text name="first_name" value="" placeholder="John" wire=""
                                                        id="first_name">
                            {{__('admin/contacts.firstname')}}
                        </x-admin.components.fields.text>
                    </div>
                    <div>
                        <x-admin.components.fields.text name="last_name" value="" placeholder="John" wire=""
                                                        id="last_name">
                            {{__('admin/contacts.lastname')}}
                        </x-admin.components.fields.text>
                    </div>

                    <div>
                        <x-admin.components.fields.email value="" wire="">
                            {{__('admin/contacts.email')}}
                        </x-admin.components.fields.email>
                    </div>

                    <div>
                        <x-admin.components.fields.phone wire="" name="general_phone" id="general_phone" value=""
                                                         placeholder="048383903">
                            {{__('admin/contacts.phone')}}
                        </x-admin.components.fields.phone>
                    </div>

                    <div>
                        <x-admin.components.fields.select select_name="job_type"
                                                          label="{{__('admin/contacts.job_type')}}"
                                                          :options="$job_options" wire="job_type">
                        </x-admin.components.fields.select>
                    </div>


                    <div>
                        <x-admin.components.fields.phone wire="" name="private_phone" id="private_phone" value=""
                                                         placeholder="048383903">
                            {{__('admin/contacts.phone')}}
                        </x-admin.components.fields.phone>
                    </div>


                    <div>
                        <x-admin.components.fields.text name="adress" value=""
                                                        placeholder="Rue de l'école 2, 4000 Liège" wire="" id="adress">
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
                                                          :options="$vehicle_options" wire="vehicle_type">
                        </x-admin.components.fields.select>
                    </div>
                    <div>
                        <x-admin.components.fields.text name="license_plate" value="" placeholder="79327HD" wire=""
                                                        id="license_plate">
                            {{__('admin/contacts.license_plate')}}
                        </x-admin.components.fields.text>
                    </div>
                </fieldset>
                <div class="admin-information-buttons">
                    <x-admin.components.admin-primary-button href="" title="" href="" class="">
                        {{__('admin/contacts.create_contact')}}
                    </x-admin.components.admin-primary-button>
                </div>
            </div>
        </form>
    </div>
</main>

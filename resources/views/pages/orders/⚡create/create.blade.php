@php
    $orders_state_options = [
        [
            'name' => __('admin/orders.pending'),
        'value' => 'waiting',
        ],
        [
            'name' => __('admin/orders.completed'),
            'value' =>'completed',
        ],


];
            $project_options = [
            [
            'name' => 'Projet 1',
        'value' => 'project_one',
        ],
        [
            'name' => 'Projet 2',
            'value' =>'project_two',
        ],
];

@endphp



<main class="admin order" id="content">
    <x-admin.page-bar>
        {{__('admin/orders.create_an_order')}}
    </x-admin.page-bar>
    <div class="main-container">
        <form wire:submit.prevent="store" class="profile-form volunteers-edit">
            @csrf
            <fieldset class="project-information max-w-admin-web big-section">
                <x-admin.components.subtitle>
                    {{__('admin/projects.general_information')}}
                </x-admin.components.subtitle>
                <div class="contact-information-list">
                    <div>
                        <div>
                            <x-admin.components.fields.text name="for_who" value="" placeholder="John" wire="for_who"
                                                            id="for_who">
                                {{__('admin/orders.for_who')}}
                            </x-admin.components.fields.text>
                        </div>

                        <div>
                            <x-admin.components.fields.phone wire="phone" name="phone" id="phone" value=""
                                                             placeholder="048383903">
                                {{__('admin/orders.phone_person_order')}}
                            </x-admin.components.fields.phone>
                        </div>
                    </div>

                    <div>
                        <div>
                            <x-admin.components.fields.select select_name="order_state"
                                                              label="{{__('admin/orders.order_state')}}"
                                                              :options="$orders_state_options" wire="order_state">
                            </x-admin.components.fields.select>
                        </div>

                        <div>
                            <x-admin.components.fields.select select_name="project_name"
                                                              label="{{__('admin/orders.project_name')}}"
                                                              :options="$project_options" wire="project_name">
                            </x-admin.components.fields.select>
                        </div>
                    </div>

                </div>
            </fieldset>

            <div class="split-row">
                <fieldset class="small-section">
                    <x-admin.components.subtitle>
                        {{__('admin/orders.products_to_order')}}
                    </x-admin.components.subtitle>
                    <div>
                        <x-admin.components.fields.select select_name="vehicle_type"
                                                          label="{{__('admin/contacts.vehicle_type')}}"
                                                          wire="vehicle_type">
                        </x-admin.components.fields.select>
                    </div>
                    <div>
                        <x-admin.components.fields.select select_name="vehicle_type"
                                                          label="{{__('admin/contacts.vehicle_type')}}"
                                                          wire="vehicle_type">
                        </x-admin.components.fields.select>
                    </div>
                    <div>
                        <x-admin.components.fields.select select_name="vehicle_type"
                                                          label="{{__('admin/contacts.vehicle_type')}}"
                                                          wire="vehicle_type">
                        </x-admin.components.fields.select>
                    </div>
                    <div>
                        <x-admin.components.fields.text name="license_plate" value="" placeholder="79327HD" wire=""
                                                        id="license_plate">
                            {{__('admin/projects.products_to_add')}}
                        </x-admin.components.fields.text>
                    </div>

                    {{--

                    HELP NEEDED

                    --}}


                </fieldset>
                <div class="admin-information-buttons">
                    <x-admin.components.form-button>
                        {{__('admin/orders.create_order')}}
                    </x-admin.components.form-button>
                </div>
            </div>
        </form>
    </div>
</main>

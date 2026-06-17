@php
    $vehicle_options = [
        [
            'name' => __('admin/contacts.van'),
        'value' => 'van',
        ],
        [
            'name' => __('admin/contacts.car'),
            'value' =>'car',
        ],
];


    $job_options = [
        [
            'name' => __('admin/contacts.electrician'),
        'value' => 'worker',
        ],
        [
            'name' => __('admin/contacts.storekeeper'),
            'value' =>'storekeeper',
        ],
            [
            'name' => __('admin/contacts.admin'),
            'value' =>'admin',
        ],
];
@endphp



<main class="admin" id="content">
    <x-admin.page-bar>
        {{__('admin/contacts.create_a_contact')}}
    </x-admin.page-bar>
    <div class="main-container">
        <form wire:submit.prevent="store" class="" autocomplete="off">
            @csrf
            <fieldset class="contact-information max-w-admin-web big-section">
                <x-admin.components.subtitle>
                    {{__('admin/contacts.general_information')}}
                </x-admin.components.subtitle>
                <p class="obligations m-b-32 ">
                    {{__('worker/order.mandatory_field')}}
                </p>
                <div class="contact-information-list">
                    <div>
                        <div>
                            <x-admin.components.fields.text name="first_name" value="" placeholder="John" wire="first_name"
                                                            id="first_name">
                                {{__('admin/contacts.firstname')}}*
                            </x-admin.components.fields.text>
                        </div>
                        <div>
                            <x-admin.components.fields.text name="last_name" value="" placeholder="Doe" wire="last_name"
                                                            id="last_name">
                                {{__('admin/contacts.lastname')}}*
                            </x-admin.components.fields.text>
                        </div>

                        <div>
                            <div class="field">
                                <label for="email" class="field__label">
                                    {{__('admin/contacts.email')}}*
                                </label>
                                <input type="email" name="email" id="email" class="field__input"
                                       value="" wire:model.blur="email"
                                       placeholder="johndoe@gmail.com" aria-required="true" autocomplete="off">
                                @error('email')
                                <p class="error">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div>
                        <div>
                            <x-admin.components.fields.phone wire="phone" name="phone" id="phone" value=""
                                                             placeholder="048383903">
                                {{__('admin/contacts.phone')}}*
                            </x-admin.components.fields.phone>
                        </div>

                        <div>
                            <x-admin.components.fields.select select_name="job"
                                                              label="{{__('admin/contacts.job_type')}}*"
                                                              :options="$job_options" wire="job">
                            </x-admin.components.fields.select>
                        </div>


                        <div>
                            <x-admin.components.fields.phone wire="private_phone" name="private_phone" id="private_phone" value=""
                                                             placeholder="048383903">
                                {{__('admin/contacts.private_phone_number')}}*
                            </x-admin.components.fields.phone>
                        </div>

                    </div>


                    <div>


                        <div>
                            <x-admin.components.fields.text name="private_address" value=""
                                                            placeholder="{{__('admin/contacts.address_example')}}" wire="private_address"
                                                            id="private_address">
                                {{__('admin/contacts.private_adress')}}*
                            </x-admin.components.fields.text>
                        </div>

                        <div>
                            <div class="d-flex flex-col">
                                <label for="password" class="field__label">
                                    {{__('admin/contacts.enter_a_password')}}*
                                </label>
                                <input type="password" id="password" name="password" class="field__input" autocomplete="new-password"  value="" aria-required="true" wire:model.blur="password"  placeholder="{{__('admin/contacts.enter_a_password')}}">
                                @error('password')
                                <p class="error">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                        </div>

                        <div>

                            <div class="d-flex flex-col">
                                <label for="password_confirmation" class="field__label">
                                    {{__('admin/contacts.repeat_password')}}*
                                </label>

                                <input type="password" id="password_confirmation" name="password_confirmation" class="field__input" autocomplete="new-password"  value="" aria-required="true" wire:model.blur="password_confirmation"  placeholder="{{__('admin/contacts.repeat_password')}}">
                                @error('password_confirmation')
                                <p class="error">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>

            </fieldset>

            <div class="split-row">
                <fieldset class="small-section">
                    <x-admin.components.subtitle>
                        {{__('admin/contacts.car')}}
                    </x-admin.components.subtitle>
                    <div>
                        <x-admin.components.fields.select select_name="car_type"
                                                          label="{{__('admin/contacts.vehicle_type')}}*"
                                                          :options="$vehicle_options" wire="car_type">
                        </x-admin.components.fields.select>
                    </div>
                    <div>
                        <x-admin.components.fields.text name="car_plate" value="" placeholder="79327HD" wire="car_plate"
                                                        id="car_plate">
                            {{__('admin/contacts.license_plate')}}*
                        </x-admin.components.fields.text>
                    </div>
                </fieldset>
                <div class="admin-information-buttons">
                    <x-admin.components.submit-button class="">
                        {{__('admin/contacts.create_contact')}}
                    </x-admin.components.submit-button>
                </div>
            </div>
        </form>
    </div>
</main>

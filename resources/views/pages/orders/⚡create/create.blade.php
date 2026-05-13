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

$projects = \App\Models\Project::all();
$orders_project_options = [];
            foreach ($projects as $project){
             $orders_project_options[] =
                 [
            'name' => $project->project_name,
        'value' => $project->id,
        ];
            }


            $users = \App\Models\User::all();

            $orders_users_options = [];
            foreach ($users as $user){
             $orders_users_options[] =
                 [
            'name' => "$user->first_name $user->last_name",
        'value' => $user->id,
        ];
            }

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
                            <x-admin.components.fields.select select_name="user_id"
                                                              label="{{__('admin/orders.for_who')}}"
                                                              :options="$orders_users_options" wire="user_id">
                            </x-admin.components.fields.select>
                        </div>
                        <div>
                            <x-admin.components.fields.text name="ordered_at" value="" placeholder="22.02.2022" wire="ordered_at"
                                                            id="ordered_at">
                                {{__('admin/orders.ordered_at')}}
                            </x-admin.components.fields.text>
                        </div>

                        <div>
                            <x-admin.components.fields.select select_name="project_id"
                                                              label="{{__('admin/orders.project_name')}}"
                                                              :options="$orders_project_options" wire="project_id">
                            </x-admin.components.fields.select>
                        </div>
                    </div>

                    <div>
                        <div>
                            <x-admin.components.fields.select select_name="order_state"
                                                              label="{{__('admin/orders.order_state')}}"
                                                              :options="$orders_state_options" wire="order_state">
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
                    {{-- <div>
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

                    --}}{{--

                    HELP NEEDED

                    --}}{{--

--}}
                </fieldset>
                <div class="admin-information-buttons">
                    <x-admin.components.submit-button class="">
                        {{__('admin/orders.create_order')}}
                    </x-admin.components.submit-button>
                </div>
            </div>
        </form>
    </div>
</main>

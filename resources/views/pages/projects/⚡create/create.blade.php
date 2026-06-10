@php
    $project_options = [
         [
             'name' => __('admin/projects.private'),
             'value' => \App\Enums\ProjectTypes::Private->value,
         ],
         [
             'name' => __('admin/projects.corporate'),
             'value' => \App\Enums\ProjectTypes::Corporate->value,
         ],
    ];
    $project_state = [
         [
             'name' => __('admin/projects.closed'),
             'value' => \App\Enums\ProjectStates::Closed->value,
         ],
         [
             'name' => __('admin/projects.open'),
             'value' => \App\Enums\ProjectStates::Open->value,
         ],
    ];

    $in_charge_options = [];

     foreach ($users as $user) {
        $in_charge_options[] = [
            'name'  => "$user->first_name $user->last_name",
            'value' => $user->id,
        ];
    }
@endphp


<main class="admin project" id="content">
    <x-admin.page-bar>
        {{__('admin/projects.create_a_project')}}
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
                            <x-admin.components.fields.text name="project_name" value="" placeholder="John"
                                                            wire="project_name"
                                                            id="project_name">
                                {{__('admin/projects.project_name')}}
                            </x-admin.components.fields.text>
                        </div>
                        <div>
                            <x-admin.components.fields.select select_name="user_id"
                                                              label="{{__('admin/projects.person_in_charge')}}"
                                                              :options="$in_charge_options" wire="user_id">
                            </x-admin.components.fields.select>
                        </div>
                        <div>
                            <x-admin.components.fields.select select_name="project_state"
                                                              label="{{__('admin/projects.project_state')}}"
                                                              :options="$project_state" wire="project_state">
                            </x-admin.components.fields.select>
                        </div>
                    </div>

                    <div>
                        <div>
                            <x-admin.components.fields.select select_name="project_type"
                                                              label="{{__('admin/projects.project_type')}}"
                                                              :options="$project_options" wire="project_type">
                            </x-admin.components.fields.select>
                        </div>

                        <div>
                            <x-admin.components.fields.text name="client_name" value="" placeholder="John Dupont"
                                                            wire="client_name"
                                                            id="client_name">
                                {{__('admin/projects.client_name')}}
                            </x-admin.components.fields.text>
                        </div>

                        <div>
                            <x-admin.components.fields.text name="project_address" value=""
                                                            placeholder="{{__('admin/projects.example_address')}}"
                                                            wire="project_address"
                                                            id="project_address">
                                {{__('admin/projects.project_adress')}}
                            </x-admin.components.fields.text>
                        </div>
                    </div>

                    <div>
                        <x-admin.components.fields.textarea wire="project_description" name="project_description"
                                                            id="project_description"
                                                            value=""
                                                            placeholder="{{__('admin/projects.example_project_description')}}">
                            {{__('admin/projects.project_description')}}
                        </x-admin.components.fields.textarea>
                    </div>
                </div>
            </fieldset>

            <div class="split-row">
                <div class="admin-information-buttons">
                    <x-admin.components.submit-button class="">
                        {{__('admin/projects.create_project')}}
                    </x-admin.components.submit-button>
                </div>
            </div>
        </form>
    </div>
</main>

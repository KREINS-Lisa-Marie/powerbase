@php
    $project_options = [
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



<main class="admin project" id="content">
    {{--    <x-admin.page-bar>
            Thomas Fortin   --}}{{--{!! $volunteer->first_name !!}  {!! $volunteer->last_name !!}--}}{{--
        </x-admin.page-bar>--}}
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
                            <x-admin.components.fields.text name="first_name" value="" placeholder="John" wire=""
                                                            id="first_name">
                                {{__('admin/projects.project_name')}}
                            </x-admin.components.fields.text>
                        </div>
                        <div>
                            <x-admin.components.fields.text name="last_name" value="" placeholder="John" wire=""
                                                            id="last_name">
                                {{__('admin/projects.person_in_charge')}}
                            </x-admin.components.fields.text>
                        </div>

                        <div>
                            <x-admin.components.fields.phone wire="" name="general_phone" id="general_phone" value=""
                                                             placeholder="048383903">
                                {{__('admin/projects.phone_person_in_charge')}}
                            </x-admin.components.fields.phone>
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
                                                            wire=""
                                                            id="client_name">
                                {{__('admin/projects.client_name')}}
                            </x-admin.components.fields.text>
                        </div>

                        <div>
                            <x-admin.components.fields.text name="project_adress" value=""
                                                            placeholder="Rue de l'école 2, 4000 Liège" wire=""
                                                            id="project_adress">
                                {{__('admin/projects.project_adress')}}
                            </x-admin.components.fields.text>
                        </div>
                    </div>

                    <div>
                        <x-admin.components.fields.textarea wire="" name="project_description" id="project_description"
                                                            value=""
                                                            placeholder="petite description">
                            {{__('admin/projects.project_description')}}
                        </x-admin.components.fields.textarea>
                    </div>
                </div>
            </fieldset>

            <div class="split-row">
                <div class="admin-information-buttons">
                    <x-admin.components.admin-primary-button href="" title="" href="" class="">
                        {{__('admin/projects.create_project')}}
                    </x-admin.components.admin-primary-button>
                </div>
            </div>
        </form>
    </div>
</main>

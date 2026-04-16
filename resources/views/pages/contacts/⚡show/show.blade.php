<main class="admin contacts" id="content">
{{--    <x-admin.page-bar>
        Thomas Fortin   --}}{{--{!! $volunteer->first_name !!}  {!! $volunteer->last_name !!}--}}{{--
    </x-admin.page-bar>--}}
    <x-admin.page-bar>
        Nom du contact
    </x-admin.page-bar>
    <div class="main-container">
        <section class="contact-information max-w-admin-web big-section">

            <x-admin.components.subtitle>
                {{__('admin/contacts.general_information')}}
            </x-admin.components.subtitle>
            <dl class="contact-information-list">
                <div>
                    <x-admin.components.definition-term>
                        {{__('admin/contacts.full_name')}}
                    </x-admin.components.definition-term>
                    <x-admin.components.definition>
                        {{--{!! $volunteer->first_name !!}--}}{{--{!! $volunteer->last_name !!}--}}
                        Bob Lee
                    </x-admin.components.definition>
                </div>

                <div>
                    <x-admin.components.definition-term>
                        {{__('admin/contacts.email')}}
                    </x-admin.components.definition-term>
                    <x-admin.components.definition>
                        {{--{!! $volunteer->email !!}--}}
                        email@gmail.com
                    </x-admin.components.definition>
                </div>

                <div>
                    <x-admin.components.definition-term>
                        {{__('admin/contacts.phone_number')}}
                    </x-admin.components.definition-term>
                    <x-admin.components.definition>
                        {{--{!! $volunteer->phone !!}--}}
                        40257230582
                    </x-admin.components.definition>
                </div>

                <div>
                    <x-admin.components.definition-term>
                        {{__('admin/contacts.job')}}
                    </x-admin.components.definition-term>
                    <x-admin.components.definition>
                        {{--{!! $volunteer->is_admin? __('admin/volunteers.admin'): __('admin/volunteers.volunteer') !!}--}}
                        Job
                    </x-admin.components.definition>
                </div>


                <div>
                    <x-admin.components.definition-term>
                        {{__('admin/contacts.private_phone_number')}}
                    </x-admin.components.definition-term>
                    <x-admin.components.definition>
                        {{--{!! $volunteer->phone !!}--}}
                        42754307
                    </x-admin.components.definition>
                </div>


                <div>
                    <x-admin.components.definition-term>
                        {{__('admin/contacts.private_adress')}}
                    </x-admin.components.definition-term>
                    <x-admin.components.definition>
                        {{--{!! $volunteer->phone !!}--}}
                        Neue adresse von mir
                    </x-admin.components.definition>
                </div>
            </dl>

        </section>

        <div class="split-row">
            <section class="small-section">
                <x-admin.components.subtitle>
                    {{__('admin/contacts.car')}}
                </x-admin.components.subtitle>
                <dl>
                    <div>
                        <x-admin.components.definition-term>
                            {{__('admin/contacts.vehicle_type')}}
                        </x-admin.components.definition-term>
                        <x-admin.components.definition>
                            {{--{!! $volunteer->phone !!}--}}
                            Camionette
                        </x-admin.components.definition>
                    </div>
                    <div>
                        <x-admin.components.definition-term>
                            {{__('admin/contacts.license_plate')}}
                        </x-admin.components.definition-term>
                        <x-admin.components.definition>
                            {{--{!! $volunteer->phone !!}--}}
                            37HRHF
                        </x-admin.components.definition>
                    </div>
                </dl>
            </section>
            <div class="admin-information-buttons">
                <x-admin.components.admin-primary-button href="" title="" href="" class="">
                    {{__('admin/contacts.modify_contact')}}
                </x-admin.components.admin-primary-button>

                <x-admin.components.admin-secondary-button href="" title="" href="" class="">
                    {{__('admin/contacts.delete_info')}}
                </x-admin.components.admin-secondary-button>
            </div>
        </div>
    </div>


    {{--<div class=" max-w-admin-web volunteer-buttons">
        <div class="top-row">
            <x-admin.admin-button href="{{route('pages::volunteers.edit', ['locale' => __('general.currentLocale'), 'volunteer' => $volunteer])}}"
                                  title="modifier les données" class="">
                {{__('admin/volunteers.modify_info')}}
            </x-admin.admin-button>

            <form wire:submit="destroy" method="post">
                @csrf
                <x-admin.form-button title="Supprimer la personne" class="delete_background delete-button">
                    {{__('admin/volunteers.delete_info')}}
                </x-admin.form-button>

            </form>
        </div>
    </div>
--}}
</main>

<main class="admin contacts" id="content">
    <x-admin.page-bar>
        {{$contact->first_name}} {{$contact->last_name}}
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
                        {{$contact->first_name}} {{$contact->last_name}}
                    </x-admin.components.definition>
                </div>

                <div>
                    <x-admin.components.definition-term>
                        {{__('admin/contacts.email')}}
                    </x-admin.components.definition-term>
                    <x-admin.components.definition>
                        <a href="mailto:{{$contact->email}}" title="{{__('admin/contacts.send_mail_to')}}">
                            {{$contact->email}}
                        </a>
                    </x-admin.components.definition>
                </div>

                <div>
                    <x-admin.components.definition-term>
                        {{__('admin/contacts.phone_number')}}
                    </x-admin.components.definition-term>
                    <x-admin.components.definition>
                        <a href="tel:{{$contact->phone}}" title="{{__('admin/contacts.call')}}">
                            {{$contact->phone}}
                        </a>
                    </x-admin.components.definition>
                </div>

                <div>
                    <x-admin.components.definition-term>
                        {{__('admin/contacts.job')}}
                    </x-admin.components.definition-term>
                    <x-admin.components.definition>
                        {{$contact->job == 'worker' ? __('admin/contacts.electrician') : ($contact->job == 'admin' ? __('admin/contacts.admin') : __('admin/contacts.storekeeper')) }}
                    </x-admin.components.definition>
                </div>


                <div>
                    <x-admin.components.definition-term>
                        {{__('admin/contacts.private_phone_number')}}
                    </x-admin.components.definition-term>
                    <x-admin.components.definition>
                        <a href="tel:{{$contact->private_phone}}" title="{{__('admin/contacts.call')}}">
                            {{$contact->private_phone}}
                        </a>
                    </x-admin.components.definition>
                </div>


                <div>
                    <x-admin.components.definition-term>
                        {{__('admin/contacts.private_adress')}}
                    </x-admin.components.definition-term>
                    <x-admin.components.definition>
                        {{$contact->private_address}}
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
                            {{$contact->car_type == 'van'? __('admin/contacts.van') : __('admin/contacts.car')}}
                        </x-admin.components.definition>
                    </div>
                    <div>
                        <x-admin.components.definition-term>
                            {{__('admin/contacts.license_plate')}}
                        </x-admin.components.definition-term>
                        <x-admin.components.definition>
                            {{$contact->car_plate}}
                        </x-admin.components.definition>
                    </div>
                </dl>
            </section>
            @if($user->job == 'admin' )
            <div class="admin-information-buttons">
                <x-admin.components.admin-primary-button href="{{route('pages::contacts.edit', ['locale' => __('general.currentLocale'), 'contact' => $contact])}}" title="{{__('admin/contacts.modify_the_data')}}"  class="">
                    {{__('admin/contacts.modify_contact')}}
                </x-admin.components.admin-primary-button>

                <form wire:submit="destroy" method="post">
                    @csrf
                    <x-admin.components.delete-btn title="{{__('admin/contacts.delete_the_person')}}">
                        {{__('admin/contacts.delete_info')}}
                    </x-admin.components.delete-btn>
                </form>
            </div>
            @endif
        </div>
    </div>
</main>

<main class="admin" id="content">
    <x-admin.page-bar>
        {{__('admin/profile.my_profile')}}
    </x-admin.page-bar>

    <div class="main-container">
        <div class="split-row">
        <section class="admin-profile admin-profile-buttons">
            <h2 class="sro">
                {{__('admin/profile.profile')}}
            </h2>
            <div class="change-lang text-white border-radius-16 admin-primary-button bold t-a-center">
                <input type="checkbox" id="lang-switch"
                          class="change-lang--input sro">
                <label class="change-lang--label" for="lang-switch" itemprop="name">
                    {{__('admin/profile.change_language')}}
                </label>
                <div class="text__container">
                    <a href="{{route('pages::profile.index', ['locale' => 'en'])}}" title="{{__('admin/profile.change_language_to_english')}}" class="d-block">{{__('admin/profile.english')}}</a>
                    <a href="{{route('pages::profile.index', ['locale' => 'de'])}}" title="{{__('admin/profile.change_language_to_german')}}" class="d-block">{{__('admin/profile.german')}}</a>
                    <a href="{{route('pages::profile.index', ['locale' => 'fr'])}}" title="{{__('admin/profile.change_language_to_french')}}" class="d-block">{{__('admin/profile.french')}}</a>
                </div>
            </div>
            <x-admin.components.admin-primary-button href="{{route('pages::profile.edit', ['locale' => __('general.currentLocale'), 'profile' => $user->id])}}" title="{{__('admin/profile.go_to_change_password')}}" class="">
                {{__('admin/profile.change_password')}}
            </x-admin.components.admin-primary-button>
            <form action="{{route('logout')}}" method="POST"
                  class="text-white admin-logout-button border-radius-16 bold">
                @csrf
                <button type="submit">
                    {{__('admin/sidebar.logout')}}
                </button>
            </form>

        </section>
        <section class="admin-profile-info small-section ">
                <x-admin.components.subtitle>
                    {{__('admin/profile.my_information')}}
                </x-admin.components.subtitle>
                <div class="project-information-list ">
                    <dl>
                        <div>
                            <x-admin.components.definition-term>
                                {{__('admin/profile.my_name')}}
                            </x-admin.components.definition-term>
                            <x-admin.components.definition>
                                {{$user->first_name}} {{$user->last_name}}
                            </x-admin.components.definition>
                        </div>
                        <div>
                            <x-admin.components.definition-term>
                                {{__('admin/profile.phone')}}
                            </x-admin.components.definition-term>
                            <x-admin.components.definition>
                                {{$user->phone}}
                            </x-admin.components.definition>
                        </div>
                        <div>
                            <x-admin.components.definition-term>
                                {{__('admin/profile.email')}}
                            </x-admin.components.definition-term>
                            <x-admin.components.definition>
                                {{$user->email}}
                            </x-admin.components.definition>
                        </div>
                        <div>
                            <x-admin.components.definition-term>
                                {{__('admin/profile.my_car')}}
                            </x-admin.components.definition-term>
                            <x-admin.components.definition>
                                {{$user->car_type == 'van'? __('admin/contacts.van') : ($user->car_type == 'car'? __('admin/contacts.car') : __('admin/contacts.no_car'))}}
                            </x-admin.components.definition>
                        </div>
                        <div>
                            <x-admin.components.definition-term>
                                {{__('admin/profile.my_car_plates')}}
                            </x-admin.components.definition-term>
                            <x-admin.components.definition>
                                {{$user->car_plate ? $user->car_plate : __('admin/contacts.no_carplate')}}
                            </x-admin.components.definition>
                        </div>
                    </dl>
                    </div>
            </section>

        </div>
        <div class="split-row company-info">
            @can('view', $company)
            <div class="admin-profile-buttons">
      {{--          <x-admin.components.admin-primary-button href="{{route('pages::profile.edit', ['locale' => app()->getLocale(), 'profile' => $user->id])}}" title="{{__('admin/profile.go_to_change_company_info')}}" class="">
                    {{__('admin/profile.change_company_info')}}
                </x-admin.components.admin-primary-button>--}}
                <button wire:click="openModal()" class="border-radius-16 admin-primary-button bold t-a-center">
                    {{__('admin/profile.edit_company')}}
                </button>
            </div>

            <section class="admin-profile-info small-section bottom-section ">
                <x-admin.components.subtitle>
                    {{__('admin/profile.company_information')}}
                </x-admin.components.subtitle>
                <div class="project-information-list ">
                    <div>
                        <div>
                            <dl>
                                <x-admin.components.definition-term>
                                    {{__('admin/profile.company_name')}}
                                </x-admin.components.definition-term>
                                <x-admin.components.definition>
                                    {{$company->name}}
                                </x-admin.components.definition>
                            </dl>
                            <dl>
                                <x-admin.components.definition-term>
                                    {{__('admin/profile.company_phone')}}
                                </x-admin.components.definition-term>
                                <x-admin.components.definition>
                                    {{$company->warehouse_phone}}
                                </x-admin.components.definition>
                            </dl>
                            <dl>
                                <x-admin.components.definition-term>
                                    {{__('admin/profile.company_email')}}
                                </x-admin.components.definition-term>
                                <x-admin.components.definition>
                                    {{$company->warehouse_email}}
                                </x-admin.components.definition>
                            </dl>
                        </div>

                    </div>
                </div>
            </section>
            @endcan
        </div>
        <div class="profile-support-info">
        <section class="admin-profile-info small-section bottom-section support-info">
            <x-admin.components.subtitle>
                {{__('admin/profile.powerbase_support')}}
            </x-admin.components.subtitle>
            <div class="project-information-list ">
                <div class="">
                    <dl>
                        <x-admin.components.definition-term>
                            {{__('admin/profile.powerbase_support_phone')}}
                        </x-admin.components.definition-term>
                        <x-admin.components.definition>
                            <a href="tel:00834927394" title="{{__('worker/contact.call')}}">
                                00834927394
                            </a>
                        </x-admin.components.definition>
                    </dl>
                    <dl>
                        <x-admin.components.definition-term>
                            {{__('admin/profile.powerbase_support_email')}}
                        </x-admin.components.definition-term>
                        <x-admin.components.definition>
                            <a href="mailto:support@powerbase.be" title="{{__('worker/contact.send_mail_to')}}">
                                support@powerbase.be
                            </a>
                        </x-admin.components.definition>
                    </dl>
                </div>
            </div>
        </section>
        </div>
        @if($isopenModal)
            @can('update', $company)
                <div class="bg-opacity">
                    <form wire:submit.prevent="updateCompany"
                          class="profile-form volunteers-edit message-modal border-r-small z-index-10 max-w-web ">
                        @csrf
                        <fieldset class="project-information max-w-admin-web big-section">
                            <div class="d-flex flex-j-c-space-between">
                                <x-admin.components.subtitle>
                                    {{__('admin/projects.general_information')}}
                                </x-admin.components.subtitle>
                                <button wire:click="closeModal" class="close-modal d-inline">
                                    {{__('admin/orders.close')}}  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" class="d-inline">
                                        <path
                                            d="M6.40331 18.3113L5.69531 17.6033L11.2953 12.0033L5.69531 6.40331L6.40331 5.69531L12.0033 11.2953L17.6033 5.69531L18.3113 6.40331L12.7113 12.0033L18.3113 17.6033L17.6033 18.3113L12.0033 12.7113L6.40331 18.3113Z"
                                            fill="black"/>
                                    </svg>
                                </button>
                            </div>
                            <p class="obligations m-b-32 ">
                                {{__('worker/order.mandatory_field')}}
                            </p>
                            <div class="contact-information-list">
                                <div>
                                    <div>
                                        <x-admin.components.fields.text name="name" value="" placeholder="Powerbase" wire="name" id="name">
                                            {{__('admin/profile.company_name')}}*
                                        </x-admin.components.fields.text>
                                    </div>
                                    <div>
                                        <x-admin.components.fields.phone name="warehouse_phone" value="" placeholder="0123456789" wire="warehouse_phone" id="warehouse_phone">
                                            {{__('admin/profile.company_phone')}}*
                                        </x-admin.components.fields.phone>
                                    </div>  <div>
                                        <x-admin.components.fields.email name="warehouse_email" value="" placeholder="john@doe.com" wire="warehouse_email" id="warehouse_email">
                                            {{__('admin/profile.company_email')}}*
                                        </x-admin.components.fields.email>
                                    </div>

                                </div>
                            </div>
                        </fieldset>

                        <div class="split-row">
                            <div class="admin-information-buttons">
                                <x-admin.components.submit-button class="">
                                    {{__('admin/profile.submit_company_info')}}
                                </x-admin.components.submit-button>
                            </div>
                        </div>
                    </form>
                </div>
            @endcan
        @endif
    </div>
</main>

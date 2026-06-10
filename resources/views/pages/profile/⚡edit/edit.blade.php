<main class="admin profile-edit" id="content">
    <x-admin.page-bar>
        {{__('admin/profile.change_my_password')}}
    </x-admin.page-bar>

    <div class="main-container">
        <section class="admin-profile">
            <h2 class="sro">
                {{__('admin/profile.my_password')}}
            </h2>
            <form wire:submit.prevent="save"
                  class="profile-form split-row ">
                @csrf
                <fieldset class="contact-information max-w-admin-web small-section">
                <div class="profile-inputs">
                    <x-auth.form.password wire="password" name="user_password" id="user_password" value=""
                                          placeholder="{{__('admin/profile.enter_a_password')}}">
                        {{__('admin/profile.user_password')}}
                    </x-auth.form.password>
                </div>

                <div class="profile-inputs">
                    <x-auth.form.password-confirmation wire="password_confirmation" name="user_password_confirmation" id="user_password_confirmation" value=""
                                                       placeholder="{{__('admin/profile.reenter_a_password')}}">
                        {{__('admin/profile.user_password_confirmation')}}
                    </x-auth.form.password-confirmation>
                </div>
                </fieldset>
                    <div class="admin-information-buttons">
                        <x-admin.components.form-button>
                            {{__('admin/profile.save')}}
                        </x-admin.components.form-button>
                    </div>
            </form>

        </section>
    </div>
</main>

<main class="" id="content">
    <x-admin.page-bar>
        {{__('admin/profile.my_profile')}}
    </x-admin.page-bar>

    <div class="main-container">
        <section class="admin-profile">
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
            <x-admin.components.admin-primary-button href="{{route('pages::profile.edit', ['locale' => __('general.currentLocale'), $user->id])}}" title="{{__('admin/profile.go_to_change_password')}}" class="">
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
    </div>
</main>

<main class="" id="content">
    <x-admin.page-bar>
        {{__('admin/profile.my_profile')}}
    </x-admin.page-bar>

    <div class="main-container">
        <section class="admin-profile">
            <h2 class="sro">
                {{__('admin/profile.profile')}}
            </h2>
            <x-admin.components.admin-primary-button href="{{__('admin/profile.change_language')}}" title="{{__('admin/profile.change_language_to')}}" class="">
                {{__('admin/profile.change_language')}}DE
            </x-admin.components.admin-primary-button>
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

<x-worker.app>

    <h1 class="sro" role="heading" aria-level="1" data-element-id="headingsMap-0-0">
        Powerbase
    </h1>

    <section class="border-radius-16 background-light-grey login-section">
            <div class="d-flex flex-cr">
                <h2 class="bold text-dark-red uppercase" aria-level="2" role="heading">
                    Se connecter
                </h2>
                <span class="d-flex flex-gap-24 flex-a-i-center">
                LOGO
            </span>
            </div>

            @if (session('status'))
                <div class="bold">
                    {{ session('status') }}
                </div>
            @endif


            <form action="{{--{{ route('login.store', ['locale' => __('general.currentLocale')]) }}--}}" method="post" class="reset-form">
                @csrf

                <x-auth.form.email-input></x-auth.form.email-input>
                <x-auth.form.password></x-auth.form.password>

                <div class="add-info">
                    <a href="/forgot-password" class="d-block medium m-b-24">
                        Mot de passe oublié?
                        {{--{{__('login.password_forgotten')}}--}}
                    </a>
                    <div class="d-flex  flex-gap-12 mb-64">
                        <input type="checkbox" name="remember" id="remember_me"
                               class="p-16 border-r-small background-white ">

                        <label for="remember_me" class="">
                            Se souvenir de moi
                            {{--{{__('login.remember_me')}}--}}
                        </label>
                    </div>

                </div>

                <x-auth.form.submit-button>
                    Se connecter
                    {{--{{__('login.button_login')}}--}}
                </x-auth.form.submit-button>
            </form>
        </section>
    </x-worker.app>

<x-worker.app>

    <h1 class="sro" role="heading" aria-level="1" data-element-id="headingsMap-0-0">
        Powerbase
    </h1>

    <section class="">
            <div class="">
                <h2 class="" aria-level="2" role="heading">
                    Se connecter
                </h2>
                <span class="">
                LOGO
            </span>
            </div>

            @if (session('status'))
                <div class="">
                    {{ session('status') }}
                </div>
            @endif


            <form action="{{--{{ route('login.store', ['locale' => __('general.currentLocale')]) }}--}}" method="post" class="reset-form">
                @csrf

                <x-auth.form.email-input></x-auth.form.email-input>
                <x-auth.form.password></x-auth.form.password>

                <div class="">
                    <a href="/forgot-password" class="">
                        Mot de passe oublié?
                        {{--{{__('login.password_forgotten')}}--}}
                    </a>
                    <div class="d-flex  flex-gap-12 mb-64">
                        <input type="checkbox" name="remember" id="remember_me"
                               class="">

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

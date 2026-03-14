<x-worker.app>
    <h1 class="sro" role="heading" aria-level="1" data-element-id="headingsMap-0-0">
        Powerbase
    </h1>

    <section class="">
            <div class="">
                <div>
                    <h2 class="" aria-level="2" role="heading">
                        Réinitialiser mon mot de passe
                    </h2>
                </div>
                <span class="">
                        LOGO
             </span>
            </div>

            <form action="/reset-password" method="post" class="">
                @csrf
                <input type="hidden" name="token" value="{{ request()->route('token') }}">
                <x-auth.form.email-input></x-auth.form.email-input>
                <x-auth.form.password></x-auth.form.password>
                <x-auth.form.password-confirmation></x-auth.form.password-confirmation>

                <x-auth.form.submit-button>
                    Réinitialiser mon mot de passe
                    {{--{{__('auth.forgotten_password')}}--}}
                </x-auth.form.submit-button>
            </form>

            @if (session('status'))
                <div class="">
                    {{ session('status') }}
                </div>
            @endif
        </section>

    </x-worker.app>

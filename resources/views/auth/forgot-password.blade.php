 <x-worker.app>
     <h1 class="sro" role="heading" aria-level="1" data-element-id="headingsMap-0-0">
         {{__('auth/forgot_password.powerbase')}}
     </h1>

     <section class="border-radius-16 background-light-grey login-section">
            <div class="d-flex flex-cr">
                <div>
                    <h2 class="bold text-dark-red uppercase" aria-level="2" role="heading">{{__('auth/forgot_password.password_forgotten')}}</h2>
                    <p class="italic reset-info mb-32">
                        {{__('auth/forgot_password.please_enter_email')}}
                    </p>
                </div>
                <span class="d-flex flex-gap-24 flex-a-i-center">
                    LOGO
                 </span>
            </div>

            <form action="/forgot-password" method="post" class="reset-from">
                @csrf
                <x-auth.form.email-input></x-auth.form.email-input>

                <a href="{{route('auth.login', ['locale' => __('general.currentLocale')])}}" class="d-block medium return-link">
                    {{__('auth/forgot_password.return_to_connect')}}
                </a>

                <x-auth.form.submit-button>
                    {{__('auth/forgot_password.reset')}}
                </x-auth.form.submit-button>
            </form>

            @if (session('status'))
                <div class="">
                    {{ session('status') }}
                </div>
            @endif
        </section>

     </x-worker.app>

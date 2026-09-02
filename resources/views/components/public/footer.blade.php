<footer class="general-footer " itemscope itemtype="https://schema.org/Organization">
    <div class="footer-content body-content m-l-r-main">
        <h2 class="sro" aria-level="2">
            {{__('footer.footer')}}
        </h2>
        <div class="web-flex flex-wrap flex-j-c-space-between">
            <section class="informations-footer m-b-56">
                <h3 class="footer-title" itemprop="legalName">
                    POWERBASE
                </h3>
            </section>
            <nav>
                <h3 class="footer-title">
                    {{__('footer.navigation')}} <span class="sro">{{__('footer.of_the_end_of_the_page')}}</span>
                </h3>
                <a href="{{route('public.info', ['locale' => app()->getLocale()])}}" class="d-block m-b-16"
                   title="{{__('footer.go_to_homepage')}}">{{__('footer.home')}}</a>

                <a href="{{route('public.contact', ['locale' => app()->getLocale()])}}" class="d-block m-b-16"
                   title="{{__('footer.go_to_page_contact')}}">{{__('footer.contact')}}</a>

                <a href="{{route('auth.login', ['locale' => app()->getLocale()])}}" class="d-block m-b-16"
                   title="{{__('footer.go_to_page_login')}}">{{__('footer.login')}}</a>

                <div class="change-lang public-change-lang">
                    <input type="checkbox" id="lang-switch" class="change-lang--input sro">
                    <label class="change-lang--label d-block fs-dt" for="lang-switch">
                        {{__('worker/profile.change_language')}}
                    </label>
                    <div class="text__container">
                        @if(app()->getLocale() != 'en')
                            <a href="{{route('public.info', ['locale' => 'en'])}}" class="d-block"
                               title="{{__('footer.go_to_page_info')}}">EN</a>
                        @endif
                        @if(app()->getLocale() != 'de')
                            <a href="{{route('public.info', ['locale' => 'de'])}}" class="d-block"
                               title="{{__('footer.go_to_page_info')}}">DE</a>
                        @endif
                        @if(app()->getLocale() != 'fr')
                            <a href="{{route('public.info', ['locale' => 'fr'])}}" class="d-block"
                               title="{{__('footer.go_to_page_info')}}">FR</a>
                        @endif
                    </div>
                </div>


                {{--@if(app()->getLocale() != 'en')
                    <a href="{{route('public.info', ['locale' => 'en'])}}" class="d-block m-b-16"  title="{{__('footer.go_to_page_info')}}">{{__('footer.info')}}</a>
                @endif
                @if(app()->getLocale() != 'de')
                    <a href="{{route('public.info', ['locale' => 'de'])}}" class="d-block m-b-16"  title="{{__('footer.go_to_page_info')}}">{{__('footer.info')}}</a>
                @endif
                @if(app()->getLocale() != 'fr')
                    <a href="{{route('public.info', ['locale' => 'fr'])}}" class="d-block m-b-16"  title="{{__('footer.go_to_page_info')}}">{{__('footer.info')}}</a>
                @endif--}}

            </nav>
        </div>
        <div class="legal-information">
            <a href="{{route('public.legals', ['locale' => app()->getLocale()])}}" class="d-block m-b-16"
               title="{{__('footer.go_to_page_legals')}}">
                {{__('footer.legal_information')}}
            </a>
            <p>
                {{__('footer.created_by')}} <a href="https://lisa-marie-kreins.com/"
                                               title="{{__('footer.go_to_website')}}">Lisa-Marie Kreins</a>
            </p>
        </div>
    </div>
</footer>

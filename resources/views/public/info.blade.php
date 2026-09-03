<x-public.app :title="$title">
<section class="public-heading m-l-r-main body-content">
    <div class="public-titles">
        <h2 class="bold text-light-red">
            POWERBASE
        </h2>
        <p class="medium">
            {{__('public/info.subtitle')}}
        </p>
    </div>
        <ul class="d-flex flex-wrap flex-r flex-gap-24 public-heading-link-container ">
            <li>
                <a href="#boss"
                   lang="{{app()->getLocale()}}"
                   hreflang="{{app()->getLocale()}}"
                   class="public-heading-link uppercase"
                   title="{{__('navigation.go_boss')}}"
                   aria-label="{{__('navigation.go_boss')}}">
                    {{__('public/info.boss')}}
                </a>
            </li>
            <li>

                <a href="#storekeeper"
                   lang="{{app()->getLocale()}}"
                   hreflang="{{app()->getLocale()}}"
                   class="public-heading-link uppercase"
                   title="{{__('navigation.go_storekeeper')}}"
                   aria-label="{{__('navigation.go_storekeeper')}}">
                    {{__('public/info.storekeepers')}}
                </a>
            </li>
            <li>
                <a href="#electrician"
                   lang="{{app()->getLocale()}}"
                   hreflang="{{app()->getLocale()}}"
                   class="public-heading-link uppercase"
                   title="{{__('navigation.go_electricians')}}"
                   aria-label="{{__('navigation.go_electricians')}}">
                    {{__('public/info.electricians')}}
                </a>
            </li>
        </ul>



</section>
<section class="public-intro ">
    <div class="m-l-r-main body-content d-flex flex-row flex-wrap flex-gap-24 flex-a-i-center">
    <div class="first-left">
        <h2 class="bold">
            {{__('public/info.discover')}} <span class="uppercase colored">Powerbase</span>
        </h2>
        <p>
            {{__('public/info.description_app')}}
        </p>
    </div>
    <div class="second-right">
        <img src="{!! asset('assets/content/power.png') !!}" alt="{{__('public/info.description_image')}}" width="600" height="392"
             class="border-radius-16 public-content-img">
    </div>
    </div>
</section>
<section class="public-electrician " id="electrician">
    <div class="body-content m-l-r-main">
        <div class="public-top flex-a-i-center">
            <div class="first-left">
                <img src="{!! asset('assets/content/worker.jpg') !!}" alt="{{__('public/info.description_image')}}" width="600" height="392" class="border-radius-16 public-content-img">
            </div>
            <div class="second-right">
                <h2 class="bold">
                    {{__('public/info.electricians_interface')}}
                </h2>
                <p>
                    {{__('public/info.electricians_description')}}
                </p>
                <a href="#storekeeper"
                   lang="{{app()->getLocale()}}"
                   hreflang="{{app()->getLocale()}}"
                   class="public-heading-link uppercase"
                   title="{{__('public.go_register')}}"
                   aria-label="{{__('public.go_register')}}">
                    {{__('public/info.discover_storekeeper')}}
                </a>
            </div>
        </div>
        <div class="public-bottom">
            <ul>
                <li>
                    <img src="{!! asset('assets/content/b7.jpg') !!}" alt="{{__('public/info.description_image')}}" width="392" height="288" class="border-radius-16 public-content-img">
                </li>
                <li>
                    <img src="{!! asset('assets/content/b6.jpg') !!}" alt="{{__('public/info.description_image')}}" width="392" height="288" class="border-radius-16 public-content-img">
                </li>
                <li>
                    <img src="{!! asset('assets/content/b8.jpg') !!}" alt="{{__('public/info.description_image')}}" width="392" height="288" class="border-radius-16 public-content-img">
                </li>
            </ul>
        </div>
    </div>
</section>

<section class="public-advantages body-content m-l-r-main">
    <div class="m-l-r-main body-content d-flex flex-row flex-wrap flex-a-i-center flex-gap-24">
        <div class="first-left">
            <h2 class="bold">
                {{__('public/info.your_advantage')}}
            </h2>
            <p>
                {{__('public/info.advantage_description')}}
            </p>
        </div>
        <div class="second-right">
            <img src="{!! asset('assets/content/advantage.jpg') !!}" alt="{{__('public/info.description_image')}}" width="600" height="392" class="border-radius-16 public-content-img">
        </div>
        </div>
</section>


    <section class="public-storekeeper " id="storekeeper">
        <div class="body-content m-l-r-main">
            <div class="public-top flex-a-i-center">
        <div class="first-left">
            <img src="{!! asset('assets/content/electrician-p.jpg') !!}" alt="{{__('public/info.description_image')}}" width="600" height="392" class="border-radius-16 public-content-img">
        </div>
        <div class="second-right">
            <h2 class="bold">
                {{__('public/info.storekeeper_interface')}}
            </h2>
            <p>
                {{__('public/info.storekeeper_description')}}
            </p>
            <a href="#boss"
               lang="{{app()->getLocale()}}"
               hreflang="{{app()->getLocale()}}"
               class="public-heading-link uppercase"
               title="{{__('public.go_register')}}"
               aria-label="{{__('public.go_register')}}">
                {{__('public/info.discover_admin')}}
            </a>
        </div>
        </div>

        <div class="public-bottom">
            <ul>
                <li>
                    <img src="{!! asset('assets/content/electrician-d.jpg') !!}" alt="{{__('public/info.description_image')}}" width="392" height="288" class="border-radius-16 public-content-img">
                </li>
                <li>
                    <img src="{!! asset('assets/content/electrician-c.jpg') !!}" alt="{{__('public/info.description_image')}}" width="392" height="288" class="border-radius-16 public-content-img">
                </li>
                <li>
                    <img src="{!! asset('assets/content/electrician-cc.jpg') !!}" alt="{{__('public/info.description_image')}}" width="392" height="288" class="border-radius-16 public-content-img">
                </li>
            </ul>
        </div>
        </div>
    </section>

<section class="public-why body-content m-l-r-main">
    <div class="first-left">
        <h2 class="bold">
            {{__('public/info.why_us')}}
        </h2>
    </div>
    <div class="second-right">
        <p>
            {{__('public/info.why_us_description')}}
        </p>
    </div>
</section>

    <div class="public-big-btn big-btn-white">
        <div class="m-l-r-main body-content">


    <a href="{{route('auth.register', ['locale' => app()->getLocale()])}}" title="{{__('footer.go_to_page_register')}}" class="bold d-flex flex-a-i-center j-c-space-b">
        {{__('public/info.start_now')}}
        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100" fill="none">
            <path d="M16 50C16 31.2 31.2 16 50 16C68.8 16 84 31.2 84 50C84 68.8 68.8 84 50 84C31.2 84 16 68.8 16 50ZM80 50C80 33.4 66.6 20 50 20C33.4 20 20 33.4 20 50C20 66.6 33.4 80 50 80C66.6 80 80 66.6 80 50Z" fill="black"/>
            <path d="M46.6008 66.5937L63.2008 49.9937L46.6008 33.3938L49.4008 30.5937L68.8008 49.9937L49.4008 69.3938L46.6008 66.5937Z" fill="black"/>
            <path d="M66 48L66 52L32 52L32 48L66 48Z" fill="black"/>
        </svg>
    </a>

        </div>
    </div>



    <section class="public-boss " id="boss">
        <div class="body-content m-l-r-main">
            <div class="public-top flex-a-i-center">
        <div class="first-left">
            <img src="{!! asset('assets/content/b3.jpg') !!}" alt="{{__('public/info.description_image')}}" width="600" height="392" class="border-radius-16 public-content-img">
        </div>
        <div class="second-right">
            <h2>
                {{__('public/info.admin_interface')}}
            </h2>
            <p>
                {{__('public/info.admin_description')}}
            </p>
            <a href="{{route('auth.register', ['locale' => app()->getLocale()])}}"
               lang="{{app()->getLocale()}}"
               hreflang="{{app()->getLocale()}}"
               class="public-heading-link uppercase"
               title="{{__('public.go_register')}}"
               aria-label="{{__('public.go_register')}}">
                {{__('public/info.create_account')}}
            </a>
        </div>
        </div>
        <div class="public-bottom">
            <ul>
                <li>
                    <img src="{!! asset('assets/content/b4.jpg') !!}" alt="{{__('public/info.description_image')}}" width="392" height="288" class="border-radius-16 public-content-img">
                </li>
                <li>
                    <img src="{!! asset('assets/content/b5.jpg') !!}" alt="{{__('public/info.description_image')}}" width="392" height="288" class="border-radius-16 public-content-img">
                </li>
                <li>
                    <img src="{!! asset('assets/content/b1.jpg') !!}" alt="{{__('public/info.description_image')}}" width="392" height="288" class="border-radius-16 public-content-img">
                </li>
            </ul>
        </div>
        </div>
    </section>

    <div class="public-big-btn big-btn-color ">

        <div class="m-l-r-main body-content">
            <a href="{{route('public.contact', ['locale' => app()->getLocale()])}}" title="{{__('footer.go_to_page_contact')}}" class="bold">
                {{__('public/info.more_info')}}
                {{__('public/info.contact_us_now')}}
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100" fill="none">
                <path
                    d="M16 50C16 31.2 31.2 16 50 16C68.8 16 84 31.2 84 50C84 68.8 68.8 84 50 84C31.2 84 16 68.8 16 50ZM80 50C80 33.4 66.6 20 50 20C33.4 20 20 33.4 20 50C20 66.6 33.4 80 50 80C66.6 80 80 66.6 80 50Z"
                    fill="white"/>
                <path
                    d="M46.6008 66.5937L63.2008 49.9937L46.6008 33.3938L49.4008 30.5937L68.8008 49.9937L49.4008 69.3938L46.6008 66.5937Z"
                    fill="white"/>
                <path d="M66 48L66 52L32 52L32 48L66 48Z" fill="white"/>
            </svg>
        </div>
    </div>


    <x-public.footer></x-public.footer>




</x-public.app>

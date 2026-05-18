<x-worker.app>
    <section class="text-white background-dark margin-first-content-top">
        <h2 class="uppercase text-white fs-page-title bold page-title mb-64" aria-level="2" role="heading">
            {{__('worker/profile.profile')}}
        </h2>

        <form action="{{route('logout')}}" method="POST">
            @csrf
            <button type="submit" class="uppercase bold d-block m-b-24 fs-dt">
                {{__('worker/profile.logout')}}
            </button>
        </form>
        <div class="change-lang">
            <input type="checkbox" id="lang-switch" class="change-lang--input sro">
            <label class="change-lang--label uppercase bold d-block fs-dt" for="lang-switch" itemprop="name">
                {{__('worker/profile.change_language')}}
            </label>
            <div class="text__container">
                <a href="{{route('worker.profile', ['locale' => 'en'])}}" title="{{__('worker/profile.change_language_to_english')}}" class="d-block uppercase m-l-16">{{__('worker/profile.english')}}</a>
                <a href="{{route('worker.profile', ['locale' => 'de'])}}" title="{{__('worker/profile.change_language_to_german')}}" class="d-block uppercase m-l-16">{{__('worker/profile.german')}}</a>
                <a href="{{route('worker.profile', ['locale' => 'fr'])}}" title="{{__('worker/profile.change_language_to_french')}}" class="d-block uppercase m-l-16">{{__('worker/profile.french')}}</a>
            </div>
        </div>
    </section>
</x-worker.app>

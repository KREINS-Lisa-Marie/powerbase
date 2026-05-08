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
        <a href="" class="uppercase bold d-block fs-dt " title="{{__('admin/profile.change_language')}}" >
            {{__('worker/profile.change_language')}}DE
        </a>
    </section>
</x-worker.app>

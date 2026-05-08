<x-worker.app>
    <x-worker.page-title>
        {{__('worker/homepage.hello')}} Eric
    </x-worker.page-title>
        <section class="product-section section-end-128">
            <x-worker.title>
                {{__('worker/homepage.new_products')}}
            </x-worker.title>
            <div class="d-flex flex-wrap flex-gap-24">
                @forelse($newest_products as $newest_product)
                <x-worker.product-card productname="{{$newest_product->product_name}}" product_id="{{$newest_product->id}}"/>
                @empty
                    <x-worker.product-card productname="{{__('worker/homepage.no_product_found')}}" product_id="null"/>
                @endforelse
            </div>
        </section>

        <section class="text-white section-end-128">
            <x-worker.title>
                {{__('worker/homepage.popular_products')}}
            </x-worker.title>
            <div class="d-flex flex-wrap flex-gap-24">
                {{--most ordered à faire !--}}
                @forelse($products as $product)
                    <x-worker.product-card productname="{{$product->product_name}}" product_id="{{$product->id}}"/>
                @empty
                    <x-worker.product-card productname="{{__('worker/homepage.no_product_found')}}" product_id=""/>
                @endforelse
            </div>
        </section>



    {{--<article class="product-card text-white">
        <h3 class="card-productname bold text-white">
            Nom
        </h3>
        <img src="/resources/img/spax.jpg" alt="" height="1200" width="1200" class="border-r-16">
        --}}{{--    <a href="{{route('worker.product'/*,  ['locale' => __('general.currentLocale'),  'product' => $product->id]*/)}}" title="aller vers la page du produit" class="card-link">
            </a>--}}{{--
        <a href="{{ route('worker.products', ['locale' => __('general.currentLocale')]) }}" title="aller vers la page du produit" class="card-link">
        </a>
    </article>--}}

    {{--    <section class="p-b-60 first-section">
            <div class="p-l-r-24">
                <h2 class="homepage-title m-t-60 m-b-16">
                    {{__('public/home.homepage_big_title')}}
                </h2>
                <p class="interl-text fs-texte">
                    {{__('public/home.page_description')}}
                </p>
            </div>
            <img src="{!! asset('assets/img/dogs.jpg') !!}" alt="Image avec deux chiens" width="948" height="911"
                 class="front-image">
        </section>
        <section
            class="section background-dark p-l-r-24 p-t-b-60-150 flex-cr d-flex wrap-reverse flex-gap-32 title-text-img">
            <div class="title-text">
                <h2 class=" page-title p-b-32 fw-700 t-a-center color-dark">
                    {{__('public/home.where_every_paw_counts')}}
                </h2>
                <p class="interl-text fs-texte">
                    {{__('public/home.where_every_paw_counts_text')}}
                </p>
            </div>
            <img src="{!! asset('assets/img/patte.jpg') !!}" alt="image du chien" width="328" height="328"
                 class="border-r-small">
        </section>

        <section class="p-t-b-60-150 background-light p-l-r-24 fs-texte home-adoption-section">
            <h2 class="page-title fw-700 p-b-32 t-a-center color-dark">
                {{__('public/home.adopt_us')}}
            </h2>

            <ul class="d-flex max-w-web margin-l-r-auto flex-gap-24 flex-wrap pet-group">
                @foreach($animals as $animal)
                    <li>
                        <x-cards :petname="$animal->animal_name" :petstatus="$animal->state" :petage="$animal->age" :petrace="$animal->race" :petsex="$animal->sex" :animal="$animal"/>
                    </li>
                @endforeach
            </ul>

        </section>
        <section
            class="p-t-b-60-150 p-l-r-24 fs-texte d-flex flex-gap-32 flex-cr more-info-section max-w-web margin-l-r-auto">
            <div class="">
                <h2 class="page-title fw-700 p-b-32 t-a-center color-dark">
                    {{__('public/home.need_more_info')}}
                </h2>
                <p class="interl-text fs-texte m-b-32">
                    {{__('public/home.need_more_info_description')}}
                </p>
                <a href="{{route("public.contact", ['locale' => __('general.currentLocale')])}}"
                   title="aller vers la page de Contact" class="public-button fs-button border-r-big ">
                    {{__('public/home.contact_us')}}
                </a>
            </div>
            <img src="{!! asset('assets/img/dogs.jpg') !!}" alt="Image avec deux chiens" width="948" height="911"
                 class="m-l-auto d-block border-r-small">
        </section>--}}
</x-worker.app>

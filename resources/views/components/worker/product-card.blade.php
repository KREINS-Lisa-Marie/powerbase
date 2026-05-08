@props(
    [
        'productname',
        'product_id',
]
)

{{--<div class="card">
    <img src="{!! asset('assets/img/frenchie.png') !!}" alt="Image du chien" class="border-r-small m-b-24 card-img">
    <div>
        <div class="d-flex flex-r flex-j-c-space-between flex-a-i-center pb-24">
            <p class="card-petname fw-700 d-block">
                {{$petname}}
            </p>

        </div>
    </div>
    <a href="{{route('public.animal',  ['locale' => __('general.currentLocale'),  'animal' => $animal->id])}}" title="aller vers la page de l’animal" class="card-link">
    </a>
</div>--}}




{{--<article class="product-card text-white">
    <h3 class="card-productname bold text-white">
        {{$productname}}
    </h3>
    <img src="../../../img/spax.webp" alt="" height="696" width="696" class="border-r-16">
    --}}{{--    <a href="{{route('worker.product'/*,  ['locale' => __('general.currentLocale'),  'product' => $product->id]*/)}}" title="aller vers la page du produit" class="card-link">
        </a>--}}{{--
    <a href="{{ route('worker.products', ['locale' => __('general.currentLocale')]) }}" title="aller vers la page du produit" class="card-link"></a>
</article>--}}


<article class="product-card text-white border-r-16">
    <div class="d-flex flex-col-reverse">
        <h3 class="card-productname bold text-white uppercase" aria-level="3" role="heading">
            {{$productname}}
        </h3>
        <img src="{!! asset('assets/img/spax.jpg') !!}" alt="" height="1200" width="1200" class="">
    </div>
    <a href="{{ route('worker.product', ['locale' => __('general.currentLocale'), 'product' => $product_id]) }}" title="aller vers la page du produit" class="card-link">
    </a>
</article>

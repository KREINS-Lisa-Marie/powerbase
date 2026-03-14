@props(
    [
        'productname',
        /*'product',*/
]
)

<article class="">
    <div class="">
        <h3 class="" aria-level="3" role="heading">
            {{$productname}}
        </h3>
        <img src="{!! asset('assets/img/spax.jpg') !!}" alt="" height="1200" width="1200" class="">
    </div>
    <a href="{{ route('worker.products', ['locale' => __('general.currentLocale')]) }}" title="aller vers la page du produit" class="">
    </a>
</article>

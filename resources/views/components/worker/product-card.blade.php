@props(
    [
        'productname',
        'product_image',
        'product_id',
]
)

<article class="product-card text-white border-r-16">
    <div class="d-flex flex-col-reverse">
        <h3 class="card-productname bold text-white uppercase" aria-level="3" role="heading">
            {{$productname}}
        </h3>
        @if($product_image)
            <img src="{{Storage::disk('s3')->url('/images/products/variants/288x288/'.basename($product->product_image))}}" {{--{!! asset('storage/images/products/variants/288x288/'.basename($product_image)) !!}"--}} alt="{{__('admin/products.the_product_image')}}"
                 class="border-radius-16 product-img">
        @else
            <img src="{!! asset('assets/default/default.jpg') !!}" alt="{{__('admin/products.the_product_image')}}"
                 class="border-radius-16 product-img" height="1200" width="1200">
        @endif
    </div>
    <a href="{{ route('worker::product', ['locale' => __('general.currentLocale'), 'product' => $product_id]) }}" title="aller vers la page du produit" class="card-link">
    </a>
</article>

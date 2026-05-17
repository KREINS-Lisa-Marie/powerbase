<x-worker.app>
    <section class="products-page-section">
        <x-worker.title>
            {{__('worker/products.products')}}
        </x-worker.title>

        <label for="search"></label>
        <input type="search" name="search" id="search" placeholder="{{__('worker/products.placeholder')}}">

        <ul class="d-flex flex-wrap flex-gap-24">
                @forelse($products as $product)
                    <li>
                    <x-worker.product-card productname="{{$product->product_name}}"  product_image="{{$product->product_image}}"  product_id="{{$product->id}}"/>
                    </li>

                @empty
                    <li>
                    <x-worker.product-card productname="{{__('worker/homepage.no_product_found')}}" product_id=""/>
                    </li>
                @endforelse
        </ul>

    </section>
    <div class="pagination max-w-admin-web">
    {{ $products->links() }}
    </div>
</x-worker.app>

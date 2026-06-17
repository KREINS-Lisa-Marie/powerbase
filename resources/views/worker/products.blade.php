<x-worker.app>
    <section class="products-page-section">
        <x-worker.title>
            {{__('worker/products.products')}}
        </x-worker.title>

        {{-- GET parce que c'est pas vraiment des données secrètes ou qui ne peuvent pas passer dans l'url --}}
        <form method="GET" action="" class="search-products-form">
            <label for="search" class="sro">
                {{__('admin/contacts.search')}}
            </label>
            <input type="text" name="search" id="search" class="" placeholder="{{__('admin/contacts.searching')}}" value="{{request('search')}}">       {{--ça garde le mot cherché --}}
            <button type="submit" class="uppercase bold d-block  background-light-red text-white border-radius-16">
                {{__('admin/contacts.searching')}}
            </button>
        </form>

        <ul class="d-flex flex-wrap flex-gap-24">
                @forelse($products as $product)
                    <li>
                    <x-worker.product-card productname="{{$product->product_name}}"  product_image="{{$product->product_image}}"  product_id="{{$product->id}}"/>
                    </li>

                @empty
                    <li>
    {{--                <x-worker.product-card productname="{{__('worker/homepage.no_product_found')}}" product_id=""/>--}}
                        <p class="error-no-product text-white  uppercase bold">
                            {{__('worker/products.no_product_found')}}
                        </p>
                    </li>
                @endforelse
        </ul>

    </section>
    <div class="pagination-worker max-w-admin-web">
    {{ $products->links() }}
    </div>
</x-worker.app>

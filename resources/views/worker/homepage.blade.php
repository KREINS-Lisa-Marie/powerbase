<x-worker.app>
    <x-worker.page-title>
        {{__('worker/homepage.hello')}} {{$user->first_name}}
    </x-worker.page-title>
        <section class="product-section section-end-128">
            <x-worker.title>
                {{__('worker/homepage.new_products')}}
            </x-worker.title>
            <div class="d-flex flex-wrap flex-gap-24">
                @forelse($newest_products as $newest_product)
                <x-worker.product-card productname="{{$newest_product->product_name}}" product_id="{{$newest_product->id}}" product_image="{{$newest_product->product_image}}"  />
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
                @forelse($random_products as $product)
                    <x-worker.product-card productname="{{$product->product_name}}" product_image="{{$product->product_image}}" product_id="{{$product->id}}"/>
                @empty
                    <x-worker.product-card productname="{{__('worker/homepage.no_product_found')}}" product_id=""/>
                @endforelse
            </div>
        </section>
</x-worker.app>

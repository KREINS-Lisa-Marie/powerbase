<x-worker.app>
    <section class="text-white background-dark margin-first-content-top">
        <h2 class="uppercase text-white fs-page-title bold page-title mb-64" aria-level="2" role="heading">
            {{$product->product_name}}
        </h2>
        <div class="product-details">
            <div class="img-button">
                <img src="{!! asset('storage/images/products/variants/392x392/'.basename($product->product_image)) !!}" alt="{{__('admin/products.the_product_image')}}"
                     class="border-radius-16 product-img" width="392" height="392">

                <!-- BUTTON TO ADD TO CART -->

                <form action="" method="POST" class="form m-b-128" >
                    <fieldset>

                        <div class="">

                            <div class="increment_fields d-flex j-c-center p-t-b-16 border-b-dark border-r-top background-white">

                                <button class="incr_control incr_control_minus ">
                                <span class="btn-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                                        <path fill="rgb(0, 0, 0)"
                                              d="M96 320C96 302.3 110.3 288 128 288L512 288C529.7 288 544 302.3 544 320C544 337.7 529.7 352 512 352L128 352C110.3 352 96 337.7 96 320z"/>
                                    </svg>
                                </span>
                                </button>

                                <input class="bold incr-input t-a-center" id="paintball-gants" type="number" {{--max=""--}}
                                       name="supplement" value="0">


                                <button class="incr_control incr_control_plus ">
                                <span class="btn-icon">

                                    <svg fill="000" xmlns="http://www.w3.org/2000/svg" width="24" height="24"  viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                                        <path
                                            d="M352 128C352 110.3 337.7 96 320 96C302.3 96 288 110.3 288 128L288 288L128 288C110.3 288 96 302.3 96 320C96 337.7 110.3 352 128 352L288 352L288 512C288 529.7 302.3 544 320 544C337.7 544 352 529.7 352 512L352 352L512 352C529.7 352 544 337.7 544 320C544 302.3 529.7 288 512 288L352 288L352 128z"/>
                                    </svg>


                                </span>
                                </button>

                            </div>
                        </div>

                    </fieldset>
                    <button type="submit"
                            class="order-form-btn background-light-red text-white border-r-bottom p-t-b-16 uppercase bold">
                        {{__('worker/product.add_to_cart')}}
                    </button>
                </form>
            </div>

            <dl>`
                <x-worker.definitionterm>
                    {{__('worker/product.brand')}}
                </x-worker.definitionterm>
                <x-worker.definition>
                    {{$product->brand}}
                </x-worker.definition>

                <x-worker.definitionterm>
                    {{__('worker/product.ref_article')}}
                </x-worker.definitionterm>
                <x-worker.definition>
                    {{$product->ref_article}}
                </x-worker.definition>

                <x-worker.definitionterm>
                    {{__('worker/product.gtin')}}
                </x-worker.definitionterm>
                <x-worker.definition>
                    {{$product->gtin}}
                </x-worker.definition>

                <x-worker.definitionterm>
                    {{__('worker/product.description')}}
                </x-worker.definitionterm>
                <x-worker.definition>
                    {{$product->product_description}}
                </x-worker.definition>

                <x-worker.definitionterm>
                    {{__('worker/product.notes')}}
                </x-worker.definitionterm>
                <x-worker.definition>
                    {{$product->product_notes}}
                </x-worker.definition>

                <x-worker.definitionterm>
                    {{__('worker/product.remaining_stock')}}
                </x-worker.definitionterm>
                <x-worker.definition>
                    {{$product->quantity}}
                </x-worker.definition>
            </dl>
        </div>
    </section>
</x-worker.app>

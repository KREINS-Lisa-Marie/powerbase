 <section class="text-white background-dark margin-first-content-top">
        <h2 class="uppercase text-white fs-page-title bold page-title mb-64" aria-level="2" role="heading">
            {{$product->product_name}}
        </h2>
        <div class="product-details j-c-space-b">
            <div class="img-button">
                @if($product->product_image)
                    <img src="{{Storage::disk('s3')->url('/images/products/variants/392x392/'.basename($product->product_image))}}" {{--{!! asset('storage/images/products/variants/392x392/'.basename($product->product_image)) !!}"--}} alt="{{__('admin/products.the_product_image')}}"
                         class="border-radius-16 product-img" width="392" height="392">
                @else
                    <img src="{!! asset('assets/default/default.jpg') !!}" alt="{{__('admin/products.the_product_image')}}"
                         class="border-radius-16 product-img">
                @endif

                        <div class="text-field increment_fields d-flex j-c-center p-t-b-16 border-b-dark border-r-top background-white m-t-64">
                            <label for="quantity" class="field__label sro">
                                {{__('admin/products.quantity')}}
                            </label>
                            <input wire:model.live="quantity" type="number" name="quantity" id="quantity" value="{{$value ?? ''}}" class="t-a-center" placeholder="{{__('admin/products.wanted_quantity')}}" min="1" max="100"      {{--pas de max parce que parfois faut plus qu'il y a en stock et ça doit être commandé par le magasinier. Le worker peut voir combien il y en a en stock donc il voit combien il aura pour le lendemain--}}
                            {{--j'ai mis live parce que si je mets blur, la personne doit cliquer hors du input pour que ça actualise quantity--}}
                                   aria-required="true">
                            @error('quantity')
                            {{$message}}
                            @enderror
                        </div>

                    <button type="submit"
                            class="order-form-btn background-light-red text-white border-r-bottom p-t-b-16 uppercase bold" wire:click="addToOrder({{$product->id}})">
                        {{__('worker/product.add_to_cart')}}
                    </button>

                    @if($successMessage)
                        <p class="success">
                            {{$successMessage}}
                        </p>
                    @endif
                    @error('cart')
                    <p class="error mb-32 m-t-32">
                        {{$message}}
                    </p>
                    @enderror
            </div>

            <dl>
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
                    {{$product->quantity <= 0 ? "0" : $product->quantity}}
                </x-worker.definition>
            </dl>
        </div>
    </section>

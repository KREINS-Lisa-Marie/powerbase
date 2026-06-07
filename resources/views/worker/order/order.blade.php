<div>
    <section class="m-b-64 background-dark margin-first-content-top">
        <form action="" method="POST" class="form text-white " wire:submit.prevent="store">
            @csrf
            <h2 class="uppercase text-white fs-page-title bold page-title mb-64" aria-level="2" role="heading">
                {{__('worker/order.order')}}
            </h2>

            <fieldset class="small-section">
                <p class="obligations m-b-32">
                    {{__('worker/order.mandatory_field')}}
                </p>
                <div class="d-flex flex-wrap flex-dir-col uppercase max-w-560 w-100">
                    <div class="worker-select">
                            <x-admin.components.fields.select select_name="project_id"
                                                              label="{{__('admin/orders.project_name')}} *" :options="$orders_project_options" wire="project_id" class="text-black">

                            </x-admin.components.fields.select>
                        @error('project_id')
                        <p>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div>

                        <ul class="increment_fields d-flex flex-dir-col flex-wrap">
                            @if(!empty($cart))
                                @foreach($cart as $productId => $item)
                                    <li class="uppercase bold fs-dt dt-margin text-white">
                                        @if(isset($item['name']))
                                            <p class="m-b-16 ">
                                            {{$item['name']}}
                                            </p>
                                        @endif

                                        <label for="quantity" class="field__label text-white">
                                            {{__('worker/order.quantity')}} *
                                        </label>
                                        <input wire:model.live="cart.{{$productId}}.quantity" type="number" name="quantity" id="quantity" value="{{ $item['quantity']?? ''}}" class="t-a-center background-white border-radius-16 p-16 max-w-560 w-100 m-b-32 text-black regular" placeholder="{{__('worker/order.wanted_quantity')}}" min="1" max="100" {{--pas de max parce que parfois faut plus qu'il y a en stock et ça doit être commandé par le magasinier. Le worker peut voir combien il y en a en stock donc il voit combien il aura pour le lendemain--}}
                                        aria-required="true">
                                        @error('quantity')
                                            {{$message}}
                                        @enderror

                                        <a href="#" wire:click="removeFromOrder({{$productId}})" class="field__label d-block bold m-b-32 m-t-neg-16 text-white" >
                                                {{__('worker/order.delete_product')}}
                                        </a>
                                    </li>
                                @endforeach
                            @else
                                <p class="text-white">
                                    {{__('worker/order.no_products_found')}}
                                </p>
                            @endif
                        </ul>
                    </div>
                </div>
            </fieldset>

            <button type="submit"
                    class="background-light-red text-white uppercase p-t-b-16 border-radius-16 max-w-560 bold submit-order-btn d-block m-l-auto w-100">
                {{__('worker/order.confirm_order')}}
            </button>
        </form>
    </section>


    <section class="background-dark text-white section-end-128">
        <h2 class="uppercase text-white fs-page-title bold page-title mb-64" aria-level="2" role="heading">
            {{__('worker/order.all_orders')}}
        </h2>

        @forelse($old_orders as $old_order)
            @php
            $project = App\Models\Project::where('id', $old_order->project_id)->first();
            $project_name = $project->project_name;

            $nb_products = \App\Models\OrderItem::where('order_id', $old_order->id )->get();
            @endphp
            <dl class="orders-end-64">
                <x-worker.definitionterm>
                    {{__('worker/order.order')}} {{$old_order->id}}
                </x-worker.definitionterm>
                <x-worker.definition>
                    {{$old_order->order_state}}
                </x-worker.definition>

                <x-worker.definitionterm>
                    {{__('worker/order.project_name')}}
                </x-worker.definitionterm>
                <x-worker.definition>
                    {{$project_name}}
                </x-worker.definition>

                <x-worker.definitionterm>
                    {{__('worker/order.product_number')}}
                </x-worker.definitionterm>
                <x-worker.definition>
                    {{$nb_products->count()}} {{__('worker/order.products')}}
                </x-worker.definition>
            </dl>
            @empty
                <p>
                    {{__('worker/order.no_order_found')}}
                </p>
            @endforelse
    </section>
</div>

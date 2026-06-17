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
                        <div class="text-field">
                            <label for="project_id" class="field__label">{{__('admin/orders.project_name')}} *</label>
                            <select name="project_id" id="project_id" class="d-block background-white border-radius-16 p-16" wire:model.blur="project_id">
                                <option class="m-b-24" value="">{{__('admin/contacts.select_an_option')}}</option>
                                @foreach($orders_project_options as $option)
                                    <x-admin.components.fields.select-option :option_value="$option['value']" :option_name="$option['name']"  />
                                @endforeach
                            </select>
                            @error('project_id')
                            <p class="mb-32 error">
                                {{__('worker/order.project_name_error')}}
                            </p>
                            @enderror
                        </div>
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

                                        <label for="quantity-{{$productId}}" class="field__label text-white">
                                            {{__('worker/order.quantity')}} *
                                        </label>
                                        <input wire:model.live="cart.{{$productId}}.quantity" type="number" name="quantity-{{$productId}}" id="quantity-{{$productId}}" value="{{ $item['quantity']?? ''}}" class="t-a-center background-white border-radius-16 p-16 max-w-560 w-100 m-b-32 text-black regular" placeholder="{{__('worker/order.wanted_quantity')}}" min="1" max="100" {{--pas de max parce que parfois faut plus qu'il y a en stock et ça doit être commandé par le magasinier. Le worker peut voir combien il y en a en stock donc il voit combien il aura pour le lendemain--}}
                                            {{--ajouté -{{$productId}} parce que sinon on a même id et ça pose problème --}}
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
                                <li>
                                    <p class="text-white">
                                    {{__('worker/order.no_products_found')}}
                                    </p>
                                </li>
                            @endif
                                @error('qt_over_one')
                                <p class="error mb-32 m-t-32">
                                    {{$message}}
                                </p>
                                @enderror
                                @error('no_product_chosen')
                                <p class="error mb-32 m-t-32">
                                    {{$message}}
                                </p>
                                @enderror

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
                    {{$old_order->order_state == 'pending'?__('worker/order.pending'): __('worker/order.completed')}}
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

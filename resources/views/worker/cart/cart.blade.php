<div>
    <section class="m-b-64 background-dark margin-first-content-top">
        <form action="" method="POST" class="form text-white " wire:submit.prevent="store">
            @csrf
            <h2 class="uppercase text-white fs-page-title bold page-title mb-64" aria-level="2" role="heading">
                {{__('navigation.cart')}}
            </h2>

            <div class="d-flex flex-r flex-gap-32 flex-j-c-space-between cart-container">
                <div>
                    <fieldset class="small-section cart-items">
                        <p class="obligations m-b-32">
                            {{__('worker/order.mandatory_field')}}
                        </p>
                        <div class="d-flex flex-wrap flex-dir-col uppercase max-w-560 w-100">
                            <div class="worker-select">
                                <div class="text-field">
                                    <label for="project_id" class="field__label">{{__('admin/orders.project_name')}}
                                        *</label>
                                    <select name="project_id" id="project_id"
                                            class="d-block background-white border-radius-16 p-16"
                                            wire:model.blur="project_id">
                                        <option class="m-b-24"
                                                value="">{{__('admin/contacts.select_an_option')}}</option>
                                        @foreach($orders_project_options as $option)
                                            <x-admin.components.fields.select-option :option_value="$option['value']"
                                                                                     :option_name="$option['name']"/>
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
                                                 <div class="product-qt">
                                                     <button type="button" wire:click="decrementQuantity({{$productId}})" class="decrement-btn">
                                                         -
                                                     </button>
                                                    <input wire:model.live="cart.{{$productId}}.quantity" type="number"
                                                       name="quantity-{{$productId}}" id="quantity-{{$productId}}"
                                                       value="{{ $item['quantity']?? ''}}"
                                                       class="t-a-center background-white border-radius-16 p-16 max-w-560 w-100 m-b-32 text-black regular"
                                                       placeholder="{{__('worker/order.wanted_quantity')}}" min="1"
                                                       max="100"
                                                       {{--pas de max parce que parfois faut plus qu'il y a en stock et ça doit être commandé par le magasinier. Le worker peut voir combien il y en a en stock donc il voit combien il aura pour le lendemain--}}
                                                       {{--ajouté -{{$productId}} parce que sinon on a même id et ça pose problème --}}
                                                       aria-required="true">
                                                     <button type="button" wire:click="incrementQuantity({{$productId}})" class="increment-btn">
                                                         +
                                                     </button>
                                                </div>
                                                @error('quantity')
                                                {{$message}}
                                                @enderror

                                                <a href="#" wire:click="removeFromOrder({{$productId}})"
                                                   class="field__label d-block bold m-b-32 m-t-neg-16 text-white remove-btn">
                                                    <span class="d-flex flex-r flex-gap-16 flex-a-i-center">{{__('worker/order.delete_product')}} <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.106 2.553C8.18899 2.38692 8.31658 2.24722 8.47447 2.14955C8.63237 2.05188 8.81434 2.0001 9 2H15C15.1857 2.0001 15.3676 2.05188 15.5255 2.14955C15.6834 2.24722 15.811 2.38692 15.894 2.553L17.618 6H20C20.2652 6 20.5196 6.10536 20.7071 6.29289C20.8946 6.48043 21 6.73478 21 7C21 7.26522 20.8946 7.51957 20.7071 7.70711C20.5196 7.89464 20.2652 8 20 8H19V19C19 19.7956 18.6839 20.5587 18.1213 21.1213C17.5587 21.6839 16.7956 22 16 22H8C7.20435 22 6.44129 21.6839 5.87868 21.1213C5.31607 20.5587 5 19.7956 5 19V8H4C3.73478 8 3.48043 7.89464 3.29289 7.70711C3.10536 7.51957 3 7.26522 3 7C3 6.73478 3.10536 6.48043 3.29289 6.29289C3.48043 6.10536 3.73478 6 4 6H6.382L8.106 2.553ZM14.382 4L15.382 6H8.618L9.618 4H14.382ZM11 11C11 10.7348 10.8946 10.4804 10.7071 10.2929C10.5196 10.1054 10.2652 10 10 10C9.73478 10 9.48043 10.1054 9.29289 10.2929C9.10536 10.4804 9 10.7348 9 11V17C9 17.2652 9.10536 17.5196 9.29289 17.7071C9.48043 17.8946 9.73478 18 10 18C10.2652 18 10.5196 17.8946 10.7071 17.7071C10.8946 17.5196 11 17.2652 11 17V11ZM15 11C15 10.7348 14.8946 10.4804 14.7071 10.2929C14.5196 10.1054 14.2652 10 14 10C13.7348 10 13.4804 10.1054 13.2929 10.2929C13.1054 10.4804 13 10.7348 13 11V17C13 17.2652 13.1054 17.5196 13.2929 17.7071C13.4804 17.8946 13.7348 18 14 18C14.2652 18 14.5196 17.8946 14.7071 17.7071C14.8946 17.5196 15 17.2652 15 17V11Z" fill="white"/>
                                                    </svg></span>
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
                            class="background-light-red text-white uppercase p-t-b-16 border-radius-16 max-w-560 bold submit-order-btn d-block w-100">
                        {{__('worker/order.confirm_order')}}
                    </button>
                </div>
                <div class="cart-suggestions d-flex flex-c flex-wrap flex-gap-24">
                       <h3 class="worker-sub">
                           {{__('worker/order.your_most_ordered')}}
                       </h3>
                    <ul class="cart-suggestions-list d-flex  flex-wrap flex-gap-24">
                        @forelse($most_ordered as $item)
                            <li>
                            <x-worker.product-card productname="{{$item['product']->product_name}}" product_image="{{$item['product']->product_image}}" product_id="{{$item['product']->id}}"/>
                            </li>
                        @empty
                            <li>
                                <p class="error-no-product text-white  uppercase bold">
                                    {{__('worker/products.no_product_found')}}
                                </p>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </form>
    </section>


    <section class="background-dark text-white section-end-128 admin cart-table">
        <h2 class="uppercase text-white fs-page-title bold page-title mb-64" aria-level="2" role="heading">
            {{__('worker/order.some_orders')}}
        </h2>
        @php
            $my_old_orders = $old_orders->take(3);      //take parce que limit ne marche pas ici
        @endphp
        {{--@forelse($my_old_orders as $old_order)--}}
            {{--@php
            $project = App\Models\Project::where('id', $old_order->project_id)->first();
            $project_name = $project->project_name;

            $nb_products = \App\Models\OrderItem::where('order_id', $old_order->id )->get();
            @endphp--}}
 {{--           <dl class="orders-end-64">
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
            @endforelse--}}




        <table class="table max-w-admin-web worker-orders-table">
            <thead class="max-w-admin-web">
            <tr class="max-w-admin-web">
                <x-admin.components.table.table-th scope="col" direction="" class="uppercase" sortable="">
                    {{__('admin/orders.order_number')}}
                </x-admin.components.table.table-th>
                <x-admin.components.table.table-th scope="col" direction="" class="uppercase" sortable="">
                    {{__('admin/orders.order_state')}}
                </x-admin.components.table.table-th>
                <x-admin.components.table.table-th scope="col" sortable  direction="" class="uppercase" sortable="">
                    {{__('worker/orders.ordered_at')}}
                </x-admin.components.table.table-th>
                <x-admin.components.table.table-th scope="col" direction="" class="uppercase" sortable="">
                    {{__('worker/orders.nb_products')}}
                </x-admin.components.table.table-th>
                <x-admin.components.table.table-th scope="col" direction="" class=" uppercase" sortable="">
                    {{__('worker/orders.link_to_order')}}
                </x-admin.components.table.table-th>
            </tr>
            </thead>
            <tbody class="max-w-admin-web">
            @forelse($my_old_orders as $old_order)
                @php
                    $project = App\Models\Project::where('id', $old_order->project_id)->first();
                    $project_name = $project->project_name;

                    $nb_products = \App\Models\OrderItem::where('order_id', $old_order->id )->get();
                @endphp

                <tr class="table-row  position-relative">
                    <x-admin.components.table.table-td class="table-full_name">
                        <p><span class="show-web">{{__('worker/order.order_state')}}</span>
                            {{$old_order->id}}
                        </p>
                    </x-admin.components.table.table-td>
                    <x-admin.components.table.table-td class="table-full_name">
                        <p><span class="show-web">{{__('worker/order.order_state')}}</span>
                            {{$old_order->order_state == 'pending'?__('worker/order.pending'): __('worker/order.completed')}}
                        </p>
                    </x-admin.components.table.table-td>
                    <x-admin.components.table.table-td class="table-name fw-medium">
                        <span class="show-web">{{__('worker/order.project_name')}}</span>
                        {{$old_order->created_at->format('d-m-Y')}}
                    </x-admin.components.table.table-td>
                    <x-admin.components.table.table-td class="table-state">
                        <span class="show-web">{{__('worker/order.product_number')}}</span>
                        {{$nb_products->count()}} {{__('worker/order.products')}}
                    </x-admin.components.table.table-td>
                    <x-admin.components.table.table-td class="table-species">
                        <a href="{{route('worker::orders.show',  ['locale' => app()->getLocale(),  'order' => $old_order->id])}}"  title="{{__('admin/orders.go_to_order_page')}}" class="order-detail-btn">
                            {{__('worker/orders.see_the_order')}}
                        </a>
                    </x-admin.components.table.table-td>
                </tr>
            @empty
                <tr class="table-row position-relative">
                    <x-admin.components.table.table-td class="table-full_name">
                            {{__('worker/order.no_order_found')}}
                    </x-admin.components.table.table-td>
                </tr>
            @endforelse
            </tbody>
        </table>


        <x-admin.components.admin-secondary-button href="{{route('worker::orders', ['locale' => app()->getLocale()])}}" title="{{__('navigation.go_order')}}" class="background-light-red text-white uppercase p-t-b-16 border-radius-16 max-w-560 bold submit-order-btn d-block m-l-auto w-100">
            {{__('worker/order.see_all_orders')}}
        </x-admin.components.admin-secondary-button>
    </section>
</div>


{{--
take()
https://stackoverflow.com/questions/45120135/in-laravel-eloquent-what-is-the-difference-between-limit-vs-take
https://laravel.com/docs/13.x/collections#method-take
--}}

@php
    $orders_state_options = [
        [
            'name' => __('admin/orders.pending'),
        'value' => 'waiting',
        ],
        [
            'name' => __('admin/orders.completed'),
            'value' =>'completed',
        ],
];


       $users = \App\Models\User::all();

       $orders_users_options = [];

            foreach ($users as $user){
             $orders_users_options[] =
                 [
            'name' => "$user->first_name $user->last_name",
        'value' => $user->id,
        ];
            }

    $projects = \App\Models\Project::all();

            $orders_project_options = [];

            foreach ($projects as $project){
             $orders_project_options[] =
                 [
            'name' => $project->project_name,
        'value' => $project->id,
        ];
            }

@endphp


<main class="admin project-show" id="content">
    <x-admin.page-bar>
        {{__('admin/orders.modify_order')}}
    </x-admin.page-bar>
    <div class="main-container">
        <form wire:submit.prevent="save" class="profile-form volunteers-edit">
            @csrf
            <fieldset class="project-information max-w-admin-web big-section">
                <x-admin.components.subtitle>
                    {{__('admin/orders.general_information')}}
                </x-admin.components.subtitle>
                <div class="contact-information-list">
                    <div>
                        <div>
                            <x-admin.components.fields.select select_name="user_id"
                                                              label="{{__('admin/orders.for_who')}}"
                                                              :options="$orders_users_options" wire="user_id">
                            </x-admin.components.fields.select>
                        </div>
                        <div>
                            <x-admin.components.fields.select select_name="project_id"
                                                              label="{{__('admin/orders.project_name')}}"
                                                              :options="$orders_project_options" wire="project_id">
                            </x-admin.components.fields.select>
                        </div>


                    </div>

                    <div>
                        <div>
                            <x-admin.components.fields.select select_name="order_state"
                                                              label="{{__('admin/orders.order_state')}}"
                                                              :options="$orders_state_options" wire="order_state">
                            </x-admin.components.fields.select>
                        </div>
                    </div>
                </div>
            </fieldset>

            <div class="split-row">
          <fieldset class="small-section">
                    <x-admin.components.subtitle>
                        {{__('admin/orders.products_used')}}
                    </x-admin.components.subtitle>



                {{-- search and add products to order --}}
                @if(!empty($cart))
                    <ul>
                        @foreach($cart as $productId => $item)
                            <li class="order-item bold mb-12">
                                {{$item['name']}}
                            </li>
                            <li class="order-item-quantity">
                                <div>
                                    <x-admin.components.fields.number name="quantity" wire="cart.{{$productId}}.quantity" id="quantity-{{$productId}}" value="{{$item['quantity']}}" placeholder="" >
                                        {{__('admin/orders.product_order_quantity')}}
                                    </x-admin.components.fields.number>
                                    <a href="#" wire:click="removeFromOrder({{$productId}})" class="d-block bold m-b-32 m-t-neg-16" >
                                        {{__('admin/orders.delete')}}
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                @endif
                <x-admin.components.fields.search/>
                @if($search)
                    <ul class="search-results m-t-32">
                        @foreach($searchedProduct as $product)
                            <li class="searched-items">
                                <p>
                                    {{$product->product_name}}
                                </p>
                                <a href="#" wire:click="addToOrder({{$product->id}})" class="add-button bold">
                                    {{__('admin/orders.add')}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
              @elseif(!empty($cart))
                  <ul class="search-results m-t-32">
                      @foreach($searchedProduct as $product)
                          <li class="searched-items">
                              <p>
                                  {{$product->product_name}}
                              </p>
                              <a href="#" wire:click="addToOrder({{$product->id}})" class="add-button bold">
                                  {{__('admin/orders.add')}}
                              </a>
                          </li>
                      @endforeach
                  </ul>
                @else
                    <p class="m-t-32">
                        {{__('admin/orders.no_product_chosen')}}
                    </p>
                @endif
          </fieldset>

                <div class="admin-information-buttons">
                    <x-admin.components.submit-button class="">
                        {{__('admin/orders.save')}}
                    </x-admin.components.submit-button>
                </div>
            </div>
        </form>
    </div>
</main>

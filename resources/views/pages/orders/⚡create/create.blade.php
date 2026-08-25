@php
    $orders_state_options = [
        [
            'name' => __('admin/orders.pending'),
        'value' => 'pending',
        ],
        [
            'name' => __('admin/orders.completed'),
            'value' =>'completed',
        ],


];

$projects = \App\Models\Project::all();
$orders_project_options = [];
            foreach ($projects as $project){
             $orders_project_options[] =
                 [
            'name' => $project->project_name,
        'value' => $project->id,
        ];
            }


            $users = \App\Models\User::all();

            $orders_users_options = [];
            foreach ($users as $user){
             $orders_users_options[] =
                 [
            'name' => "$user->first_name $user->last_name",
        'value' => $user->id,
        ];
            }



            $project_options = [
         [
             'name' => __('admin/projects.private'),
             'value' => \App\Enums\ProjectTypes::Private->value,
         ],
         [
             'name' => __('admin/projects.corporate'),
             'value' => \App\Enums\ProjectTypes::Corporate->value,
         ],
    ];
    $project_state = [
         [
             'name' => __('admin/projects.closed'),
             'value' => \App\Enums\ProjectStates::Closed->value,
         ],
         [
             'name' => __('admin/projects.open'),
             'value' => \App\Enums\ProjectStates::Open->value,
         ],
    ];

    $in_charge_options = [];

     foreach ($users as $user) {
        $in_charge_options[] = [
            'name'  => "$user->first_name $user->last_name",
            'value' => $user->id,
        ];
    }

@endphp


@can('create', \App\Models\Order::class)
<main class="admin order " id="content">
    <x-admin.page-bar>
        {{__('admin/orders.create_an_order')}}
    </x-admin.page-bar>
    <div class="main-container modal-relative">
        <x-admin.return-button class=""></x-admin.return-button>
        <form wire:submit.prevent="store" class="profile-form volunteers-edit">
            @csrf
            <fieldset class="project-information max-w-admin-web big-section">
                <x-admin.components.subtitle>
                    {{__('admin/projects.general_information')}}
                </x-admin.components.subtitle>
                <p class="obligations m-b-32 ">
                    {{__('worker/order.mandatory_field')}}
                </p>
                <div class="contact-information-list">
                    <div>
                        <div>
                            <x-admin.components.fields.select select_name="user_id"
                                                              label="{{__('admin/orders.for_who')}}*"
                                                              :options="$orders_users_options" wire="user_id">
                            </x-admin.components.fields.select>
                        </div>

                        <div>
                            <x-admin.components.fields.select select_name="project_id"
                                                              label="{{__('admin/orders.project_name')}}*"
                                                              :options="$orders_project_options" wire="project_id">
                            </x-admin.components.fields.select>
                        </div>
                    </div>

                    <div>
                        <div>
                            <x-admin.components.fields.select select_name="order_state"
                                                              label="{{__('admin/orders.order_state')}}*"
                                                              :options="$orders_state_options" wire="order_state">
                            </x-admin.components.fields.select>
                        </div>
                    </div>

                </div>
            </fieldset>

            <div class="split-row">
               <fieldset class="small-section">
                    <x-admin.components.subtitle>
                        {{__('admin/orders.products_to_order')}}
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
                   @else
                       <p class="m-t-32">
                           {{__('admin/orders.no_product_chosen')}}
                       </p>
                   @endif
                   @error('cart')
                   <p class="error mb-32 m-t-32">
                       {{$message}}
                   </p>
                   @enderror
                </fieldset>
                <div class="admin-information-buttons">
                    <x-admin.components.submit-button class="">
                        {{__('admin/orders.create_order')}}
                    </x-admin.components.submit-button>
                    <button wire:click="openModal()" class="text-white border-radius-16 admin-secondary-button bold t-a-center">
                        {{__('admin/orders.create_project')}}
                    </button>
                </div>
            </div>
        </form>
        @if($isopenModal)
            @can('create', \App\Models\Project::class)
            <div class="bg-opacity">
                <form wire:submit.prevent="storeProject"
                      class="profile-form volunteers-edit message-modal border-r-small z-index-10 max-w-web ">
                    @csrf
                    <fieldset class="project-information max-w-admin-web big-section">
                        <div class="d-flex flex-j-c-space-between">
                            <x-admin.components.subtitle>
                                {{__('admin/projects.general_information')}}
                            </x-admin.components.subtitle>
                            <button wire:click="closeModal" class="close-modal d-inline">
                                {{__('admin/orders.close')}}  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" class="d-inline">
                                    <path
                                        d="M6.40331 18.3113L5.69531 17.6033L11.2953 12.0033L5.69531 6.40331L6.40331 5.69531L12.0033 11.2953L17.6033 5.69531L18.3113 6.40331L12.7113 12.0033L18.3113 17.6033L17.6033 18.3113L12.0033 12.7113L6.40331 18.3113Z"
                                        fill="black"/>
                                </svg>
                            </button>
                        </div>
                        <p class="obligations m-b-32 ">
                            {{__('worker/order.mandatory_field')}}
                        </p>
                        <div class="contact-information-list">
                            <div>
                                <div>
                                    <x-admin.components.fields.text name="project_name" value="" placeholder="John" wire="project_name" id="project_name">
                                        {{__('admin/projects.project_name')}}*
                                    </x-admin.components.fields.text>
                                </div>
                                <div>
                                    <x-admin.components.fields.select select_name="project_user_id" label="{{__('admin/projects.person_in_charge')}}*" :options="$in_charge_options" wire="project_user_id">
                                    </x-admin.components.fields.select>
                                </div>
                                <div>
                                    <x-admin.components.fields.select select_name="project_state" label="{{__('admin/projects.project_state')}}*" :options="$project_state" wire="project_state">
                                    </x-admin.components.fields.select>
                                </div>
                            </div>

                            <div>
                                <div>
                                    <x-admin.components.fields.select select_name="project_type" label="{{__('admin/projects.project_type')}}*" :options="$project_options" wire="project_type">
                                    </x-admin.components.fields.select>
                                </div>

                                <div>
                                    <x-admin.components.fields.text name="client_name" value="" placeholder="John Dupont" wire="client_name" id="client_name">
                                        {{__('admin/projects.client_name')}}*
                                    </x-admin.components.fields.text>
                                </div>

                                <div>
                                    <x-admin.components.fields.text name="project_address" value="" placeholder="{{__('admin/projects.example_address')}}" wire="project_address" id="project_address">
                                        {{__('admin/projects.project_adress')}}*
                                    </x-admin.components.fields.text>
                                </div>
                            </div>

                            <div>
                                <div class="textarea_field ">
                                    <label for="project_description" class="field__label">
                                        {{__('admin/projects.project_description')}}*
                                    </label>
                                    <textarea wire:model.blur="project_description" id="project_description" name="project_description" class="textarea field__input" placeholder="{{__('admin/projects.example_project_description')}}" aria-required="true">{{--{!!$old_values!!}--}}</textarea>
                                </div>
                                @error('project_description')
                                <p class="mb-32 error">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </fieldset>

                    <div class="split-row">
                        <div class="admin-information-buttons">
                            <x-admin.components.submit-button class="">
                                {{__('admin/projects.create_project')}}
                            </x-admin.components.submit-button>
                        </div>
                    </div>
                </form>
            </div>
            @endcan
        @endif
    </div>
</main>
@endcan

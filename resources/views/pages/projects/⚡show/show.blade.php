@php
    $project = \App\Models\Project::findOrFail($project_id);
    $user = \App\Models\User::findOrFail($project->user_id)
@endphp

<main class="admin project-show" id="content">
    <x-admin.page-bar>
        {{$project->project_name}}
    </x-admin.page-bar>
    <div class="main-container">
        <section class="project-information max-w-admin-web big-section">

            <x-admin.components.subtitle>
                {{__('admin/projects.general_information')}}
            </x-admin.components.subtitle>
            <div class="project-information-list">
                <dl>
                    <div>
                        <x-admin.components.definition-term>
                            {{__('admin/projects.project_name')}}
                        </x-admin.components.definition-term>
                        <x-admin.components.definition>
                            {{$project->project_name}}
                        </x-admin.components.definition>
                    </div>
                    <div>
                        <x-admin.components.definition-term>
                            {{__('admin/projects.person_in_charge')}}
                        </x-admin.components.definition-term>
                        <x-admin.components.definition>
                            {{$user->first_name}} {{$user->last_name}}
                        </x-admin.components.definition>
                    </div>
                    <div>
                        <x-admin.components.definition-term>
                            {{__('admin/projects.phone_person_in_charge')}}
                        </x-admin.components.definition-term>
                        <x-admin.components.definition>
                            {{$user->phone}}
                        </x-admin.components.definition>
                    </div>
                    <div>
                        <x-admin.components.definition-term>
                            {{__('admin/projects.project_type')}}
                        </x-admin.components.definition-term>
                        <x-admin.components.definition>
                            {{$project->project_type == 'corporate' ? __('admin/projects.corporate') : __('admin/projects.private')}}
                        </x-admin.components.definition>
                    </div>
                </dl>
                <dl>

                    <div>
                        <x-admin.components.definition-term>
                            {{__('admin/projects.project_state')}}
                        </x-admin.components.definition-term>
                        <x-admin.components.definition>
                            {{$project->project_state == 'open' ? __('admin/projects.open') : __('admin/projects.closed')}}
                        </x-admin.components.definition>
                    </div>

                    <div>
                        <x-admin.components.definition-term>
                            {{__('admin/projects.client_name')}}
                        </x-admin.components.definition-term>
                        <x-admin.components.definition>
                            {{$project->client_name}}
                        </x-admin.components.definition>
                    </div>
                    <div>
                        <x-admin.components.definition-term>
                            {{__('admin/projects.project_adress')}}
                        </x-admin.components.definition-term>
                        <x-admin.components.definition>
                            {{$project->project_address}}
                        </x-admin.components.definition>
                    </div>
                </dl>
                <dl class="project-information-list-description">
                    <div>
                        <x-admin.components.definition-term>
                            {{__('admin/projects.project_description')}}
                        </x-admin.components.definition-term>
                        <x-admin.components.definition>
                            {{$project->project_description}}
                        </x-admin.components.definition>
                    </div>
                </dl>
            </div>

        </section>

        <div class="split-row">
            <section class="small-section projects-products-list">
                <x-admin.components.subtitle>
                    {{__('admin/projects.ordered_products')}}
                </x-admin.components.subtitle>

                <section class="orders-list">
                    <h2 class="sro">

                    </h2>
                    <table class="max-w-admin-web split-table">
                        <thead>
                        <tr>
                            <th scope="col" class="bold" direction="asc">
                                {{__('admin/projects.product_name')}}
                            </th>
                            <th scope="col" class="bold" direction="asc">
                                {{__('admin/projects.quantity')}}
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        @if($products)
                            @foreach($products as $product)
                                <tr class="table-row position-relative">
                                    <x-admin.components.table.table-td class="table-species">
                                    <span class="show-web">{{__('admin/projects.product_name')}}
                                    </span>
                                        <span>{{$product['product']->product_name}}</span>
                                        <a href="{{route('pages::products.show',  ['locale' => __('general.currentLocale'),  'product' => $product['product']->id])}}" title="{{__('admin/products.got_to_product_page')}}" class="card-link">
                                        </a>
                                    </x-admin.components.table.table-td>

                                    <x-admin.components.table.table-td class="table-full_name">
                                    <span class="show-web">{{__('admin/projects.quantity')}}
                                    </span>
                                        <span>{{$product['product_qt']}}</span>
                                    </x-admin.components.table.table-td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="table-row position-relative">
                                <x-admin.components.table.table-td class="">
                                    {{__('admin/projects.no_product_found')}}
                                </x-admin.components.table.table-td>
                            </tr>
                        @endif
                        </tbody>
                    </table>

                </section>

            </section>
            <div class="admin-information-buttons">
                <x-admin.components.admin-primary-button href="{{route('pages::projects.edit', ['locale' => __('general.currentLocale'), 'project' => $project])}}" title="{{__('admin/projects.modify_project')}}"  class="">
                    {{__('admin/projects.modify_project')}}
                </x-admin.components.admin-primary-button>

                <button onclick="window.print()" class="text-white border-radius-16 admin-secondary-button bold t-a-center">
                    {{__('admin/projects.print_project')}}
                </button>

            </div>
        </div>
    </div>
</main>

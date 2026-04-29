@php
$filter_options =[
           [
            'name' => 'ABC',
        'value' =>'ABC',
        ],
                   [
            'name' => 'ZYX',
        'value' =>'ZYX',
        ],
                   [
            'name' => 'latest',
        'value' =>'plus récents',
        ],
    ];

    $project = \App\Models\Project::findOrFail($project_id);
    $user = \App\Models\User::findOrFail($project->person_in_charge)
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
                            {{$project->phone_in_charge}}
                        </x-admin.components.definition>
                    </div>
                </dl>
                <dl>


                    <div>
                        <x-admin.components.definition-term>
                            {{__('admin/projects.project_type')}}
                        </x-admin.components.definition-term>
                        <x-admin.components.definition>
                            {{$project->project_type == 'corporate' ? 'Firma' : 'Particulier'}}
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
                <dl>
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


                <div class="bottom-row">
                    <x-admin.components.fields.select select_name="filtering" label="Trier" :options="$filter_options"
                                                      wire="filtering"/>
                </div>

                <section class="orders-list">
                    <h2 class="sro">

                    </h2>
                    <table class="table max-w-admin-web">
                        <thead>
                        <tr>
                            <x-admin.components.table.table-th scope="col">
                                {{__('admin/projects.product_name')}}
                            </x-admin.components.table.table-th>
                            <x-admin.components.table.table-th scope="col">
                                {{__('admin/projects.quantity')}}
                            </x-admin.components.table.table-th>
                        </tr>
                        </thead>
                        <tbody>

                        @for($i=0; $i<10; $i++)
                            {{--@foreach($this->searchedUsers() as $volunteer)--}}
                            <tr class="table-row position-relative">
                                <x-admin.components.table.table-td class="table-species">
                                    <span
                                        class="show-web">{{__('admin/projects.product_name')}}</span>{{--{!! $volunteer->is_admin?   __('admin/volunteers.admin'): __('admin/volunteers.volunteer') !!}--}}
                                    Vis 100
                                    <a href="{{--{{route('pages::volunteers.show',  ['locale' => __('general.currentLocale'),  'volunteer' => $volunteer->id])}}--}}"
                                       title="aller vers la fiche du produit" class="card-link">
                                    </a>
                                </x-admin.components.table.table-td>
                                <x-admin.components.table.table-td class="table-full_name">
                                    <span class="show-web">{{__('admin/projects.quantity')}}</span>
                                    2
                                    {{--<img src="{!! asset('assets/img/border-collie.jpg') !!}" alt="image du chien" class="border-r-big">--}}
                                </x-admin.components.table.table-td>
                            </tr>
                            {{--@endforeach--}}
                        @endfor
                        </tbody>
                    </table>
                </section>

            </section>
            <div class="admin-information-buttons">
                <x-admin.components.admin-primary-button href="{{route('pages::projects.edit', ['locale' => __('general.currentLocale'), 'project' => $project])}}" title="{{__('admin/projects.modify_project')}}"  class="">
                    {{__('admin/projects.modify_project')}}
                </x-admin.components.admin-primary-button>

  {{--              <x-admin.components.admin-secondary-button href="" title="" href="" class="">
                    {{__('admin/projects.delete_project')}}
                </x-admin.components.admin-secondary-button>--}}
                <form wire:submit="destroy" method="post">
                    @csrf
                    <x-admin.components.delete-btn title="{{__('admin/projects.delete_project')}}">
                        {{__('admin/projects.delete_project')}}
                    </x-admin.components.delete-btn>
                </form>

{{--
                <x-admin.components.admin-secondary-button href="" title="" href="" class="">
                    {{__('admin/projects.print_project')}}
                </x-admin.components.admin-secondary-button>
--}}

                <button onclick="window.print()" class="text-white border-radius-16 admin-secondary-button bold t-a-center">
                    {{__('admin/projects.print_project')}}
                </button>


            </div>
        </div>
    </div>
</main>

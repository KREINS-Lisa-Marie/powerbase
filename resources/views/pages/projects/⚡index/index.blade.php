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
    ]
@endphp
<main class="admin orders-index-page" id="content">
    <x-admin.page-bar>
        {{__('admin/projects.projects')}}
    </x-admin.page-bar>
    <div class="main-container">
        <div class="admin-filters-buttons max-w-admin-web">
            <div class="top-row">
                <x-admin.components.admin-primary-button
                    href="{{route('pages::contacts.create', ['locale' => __('general.currentLocale')])}}"
                    title="Aller sur la page 'Créer une commande'" class="">
                    {{__('admin/projects.create_a_project')}}
                </x-admin.components.admin-primary-button>
            </div>
            <div class="bottom-row">
                <x-admin.components.fields.select select_name="filtering" label="Trier" :options="$filter_options"
                                                  wire="filtering"/>
                <x-admin.components.fields.search/>
            </div>
        </div>

        <section class="orders-list">
            <h2 class="sro">

            </h2>
            <table class="table max-w-admin-web">
                <thead>
                <tr>
                    <x-admin.components.table.table-th scope="col">
                        {{__('admin/projects.project_name')}}
                    </x-admin.components.table.table-th>
                    <x-admin.components.table.table-th scope="col">
                        {{__('admin/projects.adress')}}
                    </x-admin.components.table.table-th>
                    <x-admin.components.table.table-th scope="col">
                        {{__('admin/projects.created_at')}}
                    </x-admin.components.table.table-th>
                    <x-admin.components.table.table-th scope="col">
                        {{__('admin/projects.finished_at')}}
                    </x-admin.components.table.table-th>
                </tr>
                </thead>
                <tbody>

                @for($i=0; $i<10; $i++)
                    {{--@foreach($this->searchedUsers() as $volunteer)--}}
                    <tr class="table-row position-relative">
                        <x-admin.components.table.table-td class="table-full_name">
                            <span class="show-web">{{__('admin/projects.project_name')}}</span>
                            Black Jack
                            {{--<img src="{!! asset('assets/img/border-collie.jpg') !!}" alt="image du chien" class="border-r-big">--}}
                        </x-admin.components.table.table-td>
                        <x-admin.components.table.table-td class="table-name fw-medium">
                            <span
                                class="show-web">{{__('admin/projects.adress')}}</span>{{--{!! $volunteer->last_name !!} {!! $volunteer->first_name !!}--}}
                            john@doe.com
                        </x-admin.components.table.table-td>
                        <x-admin.components.table.table-td class="table-state">
                            <span
                                class="show-web">{{__('admin/projects.created_at')}}</span>{{--{!! $volunteer->phone !!}--}}
                            2943473207
                        </x-admin.components.table.table-td>
                        <x-admin.components.table.table-td class="table-species">
                            <span
                                class="show-web">{{__('admin/projects.finished_at')}}</span>{{--{!! $volunteer->is_admin?   __('admin/volunteers.admin'): __('admin/volunteers.volunteer') !!}--}}
                            Electricien
                            <a href="{{--{{route('pages::volunteers.show',  ['locale' => __('general.currentLocale'),  'volunteer' => $volunteer->id])}}--}}"
                               title="aller vers la page de la commande" class="card-link">
                            </a>
                        </x-admin.components.table.table-td>
                    </tr>
                    {{--@endforeach--}}
                @endfor
                </tbody>
            </table>
        </section>
    </div>

</main>

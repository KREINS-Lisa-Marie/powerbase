<main class="admin orders-index-page" id="content">
    <x-admin.page-bar>
        {{__('admin/projects.projects')}}
    </x-admin.page-bar>
    <div class="main-container">
        <div class="admin-filters-buttons max-w-admin-web">
            <div class="top-row">
                <x-admin.components.admin-primary-button
                    href="{{route('pages::projects.create', ['locale' => __('general.currentLocale')])}}"
                    title="{{__('admin/projects.go_to_create_project')}}" class="">
                    {{__('admin/projects.create_a_project')}}
                </x-admin.components.admin-primary-button>
            </div>
            <div class="bottom-row">
                <x-admin.components.fields.search/>
            </div>
        </div>

        <section class="orders-list">
            <h2 class="sro">
                {{__('admin/projects.list_of_projects')}}
            </h2>
            <table class="table max-w-admin-web">
                <thead>
                <tr>
                    <x-admin.components.table.table-th scope="col" sortable wire:click="sortBy('project_name')" :direction="$sortField === 'project_name'? $sortDirection : null" class="{{$sortField === 'project_name'? 'active-sort': ''}}">
                        {{__('admin/projects.project_name')}}
                    </x-admin.components.table.table-th>
                    <x-admin.components.table.table-th scope="col" sortable wire:click="sortBy('project_address')" :direction="$sortField === 'project_address'? $sortDirection : null" class="{{$sortField === 'project_address'? 'active-sort': ''}}">
                        {{__('admin/projects.adress')}}
                    </x-admin.components.table.table-th>
                    <x-admin.components.table.table-th scope="col" sortable wire:click="sortBy('created_at')" :direction="$sortField === 'created_at'? $sortDirection : null" class="{{$sortField === 'created_at'? 'active-sort': ''}}">
                        {{__('admin/projects.created_at')}}
                    </x-admin.components.table.table-th>
                    <x-admin.components.table.table-th scope="col" sortable wire:click="sortBy('project_state')" :direction="$sortField === 'project_state'? $sortDirection : null" class="{{$sortField === 'project_state'? 'active-sort': ''}}">
                        {{__('admin/projects.project_state')}}
                    </x-admin.components.table.table-th>
                </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                    <tr class="table-row position-relative">
                        <x-admin.components.table.table-td class="table-full_name">
                            <span class="show-web">{{__('admin/projects.project_name')}}</span>
                            {{$project->project_name}}
                        </x-admin.components.table.table-td>
                        <x-admin.components.table.table-td class="table-name fw-medium">
                            <span
                                class="show-web">{{__('admin/projects.adress')}}</span>
                            {{$project->project_address}}
                        </x-admin.components.table.table-td>
                        <x-admin.components.table.table-td class="table-state">
                            <span
                                class="show-web">{{__('admin/projects.created_at')}}</span>
                            {{ date('d/m/Y', strtotime($project->created_at)) }}
                        </x-admin.components.table.table-td>
                        <x-admin.components.table.table-td class="table-species">
                            <span
                                class="show-web">{{__('admin/projects.finished_at')}}</span>
                            {{$project->project_state == 'open' ? __('admin/projects.open') : __('admin/projects.closed')}}
                            <a href="{{route('pages::projects.show',  ['locale' => __('general.currentLocale'),  'project' => $project->id])}}"
                               title="{{__('admin/projects.go_to_project_page')}}" class="card-link">
                            </a>
                        </x-admin.components.table.table-td>
                    </tr>
                    @empty
                        <tr class="table-row position-relative">
                            <x-admin.components.table.table-td class="table-full_name">
                                {{__('admin/projects.no_result')}}
                            </x-admin.components.table.table-td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </section>
        <div class="pagination-admin max-w-admin-web">
            {{ $projects->links() }}
        </div>
    </div>

</main>

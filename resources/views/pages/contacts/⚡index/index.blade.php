<main class="admin contact-index-page" id="content">
    <x-admin.page-bar>
        {{__('admin/contacts.contacts')}}
    </x-admin.page-bar>
    <div class="main-container">
        <div class="admin-filters-buttons max-w-admin-web">
            <div class="top-row">
                <x-admin.components.admin-primary-button
                    href="{{route('pages::contacts.create', ['locale' => __('general.currentLocale')])}}"
                    title="{{__('admin/contacts.go_to_create_contact')}}" class="">
                    {{__('admin/contacts.create_a_contact')}}
                </x-admin.components.admin-primary-button>
            </div>
            <div class="bottom-row bottom-row-volunteer">
                <x-admin.components.fields.search/>
            </div>
        </div>


        <section class="contacts-list">
            <h2 class="sro">
                {{__('admin/contacts.list_of_contacts')}}
            </h2>
            <table class="table max-w-admin-web">
                <thead>
                <tr>
                    <x-admin.components.table.table-th scope="col" sortable wire:click="sortBy('first_name')" :direction="$sortField === 'first_name'? $sortDirection : null">
                        {{__('admin/contacts.full_name')}}
                    </x-admin.components.table.table-th>
                    <x-admin.components.table.table-th scope="col" sortable wire:click="sortBy('email')"  :direction="$sortField === 'email'? $sortDirection : null">
                        {{__('admin/contacts.email')}}
                    </x-admin.components.table.table-th>
                    <x-admin.components.table.table-th scope="col" sortable wire:click="sortBy('phone')"  :direction="$sortField === 'phone'? $sortDirection : null">
                        {{__('admin/contacts.phone')}}
                    </x-admin.components.table.table-th>
                    <x-admin.components.table.table-th scope="col" sortable wire:click="sortBy('job')"  :direction="$sortField === 'job'? $sortDirection : null">
                        {{__('admin/contacts.job')}}
                    </x-admin.components.table.table-th>
                </tr>
                </thead>
                <tbody>

                    @forelse($contacts as $contact)
                    <tr class="table-row position-relative">
                        <x-admin.components.table.table-td class="table-full_name">
                            <span class="show-web">{{__('admin/contacts.name_title')}}</span>
                            {{$contact->first_name}} {{$contact->last_name}}
                        </x-admin.components.table.table-td>
                        <x-admin.components.table.table-td class="table-name fw-medium">
                            <span
                                class="show-web">{{__('admin/contacts.email_title')}}</span>
                            {{$contact->email}}
                        </x-admin.components.table.table-td>
                        <x-admin.components.table.table-td class="table-state">
                            <span
                                class="show-web">{{__('admin/contacts.phone_number_title')}}</span>
                            {{$contact->phone}}
                        </x-admin.components.table.table-td>
                        <x-admin.components.table.table-td class="table-species">
                            <span
                                class="show-web">{{__('admin/contacts.job_title')}}</span>
                            {{$contact->job == 'worker' ? __('admin/contacts.electrician') : ($contact->job == 'admin' ? __('admin/contacts.admin') : __('admin/contacts.storekeeper')) }}
                            <a href="{{route('pages::contacts.show',  ['locale' => __('general.currentLocale'),  'contact' => $contact->id])}}"
                               title="{{__('admin/contacts.go_to_contact')}}" class="card-link">
                            </a>
                        </x-admin.components.table.table-td>
                    </tr>
                    @empty
                        <tr class="table-row position-relative">
                            <x-admin.components.table.table-td class="table-full_name">
                                {{__('admin/contacts.no_result')}}
                            </x-admin.components.table.table-td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </section>
        <div class="pagination max-w-admin-web">
            {{ $contacts->links() }}
        </div>
    </div>

</main>

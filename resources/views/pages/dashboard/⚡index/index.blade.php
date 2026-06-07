<main id="content" class="admin dashboard-page">
    <x-admin.page-bar>
        {{__('admin/dashboard.home')}}
    </x-admin.page-bar>
<div class="main-container">
    <section class="welcome-dashboard-section ">
        <x-admin.components.page-title>
            {{__('admin/dashboard.hello')}} {{$user->first_name}}
        </x-admin.components.page-title>
        <ul class="dashboard-lists">
            <x-list-items>
                <a href="{{route('pages::projects.create', ['locale' => __('general.currentLocale')])}}" class="d-block dark-button-background color-white regular-shadow bold dashboard-btn">
                    {{__('admin/dashboard.create_a_project')}}
                </a>
            </x-list-items>
            <x-list-items>
                <a href="{{route('pages::products.create', ['locale' => __('general.currentLocale')])}}" class="d-block dark-button-background color-white regular-shadow bold dashboard-btn">
                    {{__('admin/dashboard.create_a_product')}}
                </a>
            </x-list-items>
            <x-list-items>
                <a href="{{route('pages::orders.index', ['locale' => __('general.currentLocale')])}}" class="d-block dark-button-background color-white regular-shadow bold dashboard-btn">
                    {{__('admin/dashboard.see_orders')}}
                </a>
            </x-list-items>
            <x-list-items>
                <a href="{{route('pages::contacts.index', ['locale' => __('general.currentLocale')])}}" class="d-block dark-button-background color-white regular-shadow bold dashboard-btn">
                    {{__('admin/dashboard.see_contacts')}}
                </a>
            </x-list-items>
        </ul>




        <ul class="dashboard-lists m-t-24">
            <x-list-items>
                <div class="dashboard-card">
                    <p class="dashboard-card-title bold">
                        {{__('admin/dashboard.orders_to_treat')}}
                    </p>
                    <div class="dashboard-card-icon-number">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80" fill="none">
                            <path d="M27.5 67.5C28.8807 67.5 30 66.3807 30 65C30 63.6193 28.8807 62.5 27.5 62.5C26.1193 62.5 25 63.6193 25 65C25 66.3807 26.1193 67.5 27.5 67.5Z" stroke="#5A0201" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M62.5 67.5C63.8807 67.5 65 66.3807 65 65C65 63.6193 63.8807 62.5 62.5 62.5C61.1193 62.5 60 63.6193 60 65C60 66.3807 61.1193 67.5 62.5 67.5Z" stroke="#5A0201" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.5 12.5H17.5L25 55H65" stroke="#5A0201" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M25 45H63.975C64.2641 45.0002 64.5443 44.9002 64.7679 44.717C64.9916 44.5338 65.1448 44.2788 65.2016 43.9953L69.7016 21.4953C69.7379 21.3139 69.7335 21.1267 69.6886 20.9471C69.6438 20.7676 69.5597 20.6003 69.4423 20.4572C69.325 20.3142 69.1773 20.199 69.0101 20.1199C68.8428 20.0408 68.66 19.9999 68.475 20H20" stroke="#5A0201" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <x-admin.dashboard.dashboard-card-information >
                            {{$orders_to_finish}}
                        </x-admin.dashboard.dashboard-card-information>
                    </div>
                </div>
            </x-list-items>

            <x-list-items>
                <div class="dashboard-card">
                    <p class="dashboard-card-title bold">
                        {{__('admin/dashboard.products_under_five_pieces')}}
                    </p>
                    <div class="dashboard-card-icon-number">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80" fill="none">
                            <path d="M39.0402 46.6675L19.2235 44.3608C18.0502 44.2364 17.298 43.6142 16.9669 42.4942C16.6358 41.3742 16.9058 40.4275 17.7769 39.6542L50.3869 10.3875C50.5358 10.2364 50.708 10.1242 50.9035 10.0508C51.0991 9.97528 51.3813 9.9375 51.7502 9.9375C52.3502 9.9375 52.8235 10.1964 53.1702 10.7142C53.5169 11.2319 53.5202 11.7764 53.1802 12.3475L40.7702 33.3975L60.7135 35.7042C61.8869 35.8286 62.6502 36.4397 63.0035 37.5375C63.3569 38.6353 63.0969 39.5719 62.2235 40.3475L29.6135 69.6808C29.4646 69.8297 29.2924 69.9308 29.0969 69.9842C28.9013 70.0375 28.6191 70.0642 28.2502 70.0642C27.6502 70.0642 27.198 69.8064 26.8935 69.2908C26.5891 68.7753 26.5858 68.2519 26.8835 67.7208L39.0402 46.6675ZM35.0402 60.0575L58.9702 38.8275L35.3969 36.1875L45.0702 19.8342L21.0302 41.1308L44.5202 43.9442L35.0402 60.0575Z" fill="#5A0201"/>
                        </svg>
                        <x-admin.dashboard.dashboard-card-information >
                            {{$products_low_quantity}}
                        </x-admin.dashboard.dashboard-card-information>
                    </div>
                </div>
            </x-list-items>
            <x-list-items>
                <div class="dashboard-card">
                    <p class="dashboard-card-title bold">
                        {{__('admin/dashboard.current_projects')}}
                    </p>
                    <div class="dashboard-card-icon-number">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M24.21 10.868C24.4074 9.02801 25.278 7.32598 26.6545 6.08917C28.031 4.85236 29.8161 4.1681 31.6667 4.16797H48.3333C50.1838 4.1681 51.969 4.85236 53.3455 6.08917C54.722 7.32598 55.5926 9.02801 55.79 10.868C58.3367 10.9213 60.5333 11.0513 62.4133 11.398C64.94 11.8646 67.09 12.7446 68.84 14.498C70.8467 16.5013 71.7067 19.0313 72.1133 22.0313C72.5 24.918 72.5 28.5946 72.5 33.1513V53.518C72.5 58.0746 72.5 61.7513 72.1133 64.6413C71.7067 67.6413 70.8467 70.168 68.84 72.1746C66.8333 74.1813 64.3067 75.0413 61.3067 75.448C58.4167 75.8346 54.74 75.8346 50.1833 75.8346H29.8167C25.26 75.8346 21.5833 75.8346 18.6933 75.448C15.6933 75.0413 13.1667 74.1813 11.16 72.1746C9.15333 70.168 8.29333 67.6413 7.89 64.6413C7.5 61.7513 7.5 58.0746 7.5 53.518V33.1513C7.5 28.5946 7.5 24.918 7.89 22.028C8.29 19.028 9.15667 16.5013 11.16 14.4946C12.91 12.7446 15.06 11.8613 17.5867 11.398C19.4667 11.0513 21.6667 10.9213 24.21 10.868ZM24.2167 15.868C21.8233 15.9213 19.9767 16.0413 18.49 16.3146C16.6033 16.6613 15.5067 17.2213 14.6967 18.0313C13.7733 18.9546 13.1733 20.248 12.8433 22.698C12.5067 25.2113 12.5 28.5513 12.5 33.3346V53.3346C12.5 58.118 12.5067 61.4546 12.8433 63.9746C13.1733 66.4213 13.7767 67.7146 14.6967 68.638C15.62 69.5613 16.9133 70.1613 19.3633 70.4913C21.8767 70.828 25.2167 70.8346 30 70.8346H50C54.7833 70.8346 58.12 70.828 60.64 70.4913C63.0867 70.1613 64.38 69.558 65.3033 68.638C66.2267 67.7146 66.8267 66.4213 67.1567 63.9713C67.4933 61.4546 67.5 58.118 67.5 53.3346V33.3346C67.5 28.5513 67.4933 25.2113 67.1567 22.6946C66.8267 20.248 66.2233 18.9546 65.3033 18.0313C64.49 17.2213 63.3967 16.6646 61.51 16.3146C60.0233 16.0413 58.1767 15.9213 55.7833 15.8713C55.5701 17.6975 54.6934 19.3817 53.32 20.604C51.9465 21.8263 50.1719 22.5015 48.3333 22.5013H31.6667C29.8276 22.5014 28.0526 21.8257 26.679 20.6027C25.3055 19.3798 24.4292 17.6947 24.2167 15.868ZM31.6667 9.16797C31.0036 9.16797 30.3677 9.43136 29.8989 9.9002C29.4301 10.369 29.1667 11.0049 29.1667 11.668V15.0013C29.1667 16.3813 30.2867 17.5013 31.6667 17.5013H48.3333C48.9964 17.5013 49.6323 17.2379 50.1011 16.7691C50.5699 16.3002 50.8333 15.6643 50.8333 15.0013V11.668C50.8333 11.0049 50.5699 10.369 50.1011 9.9002C49.6323 9.43136 48.9964 9.16797 48.3333 9.16797H31.6667ZM20.8333 35.0013C20.8333 34.3383 21.0967 33.7024 21.5656 33.2335C22.0344 32.7647 22.6703 32.5013 23.3333 32.5013H56.6667C57.3297 32.5013 57.9656 32.7647 58.4344 33.2335C58.9033 33.7024 59.1667 34.3383 59.1667 35.0013C59.1667 35.6643 58.9033 36.3002 58.4344 36.7691C57.9656 37.2379 57.3297 37.5013 56.6667 37.5013H23.3333C22.6703 37.5013 22.0344 37.2379 21.5656 36.7691C21.0967 36.3002 20.8333 35.6643 20.8333 35.0013ZM24.1667 46.668C24.1667 46.0049 24.4301 45.369 24.8989 44.9002C25.3677 44.4314 26.0036 44.168 26.6667 44.168H53.3333C53.9964 44.168 54.6323 44.4314 55.1011 44.9002C55.5699 45.369 55.8333 46.0049 55.8333 46.668C55.8333 47.331 55.5699 47.9669 55.1011 48.4357C54.6323 48.9046 53.9964 49.168 53.3333 49.168H26.6667C26.0036 49.168 25.3677 48.9046 24.8989 48.4357C24.4301 47.9669 24.1667 47.331 24.1667 46.668ZM27.5 58.3346C27.5 57.6716 27.7634 57.0357 28.2322 56.5669C28.7011 56.098 29.337 55.8346 30 55.8346H50C50.663 55.8346 51.2989 56.098 51.7678 56.5669C52.2366 57.0357 52.5 57.6716 52.5 58.3346C52.5 58.9977 52.2366 59.6336 51.7678 60.1024C51.2989 60.5712 50.663 60.8346 50 60.8346H30C29.337 60.8346 28.7011 60.5712 28.2322 60.1024C27.7634 59.6336 27.5 58.9977 27.5 58.3346Z" fill="#5A0201"/>
                        </svg>
                        <x-admin.dashboard.dashboard-card-information >
                            {{$open_projects}}
                        </x-admin.dashboard.dashboard-card-information>
                    </div>
                </div>
            </x-list-items>
            <x-list-items>
                <div class="dashboard-card">
                    <p class="dashboard-card-title bold">
                        {{__('admin/dashboard.available_products')}}
                    </p>
                    <div class="dashboard-card-icon-number">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80" fill="none">
                            <path d="M45.4701 70.5393C45.4701 75.3493 50.6801 78.3559 54.8468 75.9526C56.7801 74.8359 57.9734 72.7693 57.9734 70.5359C57.9734 65.7259 52.7634 62.7193 48.5968 65.1226C46.6634 66.2426 45.4701 68.3059 45.4701 70.5393ZM11.0901 70.5393C11.0901 75.3493 16.3001 78.3559 20.4668 75.9526C22.4001 74.8359 23.5934 72.7693 23.5934 70.5359C23.5934 65.7259 18.3834 62.7193 14.2168 65.1226C12.2834 66.2426 11.0901 68.3059 11.0901 70.5393ZM67.6434 57.1893C67.4751 58.7118 66.7505 60.1185 65.6088 61.1396C64.4671 62.1608 62.9885 62.7245 61.4568 62.7226H3.40676C2.6722 62.5716 2.01225 62.1718 1.53836 61.5906C1.06446 61.0094 0.805664 60.2825 0.805664 59.5326C0.805664 58.7827 1.06446 58.0558 1.53836 57.4746C2.01225 56.8934 2.6722 56.4936 3.40676 56.3426H58.7534C59.538 56.3494 60.2989 56.0736 60.8969 55.5656C61.4949 55.0576 61.89 54.3513 62.0101 53.5759L67.0568 8.87594C67.2258 7.35374 67.9506 5.94744 69.0921 4.92642C70.2337 3.9054 71.7119 3.34145 73.2434 3.3426H75.0334C75.519 3.20018 76.031 3.17286 76.529 3.2628C77.0269 3.35275 77.497 3.55748 77.9021 3.86078C78.3071 4.16407 78.6359 4.55757 78.8624 5.01006C79.0888 5.46256 79.2067 5.9616 79.2067 6.4676C79.2067 6.97361 79.0888 7.47265 78.8624 7.92514C78.6359 8.37764 78.3071 8.77114 77.9021 9.07443C77.497 9.37772 77.0269 9.58246 76.529 9.67241C76.031 9.76235 75.519 9.73503 75.0334 9.5926H73.8268C73.6356 9.59113 73.4506 9.65991 73.3068 9.78588C73.163 9.91185 73.0704 10.0862 73.0468 10.2759L67.6434 57.1893Z" fill="#5A0201"/>
                            <path d="M6.40019 39.2829H28.2802C28.2802 39.2829 31.4069 39.2829 31.4069 42.4096V48.6596C31.4069 48.6596 31.4069 51.7863 28.2802 51.7863H6.40352C6.40352 51.7863 3.27686 51.7863 3.27686 48.6596V42.4096C3.27686 42.4096 3.27686 39.2829 6.40352 39.2829M15.7802 25.2196H28.2802C28.2802 25.2196 31.4069 25.2196 31.4069 28.3429V31.4696C31.4069 31.4696 31.4069 34.5962 28.2802 34.5962H15.7802C15.7802 34.5962 12.6535 34.5963 12.6535 31.4696V28.3429C12.6535 28.3429 12.6535 25.2196 15.7802 25.2196ZM39.2202 17.4062H54.8469C54.8469 17.4062 57.9735 17.4062 57.9735 20.5296V48.6629C57.9735 48.6629 57.9735 51.7863 54.8469 51.7863H39.2202C39.2202 51.7863 36.0935 51.7863 36.0935 48.6596V20.5329C36.0935 20.5329 36.0935 17.4062 39.2202 17.4062Z" fill="#5A0201"/>
                        </svg>
                        <x-admin.dashboard.dashboard-card-information >
                            {{$products_in_stock}}
                        </x-admin.dashboard.dashboard-card-information>
                    </div>
                </div>
            </x-list-items>
        </ul>
    </section>

    <section class="recent-orders max-w-admin-web">
        <h2 class="admin-subtitle">
            {{__('admin/dashboard.five_last_orders')}}
        </h2>
        <table class="table max-w-admin-web">
            <thead>
            <tr>
                <x-admin.components.table.table-th scope="col" sortable wire:click="sortBy('user_id')" :direction="$sortField === 'user_id'? $sortDirection : null">
                    {{__('admin/orders.ordered_by')}}
                </x-admin.components.table.table-th>
                <x-admin.components.table.table-th scope="col" sortable wire:click="sortBy('order_items_count')" :direction="$sortField === 'order_items_count'? $sortDirection : null">        {{--order_items_count se fait automatiquement quand je fais un withcount    -> nom model_count --}}
                    {{__('admin/orders.product_quantity')}}
                </x-admin.components.table.table-th>
                <x-admin.components.table.table-th scope="col" sortable wire:click="sortBy('ordered_at')" :direction="$sortField === 'ordered_at'? $sortDirection : null">
                    {{__('admin/orders.ordered_at')}}
                </x-admin.components.table.table-th>
                <x-admin.components.table.table-th scope="col" sortable wire:click="sortBy('order_state')" :direction="$sortField === 'order_state'? $sortDirection : null">
                    {{__('admin/orders.state')}}
                </x-admin.components.table.table-th>
            </tr>
            </thead>
            <tbody>

                @foreach($five_latest_orders as $order)
                <tr class="table-row position-relative">
                    <x-admin.components.table.table-td class="table-full_name">
                        <span class="show-web">{{__('admin/orders.ordered_by')}}</span>
                        {{$order->user->first_name}} {{$order->user->last_name}}

                    </x-admin.components.table.table-td>
                    <x-admin.components.table.table-td class="table-name fw-medium">
                        <span
                            class="show-web">{{__('admin/orders.product_quantity')}}</span>
                        {{$order->orderItems()->count()}}

                    </x-admin.components.table.table-td>
                    <x-admin.components.table.table-td class="table-state">
                        <span class="show-web">{{__('admin/orders.ordered_at')}}</span>
                        {{$order->created_at->format('d/m/Y')}}
                    </x-admin.components.table.table-td>
                    <x-admin.components.table.table-td class="table-species">
                        <span class="show-web">{{__('admin/orders.state')}}</span>
                        {!! $order->order_state == 'completed'
                            ? __('admin/orders.completed')
                            : __('admin/orders.pending')
                        !!}
                        <a href="{{route('pages::orders.show',  ['locale' => __('general.currentLocale'),  'order' => $order->id])}}" title="{{__('admin/dashboard.go_to_order')}}" class="card-link">
                        </a>
                    </x-admin.components.table.table-td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>

 <section id="statistics">
        <h2 class="admin-subtitle">
            {{__('admin/dashboard.daily_statistics')}}
        </h2>
        <ul class="dashboard-lists m-t-24">
            <x-list-items>
                <div class="dashboard-card">
                    <p class="dashboard-card-title bold">
                        {{__('admin/dashboard.sent_orders')}}
                    </p>
                    <div class="dashboard-card-icon-number">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80" fill="none">
                            <path d="M27.5 67.5C28.8807 67.5 30 66.3807 30 65C30 63.6193 28.8807 62.5 27.5 62.5C26.1193 62.5 25 63.6193 25 65C25 66.3807 26.1193 67.5 27.5 67.5Z" stroke="#5A0201" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M62.5 67.5C63.8807 67.5 65 66.3807 65 65C65 63.6193 63.8807 62.5 62.5 62.5C61.1193 62.5 60 63.6193 60 65C60 66.3807 61.1193 67.5 62.5 67.5Z" stroke="#5A0201" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.5 12.5H17.5L25 55H65" stroke="#5A0201" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M25 45H63.975C64.2641 45.0002 64.5443 44.9002 64.7679 44.717C64.9916 44.5338 65.1448 44.2788 65.2016 43.9953L69.7016 21.4953C69.7379 21.3139 69.7335 21.1267 69.6886 20.9471C69.6438 20.7676 69.5597 20.6003 69.4423 20.4572C69.325 20.3142 69.1773 20.199 69.0101 20.1199C68.8428 20.0408 68.66 19.9999 68.475 20H20" stroke="#5A0201" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <x-admin.dashboard.dashboard-card-information >
                            {{$daily_orders ?? 0}}
                        </x-admin.dashboard.dashboard-card-information>
                    </div>
                </div>
            </x-list-items>

            <x-list-items>
                <div class="dashboard-card">
                    <p class="dashboard-card-title bold">
                        {{__('admin/dashboard.treated_orders')}}
                    </p>
                    <div class="dashboard-card-icon-number">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80" fill="none">
                            <path d="M27.5 67.5C28.8807 67.5 30 66.3807 30 65C30 63.6193 28.8807 62.5 27.5 62.5C26.1193 62.5 25 63.6193 25 65C25 66.3807 26.1193 67.5 27.5 67.5Z" stroke="#5A0201" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M62.5 67.5C63.8807 67.5 65 66.3807 65 65C65 63.6193 63.8807 62.5 62.5 62.5C61.1193 62.5 60 63.6193 60 65C60 66.3807 61.1193 67.5 62.5 67.5Z" stroke="#5A0201" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.5 12.5H17.5L25 55H65" stroke="#5A0201" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M25 45H63.975C64.2641 45.0002 64.5443 44.9002 64.7679 44.717C64.9916 44.5338 65.1448 44.2788 65.2016 43.9953L69.7016 21.4953C69.7379 21.3139 69.7335 21.1267 69.6886 20.9471C69.6438 20.7676 69.5597 20.6003 69.4423 20.4572C69.325 20.3142 69.1773 20.199 69.0101 20.1199C68.8428 20.0408 68.66 19.9999 68.475 20H20" stroke="#5A0201" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <x-admin.dashboard.dashboard-card-information >
                            {{$completed_orders ?? 0}}
                        </x-admin.dashboard.dashboard-card-information>
                    </div>
                </div>
            </x-list-items>
            <x-list-items>
                <div class="dashboard-card">
                    <p class="dashboard-card-title bold">
                        {{__('admin/dashboard.created_projects')}}
                    </p>
                    <div class="dashboard-card-icon-number">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M24.21 10.868C24.4074 9.02801 25.278 7.32598 26.6545 6.08917C28.031 4.85236 29.8161 4.1681 31.6667 4.16797H48.3333C50.1838 4.1681 51.969 4.85236 53.3455 6.08917C54.722 7.32598 55.5926 9.02801 55.79 10.868C58.3367 10.9213 60.5333 11.0513 62.4133 11.398C64.94 11.8646 67.09 12.7446 68.84 14.498C70.8467 16.5013 71.7067 19.0313 72.1133 22.0313C72.5 24.918 72.5 28.5946 72.5 33.1513V53.518C72.5 58.0746 72.5 61.7513 72.1133 64.6413C71.7067 67.6413 70.8467 70.168 68.84 72.1746C66.8333 74.1813 64.3067 75.0413 61.3067 75.448C58.4167 75.8346 54.74 75.8346 50.1833 75.8346H29.8167C25.26 75.8346 21.5833 75.8346 18.6933 75.448C15.6933 75.0413 13.1667 74.1813 11.16 72.1746C9.15333 70.168 8.29333 67.6413 7.89 64.6413C7.5 61.7513 7.5 58.0746 7.5 53.518V33.1513C7.5 28.5946 7.5 24.918 7.89 22.028C8.29 19.028 9.15667 16.5013 11.16 14.4946C12.91 12.7446 15.06 11.8613 17.5867 11.398C19.4667 11.0513 21.6667 10.9213 24.21 10.868ZM24.2167 15.868C21.8233 15.9213 19.9767 16.0413 18.49 16.3146C16.6033 16.6613 15.5067 17.2213 14.6967 18.0313C13.7733 18.9546 13.1733 20.248 12.8433 22.698C12.5067 25.2113 12.5 28.5513 12.5 33.3346V53.3346C12.5 58.118 12.5067 61.4546 12.8433 63.9746C13.1733 66.4213 13.7767 67.7146 14.6967 68.638C15.62 69.5613 16.9133 70.1613 19.3633 70.4913C21.8767 70.828 25.2167 70.8346 30 70.8346H50C54.7833 70.8346 58.12 70.828 60.64 70.4913C63.0867 70.1613 64.38 69.558 65.3033 68.638C66.2267 67.7146 66.8267 66.4213 67.1567 63.9713C67.4933 61.4546 67.5 58.118 67.5 53.3346V33.3346C67.5 28.5513 67.4933 25.2113 67.1567 22.6946C66.8267 20.248 66.2233 18.9546 65.3033 18.0313C64.49 17.2213 63.3967 16.6646 61.51 16.3146C60.0233 16.0413 58.1767 15.9213 55.7833 15.8713C55.5701 17.6975 54.6934 19.3817 53.32 20.604C51.9465 21.8263 50.1719 22.5015 48.3333 22.5013H31.6667C29.8276 22.5014 28.0526 21.8257 26.679 20.6027C25.3055 19.3798 24.4292 17.6947 24.2167 15.868ZM31.6667 9.16797C31.0036 9.16797 30.3677 9.43136 29.8989 9.9002C29.4301 10.369 29.1667 11.0049 29.1667 11.668V15.0013C29.1667 16.3813 30.2867 17.5013 31.6667 17.5013H48.3333C48.9964 17.5013 49.6323 17.2379 50.1011 16.7691C50.5699 16.3002 50.8333 15.6643 50.8333 15.0013V11.668C50.8333 11.0049 50.5699 10.369 50.1011 9.9002C49.6323 9.43136 48.9964 9.16797 48.3333 9.16797H31.6667ZM20.8333 35.0013C20.8333 34.3383 21.0967 33.7024 21.5656 33.2335C22.0344 32.7647 22.6703 32.5013 23.3333 32.5013H56.6667C57.3297 32.5013 57.9656 32.7647 58.4344 33.2335C58.9033 33.7024 59.1667 34.3383 59.1667 35.0013C59.1667 35.6643 58.9033 36.3002 58.4344 36.7691C57.9656 37.2379 57.3297 37.5013 56.6667 37.5013H23.3333C22.6703 37.5013 22.0344 37.2379 21.5656 36.7691C21.0967 36.3002 20.8333 35.6643 20.8333 35.0013ZM24.1667 46.668C24.1667 46.0049 24.4301 45.369 24.8989 44.9002C25.3677 44.4314 26.0036 44.168 26.6667 44.168H53.3333C53.9964 44.168 54.6323 44.4314 55.1011 44.9002C55.5699 45.369 55.8333 46.0049 55.8333 46.668C55.8333 47.331 55.5699 47.9669 55.1011 48.4357C54.6323 48.9046 53.9964 49.168 53.3333 49.168H26.6667C26.0036 49.168 25.3677 48.9046 24.8989 48.4357C24.4301 47.9669 24.1667 47.331 24.1667 46.668ZM27.5 58.3346C27.5 57.6716 27.7634 57.0357 28.2322 56.5669C28.7011 56.098 29.337 55.8346 30 55.8346H50C50.663 55.8346 51.2989 56.098 51.7678 56.5669C52.2366 57.0357 52.5 57.6716 52.5 58.3346C52.5 58.9977 52.2366 59.6336 51.7678 60.1024C51.2989 60.5712 50.663 60.8346 50 60.8346H30C29.337 60.8346 28.7011 60.5712 28.2322 60.1024C27.7634 59.6336 27.5 58.9977 27.5 58.3346Z" fill="#5A0201"/>
                        </svg>
                        <x-admin.dashboard.dashboard-card-information >
                            {{$today_projects ?? 0}}
                        </x-admin.dashboard.dashboard-card-information>
                    </div>
                </div>
            </x-list-items>
            <x-list-items>
                <div class="dashboard-card">
                    <p class="dashboard-card-title bold">
                        {{__('admin/dashboard.created_products')}}
                    </p>
                    <div class="dashboard-card-icon-number">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80" fill="none">
                            <path d="M39.0402 46.6675L19.2235 44.3608C18.0502 44.2364 17.298 43.6142 16.9669 42.4942C16.6358 41.3742 16.9058 40.4275 17.7769 39.6542L50.3869 10.3875C50.5358 10.2364 50.708 10.1242 50.9035 10.0508C51.0991 9.97528 51.3813 9.9375 51.7502 9.9375C52.3502 9.9375 52.8235 10.1964 53.1702 10.7142C53.5169 11.2319 53.5202 11.7764 53.1802 12.3475L40.7702 33.3975L60.7135 35.7042C61.8869 35.8286 62.6502 36.4397 63.0035 37.5375C63.3569 38.6353 63.0969 39.5719 62.2235 40.3475L29.6135 69.6808C29.4646 69.8297 29.2924 69.9308 29.0969 69.9842C28.9013 70.0375 28.6191 70.0642 28.2502 70.0642C27.6502 70.0642 27.198 69.8064 26.8935 69.2908C26.5891 68.7753 26.5858 68.2519 26.8835 67.7208L39.0402 46.6675ZM35.0402 60.0575L58.9702 38.8275L35.3969 36.1875L45.0702 19.8342L21.0302 41.1308L44.5202 43.9442L35.0402 60.0575Z" fill="#5A0201"/>
                        </svg>
                        <x-admin.dashboard.dashboard-card-information >
                            {{$today_products ?? 0}}
                        </x-admin.dashboard.dashboard-card-information>
                    </div>
                </div>
            </x-list-items>
        </ul>
    </section>

</div>
</main>

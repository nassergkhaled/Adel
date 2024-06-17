<script src="//unpkg.com/alpinejs" defer></script>
@php
    $role = auth()->user()->role;
    $sideBar = [
        'dashboard' => 1,
        'calendar' => 1,
        'legalCases' => 1,
        'chating' => 1,
        'clients' => 1,
        'billings' => 1,
    ];
    switch ($role) {
        case 'Client':
            $sideBar = [
                'dashboard' => 1,
                'calendar' => 0,
                'legalCases' => 1,
                'chating' => 1,
                'clients' => 0,
                'billings' => 0,
            ];
            break;
        case 'Lawyer':
            $sideBar = [
                'dashboard' => 1,
                'calendar' => 1,
                'legalCases' => 1,
                'chating' => 1,
                'clients' => 1,
                'billings' => 1,
            ];
            break;
        case 'Manager':
            $sideBar = [
                'dashboard' => 1,
                'calendar' => 0,
                'legalCases' => 1,
                'chating' => 0,
                'clients' => 1,
                'billings' => 1,
            ];
            break;

        default:
            break;
    }

@endphp
<div class="flex flex-col h-screen bg-white justify-between shadow-md">
    <div>
        <ul class="  text-[#9F9E9E] font-bold text-sm font-Almarai space-y-4">


            @if ($sideBar['dashboard'])
                <div class="">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                        class="p-[0.60rem] flex items-center  {{ request()->routeIs('dashboard') ? 'text-yourActiveColor' : 'text-gray-400' }}">
                        <svg width="22" height="22" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="inline-block mr-5 fill-current">
                            <path
                                d="M6 14H4V7H6V14ZM10 14H8V4H10V14ZM14 14H12V10H14V14ZM16 16H2V2H16V16.1M16 0H2C0.9 0 0 0.9 0 2V16C0 17.1 0.9 18 2 18H16C17.1 18 18 17.1 18 16V2C18 0.9 17.1 0 16 0Z" />
                        </svg>
                        <span class="ms-3">الرئيسـية</span>
                    </x-nav-link>
                </div>
            @endif


            @if ($sideBar['calendar'])
                <div class="">
                    <x-nav-link :href="route('calendar')" :active="request()->routeIs('calendar')"
                        class="p-[0.60rem] flex items-center {{ request()->routeIs('calendar.index') ? 'text-yourActiveColor' : 'text-gray-400' }}">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="inline-block mr-5 fill-current">
                            <path
                                d="M7 0V2H13V0H15V2H19C19.5523 2 20 2.44772 20 3V19C20 19.5523 19.5523 20 19 20H1C0.44772 20 0 19.5523 0 19V3C0 2.44772 0.44772 2 1 2H5V0H7ZM18 10H2V18H18V10ZM9 12V16H4V12H9ZM5 4H2V8H18V4H15V6H13V4H7V6H5V4Z" />
                        </svg>
                        <span class="ms-4" class="">التقويم</span>
                    </x-nav-link>
                </div>
            @endif


            @if ($sideBar['legalCases'])
                <div class="">
                    <x-nav-link :href="route('legalCases.index')" :active="request()->routeIs('legalCases.index')"
                        class="p-[0.60rem] flex items-center  {{ request()->routeIs('legalCases.index') ? 'text-yourActiveColor' : 'text-gray-400' }}">
                        <svg width="22" height="20" viewBox="0 0 22 19" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="inline-block mr-5 fill-current">
                            <path
                                d="M11.9985 0L11.9979 1.278L16.9985 2.94591L20.631 1.73509L21.2634 3.63246L18.2319 4.643L21.3272 13.1549C20.2353 14.2921 18.6996 15 16.9985 15C15.2975 15 13.7618 14.2921 12.6699 13.1549L15.7639 4.643L11.9979 3.387V17H15.9985V19H5.99854V17H9.9979V3.387L6.23192 4.643L9.3272 13.1549C8.23528 14.2921 6.69957 15 4.99854 15C3.2975 15 1.76179 14.2921 0.669922 13.1549L3.76392 4.643L0.733632 3.63246L1.36608 1.73509L4.99854 2.94591L9.9979 1.278L9.9985 0H11.9985ZM16.9985 7.10267L15.5809 11H18.4159L16.9985 7.10267ZM4.99854 7.10267L3.58092 11H6.41592L4.99854 7.10267Z" />
                        </svg>
                        <span class="ms-4">القضايا</span>
                    </x-nav-link>
                </div>
            @endif


            @if ($sideBar['chating'])
                <div class="" {{ $sideBar['chating'] ? '' : 'hidden' }}>
                    <x-nav-link :href="route('chating.index')" :active="request()->routeIs('chating.index')"
                        class="p-[0.60rem] flex items-center {{ request()->routeIs('chating.index') ? 'text-yourActiveColor' : 'text-gray-400' }}">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="inline-block mr-5 fill-current">
                            <path
                                d="M6 9C6.28333 9 6.52083 8.90417 6.7125 8.7125C6.90417 8.52083 7 8.28333 7 8C7 7.71667 6.90417 7.47917 6.7125 7.2875C6.52083 7.09583 6.28333 7 6 7C5.71667 7 5.47917 7.09583 5.2875 7.2875C5.09583 7.47917 5 7.71667 5 8C5 8.28333 5.09583 8.52083 5.2875 8.7125C5.47917 8.90417 5.71667 9 6 9ZM10 9C10.2833 9 10.5208 8.90417 10.7125 8.7125C10.9042 8.52083 11 8.28333 11 8C11 7.71667 10.9042 7.47917 10.7125 7.2875C10.5208 7.09583 10.2833 7 10 7C9.71667 7 9.47917 7.09583 9.2875 7.2875C9.09583 7.47917 9 7.71667 9 8C9 8.28333 9.09583 8.52083 9.2875 8.7125C9.47917 8.90417 9.71667 9 10 9ZM14 9C14.2833 9 14.5208 8.90417 14.7125 8.7125C14.9042 8.52083 15 8.28333 15 8C15 7.71667 14.9042 7.47917 14.7125 7.2875C14.5208 7.09583 14.2833 7 14 7C13.7167 7 13.4792 7.09583 13.2875 7.2875C13.0958 7.47917 13 7.71667 13 8C13 8.28333 13.0958 8.52083 13.2875 8.7125C13.4792 8.90417 13.7167 9 14 9ZM0 20V2C0 1.45 0.195833 0.979167 0.5875 0.5875C0.979167 0.195833 1.45 0 2 0H18C18.55 0 19.0208 0.195833 19.4125 0.5875C19.8042 0.979167 20 1.45 20 2V14C20 14.55 19.8042 15.0208 19.4125 15.4125C19.0208 15.8042 18.55 16 18 16H4L0 20ZM3.15 14H18V2H2V15.125L3.15 14Z" />
                        </svg>
                        <span class="ms-4">الدردشة</span>
                    </x-nav-link>
                </div>
            @endif


            @if ($sideBar['clients'])
                <div>
                    <x-nav-link :href="route('clients.index')" :active="request()->routeIs('clients.index')"
                        class="px-3 py-2 flex items-center {{ request()->routeIs('clients.index') ? 'text-yourActiveColor' : 'text-gray-400' }}">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                            class="inline-block mr-4 fill-current" xmlns="http://www.w3.org/2000/svg">
                            <mask id="mask0_397_845" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0"
                                width="24" height="24">
                                <rect width="24" height="24" fill="#D9D9D9" />
                            </mask>
                            <g mask="url(#mask0_397_845)">
                                <path
                                    d="M1 20V17.2C1 16.6333 1.14583 16.1125 1.4375 15.6375C1.72917 15.1625 2.11667 14.8 2.6 14.55C3.63333 14.0333 4.68333 13.6458 5.75 13.3875C6.81667 13.1292 7.9 13 9 13C10.1 13 11.1833 13.1292 12.25 13.3875C13.3167 13.6458 14.3667 14.0333 15.4 14.55C15.8833 14.8 16.2708 15.1625 16.5625 15.6375C16.8542 16.1125 17 16.6333 17 17.2V20H1ZM19 20V17C19 16.2667 18.7958 15.5625 18.3875 14.8875C17.9792 14.2125 17.4 13.6333 16.65 13.15C17.5 13.25 18.3 13.4208 19.05 13.6625C19.8 13.9042 20.5 14.2 21.15 14.55C21.75 14.8833 22.2083 15.2542 22.525 15.6625C22.8417 16.0708 23 16.5167 23 17V20H19ZM9 12C7.9 12 6.95833 11.6083 6.175 10.825C5.39167 10.0417 5 9.1 5 8C5 6.9 5.39167 5.95833 6.175 5.175C6.95833 4.39167 7.9 4 9 4C10.1 4 11.0417 4.39167 11.825 5.175C12.6083 5.95833 13 6.9 13 8C13 9.1 12.6083 10.0417 11.825 10.825C11.0417 11.6083 10.1 12 9 12ZM19 8C19 9.1 18.6083 10.0417 17.825 10.825C17.0417 11.6083 16.1 12 15 12C14.8167 12 14.5833 11.9792 14.3 11.9375C14.0167 11.8958 13.7833 11.85 13.6 11.8C14.05 11.2667 14.3958 10.675 14.6375 10.025C14.8792 9.375 15 8.7 15 8C15 7.3 14.8792 6.625 14.6375 5.975C14.3958 5.325 14.05 4.73333 13.6 4.2C13.8333 4.11667 14.0667 4.0625 14.3 4.0375C14.5333 4.0125 14.7667 4 15 4C16.1 4 17.0417 4.39167 17.825 5.175C18.6083 5.95833 19 6.9 19 8ZM3 18H15V17.2C15 17.0167 14.9542 16.85 14.8625 16.7C14.7708 16.55 14.65 16.4333 14.5 16.35C13.6 15.9 12.6917 15.5625 11.775 15.3375C10.8583 15.1125 9.93333 15 9 15C8.06667 15 7.14167 15.1125 6.225 15.3375C5.30833 15.5625 4.4 15.9 3.5 16.35C3.35 16.4333 3.22917 16.55 3.1375 16.7C3.04583 16.85 3 17.0167 3 17.2V18ZM9 10C9.55 10 10.0208 9.80417 10.4125 9.4125C10.8042 9.02083 11 8.55 11 8C11 7.45 10.8042 6.97917 10.4125 6.5875C10.0208 6.19583 9.55 6 9 6C8.45 6 7.97917 6.19583 7.5875 6.5875C7.19583 6.97917 7 7.45 7 8C7 8.55 7.19583 9.02083 7.5875 9.4125C7.97917 9.80417 8.45 10 9 10Z" />
                            </g>
                        </svg>
                        <span class="ms-3">الموكلين</span>
                    </x-nav-link>
                </div>
            @endif

            {{-- ADD SUBMENU HERE --}}
            @if ($sideBar['billings'])
                <x-nav-link :href="route('billings.index',['Tab'=>'invoices'])" :active="request()->routeIs('billings.index')"
                    class="px-3 py-3 flex items-center {{ request()->routeIs('billings.index') ? 'text-yourActiveColor' : 'text-gray-400' }}">

                    <svg width="18" height="18" class="inline-block mr-3.5 fill-current"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500" fill="none">
                        <path
                            d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM64 80c0-8.8 7.2-16 16-16h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16zm0 64c0-8.8 7.2-16 16-16h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16zm128 72c8.8 0 16 7.2 16 16v17.3c8.5 1.2 16.7 3.1 24.1 5.1c8.5 2.3 13.6 11 11.3 19.6s-11 13.6-19.6 11.3c-11.1-3-22-5.2-32.1-5.3c-8.4-.1-17.4 1.8-23.6 5.5c-5.7 3.4-8.1 7.3-8.1 12.8c0 3.7 1.3 6.5 7.3 10.1c6.9 4.1 16.6 7.1 29.2 10.9l.5 .1 0 0 0 0c11.3 3.4 25.3 7.6 36.3 14.6c12.1 7.6 22.4 19.7 22.7 38.2c.3 19.3-9.6 33.3-22.9 41.6c-7.7 4.8-16.4 7.6-25.1 9.1V440c0 8.8-7.2 16-16 16s-16-7.2-16-16V422.2c-11.2-2.1-21.7-5.7-30.9-8.9l0 0 0 0c-2.1-.7-4.2-1.4-6.2-2.1c-8.4-2.8-12.9-11.9-10.1-20.2s11.9-12.9 20.2-10.1c2.5 .8 4.8 1.6 7.1 2.4l0 0 0 0 0 0c13.6 4.6 24.6 8.4 36.3 8.7c9.1 .3 17.9-1.7 23.7-5.3c5.1-3.2 7.9-7.3 7.8-14c-.1-4.6-1.8-7.8-7.7-11.6c-6.8-4.3-16.5-7.4-29-11.2l-1.6-.5 0 0c-11-3.3-24.3-7.3-34.8-13.7c-12-7.2-22.6-18.9-22.7-37.3c-.1-19.4 10.8-32.8 23.8-40.5c7.5-4.4 15.8-7.2 24.1-8.7V232c0-8.8 7.2-16 16-16z" />
                    </svg>

                    <span class="ms-3">الإجراءات المالية</span>
                </x-nav-link>
            @endif

            {{-- End of work area for the AI --}}

            <div class="">
                <x-nav-link :href="route('profile')" :active="request()->routeIs('profile')"
                    class="p-[0.60rem] flex items-center {{ request()->routeIs('profile') ? 'text-yourActiveColor' : 'text-gray-400' }}">

                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                        class="inline-block mr-5 fill-current" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0.999756 15C0.999756 13.9391 1.42118 12.9217 2.17133 12.1716C2.92147 11.4214 3.93889 11 4.99976 11H12.9998C14.0606 11 15.078 11.4214 15.8282 12.1716C16.5783 12.9217 16.9998 13.9391 16.9998 15C16.9998 15.5304 16.789 16.0391 16.414 16.4142C16.0389 16.7893 15.5302 17 14.9998 17H2.99976C2.46932 17 1.96062 16.7893 1.58554 16.4142C1.21047 16.0391 0.999756 15.5304 0.999756 15Z"
                            style="stroke: {{ request()->routeIs('profile') ? config('app.activeColor', '#BF9874') : '#9F9E9E' }}; stroke-width: 2; stroke-linejoin: round;" />
                        <path
                            d="M8.99976 7C10.6566 7 11.9998 5.65685 11.9998 4C11.9998 2.34315 10.6566 1 8.99976 1C7.3429 1 5.99976 2.34315 5.99976 4C5.99976 5.65685 7.3429 7 8.99976 7Z"
                            style="stroke: {{ request()->routeIs('profile') ? config('app.activeColor', '#BF9874') : '#9F9E9E' }}; stroke-width: 2;" />
                    </svg>
                    <span class="ms-4">الملف الشخصي</span>
                </x-nav-link>
            </div>



    </div>

    <x-nav-link :href="route('home')" :active="request()->routeIs('home')" class="p-[0.60rem] flex items-center">

        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="inline-block mr-5"
            xmlns="http://www.w3.org/2000/svg">
            <mask id="mask0_397_856" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24"
                height="24">
                <rect width="24" height="24" fill="#D9D9D9" />
            </mask>
            <g mask="url(#mask0_397_856)">
                <path
                    d="M5 21C4.45 21 3.97917 20.8042 3.5875 20.4125C3.19583 20.0208 3 19.55 3 19V5C3 4.45 3.19583 3.97917 3.5875 3.5875C3.97917 3.19583 4.45 3 5 3H12V5H5V19H12V21H5ZM16 17L14.625 15.55L17.175 13H9V11H17.175L14.625 8.45L16 7L21 12L16 17Z"
                    fill="#9F9E9E" />
            </g>
        </svg>
        <span class="ms-4 font-bold">تسجيل الخروج</span>
    </x-nav-link>
</div>

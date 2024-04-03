<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <div class="flex items-center">
                            <div class="flex items-center">
                                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'%3E%3ClinearGradient id='a' gradientUnits='userSpaceOnUse' x1='-57.703' y1='108.736' x2='391.891' y2='550.837'%3E%3Cstop offset='0' style='stop-color:%23fef050'/%3E%3Cstop offset='.035' style='stop-color:%23fae73d'/%3E%3Cstop offset='.093' style='stop-color:%23f5db22'/%3E%3Cstop offset='.154' style='stop-color:%23f2d20f'/%3E%3Cstop offset='.215' style='stop-color:%23f0cd04'/%3E%3Cstop offset='.281' style='stop-color:%23efcb00'/%3E%3Cstop offset='.668' style='stop-color:%23d99544'/%3E%3Cstop offset='.888' style='stop-color:%23cd6f3c'/%3E%3Cstop offset='1' style='stop-color:%23c34435'/%3E%3C/linearGradient%3E%3Cpath style='fill:url(%23a)' d='M205.078 280.968v-16.731a2.5 2.5 0 0 0-2.5-2.5H25.204a2.5 2.5 0 0 0-2.5 2.5v16.731c0 14.209 11.56 25.769 25.769 25.769h130.836c14.209-.001 25.769-11.56 25.769-25.769zm-177.374 0v-14.231h172.375v14.231c0 11.452-9.317 20.769-20.769 20.769H48.473c-11.452-.001-20.769-9.317-20.769-20.769z'/%3E%3ClinearGradient id='b' gradientUnits='userSpaceOnUse' x1='-33.459' y1='84.082' x2='416.135' y2='526.182'%3E%3Cstop offset='0' style='stop-color:%23fef050'/%3E%3Cstop offset='.035' style='stop-color:%23fae73d'/%3E%3Cstop offset='.093' style='stop-color:%23f5db22'/%3E%3Cstop offset='.154' style='stop-color:%23f2d20f'/%3E%3Cstop offset='.215' style='stop-color:%23f0cd04'/%3E%3Cstop offset='.281' style='stop-color:%23efcb00'/%3E%3Cstop offset='.668' style='stop-color:%23d99544'/%3E%3Cstop offset='.888' style='stop-color:%23cd6f3c'/%3E%3Cstop offset='1' style='stop-color:%23c34435'/%3E%3C/linearGradient%3E%3Cpath style='fill:url(%23b)' d='m102.939 155.138-10.108 18.376a2.5 2.5 0 0 0 4.381 2.411l10.108-18.376a7.5 7.5 0 0 1 13.142 0l48.413 88.015c.965 1.755 1.189 3.781.631 5.705s-1.833 3.515-3.588 4.48a7.511 7.511 0 0 1-3.605.931 7.509 7.509 0 0 1-6.581-3.888l-39.65-72.085a2.5 2.5 0 0 0-4.38 0l-39.65 72.085c-1.994 3.624-6.564 4.95-10.187 2.957-1.755-.966-3.029-2.557-3.588-4.48s-.334-3.95.631-5.705l21.555-39.187a2.5 2.5 0 0 0-4.381-2.411l-21.555 39.187a12.418 12.418 0 0 0-1.052 9.509 12.42 12.42 0 0 0 5.98 7.468c6.039 3.32 13.654 1.109 16.977-4.928l37.46-68.103 37.46 68.103a12.51 12.51 0 0 0 10.961 6.478c2.092 0 4.173-.536 6.015-1.55a12.41 12.41 0 0 0 5.98-7.468 12.414 12.414 0 0 0-1.052-9.509l-48.413-88.015a12.5 12.5 0 0 0-21.904 0z'/%3E%3ClinearGradient id='c' gradientUnits='userSpaceOnUse' x1='82.018' y1='-33.353' x2='531.612' y2='408.748'%3E%3Cstop offset='0' style='stop-color:%23fef050'/%3E%3Cstop offset='.035' style='stop-color:%23fae73d'/%3E%3Cstop offset='.093' style='stop-color:%23f5db22'/%3E%3Cstop offset='.154' style='stop-color:%23f2d20f'/%3E%3Cstop offset='.215' style='stop-color:%23f0cd04'/%3E%3Cstop offset='.281' style='stop-color:%23efcb00'/%3E%3Cstop offset='.668' style='stop-color:%23d99544'/%3E%3Cstop offset='.888' style='stop-color:%23cd6f3c'/%3E%3Cstop offset='1' style='stop-color:%23c34435'/%3E%3C/linearGradient%3E%3Cpath style='fill:url(%23c)' d='M486.796 261.736H309.422a2.5 2.5 0 0 0-2.5 2.5v16.731c0 14.209 11.56 25.769 25.769 25.769h70.572a2.5 2.5 0 1 0 0-5h-70.572c-11.452 0-20.769-9.316-20.769-20.769v-14.231h172.375v14.231c0 11.452-9.317 20.769-20.769 20.769H442.07a2.5 2.5 0 1 0 0 5h21.457c14.209 0 25.769-11.56 25.769-25.769v-16.731a2.5 2.5 0 0 0-2.5-2.5z'/%3E%3ClinearGradient id='d' gradientUnits='userSpaceOnUse' x1='106.262' y1='-58.007' x2='555.855' y2='384.094'%3E%3Cstop offset='0' style='stop-color:%23fef050'/%3E%3Cstop offset='.035' style='stop-color:%23fae73d'/%3E%3Cstop offset='.093' style='stop-color:%23f5db22'/%3E%3Cstop offset='.154' style='stop-color:%23f2d20f'/%3E%3Cstop offset='.215' style='stop-color:%23f0cd04'/%3E%3Cstop offset='.281' style='stop-color:%23efcb00'/%3E%3Cstop offset='.668' style='stop-color:%23d99544'/%3E%3Cstop offset='.888' style='stop-color:%23cd6f3c'/%3E%3Cstop offset='1' style='stop-color:%23c34435'/%3E%3C/linearGradient%3E%3Cpath style='fill:url(%23d)' d='m387.157 155.138-48.413 88.015a12.418 12.418 0 0 0-1.052 9.509 12.42 12.42 0 0 0 5.98 7.468 12.44 12.44 0 0 0 6.007 1.554c1.17 0 2.347-.166 3.501-.502a12.422 12.422 0 0 0 7.469-5.979l37.46-68.103 37.46 68.103a12.51 12.51 0 0 0 10.961 6.478c2.092 0 4.173-.536 6.015-1.55a12.41 12.41 0 0 0 5.98-7.468 12.414 12.414 0 0 0-1.052-9.509l-48.413-88.015a12.5 12.5 0 0 0-21.903-.001zm10.952-1.476a7.499 7.499 0 0 1 6.571 3.886l48.413 88.015c.965 1.755 1.189 3.781.631 5.705s-1.833 3.515-3.588 4.48a7.511 7.511 0 0 1-3.605.931 7.509 7.509 0 0 1-6.581-3.888l-39.65-72.085a2.5 2.5 0 0 0-4.38 0l-39.65 72.085a7.449 7.449 0 0 1-4.481 3.588 7.456 7.456 0 0 1-5.706-.631c-1.755-.966-3.029-2.557-3.588-4.48s-.334-3.95.631-5.705l48.413-88.015a7.496 7.496 0 0 1 6.57-3.886z'/%3E%3ClinearGradient id='e' gradientUnits='userSpaceOnUse' x1='24.284' y1='25.36' x2='473.878' y2='467.461'%3E%3Cstop offset='0' style='stop-color:%23fef050'/%3E%3Cstop offset='.035' style='stop-color:%23fae73d'/%3E%3Cstop offset='.093' style='stop-color:%23f5db22'/%3E%3Cstop offset='.154' style='stop-color:%23f2d20f'/%3E%3Cstop offset='.215' style='stop-color:%23f0cd04'/%3E%3Cstop offset='.281' style='stop-color:%23efcb00'/%3E%3Cstop offset='.668' style='stop-color:%23d99544'/%3E%3Cstop offset='.888' style='stop-color:%23cd6f3c'/%3E%3Cstop offset='1' style='stop-color:%23c34435'/%3E%3C/linearGradient%3E%3Cpath style='fill:url(%23e)' d='M420.928 135.256c0-17.421-14.173-31.594-31.593-31.594h-24.822a2.5 2.5 0 1 0 0 5h24.822c14.664 0 26.593 11.93 26.593 26.594 0 4.635-3.771 8.406-8.406 8.406H104.479c-4.635 0-8.406-3.771-8.406-8.406 0-14.664 11.93-26.594 26.593-26.594h101.41l.007.001.009-.001h63.818l.009.001.007-.001h32.105a2.5 2.5 0 1 0 0-5h-28.348a37.654 37.654 0 0 0 2.279-12.961c0-20.932-17.029-37.961-37.961-37.961a37.707 37.707 0 0 0-15.456 3.279 2.5 2.5 0 0 0 2.037 4.567A32.707 32.707 0 0 1 256 57.74c18.175 0 32.961 14.786 32.961 32.961 0 4.515-.897 8.866-2.655 12.961h-60.612a32.636 32.636 0 0 1-2.655-12.961c0-3.289.482-6.535 1.434-9.647a2.498 2.498 0 0 0-1.66-3.121 2.502 2.502 0 0 0-3.122 1.66 37.934 37.934 0 0 0-1.652 11.108c0 4.481.771 8.824 2.28 12.961h-97.653c-17.42 0-31.593 14.173-31.593 31.594 0 7.393 6.014 13.406 13.406 13.406H233.5v259.856h-18.786c-8.173 0-14.822 6.649-14.822 14.822v5.178h-25.178c-8.173 0-14.822 6.649-14.822 14.822v7.678a2.5 2.5 0 0 0 2.5 2.5h187.216a2.5 2.5 0 0 0 2.5-2.5v-7.678c0-8.173-6.649-14.822-14.822-14.822h-25.178v-5.178c0-8.173-6.649-14.822-14.822-14.822H278.5V236.504a2.5 2.5 0 1 0-5 0v172.015h-35V148.662h35v38.322a2.5 2.5 0 1 0 5 0v-38.322h129.022c7.392 0 13.406-6.014 13.406-13.406zm-83.642 298.263c5.416 0 9.822 4.406 9.822 9.822v5.178H164.892v-5.178c0-5.416 4.406-9.822 9.822-9.822h162.572zm-40-20c5.416 0 9.822 4.406 9.822 9.822v5.178H204.892v-5.178c0-5.416 4.406-9.822 9.822-9.822h82.572z'/%3E%3C/svg%3E"
                                    alt="Logo" class="h-12 w-10 mr-2">
                                <span class="mx-3 text-xl font-semibold text-gray-800 dark:text-white">عــادل</span>
                            </div>

                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                        {{ __('Profile') }}
                    </x-nav-link>
                </div>

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->first_name . " " . Auth::user()->last_name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->first_name . " " . Auth::user()->last_name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

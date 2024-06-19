<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <link rel="icon" href="{{ asset('images\Group.png') }}" type="image/x-icon">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title'){{ config('app.name', 'عادل') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/a9938c3b92.js" crossorigin="anonymous"></script>

    {{-- firebase --}}
    <script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-database.js"></script>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="bg-adel-bg font-Almarai" x-data="{ darkMode: false }" :class="{ 'dark': darkMode === true }" class="antialiased">

    @include('layouts.navbar')
    <div class="flex">
        <div class="w-[15%] max-md:w-[30%]">
            @include('layouts.sidebar')
        </div>
        <div class="w-[85%]">
            <main>
                <div class="mt-2">
                    @if (session()->has('msg'))
                        <div class="w-[85%] flex justify-center">
                            <div role="alert" id="alert_message"
                                class="alert alert-success w-[20%] mx-auto text-center shadow-lg transition ease-in-out duration-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ __(session()->get('msg')) }}</span>
                            </div>
                        </div>
                    @elseif (session()->has('ValError'))
                        <div class="w-[85%] flex justify-center">
                            <div role="alert" id="alert_message"
                                class="alert alert-warning w-[20%] mx-auto text-center shadow-lg transition ease-in-out duration-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                <span>{{ __(session()->get('ValError')) }}</span>
                            </div>
                        </div>
                    @elseif (session()->has('errMsg'))
                        <div class="w-[85%] flex justify-center">
                            <div role="alert" id="alert_message"
                                class="alert alert-error w-[20%] mx-auto text-center shadow-lg transition ease-in-out duration-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ __(session()->get('errMsg')) }}</span>
                            </div>
                        </div>
                    @endif
                </div>
                {{ $slot }}
            </main>
        </div>
    </div>
    @livewireScripts
    <script>
        window.onload = function() {
            setTimeout(function() {
                var alertElement = document.getElementById('alert_message');
                if (alertElement) {
                    alertElement.style.opacity = '0';
                    // alertElement.style.height = '0';
                    // alertElement.style.padding = '0';
                    setTimeout(function() {
                        alertElement.style.display =
                            'none';
                    }, 500);
                }
            }, 4000);
        }
    </script>
</body>

</html>

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

<body class="bg-adel-bg font-Almarai" x-data="{ darkMode: false }" :class="{ 'dark': darkMode === true }"
    class="antialiased">
    <div class="flex">
        <div class="w-[15%]">
            <x-sidebar />
        </div>
        <div class="flex flex-col w-[85%]">
            <x-navbar />
            <div class="pt-20 ms-0 min-h-[100vh] h-full">
                <main>
                    <x-controller-alert-messages :session="session()" />
                    {{ $slot }}
                </main>
            </div>
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

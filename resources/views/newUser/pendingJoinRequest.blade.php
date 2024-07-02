<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center bg-white dark:bg-gray-100">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 border-2 border-dashed border-adel-Dark rounded-lg bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="mb-6 mt-2 px-5 text-[0.9rem] text-black dark:text-black">
                {{ __('Your application has been sent to the office manager, please wait until your application is accepted or rejected.') }}
            </div>


            <div class="mt-4 flex items-center justify-between">
                <form method="POST" action="{{ route('cancelMembershipRequest') }}">
                    @csrf

                    <div>
                        <x-primary-button >
                            {{ __('Cancel membership request') }}
                        </x-primary-button>
                    </div>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="underline text-sm text-text-black dark:text-adel-Dark hover:text-adel-Dark-hover dark:hover:text-adel-Dark-hover rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
        <div class="h-20"></div>
    </div>
</body>

</html>

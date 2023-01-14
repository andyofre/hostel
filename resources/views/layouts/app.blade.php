<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('vendors/images/custom/favicon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('vendors/images/custom/favicon.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('vendors/images/custom/favicon.png') }}">

        {{-- <title>{{ config('app.name', 'Unical') }}</title> --}}

        <title>Unical | Hostel</title>
        <link rel="stylesheet" href="{{ asset('build/assets/app.6d236b71.css') }}">

        <link rel="stylesheet" href="{{ asset('build/assets/app.33b8f855.js') }}">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>

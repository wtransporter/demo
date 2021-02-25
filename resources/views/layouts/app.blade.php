<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        {{-- <link rel="preconnect" href="https://fonts.gstatic.com"> --}}
        {{-- <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,700;1,400;1,600&display=swap" rel="stylesheet"> --}}
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans">
        {{-- <x-jet-banner /> --}}

        <div class="flex flex-col min-h-screen bg-gray-200">
            @auth
                @livewire('navigation-menu')    
            @endauth

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="flex-grow">
                {{ $slot }}
            </main>

            <div class="h-32 bg-white flex justify-center p-4 sm:items-center sm:justify-center">
                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                    © Recepti 2021. Built with Laravel, Tailwind CSS and Livewire.
                </div>
            </div>
        </div>

        @stack('modals')

        @livewireScripts
    <script>
        // Livewire.on('userDeleted',() => {
        //     alert('A user was deleted');
        // })
    </script>
    </body>
</html>

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
        <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <style>
            html {
                scroll-behavior: smooth;
            }
        </style>
    </head>
    <body class="font-sans">
        {{-- <x-jet-banner /> --}}

        <div class="flex flex-col min-h-screen bg-gray-100">
            @auth
                @livewire('navigation-menu')    
            @endauth

            {{-- @include('main-nav') --}}

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow text-center">
                    <div class="max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
            
            <!-- Page showcase -->
            @isset($showcase)
                {{ $showcase }}
            @endisset

            <!-- Page Content -->
            <main class="flex-grow">
                {{ $slot }}
            </main>

            <x-newsletter />

            <x-footer />
        </div>

        @stack('modals')

        @livewireScripts

        @stack('scripts')
        <script>
            window.onscroll = function()
            {
                var top = document.getElementById('to-top');
                if(pageYOffset >= 600) {
                    top.classList.remove("hidden");
                    top.classList.add("flex");
                } else {
                    top.classList.add("hidden");
                    top.classList.remove("flex");
                }
            };
        </script>
    </body>
</html>

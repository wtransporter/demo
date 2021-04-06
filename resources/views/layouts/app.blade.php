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

            <header  id="top" class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8">
                    <div class="flex flex-col md:flex-row sm:justify-start md:justify-between">
                        <div class="flex justify-center md:justify-start items-center order-1 md:order-none">
                            <a href="{{ route('posts.index') }}">
                                <img class="h-12 w-auto text-gray-700 sm:h-16" src="{{ asset('images/logo.png') }}" alt="Logo">
                            </a>
                            <span class="ml-4 text-4xl font-semibold text-gray-800">{{ config('app.name', 'Laravel') }}</span>
                        </div>
                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-jet-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('post.index')">
                                {{ __('Naslovna') }}
                            </x-jet-nav-link>
                            <div class="hidden sm:flex sm:items-center sm:ml-6">
                                <x-jet-dropdown align="right" width="60">
                                    <x-slot name="trigger">
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                                Recepti
                                            </button>
                                        </span>
                                    </x-slot>
                                    <x-slot name="content">
                                    @foreach ($categories as $category)
                                        <x-jet-dropdown-link class="w-48 hover:border-b-2" href="{{ route('category.post.index', $category) }}">
                                            {{ __($category->name) }}
                                        </x-jet-dropdown-link>
                                    @endforeach
                                    </x-slot>
                                </x-jet-dropdown>
                            </div>
                        </div>
                        @if (Route::has('login') && !Auth::check())
                            <div class="flex justify-end items-center px-6 py-4">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div> 
                </div>
            </header>
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
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

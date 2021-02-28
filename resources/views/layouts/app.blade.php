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
        <link rel="stylesheet" href="css/all.min.css">
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

            <x-section-image />

            <!-- Page Content -->
            <main class="flex-grow">
                {{ $slot }}
            </main>

            <x-section-image />

            <div class="flex bg-gray-900 pb-20">
                <div class="px-5 grid grid-cols-10 container mx-auto max-w-7xl text-white">
                    <div class="pt-20 px-4 text-sm col-span-4">
                        <img class="mb-5 h-12" src="images/logo-light.png" alt="Logo">
                        <p class="mb-5 leading-7">
                            I provide new recipes with a twist on daily basis. I also post blog posts about fun ideas to do in the kitchen
                        </p>
                        <ul class="flex text-white" style="font-size: 18px">
                            <li class="mr-4"><a class="flex items-center align-middle bg-gray-800 w-10 h-10 rounded-full hover:cursor-pointer" href="#"><i class="mx-auto fab fa-facebook-f"></i></a> </li>
                            <li class="mr-4"><a class="flex items-center align-middle bg-gray-800 w-10 h-10 rounded-full hover:cursor-pointer" href="#"><i class="mx-auto fab fa-linkedin-in"></i></a> </li>
                            <li class="mr-4"><a class="flex items-center align-middle bg-gray-800 w-10 h-10 rounded-full hover:cursor-pointer" href="#"><i class="mx-auto fab fa-twitter"></i></a> </li>
                            <li class="mr-4"><a class="flex items-center align-middle bg-gray-800 w-10 h-10 rounded-full hover:cursor-pointer" href="#"><i class="mx-auto fab fa-twitter"></i></a> </li>
                        </ul>
                    </div>
                    <div class="ml-24 pt-20 px-4 col-span-3 col-start-5">
                        <h1 class="mb-6 text-xl font-semibold">Recepti</h1>
                        <ul class="leading-8">
                            <li>Breakfast</li>
                            <li>Desserts</li>
                            <li>Dinner</li>
                            <li>Dairy</li>
                        </ul>
                    </div>
                    <div class="ml-24 pt-20 px-4 col-span-3">
                        <h1 class="mb-6 text-xl font-semibold">Politika privatnosti</h1>
                        <ul class="leading-8">
                            <li>Breakfast</li>
                            <li>Desserts</li>
                            <li>Dinner</li>
                            <li>Dairy</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="py-6 bg-gray-900 border-t border-gray-800 text-white">
                <div class="container mx-auto max-w-6xl text-center">
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

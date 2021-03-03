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

        <div class="flex flex-col min-h-screen bg-gray-100">
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

            <x-categories-card />
            
            <div class="bg-section">
                <div class="container mx-auto max-w-7xl px-0 sm:px-6 lg:px-8 my-20">
                    <h1 class="text-center font-bold text-3xl mb-10">Nasumičan izbor</h1>
                    <div  class="grid grid-cols-3 gap-3 px-4 lg:px-6">
                        <?php $categories = \App\Models\Category::select('id')->get() ?>
                        @foreach ($categories as $category)
                            @foreach (\App\Models\Post::where('category_id', $category->id)->inRandomOrder()->take(1)->get() as $randomPost)
                                <livewire:single-post :singlePost="$randomPost" :key="$randomPost->id"/>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Page Content -->
            <main class="flex-grow">
                {{ $slot }}
            </main>

            <x-newsletter />

            <x-footer />
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

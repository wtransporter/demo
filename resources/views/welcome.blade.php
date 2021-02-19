<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-center items-center pt-8 sm:justify-start sm:pt-0">
            <img class="h-12 w-auto text-gray-700 sm:h-16" src="images/logo.png" alt="Logo">
            <span class="ml-4 text-4xl font-semibold text-gray-800">Najbolji recepti</span>
        </div>
    </x-slot>


    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
            <div class="relative flex items-top justify-center bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
                @if (Route::has('login') && !Auth::check())
                    <div class="fixed top-0 right-0 px-6 py-4 sm:block">
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

                <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                    <livewire:posts />
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
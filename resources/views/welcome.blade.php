<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row sm:justify-start md:justify-between">
            <div class="flex justify-center md:justify-start items-center order-1 md:order-none">
                <a href="{{ route('post.index') }}">
                    <img class="h-12 w-auto text-gray-700 sm:h-16" src="images/logo.png" alt="Logo">
                </a>
                <span class="ml-4 text-4xl font-semibold text-gray-800">Najbolji recepti</span>
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
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
            <div class="flex items-top justify-center dark:bg-gray-900 sm:items-center sm:pt-0">
                <div class="max-w-7xl mx-auto px-4 lg:px-6 w-full">
                    <livewire:posts />
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
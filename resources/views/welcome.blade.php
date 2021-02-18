<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot> --}}


    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
            <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
                @if (Route::has('login') && !Auth::check())
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
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
                    <div class="flex justify-center items-end pt-8 sm:justify-start sm:pt-0">
                        <img class="h-16 w-auto text-gray-700 sm:h-20" src="images/logo.png" alt="Logo">
                        <span class="ml-4 text-4xl font-semibold text-gray-800">Najbolji recepti</span>
                    </div>

                    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3">
                            <div class="p-6 block lg:flex xl:block">
                                <div class="flex items-center">
                                    <img class="object-cover bg-center h-32 w-full rounded" src="images/potatoe.jpeg" alt="Image">
                                </div>

                                <div class="ml-5 xl:ml-1">
                                    <div class="text-lg leading-7 font-semibold"><a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-white">Documentation</a></div>
                                    <div>
                                        <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">Kolači</span>
                                    </div>
                                    <div class="text-gray-600 dark:text-gray-400 text-sm">
                                        Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.
                                    </div>
                                </div>
                            </div>

                            <div class="p-6 block lg:flex xl:block border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                                <div class="flex items-center">
                                    <img class="object-cover h-32 w-full rounded" src="images/potatoe.jpeg" alt="Image">
                                </div>

                                <div class="ml-5 xl:ml-1">
                                    <div class="text-lg leading-7 font-semibold"><a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-white">Documentation</a></div>
                                    <div>
                                        <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">Kolači</span>
                                    </div>
                                    <div class="text-gray-600 dark:text-gray-400 text-sm">
                                        Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.
                                    </div>
                                </div>
                            </div>

                            <div class="p-6 block lg:flex xl:block border-t border-gray-200 dark:border-gray-700 xl:border-t-0 md:border-l-0 xl:border-l">
                                <div class="flex items-center">
                                    <img class="object-cover h-32 w-full rounded" src="images/potatoe.jpeg" alt="Image">
                                </div>

                                <div class="ml-5 xl:ml-1">
                                    <div class="text-lg leading-7 font-semibold"><a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-white">Documentation</a></div>
                                    <div>
                                        <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">Kolači</span>
                                    </div>
                                    <div class="text-gray-600 dark:text-gray-400 text-sm">
                                        Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.
                                    </div>
                                </div>
                            </div>

                            <div class="p-6 block lg:flex xl:block border-t border-gray-200 dark:border-gray-700 md:border-t-1 md:border-l xl:border-l-0">
                                <div class="flex items-center">
                                    <img class="object-cover h-32 w-full rounded" src="images/potatoe.jpeg" alt="Image">
                                </div>

                                <div class="ml-5 xl:ml-1">
                                    <div class="text-lg leading-7 font-semibold"><a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-white">Documentation</a></div>
                                    <div>
                                        <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">Kolači</span>
                                    </div>
                                    <div class="text-gray-600 dark:text-gray-400 text-sm">
                                        Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.
                                    </div>
                                </div>
                            </div>

                            <div class="p-6 block lg:flex xl:block border-t border-gray-200 xl:border-l dark:border-gray-700">
                                <div class="flex items-center">
                                    <img class="object-cover h-32 w-full rounded" src="images/potatoe.jpeg" alt="Image">
                                </div>

                                <div class="ml-5 xl:ml-1">
                                    <div class="text-lg leading-7 font-semibold"><a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-white">Documentation</a></div>
                                    <div>
                                        <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">Kolači</span>
                                    </div>
                                    <div class="text-gray-600 dark:text-gray-400 text-sm">
                                        Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.
                                    </div>
                                </div>
                            </div>

                            <div class="p-6 block lg:flex xl:block border-t border-gray-200 dark:border-gray-700 md:border-l">
                                <div class="flex items-center">
                                    <img class="object-cover h-32 w-full rounded" src="images/potatoe.jpeg" alt="Image">
                                </div>

                                <div class="ml-5 xl:ml-1">
                                    <div class="text-lg leading-7 font-semibold"><a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-white">Documentation</a></div>
                                    <div>
                                        <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">Kolači</span>
                                    </div>
                                    <div class="text-gray-600 dark:text-gray-400 text-sm">
                                        Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-center mt-4 sm:items-center sm:justify-center">
                        <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                            © Recepti 2021. Built with Laravel, Tailwind CSS and Livewire.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
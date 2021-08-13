<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Categories') }}
        </h2>
    </x-slot>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
            <div class="mx-auto">
                @if (session()->has('message'))
                    <x-alert type="green" :message="session('message')" />
                @endif
            </div>
            <div class="flex flex-col">
                <div>
                    <div class="w-36 float-right flex justify-end">
                        <a href="{{ route('posts.create') }}">
                        <x-jet-secondary-button class="bg-green-700 hover:bg-green-500 active:bg-green-700">
                            <span class="text-white hover:text-white">
                                {{ __('Create') }}
                            </span>
                        </x-jet-secondary-button>
                        </a>
                    </div>
                </div>
                @foreach ($ingredients as $ingredient)
                    <p class="py-2">
                        {{ $ingredient->description }}
                    </p>
                @endforeach
            </div>
        </div>
    </div>
</x-admin>
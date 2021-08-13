<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Recipe') }}
        </h2>
    </x-slot>
    <div class="max-w-5xl mx-auto p-4 lg:px-6 w-full text-gray-600">
        <header class="flex justify-end w-full items-center space-x-2 px-4">
            <a href="" class="cursor-pointer text-primary hover:text-blue-500">{{ __('Steps') }}</a>
            <a href="{{ route('posts.ingredients.index', $modelId) }}" class="cursor-pointer text-primary hover:text-blue-500">{{ __('Ingredients') }}</a>
        </header>
        @livewire('create-post', ['modelId' => $modelId])
    </div>
</x-admin>
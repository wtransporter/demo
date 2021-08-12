<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Recipe') }}
        </h2>
    </x-slot>
    <div class="max-w-5xl mx-auto p-4 lg:px-6 w-full text-gray-600">
        <livewire:create-post />
    </div>
</x-admin>
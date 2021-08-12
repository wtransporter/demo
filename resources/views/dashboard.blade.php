<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
            <livewire:admin.posts-show>
        </div>
    </div>


</x-admin>

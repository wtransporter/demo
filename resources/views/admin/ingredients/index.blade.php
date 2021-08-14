<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Ingredients') }}
        </h2>
    </x-slot>


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
            <div  class="w-full bg-white text-gray-600 text-sm px-4 rounded mt-4">
                @foreach ($ingredients as $ingredient)
                <div class="flex items-center">
                    <span class="w-8"># {{ $loop->iteration }}</span>
                    <form action="{{ route('posts.ingredients.update',[$ingredient->post->id, $ingredient->id]) }}" method="POST" class="w-full p-1">
                        @csrf
                        @method('PATCH')
                        <input id="description{{ $ingredient->id }}" class=" font-semibold px-2 py-1 w-full outline-none focus:ring-2 focus:ring-blue-400 rounded" name="description" value="{{ $ingredient->description }}" />
                    </form>
                    <a href="#" x-data="{}" @click.prevent="document.querySelector('#form-delete{{ $ingredient->id }}').submit();" class="cursor-pointer text-red-700 hover:text-red-500 active:text-red-700 p-1
                            focus:outline-none focus:ring-2 focus:ring-red-700 rounded-full">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                            </path>
                        </svg>
                    </a>
                    <form id="form-delete{{ $ingredient->id }}" action="{{ route('posts.ingredients.destroy',[$ingredient->post->id, $ingredient->id]) }}" method="POST" class="hidden" hidden>
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-admin>
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
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-admin>
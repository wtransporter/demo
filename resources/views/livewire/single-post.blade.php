<div class="p-6 border block lg:flex xl:block rounded">
    <div class="flex items-center w-full lg:w-1/3 xl:w-full">
        <img class="object-cover bg-center h-32 w-full border rounded p-1" src="images/{{ $singlePost->image }}" alt="Image">
    </div>

    <div class="lg:ml-4 xl:ml-1  w-full lg:w-2/3 xl:w-full">
        <div class="text-lg leading-7 font-semibold flex justify-between items-center">
            <a href="" wire:click.prevent="show({{ $singlePost->id }})" class="hover:underline text-gray-900 dark:text-white">
                {{ $singlePost->title }}
            </a>
            @auth
            <a wire:click.prevent="delete" class="text-red-700 hover:text-red-500 active:text-red-700 p-1
                    focus:outline-none focus:ring-2 focus:ring-red-700 rounded-full" href="#">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                    </path>
                </svg>
            </a>
            @endauth
        </div>
        <div>
            <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                {{ $singlePost->category->name }}
            </span>
        </div>
        <div class="text-gray-600 dark:text-gray-400 text-sm mt-1">
            {!! $singlePost->description !!}
        </div>
        <div class="flex flex-row justify-between">
            <a class="text-blue-700 inline-flex items-center
                hover:text-blue-500" href="#"
                wire:click.prevent="show({{ $singlePost->id }})">
                Prikaži
                <svg wire:loading.class="hidden" class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                    <path d="M12 5l7 7-7 7"></path>
                </svg>
                <div wire:loading wire:target="show({{ $singlePost->id }})">
                    <x-loading class="ml-2" />
                </div>
            </a>
            <span class="text-gray-600 inline-flex items-center text-sm">
                <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                </svg>
                {{ $singlePost->visits }}
            </span>
        </div>
    </div>
</div>
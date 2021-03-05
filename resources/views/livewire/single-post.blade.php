<div class="flex bg-white group group-link-underline cursor-pointer
        border-r-2 border-b-2 border-gray-100 hover:border-red-600 rounded-lg">
    <div class="relative flex">
        <a class="flex flex-col" wire:click="show({{ $singlePost->id }})
            href="{{ route('posts.show', $singlePost->id) }}" >
        <div class="flex items-center justify-center w-full p-2">
            <div class="rounded-lg overflow-hidden">
                <img class="object-cover bg-center h-32 lg:h-64 w-full transition ease-in-out duration-500 transform hover:scale-110" src="{{ $singlePost->thumb() }}" alt="Image">
            </div>
        </div>

        <div class="w-full px-4 pt-2">
            <div class="flex flex-row justify-between pb-2">
                <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-red-600">
                    {{ $singlePost->category->name }}
                </span>
                <div class="absolute top-0 bottom-0 left-0 right-0 bg-gray-700 bg-opacity-50 rounded-lg" wire:loading wire:target="show({{ $singlePost->id }})">
                    <div class="relative flex items-center justify-center mx-auto h-full">
                        <x-loading />
                    </div>
                </div>
                <div>
                    <span class="text-gray-600 inline-flex items-center text-sm">
                        <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                        {{ $singlePost->visits }}
                    </span>
                    @auth
                    <button wire:click.stop="delete" class="text-red-700 hover:text-red-500 active:text-red-700 p-1
                            focus:outline-none focus:ring-2 focus:ring-red-700 rounded-full">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                            </path>
                        </svg>
                    </button>
                    @endauth
                </div>
            </div>
            <div class="text-lg leading-7 font-semibold flex justify-between items-center">
                <span class="border-b-2 border-white 
                link-underline link-underline-black text-black">
                    {{ $singlePost->title }}
                </span>
            </div>
            <div class="text-gray-600 dark:text-gray-400 text-sm my-1">
                {!! $singlePost->description !!}
            </div>
        </div>
        </a>
    </div>
</div>
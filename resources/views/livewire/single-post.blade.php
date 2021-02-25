<div class="bg-white
        border-r-2 border-b-2 border-gray-200 hover:border-red-600  block md:flex md:flex-col justify-between rounded">
    <div>
        <div class="flex items-center w-full">
            <a href="" wire:click.prevent="show({{ $singlePost->id }})" class="">
                <img class="object-cover bg-center h-32 lg:h-64 w-full" src="{{ url('storage/images'). '/'. $singlePost->image }}" alt="Image">
            </a>
        </div>

        <div class="w-full px-4 pt-2">
            <div>
                <div class="flex flex-row justify-between pb-2">
                    <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                        {{ $singlePost->category->name }}
                    </span>
                    <div wire:loading wire:target="show({{ $singlePost->id }})">
                        <x-loading class="ml-2" />
                    </div>
                    <span class="text-gray-600 inline-flex items-center text-sm">
                        <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                        {{ $singlePost->visits }}
                    </span>
                </div>
                <div class="text-lg leading-7 font-semibold flex justify-between items-center">
                    <a href="" wire:click.prevent="show({{ $singlePost->id }})" class="text-gray-900 dark:text-white">
                        <span class="border-b-2 border-white hover:border-red-600">
                            {{ $singlePost->title }}
                        </span>
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
                <div class="text-gray-600 dark:text-gray-400 text-sm my-1">
                    {!! $singlePost->description !!}
                </div>
            </div>
        </div>
    </div>
</div>
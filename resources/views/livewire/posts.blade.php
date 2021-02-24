<div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    @if (!$showPost)
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-1 p-2">
            @foreach ($posts as $post)
                <div class="p-6 border block lg:flex xl:block rounded">
                    <div class="flex items-center w-full lg:w-1/3 xl:w-full">
                        <img class="object-cover bg-center h-32 w-full border rounded p-1" src="images/{{ $post->image }}" alt="Image">
                    </div>

                    <div class="lg:ml-4 xl:ml-1  w-full lg:w-2/3 xl:w-full">
                        <div class="text-lg leading-7 font-semibold">
                            <a href="" wire:click.prevent="show({{ $post->id }})" class="hover:underline text-gray-900 dark:text-white">
                                {{ $post->title }}
                            </a>
                        </div>
                        <div>
                            <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                                {{ $post->category->name }}
                            </span>
                        </div>
                        <div class="text-gray-600 dark:text-gray-400 text-sm mt-1">
                            {!! $post->description !!}
                        </div>
                        <div class="flex flex-row justify-between">
                            <a class="text-blue-700 inline-flex items-center
                                hover:text-blue-500" href="#"
                                wire:click.prevent="show({{ $post->id }})">
                                Prikaži
                                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14"></path>
                                    <path d="M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                            <span class="text-gray-600 inline-flex items-center text-sm">
                                <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                                1.2K
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="p-4">
            {{ $posts->onEachSide(3)->links() }}
        </div>
        @auth
            <div class="p-4 text-gray-600">
                <form action="" class="mt-4">
                    <div class="">
                        <label class="block" for="title">Naslov</label>
                        <input wire:model="title" class="w-full bg-gray-100" type="text" name="title" id="title" placeholder="Naslov">
                    </div>
                    <div class="mt-2">
                        <label class="block" for="description">Opis</label>
                        <textarea wire:model="description" class="w-full bg-gray-100" name="description" id="description" rows="2" placeholder="Opis"></textarea>
                    </div>
                    <div class="mt-2">
                        <label class="block" for="body">Tekst</label>
                        <textarea wire:model="body" class="w-full bg-gray-100" name="body" id="body" rows="6" placeholder="Tekst"></textarea>
                    </div>
                    <div class="mt-2">
                        <label class="block" for="category_id">Kategorija</label>
                        <select wire:model="category_id" class="w-1/3" name="category_id" id="category_id">
                            <option value="0">---</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2">
                        <button wire:click.prevent="save" class="btn bg-primary text-white hover:bg-blue-700 font-semibold">Snimi</button>
                    </div>
                </form>
            </div>
        @endauth
    @else
        @include('posts.show', $post)
    @endif
</div>
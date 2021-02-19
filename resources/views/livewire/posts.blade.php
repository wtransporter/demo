<div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    @if (!$showPost)
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-1 p-2">
            @foreach ($posts as $post)
                <div class="p-6 border block lg:flex xl:block rounded">
                    <div class="flex items-center w-full lg:w-1/3 xl:w-full">
                        <img class="object-cover bg-center h-32 w-full border rounded p-1" src="images/{{ $post->image }}" alt="Image">
                    </div>

                    <div class="ml-5 xl:ml-1  w-full lg:w-2/3 xl:w-full">
                        <div class="text-lg leading-7 font-semibold"><a href="" wire:click.prevent="show({{ $post->id }})" class="hover:underline text-gray-900 dark:text-white">{{ $post->title }}</a></div>
                        <div>
                            <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">{{ $post->category->name }}</span>
                        </div>
                        <div class="text-gray-600 dark:text-gray-400 text-sm">
                            {!! $post->description !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="p-4">
            {{ $posts->onEachSide(3)->links() }}
        </div>
    @else
        @include('posts.show', $post)
    @endif
</div>
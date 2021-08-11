<x-app-layout>
    <x-slot name="showcase">
        <x-section-image>
            Ukusna hrana započinje ovde
        </x-section-image>

        <x-categories-card />
        
        <div class="bg-section">
            <div class="container mx-auto max-w-7xl px-0 sm:px-6 lg:px-8 py-20">
                <h1 class="text-center font-bold text-5xl mb-10 text-gray-800">Featured recipes</h1>
                <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 bg-white p-4 rounded-xl">
                    <div class="flex-1 w-full">
                        <img src="{{ asset('storage/images/' . $featuredPosts[0]->id . '/' . $featuredPosts[0]->image) }}"
                            class="rounded-xl max-h-96 w-full object-cover" alt="{{ $featuredPosts[0]->title }}">
                    </div>
                    <div class="flex-1 flex flex-col">
                        <header>
                            <h3 class="text-4xl font-semibold text-gray-800">{{ $featuredPosts[0]->title }}</h3>
                            <span class="text-xs text-gray-600">Published {{ $featuredPosts[0]->created_at->diffForHumans() }}</span>
                        </header>
                        <p class="mt-4 text-gray-600">
                            {!! $featuredPosts[0]->description !!}
                        </p>
                        <x-primary-button href="{{ route('posts.show', $featuredPosts[0]->id) }}" icon="angle-right" class="w-32 mt-4">
                            Read more
                        </x-primary-button>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 mt-4">
                    @foreach ($featuredPosts->skip(1) as $post)
                            @livewire('single-post', ['singlePost' => $post], key($post->id))
                    @endforeach
                </div>
            </div>
        </div>
    </x-slot>

    <div>
        <div id="posts">
            <div class="flex items-top justify-center dark:bg-gray-900 sm:items-center sm:pt-0">
                <div class="max-w-7xl mx-auto px-4 lg:px-6 w-full">
                    <livewire:posts />
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
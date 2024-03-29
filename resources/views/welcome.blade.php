<x-app-layout>
    <x-slot name="showcase">
        <x-section-image path="images/showcase/doughnut.jpg">
            Ukusna hrana započinje ovde
        </x-section-image>

        <x-categories-card :categories="$categories" />
        
        <div class="bg-section">
            @if (count($featuredPosts) > 0)
                <div class="container mx-auto max-w-7xl px-0 sm:px-6 lg:px-8 py-20">
                    <h1 class="text-center font-bold text-5xl mb-10 text-gray-800">Featured recipes</h1>
                    <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 bg-white p-4 rounded-xl">
                        <x-post-image :post="$featuredPosts[0]" />
                        <div class="flex-1 flex flex-col">
                            <header>
                                <h3 class="text-4xl font-semibold text-gray-800">{{ $featuredPosts[0]->title }}</h3>
                                <div class="flex items-center justify-bottom space-x-2 mt-2">
                                    <span class="text-gray-600 inline-flex items-center text-xs">
                                        <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                        {{ $featuredPosts[0]->visits }}
                                    </span>
                                    <span class="text-xs text-gray-600">Published {{ $featuredPosts[0]->created_at->diffForHumans() }}</span>
                                </div>
                            </header>
                            <p class="mt-4 text-gray-600">
                                {!! $featuredPosts[0]->description !!}
                            </p>
                            @livewire('add-visit', ['post' => $featuredPosts[0]], key($featuredPosts[0]->id))
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-4">
                        @foreach ($featuredPosts->skip(1) as $post)
                                @livewire('single-post', ['singlePost' => $post], key($post->id))
                        @endforeach
                    </div>
                </div>
            @else
                <x-alert type="blue" message="{{ __('There is no recipes yet. Check back later.') }}"
                    class="mx-auto text-center my-4" />
            @endif
        </div>
    </x-slot>
    <x-section-image path="images/showcase/food.jpg">
        Isprobajte najbolje recepte
    </x-section-image>
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
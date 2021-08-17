<x-app-layout>
    <x-section-image path="images/showcase/doughnut.jpg">        
        {{ $categoryName }}
    </x-section-image>

    <div class="flex items-top justify-center dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="max-w-7xl mx-auto px-4 lg:px-6 w-full">
            <div class="mt-8 dark:bg-gray-800 overflow-hidden">
                <div class="flex flex-row md:flex-col">
                    <div class="md:order-2">
                        @if(count($posts) > 0)
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 pb-2">
                                @foreach ($posts as $post)
                                    <livewire:single-post :singlePost="$post" :key="$post->id"/>
                                @endforeach
                            </div>
                            @unless($posts->onEachSide(3)->links()->currentPage <= $posts->onEachSide(3)->links()->lastPage)
                                <div class="p-4 bg-white">
                                    {{ $posts->onEachSide(3)->links() }}
                                </div>
                            @endunless
                        @else
                            <x-alert type="blue" message="No recipes in this category yet." class="max-w-full text-center"/>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
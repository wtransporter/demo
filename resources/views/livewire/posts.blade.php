<div class="mt-8 dark:bg-gray-800 overflow-hidden">
    <div class="flex flex-row md:flex-col">
        <div class="md:order-2">
            @if (!$showPost)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 pb-2">
                    @foreach ($posts as $post)
                        <livewire:single-post :singlePost="$post" :key="$post->id"/>
                    @endforeach
                </div>
                <div class="p-4 bg-white">
                    {{ $posts->onEachSide(3)->links() }}
                </div>
                @auth
                    <livewire:create-post />
                @endauth
            @else
                @include('posts.show')
            @endif
        </div>

        <div class="hidden md:order-1 w-full p-2">
            <div>
                <h1 class="text-center font-bold text-2xl">Najpopularnije</h1>
                <div  class="grid grid-cols-3">
                    @foreach ($popularPosts as $featuredPost)
                        <x-feature-post :featuredPost="$featuredPost"/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
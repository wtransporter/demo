<div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    @if (!$showPost)
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-1 p-2">
            @foreach ($posts as $post)
                <livewire:single-post :singlePost="$post" :key="$post->id"/>
            @endforeach
        </div>
        <div class="p-4">
            {{ $posts->onEachSide(3)->links() }}
        </div>
        @auth
            <livewire:create-post />
        @endauth
    @else
        @include('posts.show')
    @endif
</div>
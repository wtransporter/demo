<div class="mt-8 dark:bg-gray-800 overflow-hidden">
    <div class="flex flex-row md:flex-col">
        @if (count($posts) > 0)
            <div class="md:order-2">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 pb-2">
                    @foreach ($posts as $post)
                        <livewire:single-post :singlePost="$post" :key="$post->id"/>
                    @endforeach
                </div>
                <div class="p-4 bg-white">
                    {{ $posts->onEachSide(3)->links() }}
                </div>
            </div>
        @else
            <x-alert type="blue" message="{{ __('There is no recipes yet. Check back later.') }}" 
                class="max-w-full text-center"/>
        @endif
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('toTop', () => { 
            document.getElementById("posts").scrollIntoView();
        })
    </script>    
@endpush
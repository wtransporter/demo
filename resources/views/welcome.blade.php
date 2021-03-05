<x-app-layout>
    <x-slot name="showcase">
        <x-section-image />

        <x-categories-card />
        
        <div class="bg-section">
            <div class="container mx-auto max-w-7xl px-0 sm:px-6 lg:px-8 py-20">
                <h1 class="text-center font-bold text-3xl mb-10">Nasumičan izbor</h1>
                <div  class="grid grid-cols-3 gap-3 px-4 lg:px-6">
                    <?php $categories = \App\Models\Category::select('id')->get() ?>
                    @foreach ($categories as $category)
                        @foreach (\App\Models\Post::where('category_id', $category->id)->inRandomOrder()->take(1)->get() as $randomPost)
                            <livewire:single-post :singlePost="$randomPost" :key="$randomPost->id"/>
                        @endforeach
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
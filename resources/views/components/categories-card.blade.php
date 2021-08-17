@props(['categories'])

<div class="container max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 my-10 px-4">
        @foreach ($categories as $category)
            <div class="group flex flex-col items-center justify-between h-40 rounded bg-section w-full p-4">
                <div class="flex flex-col items-center justify-between h-full w-full rounded transition ease-in-out duration-500 group-hover:bg-blue-600 cursor-pointer p-4">
                    <span class="text-primary group-hover:text-white transition duration-500 ease-in-out"><p class="{{ $category->icon->body }} fa-3x"></p></span>
                    <h2 class="font-semibold text-gray-700 group-hover:text-white transition ease-in-out duration-500">
                        {{ $category->name }}
                    </h2>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="p-2 flex">
    <div class="flex items-center w-32">
        <img class="object-cover bg-center w-32 h-full border rounded p-1" src="{{ url('storage/images') .'/'. $featuredPost->image }}" alt="Image">
    </div>

    <div class="lg:ml-4 xl:ml-1">
        <div class="font-semibold text-sm flex justify-between items-center">
            <a href="" class="text-gray-900 dark:text-white">
                <span class="border-b-2 border-white hover:border-red-600">
                    {{ $featuredPost->title }}
                </span>
            </a>
        </div>
        <div>
            <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-semibold leading-none text-red-100 bg-red-600 rounded-full">
                {{ $featuredPost->category->name }}
            </span>
        </div>
    </div>
</div>
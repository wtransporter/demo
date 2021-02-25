<div class="w-full text-gray-600">
    <button class="m-4 px-2 py-1 bg-gray-500 hover:bg-gray-400 transition ease-in duration-100 rounded focus:outline-none" wire:click="back">Nazad</button>
    <div class="min-w-full">
        <div class="p-4 float-left">
            <img class="h-56 w-full object-cover bg-center md:h-56 
                md:w-auto md:float-left border rounded p-2 " src="images/{{ $post->image }}" alt="Image">
        </div>
        <div class="mx-4 md:mx-2">
            <h3 class="text-xl leading-7 text-black font-semibold">
                {{ $post->title }}
            </h3>
            <div>
                <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                    {{ $post->category->name }}
                </span>
            </div>
            <div class="pb-2 md:p-2 md:pt-0">
                {!! $post->body !!}
            </div>
        </div>
    </div>
</div>
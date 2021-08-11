<div class="h-56 md:h-64 lg:h-72 xl:h-96">
    <div class="relative">
        <img class="absolute top-0 left-0 h-56 md:h-64 lg:h-72 xl:h-96 w-full object-cover object-center" src="{{ asset($path) }}" alt="Food">
        <div class="absolute flex left-1/4 w-1/2 bg-gray-100 bg-opacity-60 mt-10 p-8 md:p-10 rounded">
            <h1 class="mx-auto text-center text-2xl md:text-4xl lg:text-5xl text-gray-900 font-bold">{{ $slot }}</h1>
        </div>
    </div>
</div>
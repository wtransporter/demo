<x-app-layout>

    {{-- <x-slot name="header">
        <h1 class="text-4xl font-bold">{{ $post->title }}</h1>
    </x-slot> --}}

    <div>
        <div class="flex flex-col md:flex-row">
            <img class="flex-1 h-60 md:h-140 w-full object-cover bg-center" src="{{ asset($post->imagePath()) }}" alt="{{ $post->title }}">
            <div class="flex flex-col items-start justify-center flex-1 p-10">
                <h1 class="text-3xl md:4xl lg:text-6xl font-bold text-gray-800 mb-6">{{ $post->title }}</h1>
                <span class="h-6 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 mb-8">
                    {{ $post->category->name }}
                </span>
                <p class="hidden md:block text-gray-700">{{ $post->body }}</p>
            </div>
        </div>
        <div class="flex flex-col md:grid md:grid-cols-10 text-gray-600 max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
            <div class="order-2 md:col-span-7">
                @foreach ($post->steps as $step)
                    <div class="flex flex-col md:flex-row items-center w-full py-4">
                        <img class="h-40 w-full object-cover bg-center rounded-md" src="{{ asset('images/potatoe.jpeg') }}" alt="Image">
                        <p class="px-4">
                            <span class="flex items-center justify-center rounded-tl-md rounded-br-md h-8 w-8 bg-blue-400 text-gray-700 font-bold text-3xl float-left mr-2 mt-2">
                                {{ $loop->iteration }}
                            </span>
                            {!! $step->body !!}
                        </p>
                    </div>
                @endforeach
            </div>
            <div class="md:col-span-3 md:order-2">
                <div class="border border-gray-300 rounded-lg shadow-sm p-4">
                    <h2 class="text-center text-xl font-bold text-gray-800">Sastojci</h2>
                    <div class="flex flex-col space-y-2">
                        <label class="text-gray-700 flex items-center border-b pb-2">
                            <input class="appearance-none h-5 w-5 border border-gray-300 rounded-md checked:bg-blue-600 focus:outline-none focus:ring focus:ring-white" type="checkbox" name="" id="">
                            <span class="ml-2">3 cups Flour</span>
                        </label>
                        <label class="text-gray-700 flex items-center border-b pb-2">
                            <input class="appearance-none h-5 w-5 border border-gray-300 rounded-md checked:bg-blue-600 focus:outline-none focus:ring focus:ring-white" type="checkbox" value=""/>
                            <span class="ml-2">2 cups Mozarella Cheese</span>
                        </label>
                        <label class="text-gray-700 flex items-center border-b pb-2">
                            <input class="appearance-none h-5 w-5 border border-gray-300 rounded-md checked:bg-blue-600 focus:outline-none focus:ring focus:ring-white" type="checkbox" value=""/>
                            <span class="ml-2">1 tbsp Baking Powder</span>
                        </label>
                        <label class="text-gray-700 flex items-center border-b pb-2">
                            <input class="appearance-none h-5 w-5 border border-gray-300 rounded-md checked:bg-blue-600 focus:outline-none focus:ring focus:ring-white" type="checkbox" value=""/>
                            <span class="ml-2">1 tbsp Baking Soda</span>
                        </label>
                        <label class="text-gray-700 flex items-center border-b pb-2">
                            <input class="appearance-none h-5 w-5 border border-gray-300 rounded-md checked:bg-blue-600 focus:outline-none focus:ring focus:ring-white" type="checkbox" value=""/>
                            <span class="ml-2">1 stick Unsalted butter</span>
                        </label>
                        <label class="text-gray-700 flex items-center border-b pb-2">
                            <input class="appearance-none h-5 w-5 border border-gray-300 rounded-md checked:bg-blue-600 focus:outline-none focus:ring focus:ring-white" type="checkbox" value=""/>
                            <span class="ml-2">1 dash Salt</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
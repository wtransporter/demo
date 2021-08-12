<x-app-layout>
    <div class="max-w-5xl mx-auto p-4 lg:px-6 w-full text-gray-600">
        <div class="p-4 text-gray-600">
            @if (session()->has('message'))
                <x-alert :message="session('message')" />
            @endif
            <form action="" class="mt-4">
                <div>
                    <label class="block" for="name">Naslov</label>
                    <input class="w-full bg-gray-100" type="text"
                        name="name" 
                        id="name" 
                        placeholder="Naziv" 
                        value="{{ old('name', $category->name) }}"
                        >
                    @error('name')
                        <span class="text-red-700 block text-sm italic">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mt-2">
                    <label class="block" for="slug">Slug</label>
                    <input type="text" class="w-full bg-gray-100" name="slug" id="slug" placeholder="Slug" value="{{ old('name', $category->slug) }}"/>
                    @error('slug')
                        <span class="text-red-700 block text-sm italic">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mt-2">
                    <button class="btn bg-primary text-white hover:bg-blue-700 font-semibold"><i class="fa fa-save mr-1"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
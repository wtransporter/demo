<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category:') . ' ' . $category->name }}
        </h2>
    </x-slot>
    <div class="max-w-5xl mx-auto p-4 lg:px-6 w-full text-gray-600">
        <div class="p-4 text-gray-600">
            @if (session()->has('message'))
                <x-alert :message="session('message')" />
            @endif
            <form action="{{ route('categories.update', $category->slug) }}" class="mt-4" method="POST">
                @csrf
                @method('PATCH')
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
                    <label class="block" for="icon">Icon</label>
                    <select name="icon_id" id="icon" style="font-family: 'FontAwesome', 'sans-serif';">
                        <option value="0">Select Icon</option>                       
                        @foreach (\App\Models\Icon::all() as $icon)
                            <option value="{{ $icon->id }}" {{ $icon->id === $category->icon->id ? 'selected' : '' }}>
                                {!! $icon->body !!}
                            </option>
                        @endforeach
                        @error('icon_id')
                            <span class="text-red-700 block text-sm italic">
                                {{ $message }}
                            </span>
                        @enderror
                    </select>
                </div>
                <div class="mt-2">
                    <label class="block" for="slug">Slug</label>
                    <input type="text" class="w-full bg-gray-100" name="slug" id="slug" placeholder="Slug" value="{{ old('slug', $category->slug) }}"/>
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
</x-admin>
<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Category') }}
        </h2>
    </x-slot>
    <div class="max-w-5xl mx-auto p-4 lg:px-6 w-full text-gray-600 grid grid-cols-4">
        <div class="p-4 text-gray-600 col-span-3">
            @if (session()->has('message'))
                <x-alert :message="session('message')" />
            @endif
            <form action="{{ route('categories.store') }}" class="mt-4" method="POST">
                @csrf
                <div>
                    <label class="block" for="name">Naslov</label>
                    <input class="w-full bg-gray-100" type="text"
                        name="name" 
                        id="name" 
                        placeholder="Naziv" 
                        value="{{ old('name') }}"
                        >
                    @error('name')
                        <span class="text-red-700 block text-sm italic">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mt-2">
                    <label class="block" for="icon">Icon</label>
                    <select name="icon_id" id="icon" class="bg-gray-100">
                        <option value="0">Select Icon</option>                       
                        @foreach ($icons as $icon)
                            <option value="{{ $icon->id }}">
                                {!! $icon->body !!}
                            </option>
                        @endforeach
                    </select>
                    @error('icon_id')
                        <span class="text-red-700 block text-sm italic">
                            {{ $message }}
                        </span>
                    @enderror
                    {{-- <input type="text" class="w-full bg-gray-100" name="icon" id="icon" placeholder="Icon" value="{{ old('icon') }}"/> --}}
                </div>
                <div class="mt-2">
                    <label class="block" for="slug">Slug</label>
                    <input type="text" class="w-full bg-gray-100" name="slug" id="slug" placeholder="Slug" value="{{ old('slug') }}"/>
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
        <div class="col-span-1 p-4">
            <label class="block text-center font-semibold" for="slug">{{ __('Icons Preview') }}</label>
            @foreach ($icons as $icon)
                <div class="flex items-center">
                    <i class="w-5 h-5 flex justify-center items-center text-xs text-gray-600 {{ $icon->body }}"></i><span class="inline-flex">{{ $icon->body }}</span>
                </div>
            @endforeach
        </div>
    </div>
</x-admin>
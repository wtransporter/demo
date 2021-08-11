<div class="p-4 text-gray-600">
    @if (session()->has('message'))
        <x-alert :message="session('message')" />
    @endif
    <form action="" class="mt-4">
        <div class="">
            <label class="block" for="title">Naslov</label>
            <input wire:model="title" class="w-full bg-gray-100" type="text"
             name="title" id="title" placeholder="Naslov" >
            @error('title')
                <span class="text-red-700 block text-sm italic">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="mt-2">
            <label class="block" for="description">Opis</label>
            <textarea wire:model="description" class="w-full bg-gray-100" name="description" id="description" rows="2" placeholder="Opis"></textarea>
            @error('description')
                <span class="text-red-700 block text-sm italic">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="mt-2">
            <label class="block" for="body">Tekst</label>
            <textarea wire:model="body" class="w-full bg-gray-100" name="body" id="body" rows="6" placeholder="Tekst"></textarea>
            @error('body')
                <span class="text-red-700 block text-sm italic">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="mt-2">
            <div class="h-32 w-64 my-2">
                @if ($image)
                    <img class="h-32 w-full p-2 border object-cover object-center " src="@if ($image && !is_string($image)) {{ $image->temporaryUrl() }} @else {{ asset('storage/images/thumbs/'.$modelId.'/'.$image) }} @endif">
                @else
                    <img class="h-32 w-full p-2 border object-cover object-center " src="{{ asset('images/no-image.png') }}">
                @endif
            </div>
            <div>
                <label class="block" for="image">Slika</label>
                <input wire:model="image" type="file" name="image" id="image" />
                @error('image')
                    <span class="text-red-700 block text-sm italic">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
        <div class="mt-2">
            <label class="block" for="body">Koraci</label>
            @foreach ($postSteps as $index => $postStep)
                <div class="mt-2">
                    <textarea wire:model="postSteps.{{$index}}.body" class="w-full bg-gray-100" name="postSteps[{{$index}}][body]" rows="6" placeholder="Tekst"></textarea>
                    <div class="h-32 w-64 my-2">
                        @if (empty($postSteps[$index]['image']))
                            <img class="h-32 w-full p-2 border object-cover object-center " src="{{ asset('images/no-image.png') }}">
                        @else
                            @if (!is_string($postSteps[$index]['image']))
                                <img class="h-32 w-full p-2 border object-cover object-center" src="{{$postSteps[$index]['image']->temporaryUrl()}}">
                            @else
                                <img class="h-32 w-full p-2 border object-cover object-center" src="{{ asset('storage/images/' . $modelId . '/' . $postSteps[$index]['image']) }}">
                            @endif
                        @endif
                    </div>
                    <div class="flex">
                        <input wire:model="postSteps.{{$index}}.image" type="file" name="postSteps[{{$index}}][image]">
                        <button wire:click.prevent="removeStep({{$index}})" class="btn bg-red-700 text-white hover:bg-red-600 font-semibold ml-2">Obriši</button>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-2">
            <button wire:click.prevent="addStep" class="btn bg-primary text-white hover:bg-blue-700 font-semibold"><i class="fa fa-plus-circle mr-1"></i> Dodaj korak</button>
        </div>
        <div class="mt-2">
            <label class="block" for="category_id">Kategorija</label>
            <select wire:model="category_id" class="w-1/3" name="category_id" id="category_id">
                <option value="0">---</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <span class="text-red-700 block text-sm italic">
                    {{ $message }}
                </span>
            @enderror
        </div>
        @if ($createing)
            <div class="mt-2">
                <button x-data x-on:click="window.scrollTo(50, 50)"
                    wire:click.prevent="save" class="btn bg-primary text-white hover:bg-blue-700 font-semibold"><i class="fa fa-save mr-1"></i> Snimi</button>
            </div>
        @else
            <div class="mt-2">
                <button x-data x-on:click="window.scrollTo(50, 50)"
                    wire:click.prevent="update" class="btn bg-primary text-white hover:bg-blue-700 font-semibold"><i class="fa fa-save mr-1"></i> Update</button>
            </div>
        @endif
    </form>
</div>
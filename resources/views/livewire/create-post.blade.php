<div class="p-4 text-gray-600">
    <form action="" class="mt-4">
        <div class="">
            <label class="block" for="title">Naslov</label>
            <input wire:model="title" class="w-full bg-gray-100" type="text" name="title" id="title" placeholder="Naslov">
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
        </div>
        <div class="mt-2">
            <label class="block" for="body">Koraci</label>
            @foreach ($postSteps as $index => $postStep)
                <textarea wire:model="postSteps.{{$index}}.body" class="w-full bg-gray-100" name="postSteps[{{$index}}][body]" rows="6" placeholder="Tekst"></textarea>
            @endforeach
            <button wire:click.prevent="addStep" class="btn bg-primary text-white hover:bg-blue-700 font-semibold"><i class="fa fa-plus-circle mr-1"></i> Dodaj korak</button>
            @error('body')
                <span class="text-red-700 block text-sm italic">
                    {{ $message }}
                </span>
            @enderror
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
        <div class="mt-2">
            <label class="block" for="image">Slika</label>
            <input wire:model="image" type="file" name="image" id="image" />
        </div>
        <div class="mt-2">
            <button wire:click.prevent="save" class="btn bg-primary text-white hover:bg-blue-700 font-semibold"><i class="fa fa-save mr-1"></i> Snimi</button>
        </div>
    </form>
</div>
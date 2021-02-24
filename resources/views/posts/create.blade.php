<div class="p-4 text-gray-600">
    <form action="" class="mt-4">
        <div class="">
            <label class="block" for="title">Naslov</label>
            <input wire:model="title" class="w-full bg-gray-100" type="text" name="title" id="title" placeholder="Naslov">
        </div>
        <div class="mt-2">
            <label class="block" for="description">Opis</label>
            <textarea wire:model="description" class="w-full bg-gray-100" name="description" id="description" rows="2" placeholder="Opis"></textarea>
        </div>
        <div class="mt-2">
            <label class="block" for="body">Tekst</label>
            <textarea wire:model="body" class="w-full bg-gray-100" name="body" id="body" rows="6" placeholder="Tekst"></textarea>
        </div>
        <div class="mt-2">
            <label class="block" for="category_id">Kategorija</label>
            <select wire:model="category_id" class="w-1/3" name="category_id" id="category_id">
                <option value="0">---</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-2">
            <button wire:click.prevent="save" class="btn bg-primary text-white hover:bg-blue-700 font-semibold">Snimi</button>
        </div>
    </form>
</div>
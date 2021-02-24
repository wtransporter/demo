<div>
    <div>
        @if (session()->has('message'))
            <div class="p-2 mb-2 max-w-lg rounded border border-green-600 bg-green-200 text-green-900">
                {{ session('message') }}
            </div>
        @endif
    </div>

    {{-- <form wire:submit.prevent="save" action="" method="post"> --}}
        <div class="flex flex-col max-w-lg">
            <label for="name">Username:</label>
            <input wire:model="name" class="rounded" type="text" name="name" id="name" placeholder="Username">
            @error('name')
                <span class="text-sm text-red-600 italic">{{ $message }}</span>
            @enderror
            <label class="mt-2" for="email">Email:</label>
            <input wire:model="email" class="rounded" type="text" name="email" id="email" placeholder="Email">
            @error('email')
                <span class="text-sm text-red-600 italic pt-0">{{ $message }}</span>
            @enderror
        </div>
        <button class="rounded p-2 mt-2 mb-2 focus:outline-none bg-blue-600 hover:bg-blue-500 text-white" wire:click="save">Submit</button>
        <button class="btn bg-primary font-semibold hover:bg-blue-700 text-white focus:outline-none" wire:click="save">Submit</button>
    {{-- </form> --}}

   <div class="flex flex-col">
       <div class="overflow-x-auto">
           <div class="py-2 align-middle inline-block min-w-full">
                <div class="overflow-hidden">
                    <table class="min-w-full">
                        <thead class="justify-between">
                            <tr class="bg-gray-700">
                                <th class="px-16 py-2">
                                    <span class="text-gray-200">ID</span>
                                </th>
                                <th class="px-16 py-2">
                                    <span class="text-gray-200">Name</span>
                                </th>
                                <th class="px-16 py-2 text-left">
                                    <span class="text-gray-200">Email</span>
                                </th>
                                <th class="px-16 py-2 text-left">
                                    <span class="text-gray-200">Status</span>
                                </th>
                                <th class="px-16 py-2">
                                    <span class="text-gray-200">Action</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-200">
                            @if ($users->count())
                                @foreach ($users as $user)
                                <tr class="bg-white border-2 border-gray-300">
                                    <td class="px-16 py-2 text-left">
                                        <span class="font-semibold"> {{ $user->id }}</span>
                                    </td>
                                    <td class="px-16 py-2 text-center">
                                        <span class="font-semibold"> {{ $user->name }}</span>
                                    </td>
                                    <td class="px-16 py-2 text-left">
                                        <span>{{ $user->email }}</span>
                                    </td>
                                    <td class="px-16 py-2 text-left">
                                        <span class="px-2 inline-flex text-xs leading-5 
                                            font-semibold rounded-full 
                                            bg-green-300 text-green-800 tracking-wide">
                                            Active
                                        </span>
                                    </td>
                                    <td class="px-16 py-2 text-center flex space-x-1">
                                        <button class="inline-block bg-blue-600 px-3 text-sm text-white rounded border-2 border-blue-600
                                            hover:bg-white hover:text-blue-900">Edit</button>

                                        @if ($confirmDelete !== $user->id)
                                            <button wire:click="confirmDelete({{ $user->id }})" class="inline-block bg-red-600 px-3 text-sm text-white focus:outline-none rounded border-2 border-red-600
                                            hover:bg-white hover:text-red-900">Delete</button>
                                        @else
                                            <button wire:click="delete({{ $user->id }})" class="inline-block bg-green-600 px-1 text-sm text-white focus:outline-none rounded border-2 border-green-600
                                            hover:bg-white hover:text-green-900">Yes</button>
                                            <button wire:click="cancelDelete" class="inline-block bg-red-600 px-1 text-sm text-white focus:outline-none rounded border-2 border-red-600
                                            hover:bg-white hover:text-red-900">No</button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
           </div>
       </div>
   </div>

    @if ($users->count())
        <div class="mt-5">
            {{ $users->onEachSide(2)->links() }}
        </div>
    @endif
</div>

<div id="posts">
    <div>
        @if (session()->has('message'))
            <x-alert type="red" :message="session('message')" />
        @endif
    </div>

   <div class="flex flex-col">
       <div class="overflow-x-auto">
           <div class="py-2 align-middle inline-block min-w-full">
                <div class="overflow-hidden">
                    <table class=" table-auto">
                        <thead class="justify-between">
                            <tr class="bg-gray-700">
                                <th class="px-16 py-2">
                                    <span class="text-gray-200">#</span>
                                </th>
                                <th class="p-2 text-left">
                                    <span class="text-gray-200">Title</span>
                                </th>
                                <th class="px-16 py-2 text-left">
                                    <span class="text-gray-200">Description</span>
                                </th>
                                <th class="px-5 py-2 text-left">
                                    <span class="text-gray-200">Status</span>
                                </th>
                                <th class="px-16 py-2">
                                    <span class="text-gray-200">Action</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-200">
                            @if ($posts->count())
                                @foreach ($posts as $post)
                                <tr class="bg-white border-2 border-gray-300">
                                    <td class="px-16 py-2 text-left">
                                        <span class="font-semibold"> {{ $loop->iteration + $posts->firstItem() -1 }}</span>
                                    </td>
                                    <td class="p-2">
                                        <span class="font-semibold"> {{ $post->title }}</span>
                                    </td>
                                    <td class="px-16 py-2 text-left">
                                        <span>{{ $post->description }}</span>
                                    </td>
                                    <td class="px-5 py-2 text-left">
                                        <span class="px-2 inline-flex text-xs leading-5 
                                            font-semibold rounded-full 
                                            bg-green-300 text-green-800 tracking-wide">
                                            Active
                                        </span>
                                    </td>
                                    <td class="px-1 py-2 text-center">
                                        <div class="flex items-center justify-center space-x-1">
                                            <a href="{{ route('posts.edit', $post) }}" class="inline-block bg-blue-600 px-3 text-sm text-white rounded border-2 border-blue-600
                                                hover:bg-white hover:text-blue-900 cursor-pointer">Edit</a>

                                            @if ($confirmDelete !== $post->id)
                                                <button wire:click="confirmDelete({{ $post->id }})" class="inline-block bg-red-600 px-3 text-sm text-white focus:outline-none rounded border-2 border-red-600
                                                hover:bg-white hover:text-red-900">Delete</button>
                                            @else
                                                <button wire:click="delete({{ $post->id }})" class="inline-block bg-green-600 px-1 text-sm text-white focus:outline-none rounded border-2 border-green-600
                                                hover:bg-white hover:text-green-900">Yes</button>
                                                <button wire:click="cancelDelete" class="inline-block bg-red-600 px-1 text-sm text-white focus:outline-none rounded border-2 border-red-600
                                                hover:bg-white hover:text-red-900">No</button>
                                            @endif
                                        </div>
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

    @if ($posts->count())
        <div class="mt-5">
            {{ $posts->onEachSide(2)->links() }}
        </div>
    @endif
</div>

@push('scripts')
    <script>
        Livewire.on('toTop', () => { 
            document.getElementById("top").scrollIntoView();
        })
    </script>    
@endpush

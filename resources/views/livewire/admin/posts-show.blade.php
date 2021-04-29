<div id="posts">
    <div>
        @if (session()->has('message'))
            <x-alert type="red" :message="session('message')" />
        @endif
    </div>

   <div class="flex flex-col">
        <div>
            <div class="w-36 float-right flex justify-end">
                <a href="{{ route('posts.create') }}">
                <x-jet-secondary-button class="bg-green-700 hover:bg-green-500 active:bg-green-700">
                    <span class="text-white hover:text-white">
                        Create
                    </span>
                </x-jet-secondary-button>
                </a>
            </div>
        </div>
        <div class="overflow-x-auto">
           <div class="py-2 align-middle inline-block min-w-full">
                <div class="overflow-hidden">
                    <table class=" table-auto w-full">
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
                                        <a href="#" wire:click.prevent="changeStatus({{ $post->id }})">
                                            <span class="px-2 inline-flex text-xs leading-5 
                                                font-semibold rounded-full 
                                                {{ $post->status ? 'bg-green-300 text-green-800 hover:bg-green-400' : 'bg-red-300 text-red-900 hover:bg-red-400'}} tracking-wide">
                                                {{ $post->status ? 'Active' : 'Inactive'}}
                                            </span>
                                        </a>
                                    </td>
                                    <td class="px-1 py-2 text-center text-gray-600">
                                        <div class="flex items-center justify-center ">
                                            <div class="w-4 mr-2 transform hover:text-green-700 hover:scale-110 cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </div>
                                            <div class="w-4 mr-2 transform hover:text-primary hover:scale-110 cursor-pointer">
                                                <a href="{{ route('posts.edit', $post->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="w-4 mr-2 transform hover:text-red-500 hover:scale-110 cursor-pointer">
                                                <svg wire:click="confirmDelete({{ $post->id }})" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </div>
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

    <!-- Delete User Confirmation Modal -->
    <x-jet-confirmation-modal wire:model="confirmingItemDeletion" class="flex items-center">
        <x-slot name="title">
            {{ __('Delete Item') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this item?') }} 
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingItemDeletion')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Delete Item') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>

@push('scripts')
    <script>
        Livewire.on('toTop', () => { 
            document.getElementById("top").scrollIntoView();
        })
    </script>    
@endpush

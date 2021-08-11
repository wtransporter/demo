<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Categories') }}
        </h2>
    </x-slot>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col">
                <div>
                    <div class="w-36 float-right flex justify-end">
                        <a href="{{ route('posts.create') }}">
                        <x-jet-secondary-button class="bg-green-700 hover:bg-green-500 active:bg-green-700">
                            <span class="text-white hover:text-white">
                                {{ __('Create') }}
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
                                        <th class="px-16 py-2 w-24">
                                            <span class="text-gray-200">#</span>
                                        </th>
                                        <th class="p-2 text-left">
                                            <span class="text-gray-200">Name</span>
                                        </th>
                                        <th class="px-16 py-2 text-left">
                                            <span class="text-gray-200">Slug</span>
                                        </th>
                                        <th class="px-16 py-2">
                                            <span class="text-gray-200">Action</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-gray-200">
                                    @if ($categories->count())
                                        @foreach ($categories as $category)
                                        <tr class="bg-white border-2 border-gray-300">
                                            <td class="px-16 py-2 text-left w-24">
                                                <span class="font-semibold"> {{ $loop->iteration }}</span>
                                            </td>
                                            <td class="p-2">
                                                <span class="font-semibold"> {{ $category->name }}</span>
                                            </td>
                                            <td class="px-16 py-2 text-left">
                                                <span>{{ $category->slug }}</span>
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
                                                        <a href="">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    <div class="w-4 mr-2 transform hover:text-red-500 hover:scale-110 cursor-pointer">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
        </div>
    </div>
</x-app-layout>
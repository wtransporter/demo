<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
            <table class="min-w-full table-auto">
                <thead class="justify-between">
                    <tr class="bg-gray-700">
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
                    <tr class="bg-white border-2 border-gray-300">
                        <td class="px-16 py-2 text-center">
                            <span class="font-semibold"> Test Name</span>
                        </td>
                        <td class="px-16 py-2 text-left">
                            <span>test@test.com</span>
                        </td>
                        <td class="px-16 py-2 text-left">
                            <span class="
                                px-2 inline-flex text-xs leading-5 
                                font-semibold rounded-full 
                                bg-green-300 text-green-800 tracking-wide">Active</span>
                        </td>
                        <td class="px-16 py-2 text-center">
                            <button class="bg-blue-600 px-3 text-sm text-white rounded border-2 border-blue-600
                                hover:bg-white hover:text-black">Edit</button>
                        </td>
                    </tr>
                    <tr class="bg-white border-2 border-gray-300">
                        <td class="px-16 py-2 text-center">
                            <span class="font-semibold"> Test Name</span>
                        </td>
                        <td class="px-16 py-2 text-left">
                            <span>test@test.com</span>
                        </td>
                        <td class="px-16 py-2 text-left">
                            <span class="px-2 inline-flex text-xs leading-5 
                                font-semibold rounded-full 
                                bg-green-300 text-green-800 tracking-wide">Active</span>
                        </td>
                        <td class="px-16 py-2 text-center">
                            <button class="bg-blue-600 px-3 text-sm text-white rounded border-2 border-blue-600
                                hover:bg-white hover:text-black">Edit</button>
                        </td>
                    </tr>
                    <tr class="bg-white border-2 border-gray-300">
                        <td class="px-16 py-2 text-center">
                            <span class="font-semibold"> Test Name</span>
                        </td>
                        <td class="px-16 py-2 text-left">
                            <span>test@test.com</span>
                        </td>
                        <td class="px-16 py-2 text-left">
                            <span class="px-2 inline-flex text-xs leading-5 
                                font-semibold rounded-full 
                                bg-red-300 text-red-800 tracking-wide">Inactive</span>
                        </td>
                        <td class="px-16 py-2 text-center">
                            <button class="bg-blue-600 px-3 text-sm text-white rounded border-2 border-blue-600
                                hover:bg-white hover:text-black">Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


</x-app-layout>

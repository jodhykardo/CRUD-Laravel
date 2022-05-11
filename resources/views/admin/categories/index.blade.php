<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-3">
                <div class="p-6 bg-white border-b border-gray-200">
                    Categories
                </div>
                <div class="flex justify-end m-2 p-2">
                    <a href="{{ route('admin.categories.create')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">New Category</a>
                </div>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark-mode:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark-mode:bg-gray-700 dark-mode:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Category name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr class="bg-white border-b dark-mode:bg-gray-800 dark-mode:border-gray-700">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark-mode:text-white whitespace-nowrap">
                                {{ $category->name  }}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark-mode:text-white whitespace-nowrap">
                                <img src="{{ Storage::url($category->image) }}" class="w-16 h-16 rounded">
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark-mode:text-white whitespace-nowrap">
                                {{ $category->description  }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 dark-mode:text-white whitespace-nowrap">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">Edit</a>
                                    <form class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white" method="POST" action="{{ route('admin.categories.destroy', $category->id) }}" onsubmit="return confirm('Are you sure want to delete {{ $category->name }}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-admin-layout>

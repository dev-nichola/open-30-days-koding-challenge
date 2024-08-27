<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Halaman Task') }}
        </h2>
    </x-slot>

    <div class="py-8 px-4 sm:px-6 lg:px-8">
        <div class="py-4 flex justify-end">
            @can('create tasks')
                <a href="{{ route('task.create') }}">
                    <x-primary-button class="bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 text-white">
                        {{ __('+ Tambah Task') }}
                    </x-primary-button>
                </a>
            @endcan
        </div>

        <div class="flex flex-col">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full align-middle max-w-full">
                    <div class="overflow-hidden shadow sm:rounded-lg bg-white dark:bg-gray-800">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                        Title
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                        Goal
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @foreach ($tasks as $task)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                            {{ $task->title }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-400">
                                            {{ $task->goal }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                            <div class="flex justify-center space-x-2">
                                                <a href="{{ route('task.show', $task->id) }}"
                                                    class="text-white inline-flex items-center px-3 py-1 gap-x-1 text-sm font-semibold rounded-md border border-transparent bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:text-white dark:bg-yellow-600 dark:hover:bg-yellow-400 dark:focus:ring-blue-400 transition ease-in-out duration-150">
                                                    Detail Task
                                                </a>
                                                @can('edit tasks')
                                                    <a href="{{ route('task.edit', $task->id) }}"
                                                        class="text-white inline-flex items-center px-3 py-1 gap-x-1 text-sm font-semibold rounded-md border border-transparent bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:text-white dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-400 transition ease-in-out duration-150">
                                                        Edit
                                                    </a>
                                                @endcan

                                                @can('delete tasks')
                                                    <form action="{{ route('task.destroy', $task->id) }}" method="POST"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus task ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-white inline-flex items-center px-3 py-1 gap-x-1 text-sm font-semibold rounded-md border border-transparent bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 dark:text-white dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-400 transition ease-in-out duration-150">
                                                            Delete
                                                        </button>
                                                    </form>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

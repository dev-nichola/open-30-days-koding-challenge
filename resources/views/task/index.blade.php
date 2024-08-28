<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Halaman Task') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8 sm:px-6 lg:px-8">
        <div class="flex justify-end py-4">
            @can('create tasks')
                <a href="{{ route('task.create') }}">
                    <x-primary-button class="bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500">
                        {{ __('+ Tambah Task') }}
                    </x-primary-button>
                </a>
            @endcan
        </div>

        <div class="flex flex-col">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full max-w-full align-middle">
                    <div class="overflow-hidden bg-white shadow sm:rounded-lg dark:bg-gray-800">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500 dark:text-gray-400">
                                        Title
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500 dark:text-gray-400">
                                        Goal
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium uppercase text-gray-500 dark:text-gray-400">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-800">
                                @foreach ($tasks as $task)
                                    <tr class="transition-colors hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td
                                            class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-800 dark:text-gray-200">
                                            {{ $task->title }}
                                        </td>
                                        <td
                                            class="whitespace-nowrap px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                                            {{ $task->goal }}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4 text-center text-sm font-medium">
                                            <div class="flex justify-center space-x-2">
                                                <a href="{{ route('task.show', $task->id) }}"
                                                    class="inline-flex items-center gap-x-1 rounded-md border border-transparent bg-blue-500 px-3 py-1 text-sm font-semibold text-white transition duration-150 ease-in-out hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-yellow-600 dark:text-white dark:hover:bg-yellow-400 dark:focus:ring-blue-400">
                                                    Detail Task
                                                </a>
                                                @can('edit tasks')
                                                    <a href="{{ route('task.edit', $task->id) }}"
                                                        class="inline-flex items-center gap-x-1 rounded-md border border-transparent bg-blue-500 px-3 py-1 text-sm font-semibold text-white transition duration-150 ease-in-out hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-blue-600 dark:text-white dark:hover:bg-blue-700 dark:focus:ring-blue-400">
                                                        Edit
                                                    </a>
                                                @endcan

                                                @can('delete tasks')
                                                    <form action="{{ route('task.destroy', $task->id) }}" method="POST"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus task ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="inline-flex items-center gap-x-1 rounded-md border border-transparent bg-red-500 px-3 py-1 text-sm font-semibold text-white transition duration-150 ease-in-out hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 dark:bg-red-600 dark:text-white dark:hover:bg-red-700 dark:focus:ring-red-400">
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

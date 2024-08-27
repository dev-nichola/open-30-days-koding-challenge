<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pengumpulan tugas kamu') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <header class="py-4 flex justify-end">
            <a href="{{ route('assignments.create') }}">
                <x-primary-button>Kumpulkan tugas</x-primary-button>
            </a>
        </header>

        <table class="lg:rounded-lg overflow-hidden min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr class="uppercase">
                    <th class="px-6 py-3 text-left text-xs font-mediaum text-gray-500 dark:text-gray-400">
                        Challenge
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-mediaum text-gray-500 dark:text-gray-400">
                        Tanggal pengumpulan
                    </th>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                @foreach ($assignments as $assignment)
                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                            {{ $assignment->task }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                            {{ $assignment->due_date }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>

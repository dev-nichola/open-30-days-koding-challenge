<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Detail Task') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6">
        <form class="mx-auto max-w-lg space-y-6 rounded-lg bg-gray-900 p-6 shadow-md">
            @csrf

            <div>
                <label for="title" class="mb-2 block text-sm font-medium text-gray-300">Title</label>
                <input type="text" id="title" name="title" value="{{ $task->title }}" disabled
                    class="block w-full rounded-lg border border-gray-700 bg-gray-800 px-4 py-3 text-sm text-gray-300 placeholder-gray-500">
            </div>

            <div>
                <label for="goals" class="mb-2 block text-sm font-medium text-gray-300">Goal</label>
                <textarea id="goals" name="goal" rows="3" disabled
                    class="block w-full rounded-lg border border-gray-700 bg-gray-800 px-4 py-3 text-sm text-gray-300 placeholder-gray-500">{{ $task->goal }}</textarea>
            </div>

            <div>
                <label for="task" class="mb-2 block text-sm font-medium text-gray-300">Task</label>
                <textarea id="task" name="task" rows="3" disabled
                    class="block w-full rounded-lg border border-gray-700 bg-gray-800 px-4 py-3 text-sm text-gray-300 placeholder-gray-500">{{ $task->task }}</textarea>
            </div>

            <div class="flex justify-center">
                <a href="{{ route('task.index') }}"
                    class="flex w-full items-center justify-center rounded-lg border border-transparent bg-red-600 px-4 py-2 text-center font-semibold text-white transition duration-150 ease-in-out hover:bg-red-700 focus:ring-4 focus:ring-red-500 focus:ring-opacity-50">
                    Back to Task List
                </a>
            </div>
            <div class="flex justify-center">
                <a href="{{ route('assignments.index') }}"
                    class="flex w-full items-center justify-center rounded-lg border border-transparent bg-blue-600 px-4 py-2 text-center font-semibold text-white transition duration-150 ease-in-out hover:bg-blue-700 focus:ring-4 focus:ring-red-500 focus:ring-opacity-50">
                     Cuss Kerjain!!!
                </a>
            </div>
        </form>
    </div>
</x-app-layout>

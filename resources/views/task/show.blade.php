<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Task') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6">
        <form class="bg-gray-900 shadow-md rounded-lg p-6 max-w-lg mx-auto space-y-6">
            @csrf

            <div>
                <label for="title" class="block text-sm font-medium text-gray-300 mb-2">Title</label>
                <input type="text" id="title" name="title" value="{{ $task->title }}" disabled
                    class="block w-full px-4 py-3 border border-gray-700 rounded-lg text-sm bg-gray-800 text-gray-300 placeholder-gray-500">
            </div>

            <div>
                <label for="goals" class="block text-sm font-medium text-gray-300 mb-2">Goal</label>
                <textarea id="goals" name="goal" rows="3" disabled
                    class="block w-full px-4 py-3 border border-gray-700 rounded-lg text-sm bg-gray-800 text-gray-300 placeholder-gray-500">{{ $task->goal }}</textarea>
            </div>

            <div>
                <label for="task" class="block text-sm font-medium text-gray-300 mb-2">Task</label>
                <textarea id="task" name="task" rows="3" disabled
                    class="block w-full px-4 py-3 border border-gray-700 rounded-lg text-sm bg-gray-800 text-gray-300 placeholder-gray-500">{{ $task->task }}</textarea>
            </div>

            <div class="flex justify-center">
                <a href="{{ route('task.index') }}"
                    class="w-full flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-lg font-semibold text-white hover:bg-red-700 focus:ring-4 focus:ring-red-500 focus:ring-opacity-50 transition ease-in-out duration-150 text-center">
                    Back to Task List
                </a>
            </div>
        </form>
    </div>
</x-app-layout>

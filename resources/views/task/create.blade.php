<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Halaman Task') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6">
        <form action="{{ route('task.store') }}" method="POST" class="bg-gray-900 shadow-md rounded-lg p-6 max-w-lg mx-auto space-y-6">
            @csrf

            <div>
                <label for="title" class="block text-sm font-medium text-gray-300 mb-2">Title <sup
                        class="text-red-500">*</sup></label>
                <input type="text" id="title" name="title" value="{{ old('title') }}"
                    class="block w-full px-4 py-3 border @error('title') border-red-500 @else border-gray-700 @enderror rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500 bg-gray-800 text-gray-300 placeholder-gray-500"
                    placeholder="title task...">
                @error('title')
                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="goals" class="block text-sm font-medium text-gray-300 mb-2">Goal <sup
                        class="text-red-500">*</sup></label>
                <textarea id="goals" name="goal" rows="3" placeholder="goal task..."
                    class="block w-full px-4 py-3 border @error('goal') border-red-500 @else border-gray-700 @enderror rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500 bg-gray-800 text-gray-300 placeholder-gray-500">{{ old('goal') }}</textarea>
                @error('goal')
                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="task" class="block text-sm font-medium text-gray-300 mb-2">Task <sup
                        class="text-red-500">*</sup></label>
                <textarea id="task" name="task" rows="3" placeholder="task..."
                    class="block w-full px-4 py-3 border @error('task') border-red-500 @else border-gray-700 @enderror rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500 bg-gray-800 text-gray-300 placeholder-gray-500">{{ old('task') }}</textarea>
                @error('task')
                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-center">
                <button type="submit"
                    class="w-full flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-semibold text-white hover:bg-blue-700 focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 transition ease-in-out duration-150 text-center">
                    Submit
                </button>
            </div>
        </form>
    </div>
</x-app-layout>

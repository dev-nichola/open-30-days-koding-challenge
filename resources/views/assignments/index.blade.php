<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kumpulkan tugasmu') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6 dark:text-gray-300">
        <form class="dark:bg-gray-900 shadow-md rounded-lg p-6 max-w-lg mx-auto space-y-6"
            action="{{ route('assignments.store') }}"
            method="POST"
        >
            @csrf
            <div class="mb-4">
                <label for="task" class="block text-sm font-bold mb-2">Task <span
                        class="text-red-500">*</span></label>
                <select name="task" id="task" class="form-control" required>
                    <option value="" disabled selected>Select an option</option>
                    <option value="hihi">hihi</option>
                    <!-- Add options here -->
                </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="due_date" class="block text-sm font-bold mb-2">Tanggal Pengumpulan <span
                            class="text-red-500">*</span></label>
                    <input type="date" name="due_date" id="due_date"
                        class="form-control"
                        required>
                </div>
                <div class="mb-4">
                    <label for="repository_link" class="block text-sm font-bold mb-2">
                    Link Repository <span class="text-red-500">*</span>
                    </label>
                    <input type="url" name="repository_link" id="repository_link"
                        class="form-control"
                        required>
                </div>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-bold mb-2">
                    Deskripsikan Gimana Cara Penyelesaianmu
                    <span class="text-red-500">*</span>
                </label>
                <textarea name="description" id="description" class="form-control" required>
                </textarea>
            </div>

            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-md"
                    type="submit">
                    Kumpulkan
                </button>

                <a class="inline-block align-baseline text-sm font-semibold hover:text-gray-100" href="{{route('task.index')}}">
                    Ga jadi deh
                </a>
            </div>
        </form>
    </div>
</x-app-layout>

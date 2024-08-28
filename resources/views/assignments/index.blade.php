@php
    use Carbon\Carbon;
    $dayCounter = 1;
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Kumpulkan tugasmu') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6 dark:text-gray-300">
        <form class="mx-auto max-w-lg space-y-6 rounded-lg p-6 shadow-md dark:bg-gray-900"
            action="{{ route('assignments.store') }}" method="POST">

            @method('post')
            @csrf
            <div class="mb-4">
                <label for="task" class="mb-2 block text-sm font-bold">Task <span class="text-red-500">*</span></label>
                <select name="task_id" id="task-id" class="form-control" required>
                    <option disabled selected>-- Select an option --</option>
                    @foreach ($tasks as $task)
                        <option value="{{ $task->id }}">{{ $task->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div class="mb-4">
                    <label for="date" class="mb-2 block text-sm font-bold">Tanggal Pengumpulan <span
                            class="text-red-500">*</span></label>
                    <input type="date" name="date" id="date" class="form-control" required>
                </div>
                <div class="mb-4">
                    <label for="repository" class="mb-2 block text-sm font-bold">Link Repository <span
                            class="text-red-500">*</span></label>
                    <input type="url" name="repository" id="repository" class="form-control" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="note" class="mb-2 block text-sm font-bold">Deskripsikan Gimana Cara Penyelesaianmu <span
                        class="text-red-500">*</span></label>
                <textarea name="note" id="note" class="form-control" required></textarea>
            </div>

            <div class="flex items-center justify-between">
                <button class="rounded-md bg-blue-600 px-6 py-2 font-bold text-white hover:bg-blue-700" type="submit">
                    Kumpulkan
                </button>

                <a class="rounded-md bg-red-500 px-6 py-2 align-baseline text-sm font-bold text-white hover:text-gray-100"
                    href="{{ route('task.index') }}">
                    Ga jadi deh
                </a>
            </div>
        </form>

        <div class="mt-8 overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                            Task</th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                            Tanggal Pengumpulan</th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                            Link Repository</th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                            Detail</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-900">
                    @foreach ($assignments as $assignment)
                        <tr>
                            <td class="whitespace-nowrap px-6 py-4">{{ $assignment->task->title }}</td>
                            <td class="whitespace-nowrap px-6 py-4">
                                {{ 'Day ' . $loop->iteration . ' - ' . Carbon::parse($assignment->date)->format('d F Y') }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <a href="{{ $assignment->repository }}"
                                    class="text-blue-600 hover:underline">{{ $assignment->repository }}</a>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">

                                {{-- Show Detail --}}
                                <a href="javascript:void(0)" onclick="showAssignment({{ $assignment->id }})"
                                    class="inline-block rounded-md bg-blue-500 px-4 py-2 font-bold text-black">👀</a>

                                {{-- Delete --}}
                                <form class="inline-block" onsubmit="return confirmDelete()"
                                    action="{{ route('assignments.destroy', $assignment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="rounded-md bg-red-500 px-4 py-2 font-bold text-black">🗑️</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div id="assignmentModal" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black bg-opacity-50">
        <div class="modal-content w-full max-w-lg rounded-lg bg-white p-6 dark:bg-gray-900">
            <div class="flex items-center justify-between pb-3">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Detail Assignment</h3>
                <button class="text-gray-800 dark:text-gray-200" onclick="closeModal()">&times;</button>
            </div>
            <div id="modalContent">

            </div>
            <div class="flex justify-end pt-3">
                <button class="rounded-md bg-blue-600 px-4 py-2 font-bold text-white hover:bg-blue-700"
                    onclick="closeModal()">Tutup</button>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function confirmDelete() {
                return confirm('Apakah kamu yakin ingin menghapus assignment ini?');
            }

            function showAssignment(id) {
                fetch(`/assignments/${id}`)
                    .then(response => response.json())
                    .then(data => {
                        const modalContent = document.getElementById('modalContent');
                        modalContent.innerHTML = `
                <div class="space-y-4">
                    <p class="text-lg font-semibold"><strong>Task:</strong> ${data.task.title}</p>
                    <p class="text-lg"><strong>Tanggal Pengumpulan:</strong> ${new Date(data.date).toLocaleDateString('id-ID')}</p>
                    <p class="text-lg"><strong>Link Repository:</strong>
                        <a href="${data.repository}" class="text-blue-600 hover:underline" target="_blank">${data.repository}</a>
                    </p>
                    <p class="text-lg"><strong>Cara Penyelesaian:</strong> ${data.note}</p>
                </div>
            `;
                        document.getElementById('assignmentModal').classList.remove('hidden');
                    })
                    .catch(error => console.error('Error:', error));
            }

            function closeModal() {
                document.getElementById('assignmentModal').classList.add('hidden');
            }
        </script>
    @endpush>
</x-app-layout>

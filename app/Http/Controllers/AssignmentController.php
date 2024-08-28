<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Task;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Masmerise\Toaster\Toaster;

class AssignmentController extends Controller implements HasMiddleware
{
    /**
     * get middlewares that should be assigned to AssigmentController
     * */
    public static function middleware(): array
    {
        return [
            new Middleware('role:admin', except: ['index', 'store'])
        ];
    }

    public function create(): View
    {
        return view('assignments.create');
    }

    public function store(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'task_id' => 'required|string|max:255|unique:assignments',
            'date' => 'required|date',
            'repository' => 'required',
            'note' => 'required|string|min:10',
        ]);

        // Membuat assignment baru menggunakan data yang sudah divalidasi
        Assignment::query()->create([
            'task_id' => $request->task_id,
            'date' => $request->date,
            'repository' => $request->repository,
            'note' => $request->note,
            'user_id' => $request->user()->id
        ]);

        // Redirect ke halaman list assignment dengan pesan sukses
        Toaster::success('Sukses Bro Sukses');
        return redirect()->back();
    }

    public function index()
    {

        $userId = Auth::user()->id;
        // Mendapatkan semua assignment dari database
        $assignments = Assignment::query()->where('user_id', $userId)->get();

        // Get task from db
        $task = Task::query()->get();

        return view('assignments.index', [
            'assignments' => $assignments,
            'tasks' => $task
        ]);
    }

    public function destroy($id)
    {

        $assignment = Assignment::query()->findOrFail($id);

        if (!$assignment) {
            Toaster::error('Mohon maaf tidak bisa menghapus data karena ada alasan lain hal');
        }

        $assignment->delete();

        Toaster::success('Sukses menghapus data');
        return redirect()->back();
    }

    public function show(Assignment $assignment)
    {
        return response()->json([
            'task' => $assignment->task,
            'date' => $assignment->date,
            'repository' => $assignment->repository,
            'note' => $assignment->note,
        ]);
    }
}

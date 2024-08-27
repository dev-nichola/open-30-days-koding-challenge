<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;

class AssignmentController extends Controller implements HasMiddleware
{
    /**
     * get middlewares that should be assigned to AssigmentController
     * */
    public static function middleware(): array
    {
        return [
            new Middleware('role:admin', except: ['index'])
        ];
    }

    public function create(): View
    {
        return view('assignments.create');
    }

    public function store(Request $request)
    {
        // Validasi data yang masuk
        $validated = $request->validate([
            'task' => 'required|string|max:255',
            'due_date' => 'required|date',
            'repository_link' => 'required|url',
            'description' => 'required|string',
        ]);

        // Membuat assignment baru menggunakan data yang sudah divalidasi
        Assignment::create([
            'task' => $validated['task'],
            'due_date' => $validated['due_date'],
            'repository_link' => $validated['repository_link'],
            'description' => $validated['description'],
        ]);

        // Redirect ke halaman list assignment dengan pesan sukses
        return redirect()->route('assignments.index');
    }

    public function index()
    {
        // Mendapatkan semua assignment dari database
        $assignments = Assignment::all();

        return view('assignments.index', compact('assignments'));
    }
}

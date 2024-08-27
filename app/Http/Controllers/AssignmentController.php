<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function create()
    {
        return view('assignments.index');
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
        return redirect()->back();
    }

    public function index()
    {
        // Mendapatkan semua assignment dari database
        $assignments = Assignment::all();

        return view('assignments.index', compact('assignments'));
    }
}

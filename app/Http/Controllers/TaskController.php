<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestCreateTask;
use App\Models\Task;
use Illuminate\Http\Request;
use Masmerise\Toaster\Toaster;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tasks = Task::query()->get();
        return view('task.index', [
            'tasks' => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequestCreateTask $request)
    {
        $request->validated();

        Task::query()->create([
            'title' => $request->title,
            'goal' => $request->goal,
            'task' => $request->task
        ]);

        Toaster::success('Sukses membuat data task');

        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $task = Task::query()->find($id);

        return view('task.show', [
            'task' => $task
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::query()->find($id);

        $task->delete();

        return redirect()->route('task.index');
    }
}

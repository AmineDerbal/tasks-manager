<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('priority', 'asc')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(StoreTaskRequest $request)
    {
        $data = $request->validated();
        $data['priority'] = Task::max('priority') + 1;
        Task::create($data);
        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(StoreTaskRequest $request, $id)
    {

        $data = $request->validated();
        $task = Task::findOrFail($id);
        $task->update($data);
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }

    public function reorder(Request $request)
    {

        foreach ($request->order as $taskOrder) {
            $task = Task::find($taskOrder['id']);
            $task->update(['priority' => $taskOrder['priority']]);
        }

        return response()->json(['status' => 'success']);
    }


}
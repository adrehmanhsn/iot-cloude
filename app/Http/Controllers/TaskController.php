<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function getPendingTasks()
    {
        $tasks = Task::where('status', 'pending')->first();

        return response()->json($tasks);
    }

    public function UpdateTaskStatus(Request $request, $Task_id)
    {
        $task = Task::find($Task_id);
        if ($task) {
            $task->status = $request->status;
            $task->save();
        }
        return response()->json($task);
    }
}

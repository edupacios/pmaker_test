<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UpdateTaskRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Inertia\Inertia;

class TaskController extends Controller
{
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, $id)
    {
        $task = Task::find($id);
        $task->user_id = $request->user_id;
        $task->name = $request->name;
        $task->code = $request->code;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->save();

        return response()->json(['success' => true, 'task' => $task], 200);
    }
}

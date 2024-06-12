<?php

namespace App\Services\Task;

use App\Models\User;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskService implements ITaskService
{
    public function getTasks(): Collection
    {
        return Task::where('user_id', \Auth::user()->id)->orderBy('created_at', 'desc')->get();
    }

    // public function get(int $id): Task
    // {
    //     return Task::findOrFail($id);
    // }

    // public function store(array $data): Task
    // {
    //     return Task::create($data);
    // }

    // public function update(Task $task, array $data): Task
    // {
    //     $task->update($data);
    //     return $task;
    // }
}
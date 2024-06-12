<?php

namespace App\Services\Task;

use Illuminate\Database\Eloquent\Collection;

use App\Models\Task;

interface ITaskService
{
    public function getTasks(): Collection;
    // public function get(int $id): Task;
    // public function store(array $data): Task;
    // public function update(Task $task, array $data): Task;
}
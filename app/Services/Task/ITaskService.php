<?php

namespace App\Services\Task;

use App\Models\Task;

interface ITaskService
{
    public function getTasks(): array;
    public function get(int $id): Task;
    public function store(array $data): Task;
    public function update(Task $task, array $data): Task;
}